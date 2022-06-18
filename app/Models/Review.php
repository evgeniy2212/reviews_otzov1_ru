<?php

namespace App\Models;

use App\Services\ReviewService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Review extends Model
{
    const ADMIN_FILTERS = [
        'activity' => [
            'all' => [],
            'holded' => ['is_published' => false],
            'unholded' => ['is_published' => true],
        ],
        'from' => [],
        'to' => [],
//        'month' => [],
//        'day' => []
    ];

    const SHOW_CONGRATULATION = [
        'person'
    ];

    const DATA_FILTERS = [
        'date' => 'years'
    ];

    const SHOW_GEO = [
        'person'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'review',
        'region_id',
        'country_id',
        'city',
        'review_category_id',
        'category_by_review_id',
        'review_group_id',
        'email',
        'name',
        'second_name',
        'rating',
        'likes',
        'dislikes',
        'user_sign',
        'is_published',
        'is_communication_enable',
        'is_blocked',
        'created_at',
        'locale',
    ];

    public function category(){
        return $this->belongsTo(ReviewCategory::class, 'review_category_id', 'id');
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

    public function category_group(){
        return $this->belongsTo(GroupByReview::class, 'review_group_id', 'id');
    }

//    public function published_category_group(){
//        return $this->category_group()->whereIsPublished(true);
//    }

    public function category_by_review(){
        return $this->belongsTo(CategoryByReview::class, 'category_by_review_id', 'id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'review_id', 'id');
    }

    public function messages(){
        return $this->hasMany(Message::class, 'review_id', 'id');
    }

    public function image(){
        return $this->hasOne(ReviewImage::class, 'review_id', 'id');
    }

    public function video(){
        return $this->hasOne(ReviewVideo::class, 'review_id', 'id');
    }

    /**
     * @return MorphMany
     */
    public function complains(): MorphMany
    {
        return $this->morphMany(Complain::class, 'model');
    }

    public function moderationReviews()
    {
        return $this->belongsToMany(User::class, 'review_moderations')
            ->withPivot('msg', 'is_new');
    }

    public function getOnModerationAttribute()
    {
        return $this->moderationReviews->where('pivot.is_new', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function characteristics()
    {
        return $this->belongsToMany(ReviewCharacteristic::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function logo()
    {
        return $this->belongsToMany(Logo::class, 'logo_review');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('m-d-Y');
    }

    public function getFullNameAttribute(){
        return $this->second_name
            ? $this->name . ' ' . $this->second_name
            : $this->name;
    }

    public function getCategoryByReviewId(){
        return optional($this->category_by_review)->id
            ?? ReviewService::getReviewCategoriesBySlug($this->category->slug)->keys()->first();
    }

    public function isHasUnreadMessages(){
        return $this->messages()
            ->where('is_read', false)
            ->when(auth()->user(), function($q){
                $q->whereTo(auth()->user()->id);
            })
            ->count();
    }

    public function getFullGeoposition(){
        return $this->region
            ? $this->region->country->country . ', ' . $this->region->region . ', ' . $this->city
            : ($this->country
                ?$this->country->country
                : '');
    }
}
