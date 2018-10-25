<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends \Illuminate\Foundation\Auth\User
{
    //
    protected $fillable = ['name', 'email', 'password'];

}
