<?php

namespace App\Http\Resources\Chat;

use App\Providers\ChatServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $photo = [];
//        if ($this->media->first()) {
//            $photo = [
//                'xl' => $this->resource->getImage('xl'),
//                'md' => $this->resource->getImage('md'),
//                'sm' => $this->resource->getImage('sm'),
//            ];
//        }
        $chatProvider = new ChatServiceProvider();

        return [
            'user_id'       => $this->user_id,
            'is_sender'     => $this->user_id == auth()->id(),
            'is_media'      => $this->is_media,
            'message_id'    => $this->id,
            'message'       => $this->message,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'photo'         => $photo,
            'user'          => new UserChatResource($this),
            'is_read'       => $chatProvider->isReadMessages($this->resource),
            'is_read_by_me' => $chatProvider->isReadMessages($this->resource, true)
        ];
    }
}
