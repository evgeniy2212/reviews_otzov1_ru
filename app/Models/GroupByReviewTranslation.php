<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupByReviewTranslation extends Model
{
    public $timestamps   = false;

    protected $table = 'group_by_review_translations';

    public $fillable = [
        'name',
    ];
}
