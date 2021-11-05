<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Congratulation extends Model
{
    const FIRST_CONGRATULATION = 1;
    const SECOND_CONGRATULATION = 100;
    const THIRD_CONGRATULATION = 200;
    const FOURTH_CONGRATULATION = 300;
    const FIFTH_CONGRATULATION = 500;

    protected $fillable = [
        'src',
        'name',
        'original_name',
        'alt',
        'id',
        'locale'
    ];

    /**
     * Get user for the reviews.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'congratulation_id', 'id');
    }
}
