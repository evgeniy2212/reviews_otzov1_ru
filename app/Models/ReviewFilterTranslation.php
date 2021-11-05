<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewFilterTranslation extends Model
{
    public $timestamps   = false;

    protected $table = 'review_filter_translations';

    public $fillable = [
        'name',
    ];
}

