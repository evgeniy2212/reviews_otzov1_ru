<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCongratulationCategoryTranslation extends Model
{
    public $timestamps   = false;

    protected $table = 'user_congratulation_category_translations';

    public $fillable = [
        'name',
        'title',
    ];
}

