<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerCategoryTranslation extends Model
{
    public $timestamps   = false;

    protected $table = 'banner_category_translations';

    public $fillable = [
        'title',
    ];
}
