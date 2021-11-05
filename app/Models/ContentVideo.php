<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentVideo extends Model
{
    protected $fillable = [
        'content_id',
        'content_type',
        'src',
        'name',
        'original_name',
    ];

    public function getVideoUrl()
    {
        return asset('storage/' . $this->src);
    }
}
