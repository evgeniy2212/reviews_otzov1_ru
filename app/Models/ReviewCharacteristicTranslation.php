<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewCharacteristicTranslation extends Model
{
    public $timestamps   = false;

    protected $table = 'review_characteristic_translations';

    public $fillable = [
        'name',
    ];
}

