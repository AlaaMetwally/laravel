<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Github extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'nickname','id','avatar'
    ];
}
