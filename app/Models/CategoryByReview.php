<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class CategoryByReview extends Model implements TranslatableContract
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
        'is_published'
    ];

    public function review_category(){
        return $this->belongsTo(ReviewCategory::class, 'review_category_id', 'id');
    }

    public function groups(){
        return $this->hasMany(GroupByReview::class, 'category_id', 'id')
            ->orderByTranslation('name');
    }

    public function getGroupsByCategory($id){
        $sorted = $this->whereId($id)
            ->first()
            ->groups()
            ->whereIsPublished(true)
            ->get();
        $sorted = $sorted->sort(function ($a, $b) {
            return strtolower($a->name) == GroupByReview::OTHER_GROUP_ALIAS ? -1 : 1;
        });
        return $sorted->values();
    }

    public function getAllCategories(){
        return $this->all()
            ->pluck('name', 'id');
    }

    public function getCategoriesByReviewCategory($id = null){
        return $this->whereReviewCategoryId($id)
            ->get()
            ->pluck('name', 'id');
    }
}
