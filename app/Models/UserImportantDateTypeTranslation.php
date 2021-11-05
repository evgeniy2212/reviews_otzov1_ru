<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserImportantDateTypeTranslation extends Model
{
    public $timestamps   = false;

    protected $table = 'user_important_date_type_translations';

    public $fillable = [
        'name',
        'title',
    ];
}

