<?php


namespace App\Providers;

use App\Events\ChatList;
use App\Events\ChatMessage;
use App\Events\ChatMessageReadStatus;
use App\Events\ClientUnreadMessages;
use App\Mail\ChatContactApprovingEmail;
use App\Models\Chat;
use App\Models\ChatMessage as Message;
use App\Models\MessageUser;
use App\Models\User;
use App\Notifications\User\NewMessageNotification;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class ChatServiceProvider
{
    /**
     * @var Chat
     */
    private $chat;

    /**
     * @var Message
     */
    private $message;

    /**
     * @var $notifiableUser
     */
    private $notifiableUser;

    /**
     * create chat
     *
     * @return Chat
     */
    public function create(): Chat
    {
        $this->chat = (new Chat())->create();

        return $this->chat;
    }

    /**
     * attach or update user in chat
     *
     * @param string $userId
     */
    public function attachUser($userId)
    {
        $this->chat->chatUsers()->firstOrCreate([
            'chat_id' => $this->chat->id,
            'user_id' => $userId,
        ]);
    }

    /**
     * @param string $id
     */
    public function deleteChat(string $id)
    {
        Chat::findOrFail($id)->delete();
    }

    /**
     * get all user chats
     *
     * @return LengthAwarePaginator
     */
    public function getUserChats(): LengthAwarePaginator
    {
        return $this->getAllUserChats()
            ->orderByDesc('messages_max_created_at')
            ->latest()
            ->paginate(config('app.pagination.default'));
    }

    /**
     * get all user chats
     */
    private function getAllUserChats()
    {
        $userId = auth()->id();
        return Chat::query()
            ->with(['chatUsers' => function($q) use($userId) {
                return $q->where('user_id', '!=', $userId);
            }, 'lastMessage'])
            ->whereHas('lastMessage')
//            ->withMax('messages', 'created_at')
            ->where(function($q) use($userId) {
                return $q->whereHas('chatUsers', function ($q) use($userId){
                    return $q->whereUserId($userId);
                });
//                    ->whereDoesntHave('chatUsers', function($q) {
//                    $q->whereIn('user_id', auth()->user()->blockedUsers->pluck('id'));
//                });
            });

    }

    /**
     * get chat between 2 users
     * @param $firstUser
     * @param $secondUser
     *
     * @return mixed
     */
    private function existsChat($firstUser, $secondUser)
    {
         $this->chat = Chat::query()
            ->with('chatUsers')
             ->whereHas('chatUsers', function($q) use ($firstUser, $secondUser) {
                 $q->whereUserId($firstUser);
             })
             ->whereHas('chatUsers', function($q) use ($firstUser, $secondUser) {
                 $q->whereUserId($secondUser);
             })
            ->first();
    }

    /**
     * get chat between 2 users
     * @param string $id
     *
     * @return Chat
     */
    public function getChat(string $id): Chat
    {
        $user = $this->getUser($id);
        $this->existsChat(auth()->id(), $user->id);
        if ($this->chat) {
            $this->chat
                ->chatUsers
                ->firstWhere('user_id', auth()->id());
        } else {
            $this->create();
            $this->attachUser(auth()->id());
            $this->attachUser($user->id);
//            $this->setUnreadMessage(
//                [
//                    'chat_id' => $this->chat->id,
//                    'user_id' => $user->id,
//                    'message_id' => null,
//                ]
//            );
        }

        return $this->chat;
    }

    /**
     * get chat messages
     * @param string $id
     *
     * @return LengthAwarePaginator
     */
    public function getChatMessages(string $id): LengthAwarePaginator
    {
        $chat = Chat::findOrFail($id);
        return Message::query()
            ->whereChatId($chat->id)
            ->latest()
            ->paginate(10);
    }

    /**
     * search by User chats
     *
     * @param array $validated
     *
     * @return LengthAwarePaginator
     */
    public function searchByChats(array $validated): LengthAwarePaginator
    {
        return Chat::query()
            ->with('chatUsers')
            ->whereHas('lastMessage')
            ->whereHas('chatUsers', function(Builder $query) use ($validated) {
                $query->when($validated['query'], function ($q) use ($validated) {
                    $q->whereHas('user', function($q) use ($validated) {
                        $q->where(function($q) use ($validated) {
                            $q->where('name_first', 'ilike', '%' . $validated['query'] . '%')
                                ->orWhere('name_first', 'ilike','%' . $validated['query'] . '%');
                        })->where('id', '!=', auth()->id());
                    });
                });
            })->whereHas('chatUsers', function($q) {
                $q->where('user_id', auth()->id());
            })->whereDoesntHave('chatUsers', function($q) {
                $q->whereIn('user_id', auth()->user()->blockedUsers->pluck('id'));
            })
            ->latest()
            ->paginate(config('app.pagination.search'));
    }

    /**
     * Return one user by id
     *
     * @param string $id
     * @return mixed
     */
    private function getUser(string $id)
    {
        return User::findOrFail($id);
    }

    /**
     * Store user message
     *
     * @param array $validated
     *
     * @return Message
     */
    public function storeMessage(array $validated): Message
    {
        $this->message = Message::create([
            'chat_id' => $validated['chat_id'],
            'user_id' => auth()->id(),
            'message' => Arr::get($validated, 'message', ''),
            'is_media' => Arr::get($validated, 'is_media', false)
        ]);

        $chat = Chat::with('chatUsers')
            ->find($validated['chat_id']);
        foreach ($chat->chatUsers as $chatUser) {
            if ($chatUser->user_id != auth()->id()) {
                $this->notifiableUser = User::find($chatUser->user_id);
                if(
                    $chat->getUserUnreadMsgValueByUserId($this->notifiableUser) === null
                ){
                    $lastMsg = $this->message->id > 1 ? $this->message->id - 1 : 1;
                    MessageUser::whereChatId($chat->id)
                        ->whereUserId($this->notifiableUser->id)
                        ->update(['message_id' => $lastMsg]);
                }
                ChatMessage::dispatch($chat->id, $this->message);
                ChatList::dispatch($chatUser->user_id, $this->message);
                ClientUnreadMessages::dispatch($chat->id, $chatUser->user_id);
            }
        }

        return $this->message;
    }

    public function checkContactExistingByEmail(string $email)
    {
        return auth()->user()
            ->contacts()
            ->firstWhere('email', $email);
    }

    /**
     * Store user message
     *
     * @param array $validated
     */
    public function storeContact(array $validated)
    {
        $contact = User::firstWhere('email', $validated['email']);
        $token = Str::random(32);
        $url = route('chat-contact-approve', ['token' => $token]);
        auth()->user()
            ->contacts()
            ->syncWithoutDetaching(
                [
                    $contact->id => [
                        'name' => $validated['name'],
                        'last_name' => $validated['last_name'],
                        'contact_confirm' => 0,
                        'token' => $token
                    ]
                ]
            );

        Mail::to($contact->email)
            ->send(new ChatContactApprovingEmail(
                $url,
                auth()->user()->name,
                $contact->name
            ));
    }

    /**
     * Store user message
     *
     * @param array $validated
     */
    public function updateContact(array $validated)
    {
        $contact = auth()->user()
            ->contacts()
            ->wherePivot('contact_id', $validated['contact_id'])
            ->first();
        $contact->pivot->name = $validated['name'];
        $contact->pivot->last_name = $validated['last_name'];
        $contact->pivot->save();

        return $contact;
    }

    /**
     * @param string $token
     * @return void
     */
    public function approveContact(string $token)
    {
        $contact = User::whereHas('contacts', function($q) use($token){
            return $q->where('token', $token);
        })->firstOrFail();
        $contactUser = $contact->contacts()
            ->wherePivot('token', $token)
            ->first();
        $contactUser->pivot->contact_confirm = 1;
        $contactUser->pivot->save();

        auth()->user()
            ->contacts()
            ->syncWithoutDetaching(
                [
                    $contact->id => [
                        'name' => $contact->name,
                        'last_name' => $contact->last_name,
                        'contact_confirm' => 1
                    ]
                ]
            );

        return $contact->full_name;
    }

    /**
     * @param array $validated
     *
     * @return MessageUser
     */
    public function setUnreadMessage(array $validated): MessageUser
    {
        $messageUser = MessageUser::firstOrCreate([
            'chat_id' => $validated['chat_id'],
            'user_id' => auth()->id()
        ]);
        $messageUser->message_id = $validated['message_id'];
        $messageUser->save();

        return $messageUser;
    }

    /**
     * @param array $validated
     */
    public function deleteUnreadStatusMessage(array $validated)
    {
        MessageUser::whereChatId($validated['chat_id'])
            ->whereUserId(
                empty($validated['user_id'])
                    ? auth()->id()
                    : Arr::get($validated, 'user_id')
            )
            ->update(['message_id' => null]);

        $chat = Chat::with('chatUsers')
            ->find($validated['chat_id']);
        foreach ($chat->chatUsers as $chatUser) {
            if ($chatUser->user_id != auth()->id()) {
                ChatMessageReadStatus::dispatch($chat->id, $chatUser->user_id);
            }
        }
    }

    /**
     * @param array $messageIds
     */
    public function deleteMessages(array $messageIds = [])
    {
        Message::whereIn('id', $messageIds)
            ->delete();
    }

    /**
     * @param string $id
     */
    public function deleteContact(string $id)
    {
        auth()->user()
            ->contacts()
            ->detach($id);

        auth()->user()
            ->chats()
            ->whereHas('users', function($q) use($id) {
                $q->whereId($id);
            })
            ->delete();
    }

    /**
     * @param Message $message
     * @param bool $isMine
     *
     * @return bool
     */
    public function isReadMessages(Message $message, $isMine = false): bool
    {
        $chat = $this->getChatById($message->chat_id);
        $userId = $isMine
            ? $chat->chatUsers->firstWhere('user_id', '!=', auth()->id())->user_id
            : auth()->id();
        $unreadMessage = MessageUser::whereChatId($message->chat_id)
            ->firstWhere('user_id', '!=', $userId);

        return $unreadMessage
            ? ($unreadMessage->message
                ? $unreadMessage->message->created_at >= $chat->lastMessage->created_at
                : false)
            : true;
    }

    /**
     * @param $photo
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    private function storeMessagePhoto($photo)
    {
        $this->message
            ->addMedia($photo)
            ->usingFileName(
                $this->getFileName($photo)
            )
            ->toMediaCollection();
    }

    /**
     * is exist chats with unread messages
     *
     * @return bool
     */
    public function isExistChatWithUnreadMessages(): bool
    {
        $newChats = Chat::whereHas('chatUsers', function ($q) {
            $q->where('user_id', auth()->id());
        })->whereDoesntHave('chatUsers', function($q) {
            $q->whereIn('user_id', auth()->user()->blockedUsers->pluck('id'));
        })->whereHas('unreadMessages', function($q) {
            $q->whereNull('message_id')
                ->whereUserId(auth()->id());
        })->pluck('id');

        $userChats = $this->getAllUserChats()->pluck('id');

        foreach($userChats as $userChat) {
            $latestMessage = Message::whereChatId($userChat)
                ->where('user_id', '!=', auth()->id())
                ->latest()
                ->first();

            if($latestMessage) {
                $isContainUnreadMessage = Message::whereChatId($userChat)
                    ->where('user_id', '!=', auth()->id())
                    ->whereHas('messageUsers', function ($q) {
                        $q->where('user_id', auth()->id());
                    })
                    ->when($latestMessage, function ($q) use($latestMessage) {
                        $q->where(
                            'created_at',
                            '<',
                            $latestMessage->created_at->format('Y-m-d H:i:s')
                        );
                    })
                    ->orWhere(function($q) use($newChats) {
                        $q->whereIn('chat_id', $newChats);
                    })
                    ->exists();

                if($isContainUnreadMessage)
                    return true;
            }
        }

        return false;
    }

    /**
     * Return one chat by id
     *
     * @param string $id
     * @return mixed
     */
    public function getChatById(string $id)
    {
        return Chat::findOrFail($id);
    }

    /**
     * @param $file
     *
     * @return string
     */
    private function getFileName($file): string
    {
        return md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();
    }
}
