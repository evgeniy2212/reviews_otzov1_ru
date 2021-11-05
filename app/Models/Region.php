<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Region extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'region',
        'region_naming'
    ];

    public $with = [
        'translations',
    ];
    protected $fillable = [
        'id',
        'slug',
        'country_id',
        'is_enable'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
