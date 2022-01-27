<?php

namespace App;

use Illuminate\Database\Eloquent\factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function User()
    {
        return $this->hasOne('App\User','member_id');
    }
}
