<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewImage extends Model
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

    public function getImageUrl()
    {
        return asset('storage/' . $this->src);
    }

    public function getResizeImageUrl()
    {
        return asset('storage/images/resize_images/reviews/' . $this->name);
    }

//    public function getFullScreenImageUrl()
//    {
//        return asset('storage/images/full_screen_images/reviews/' . $this->name);
//    }
}
