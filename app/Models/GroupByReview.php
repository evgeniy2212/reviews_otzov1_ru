<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class GroupByReview extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'name'
    ];

    public $with = [
        'translations',
    ];

    const OTHER_GROUP_ALIAS = 'other';

    protected $fillable = [
        'id',
        'category_id',
        'is_published'
    ];

    public function category(){
        return $this->belongsTo(CategoryByReview::class, 'category_id', 'id');
    }
}
