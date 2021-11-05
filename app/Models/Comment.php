<?php

namespace App\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    const PROFILE_FILTERS = [
        'from' => [],
        'to' => [],
    ];
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'review_id',
        'body',
        'likes',
        'dislikes',
    ];

    public function review(){
        return $this->belongsTo(Review::class, 'review_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m-d-Y');
    }
}
