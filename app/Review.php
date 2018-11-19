<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = [
        'id',
        'rating',
        'food_id',
        'user_id',
    ];
    public $timestamps = false;

    public function food()
    {
        return $this->belongTo(Food::class);
    }
}
