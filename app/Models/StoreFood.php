<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreFood extends Model
{
    protected $table = 'store_food';
    protected $fillable = [
        'id',
        'status',
        'quantity',
        'food_id',
        'store_id',
    ];
    public $timestamps = false;

}
