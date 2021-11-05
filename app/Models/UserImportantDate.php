<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserImportantDate extends Model
{
    const REMIND_PERIODS = [
        7, 3, 1, 0
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'body',
        'important_date_type_id',
        'name',
        'second_name',
        'important_date_date',
        'user_sign',
        'is_published',
        'created_at'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function reminds()
    {
        return $this->hasMany(ImportantDateRemind::class, 'important_date_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(UserImportantDateType::class, 'important_date_type_id', 'id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m-d-Y');
    }

    public function getImportantDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->important_date_date)->format('m.d.Y');
    }

    public function getFullNameAttribute(){
        return empty($this->second_name)
            ? $this->name
            : $this->name . ' ' . $this->second_name;
    }
}
