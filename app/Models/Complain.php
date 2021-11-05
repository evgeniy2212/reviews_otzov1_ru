<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    const ADMIN_FILTERS = [
        'is_new' => [
            true,
            false,
            null,
        ]
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'review_id',
        'msg',
        'is_new'
    ];
}
