<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'username',
        'password', 
        'role',
    ];

    // ใช้ username แทน email
    public function getAuthIdentifierName()
    {
        return 'username';
    }
}