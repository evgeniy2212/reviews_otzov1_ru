<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class UserCongratulationCategory extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'name',
        'title',
    ];

    protected $fillable = [
        'slug',
        'is_published',
    ];

    public $with = [
        'translations',
    ];

}
