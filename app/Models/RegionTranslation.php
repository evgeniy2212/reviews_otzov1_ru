<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegionTranslation extends Model
{
    public $timestamps   = false;

    protected $table = 'region_translations';

    public $fillable = [
        'region',
        'region_naming',
    ];
}

