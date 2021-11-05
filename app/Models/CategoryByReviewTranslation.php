<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryByReviewTranslation extends Model
{
    public $timestamps   = false;

    protected $table = 'category_by_review_translations';

    public $fillable = [
        'name',
    ];
}
