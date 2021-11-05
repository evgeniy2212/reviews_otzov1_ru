<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $fillable = [
        'name',
        'src',
        'alt',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reviews()
    {
        return $this->belongsToMany(Review::class, 'logo_review');
    }

    public function getImageUrl()
    {
        return asset('storage/' . $this->src);
    }
}
