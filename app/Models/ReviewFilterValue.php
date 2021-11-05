<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ReviewFilterValue extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = [
        'value'
    ];

    public $with = [
        'translations',
    ];
    protected $fillable = [
        'slug',
        'filter_id'
    ];

    public function filter() {
        return $this->belongsTo(ReviewFilter::class, 'filter_id', 'id');
    }

    public function getFormatValueAttribute(){
        return ucwords($this->value);
    }
}
