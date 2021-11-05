<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewCategoryTranslation extends Model
{
    public $timestamps   = false;

    protected $table = 'review_category_translations';

    public $fillable = [
        'title',
    ];
}

