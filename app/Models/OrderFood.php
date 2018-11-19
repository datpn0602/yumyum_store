<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderFood extends Model
{
    use SoftDeletes;
    protected $table = 'order_food';
    protected $fillable = [
        'id',
        'quantity',
        'price',
        'food_id',
        'order_id',
    ];
    public $timestamps = false;
    protected $dates = ['deleted_at'];

    public function food()
    {
        return $this->belongsTo(Food::class)->withTrashed();
    }
}
