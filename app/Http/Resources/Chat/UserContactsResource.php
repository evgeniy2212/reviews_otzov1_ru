<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Resources\Json\JsonResource;

class UserContactsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'name'       => $this->pivot->name,
            'last_name'  => $this->pivot->last_name,
            'full_name'  => $this->pivot->name . ' ' . $this->pivot->last_name,
            'email'      => $this->email,
            'status'     => $this->chat_status,
            'chatId'     => optional($this->chats->first())->id
        ];
    }
}
