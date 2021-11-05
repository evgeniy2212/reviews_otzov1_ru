<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ReviewFilter extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'name'
    ];

    public $with = [
        'translations',
    ];

    const DATE_FILTER = 'filter-by-date';
    const SORT_BY_FILTER = 'sort-by';
    const CONTENT_TYPE_FILTER = 'content_type';

    const SORT_BY_RATING = 'rating';
    const SORT_BY_ALPHABET = 'alphabet';

    const ALL_CONTENT_TYPE = 'All';
    const REVIEWS_CONTENT_TYPE = 'Reviews';
    const CONGRATULATIONS_CONTENT_TYPE = 'Congratulations';

    const CONTENT_TYPE_FILTER_ENABLE = [
        'person'
    ];

    const CONTENT_TYPES = [
        self::ALL_CONTENT_TYPE, self::CONGRATULATIONS_CONTENT_TYPE, self::REVIEWS_CONTENT_TYPE
    ];

    protected $fillable = [
        'slug',
        'review_category_id'
    ];

    public function category() {
        return $this->belongsTo(ReviewCategory::class, 'review_category_id', 'id');
    }

    public function filter_values(){
        return $this->hasMany(ReviewFilterValue::class, 'filter_id', 'id')
            ->orderByTranslation('value');
    }

    public function getFormatNameAttribute(){
        return ucwords($this->name);
    }
}
