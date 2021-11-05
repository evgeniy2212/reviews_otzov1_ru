<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserCongratulation extends Model
{
    public const TYPE_OF_CONGRATULATIONS = [
        [
            'type_name' => 'Public',
            'value_name' => 'is_private',
            'value' => 0
        ],
        [
            'type_name' => 'Private',
            'value_name' => 'is_private',
            'value' => 1
        ],
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'body',
        'region_id',
        'country_id',
        'city',
        'congratulation_category_id',
        'name',
        'second_name',
        'congratulation_date',
        'likes',
        'dislikes',
        'user_sign',
        'is_published',
        'is_private',
        'is_read',
        'to',
        'deleted_by_to',
        'deleted_by_from',
        'created_at',
        'locale',
    ];

    public function category(){
        return $this->belongsTo(UserCongratulationCategory::class, 'congratulation_category_id', 'id');
    }

    public function region(){
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function congratulatableUser(){
        return $this->belongsTo(User::class, 'to', 'id');
    }

    public function image(){
        return $this->hasOne(ContentImage::class, 'content_id', 'id')
            ->where('content_type', self::class);
    }

    public function video(){
        return $this->hasOne(ContentVideo::class, 'content_id', 'id')
            ->where('content_type', self::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m-d-Y');
    }

    public function getCongratulationDateAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m-d-Y');
    }

    public function getFullNameAttribute(){
        return $this->second_name
            ? $this->name . ' ' . $this->second_name
            : $this->name;
    }

    public function getFullGeoposition(){
        return $this->region
            ? $this->region->country->country . ', ' . $this->region->region . ', ' . $this->city
            : ($this->country
                ?$this->country->country
                : '');
    }

    public function scopeOnlyPublic($query){
        return $query->where('is_private', false);
    }
}
