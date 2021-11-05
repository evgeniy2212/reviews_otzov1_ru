<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewVideo extends Model
{
    protected $fillable = [
        'review_id',
        'src',
        'name',
        'original_name',
    ];

    public function review(){
        return $this->belongsTo(Review::class);
    }

    public function getVideoUrl()
    {
        return asset('storage/' . $this->src);
    }
}
