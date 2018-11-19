<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';
    protected $fillable = [
        'id',
        'name',
        'address',
        'phone',
        'description',
        'avatar',
    ];
    public $timestamps = false;

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function storeFood()
    {
        return $this->hasMany(StoreFood::class);
    }
}
