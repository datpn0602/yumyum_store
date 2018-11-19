<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $table = 'orders';
    protected $fillable = [
        'id',
        'full_name',
        'address',
        'phone',
        'description',
        'status',
        'date',
        'store_id',
        'user_id',
    ];
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function orderFood()
    {
        return $this->hasMany(OrderFood::class);
    }
}
