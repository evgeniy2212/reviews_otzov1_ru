<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportantDateRemind extends Model
{
    protected $fillable = [
        'important_date_remind',
        'important_date_id',
    ];

    public function importantDate(){
        return $this->belongsTo(UserImportantDate::class, 'important_date_id', 'id');
    }
}
