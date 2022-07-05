<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatMessage extends Model
{
    protected $fillable = ['chat_id', 'user_id', 'message', 'is_media'];
    protected $keyType = 'string';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function messageUsers(): HasMany
    {
        return $this->hasMany(MessageUser::class);
    }

    /**
     * Return post image with given size preset
     *
     * @param string $size
     * @return string
     */
//    public function getImage($size = ''): string
//    {
//        /** @var Media $media */
//        $media = $this->media->first();
//        if (is_null($media)) {
//            return url('img/noimage.png');
//        }
//
//        return $media->getFullUrl($size);
//    }


//    /**
//     * @param Media|null $media
//     * @throws InvalidManipulation
//     */
//    public function registerMediaConversions(Media $media = null): void
//    {
//        $this
//            ->addMediaConversion('xs')
//            ->width(64)
//            ->height(64);
//        $this
//            ->addMediaConversion('sm')
//            ->width(256)
//            ->height(256);
//        $this
//            ->addMediaConversion('md')
//            ->width(512)
//            ->height(512);
//        $this
//            ->addMediaConversion('xl')
//            ->width(1920)
//            ->height(1080);
//    }
}
