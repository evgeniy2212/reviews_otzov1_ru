<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'review_id',
        'from',
        'to',
        'message',
        'is_read',
    ];

    public function review(){
        return $this->belongsTo(Review::class, 'review_id', 'id');
    }

    public function from(){
        return $this->belongsTo(User::class, 'from', 'id');
    }

    public function to(){
        return $this->belongsTo(User::class, 'to', 'id');
    }
}
