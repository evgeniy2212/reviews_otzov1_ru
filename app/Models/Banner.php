<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    const MAX_BANNERS_COUNT = 11;
    const TYPE_TEXT = 'text';
    const TYPE_IMAGE = 'image';

    protected $fillable = [
        'id',
        'banner_category_id',
        'user_id',
        'src',
        'name',
        'original_name',
        'title',
        'body',
        'link',
        'is_published',
        'from',
        'to',
        'locale',
    ];

//    protected $dates = ['created_at'];
//
//    protected $casts = [
//        'created_at' => 'date:d/m/Y',
////        'to' => 'datetime:d/m/Y',
//    ];
////
//    protected $dateFormat = 'Y-m-d';

    public function category(){
        return $this->belongsTo(BannerCategory::class, 'banner_category_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function setFromAttribute($value)
    {
        $this->attributes['from'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function setToAttribute($value)
    {
        $this->attributes['to'] = Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getImageUrl()
    {
        return $this->src
            ? asset('storage/' . $this->src)
            : asset('storage/images/default_img.png');
    }
}
