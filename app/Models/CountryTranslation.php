<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryTranslation extends Model
{
    public $timestamps   = false;

    protected $table = 'country_translations';

    public $fillable = [
        'country'
    ];
}

