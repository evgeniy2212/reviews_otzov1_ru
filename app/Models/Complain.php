<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

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
        'model_type',
        'model_id',
        'msg',
        'is_new'
    ];


    /**
     * @return MorphTo
     */
    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }
}
