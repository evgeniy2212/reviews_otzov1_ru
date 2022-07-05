<?php

namespace App\Http\Controllers;

use App\Events\UserOfflineStatus;
use App\Events\UserOnlineStatus;
use App\Http\Requests\Chat\CreateMessageRequest;
use App\Http\Requests\Chat\EnterRequest;
use App\Http\Requests\Chat\LeftRequest;
use App\Http\Requests\Chat\SearchRequest;
use App\Http\Requests\Chat\StoreContactRequest;
use App\Http\Requests\Chat\UpdateContactRequest;
use App\Http\Requests\Chat\UserOnlineRequest;
use App\Http\Resources\Chat\ChatResource;
use App\Http\Resources\Chat\MessageResource;
use App\Http\Resources\Chat\UnreadMessagesResource;
use App\Http\Resources\Chat\UserContactsResource;
use App\Models\User;
use App\Providers\ChatServiceProvider;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Jorenvh\Share\Share;

class ChatController extends Controller
{
    /**
     * @var ChatServiceProvider
     */
    private $provider;

    public function __construct(ChatServiceProvider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * get Chat list
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ChatResource::collection($this->provider->getUserChats());
    }

    /**
     * get Chat by user id
     * @param string $id
     * @return ChatResource
     */
    public function getChat(string $id): ChatResource
    {
        return new ChatResource(
            $this->provider->getChat($id)
        );
    }

    /**
     * get auth user`s Chats
     * @return AnonymousResourceCollection
     */
    public function getChats(): AnonymousResourceCollection
    {
        return ChatResource::collection(
            auth()->user()->chats
        );
    }

    /**
     * @param Share $share
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSharedLinks(Request $request, Share $share)
    {
        $links = $share->page($request->url, env('APP_NAME'))
            ->facebook()
            ->twitter()
            ->telegram()
            ->getRawLinks();

        return response()->json($links);
    }

    /**
     * fetch User`s Contacts
     * @return AnonymousResourceCollection
     */
    public function getContacts(): AnonymousResourceCollection
    {
        return UserContactsResource::collection(
            auth()->user()->active_contacts
        );
    }

    /**
     * @param StoreContactRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeContact(StoreContactRequest $request)
    {
        $contact = $this->provider->checkContactExistingByEmail($request->get('email'));
        if($contact){
            return response()->json(
                [
                    'success' => false,
                    'message' => 'У вас уже есть такой контакт или вы уже отправляли запрос на добавление контакта ранее.'
                ]
            );
        }
        $this->provider->storeContact(
            $request->validated()
        );
        return response()->json(
            [
                'success' => true,
                'message' => 'Ваше приглашение отправлено. После того, как оно будет принято, вы увидите новое имя в своих контактах в чате и сможете обмениваться текстами в любое удобное для вас время.'
            ]
        );
    }

    /**
     * @param UpdateContactRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateContact(UpdateContactRequest $request)
    {
        $contact = $this->provider->updateContact(
            $request->validated()
        );
        return response()->json(
            [
                'success' => true,
                'message' => 'Контакт обновлён!',
                'contact' => new UserContactsResource($contact)
            ]
        );
    }

    /**
     * @param string $token
     */
    public function approveContact(string $token)
    {
        $name = $this->provider->approveContact($token);

        return redirect()->route('profile-info')
            ->withSuccess(["$name добавлен в ваши контыкты."]);
    }

    /**
     * invite client to chat
     * @param string $id
     * @return AnonymousResourceCollection
     */
    public function getMessages(string $id): AnonymousResourceCollection
    {
        return MessageResource::collection(
            $this->provider->getChatMessages($id)
        );
    }

    /**
     * @param CreateMessageRequest $request
     *
     * @return MessageResource
     */
    public function storeMessage(CreateMessageRequest $request): MessageResource
    {
        return new MessageResource(
            $this->provider->storeMessage(
                $request->validated()
            )
        );
    }

    /**
     * @param LeftRequest $request
     *
     * @return Response|ResponseFactory
     */
    public function leaveChat(LeftRequest $request)
    {
        $this->provider->setUnreadMessage($request->validated());
    }

    /**
     * @param EnterRequest $request
     *
     * @return Response|ResponseFactory
     */
    public function enterChat(EnterRequest $request)
    {
        $this->provider->deleteUnreadStatusMessage($request->validated());
    }

    /**
     * @param SearchRequest $request
     *
     * @return AnonymousResourceCollection
     */
    public function search(SearchRequest $request): AnonymousResourceCollection
    {
        return ChatResource::collection($this->provider->searchByChats($request->validated()));
    }

    /**
     * @return UnreadMessagesResource
     */
    public function chatsWithUnreadMessages(): UnreadMessagesResource
    {
        return new UnreadMessagesResource(
            $this->provider->isExistChatWithUnreadMessages()
        );
    }

    /**
     * @param Request $request
     */
    public function deleteChatMessages(Request $request)
    {
        $this->provider->deleteMessages($request->get('messages', []));
    }

    /**
     * @param Request $request
     */
    public function deleteChat(Request $request)
    {
        $this->provider->deleteChat($request->id);

        return response()->json(
            [
                'success' => true,
                'message' => 'Чат удалён!'
            ]
        );
    }

    /**
     * @param Request $request
     */
    public function deleteContact(Request $request)
    {
        $this->provider->deleteContact($request->id);

        return response()->json(
            [
                'success' => true,
                'message' => 'Контакт удалён!'
            ]
        );
    }

    /**
     * @param UserOnlineRequest $request
     * @return void
     */
    public function online(UserOnlineRequest $request)
    {
        $userId = $request->get('user_id');
        $user = User::findOrFail($userId);
        $user->chat_status = 1;
        $user->save();
        broadcast(new UserOnlineStatus($user));
    }

    /**
     * @param UserOnlineRequest $request
     * @return void
     */
    public function offline(UserOnlineRequest $request)
    {
        $userId = $request->get('user_id');
        $user = User::findOrFail($userId);
        $user->chat_status = 0;
        $user->save();
        broadcast(new UserOfflineStatus($user));
    }
}
