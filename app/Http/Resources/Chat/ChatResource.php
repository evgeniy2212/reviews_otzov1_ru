<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $contact = auth()->user()->contacts()->wherePivot('contact_id', $this->partner_user->id)->first();
            return [
                'id'                  => $this->id,
                'createdAt'           => $this->created_at,
                'partnerUser'         => $this->partner_user,
                'contact'             => new UserContactsResource($contact),
                'partnerName'         => $contact->pivot->name ?? $this->partner_user->name,
                'partnerLastName'     => $contact->pivot->last_name ?? $this->partner_user->last_name,
                'chatUsers'           => UserChatResource::collection($this->chatUsers),
                'lastMessage'         => new MessageResource($this->lastMessage),
                'unreadMessagesCount' => $this->user_unread_msg_cnt
            ];
    }

}
