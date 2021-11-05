<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    const NAME_SIGN = 1;
    const NICKNAME_SIGN = 2;
    const DEFAULT_SIGN = 3;

    const MAX_BLOCKED_ATTEMPTS = 2;

    const DEFAULT_NAME = 'User';

    const FILTERS = [
        'ACTIVITY' => [
            'ALL' => [],
            'BLOCKED' => ['is_blocked' => true],
            'ACTIVE' => ['is_blocked' => false],
        ]
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'email_verified_at',
        'two_factor_expires_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'last_name',
        'nickname',
        'city',
        'region_id',
        'zip_code',
        'is_admin',
        'reaction_count',
        'congratulation_id',
        'two_factor_code',
        'two_factor_expires_at',
        'email_verified_at',
        'is_blocked',
        'is_blocked_cnt',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function region(){
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function messages(){
        return $this->hasMany(Message::class, 'from', 'id');
    }

    public function given_by_messages(){
        return $this->hasMany(Message::class, 'to', 'id');
    }

    public function unread_congratulations(){
        return $this->hasMany(UserCongratulation::class, 'to', 'id')
            ->whereNull('deleted_by_to')
            ->whereIsRead(false);
    }

    /**
     * Get comments for the reviews.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function congratulation(){
        return $this->belongsTo(Congratulation::class, 'congratulation_id', 'id');
    }

    /**
     * Get user reviews.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }

    /**
     * Get user congratulations.
     */
    public function congratulations()
    {
        return $this->hasMany(UserCongratulation::class, 'user_id', 'id');
    }

    public function banners()
    {
        return $this->hasMany(Banner::class, 'user_id', 'id');
    }

    public function complains()
    {
        return $this->belongsToMany(Review::class, 'complains')
            ->withPivot('msg', 'is_new');
    }

    public function moderationReviews()
    {
        return $this->belongsToMany(Review::class, 'review_moderations')
            ->withPivot('msg', 'is_new');
    }

    public function getFullNameAttribute(){
        return $this->name . ' ' . $this->last_name;
    }

    public function getFullAddressAttribute(){
        return $this->city . ', ' . $this->zip_code;
    }

    public function getReviewsCountAttribute(){
        return $this->reviews->count();
    }

    public function getCongratulationsCountAttribute(){;
        return $this->congratulations()
            ->whereIsPublished(true)
            ->count();
    }

    public function getCommentsCountAttribute(){
        return $this->comments->count();
    }

    public function getUserSign($userSign = self::DEFAULT_NAME){
        switch ($userSign) {
            case self::NAME_SIGN:
                $result = $this->full_name;
                break;
            case self::NICKNAME_SIGN:
                $result = empty($this->nickname)
                    ? self::DEFAULT_NAME
                    : $this->nickname;
                break;
            case self::DEFAULT_SIGN:
                $result = self::DEFAULT_NAME;
                break;
            default: $result = self::DEFAULT_NAME;
        }

        return $result;
    }

    public function getNewMessagesCount(){
        return $this->given_by_messages()
            ->whereIsRead(false)
            ->count();
    }

    public function generateTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(10);
        $this->save();
    }

    public function resetTwoFactorCode()
    {
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

    public function scopeActiveUsers($query){
        return $query->where('is_admin', false)->whereNotNull('email_verified_at');
    }

    public function saveWithoutEvents(array $options=[])
    {
        return static::withoutEvents(function() use ($options) {
            return $this->save($options);
        });
    }

    public function isUserReviewAlreadyExist(string $categoryId, string $name, string $region_id, string $city, string $secondName = null){
        return $this->reviews()
            ->whereReviewCategoryId($categoryId)
            ->whereName($name)
            ->when($secondName, function($q) use ($secondName){
                return $q->whereSecondName($secondName);
            })
            ->whereRegionId($region_id)
            ->whereCity($city)
            ->whereIsPublished(true)
            ->get()
            ->count();
    }
}
