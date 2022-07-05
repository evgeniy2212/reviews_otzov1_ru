<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Resources\Json\JsonResource;

class UserChatResource extends JsonResource
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
            'id'         => $this->user->id,
            'name'       => $this->user->name,
            'email'      => $this->user->email,
        ];
    }
}
