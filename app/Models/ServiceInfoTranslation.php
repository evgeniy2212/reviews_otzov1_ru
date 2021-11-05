<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceInfoTranslation extends Model
{
    public $timestamps   = false;

    protected $table = 'service_info_translations';

    public $fillable = [
        'value',
    ];
}

