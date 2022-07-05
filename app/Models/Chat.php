<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Chat extends Model
{
    protected $keyType = 'string';

    public function chatUsers(): HasMany
    {
        return $this->hasMany(ChatUser::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function lastMessage(): HasOne
    {
        return $this->hasOne(ChatMessage::class)->latest();
    }

    public function unreadMessages(): HasMany
    {
        return $this->hasMany(MessageUser::class)
            ->whereNotNull('message_id');
    }

    public function getUserUnreadMsgValueByUserId(string $userId = null)
    {
        return optional($this->unreadMessages()
                ->whereUserId($userId ?? auth()->id())
                ->first())->message_id;
    }

    public function getUserUnreadMsgCntAttribute()
    {
        $lastReadMsgId = optional($this->unreadMessages()
            ->whereUserId(auth()->id())
            ->first())->message_id ?? optional($this->lastMessage)->id;
        return optional($this->lastMessage)->id - $lastReadMsgId;
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'chat_users',
            'chat_id',
            'user_id');
    }

    public function getPartnerUserAttribute()
    {
        return $this->users()
            ->whereNotIn('id', [auth()->id()])
            ->first();
    }
}
