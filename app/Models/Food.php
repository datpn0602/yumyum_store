<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use SoftDeletes;
    protected $table = 'foods';
    protected $fillable = [
        'id',
        'name',
        'description',
        'information',
        'price',
        'size',
        'image',
        'promotion_id',
        'type_id',
    ];
    protected $dates = ['deleted_at'];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function type()
    {
        return $this->belongsTo(FoodType::class);
    }

    public function orderFood()
    {
        return $this->hasMany(OrderFood::class);
    }

    public function storeFood()
    {
        return $this->hasMany(StoreFood::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function foodDetail()
    {
        return $this->hasMany(FoodDetail::class);
    }
}
