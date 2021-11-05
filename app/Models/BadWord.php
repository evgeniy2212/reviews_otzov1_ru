<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class BadWord extends Model
{
    protected $fillable = [
        'id',
        'review_category_id',
        'locale',
        'word',
    ];

    public function category(){
        return $this->belongsTo(ReviewCategory::class, 'review_category_id', 'id');
    }
}
