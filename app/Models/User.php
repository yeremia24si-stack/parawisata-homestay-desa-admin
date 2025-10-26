<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// (not extending Authenticatable because auth is manual here)

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','email','password','position','department','phone','status'
    ];

    protected $hidden = [
        'password','remember_token'
    ];
}
