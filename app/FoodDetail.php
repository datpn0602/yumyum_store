<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodDetail extends Model
{
    protected $table = 'food_details';
    protected $fillable = [
        'id',
        'image',
        'food_id',
    ];
    public $timestamps = false;

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
