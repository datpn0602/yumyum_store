<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';
    protected $fillable = [
        'id',
        'discount',
        'start_date',
        'end_date',
    ];
    public $timestamps = false;

    public function food()
    {
        return $this->hasMany(Food::class);
    }
}
