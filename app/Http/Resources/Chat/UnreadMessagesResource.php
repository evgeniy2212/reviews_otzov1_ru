<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Resources\Json\JsonResource;

class UnreadMessagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'is_exist' => $this->resource,
        ];
    }

}
