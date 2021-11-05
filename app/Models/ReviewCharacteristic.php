<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ReviewCharacteristic extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'name'
    ];

    public $with = [
        'translations',
    ];

    protected $fillable = [
        'id',
        'review_category_id',
        'is_positive',
        'is_published'
    ];

    public function category(){
        return $this->belongsTo(ReviewCategory::class, 'review_category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reviews()
    {
        return $this->belongsToMany(Review::class);
    }
}
