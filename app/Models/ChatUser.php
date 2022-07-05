<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatUser extends Model
{
    protected $fillable = ['chat_id', 'user_id'];
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
