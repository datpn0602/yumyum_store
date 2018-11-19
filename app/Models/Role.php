<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'id',
        'name',
    ];
    public $timestamps = false;

    public function userRole()
    {
        return $this->hasMany(UserRole::class);
    }
}
