<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class BannerCategory extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'title'
    ];

    public $with = [
        'translations',
    ];

    const FILTERS = [
        'ACTIVITY' => [
            'ALL' => [],
            'PUBLISHED' => ['is_published' => true],
            'UNPUBLISHED' => ['is_published' => false],
        ]
    ];

    protected $fillable = [
        'id',
        'slug',
        'is_published'
    ];

    public function banners() {
        return $this->hasMany(Banner::class, 'banner_id', 'id');
    }
}
