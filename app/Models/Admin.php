<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['username', 'password'];

    // Password hashing
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = $password; // Store the password as plain text
    }
    
}
