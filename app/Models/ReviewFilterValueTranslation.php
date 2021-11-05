<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewFilterValueTranslation extends Model
{
    public $timestamps   = false;

    protected $table = 'review_filter_value_translations';

    public $fillable = [
        'value',
    ];
}

