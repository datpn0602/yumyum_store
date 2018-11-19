<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'confirm_password',
        'phone',
        'address',
        'level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function userRole()
    {
        return $this->hasMany('App\Models\UserRole', 'user_id');
    }
}
