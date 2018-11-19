<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    protected $table = 'food_types';
    protected $fillable = [
        'id',
        'name',
        'description',
    ];
    public $timestamps = false;

    public function food()
    {
        return $this->hasMany(Food::class);
    }
}
