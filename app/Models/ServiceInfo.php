<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ServiceInfo extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'value'
    ];

    public $with = [
        'translations',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name'
    ];
}
