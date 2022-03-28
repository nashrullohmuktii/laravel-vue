<?php

namespace App;

use Illuminate\Database\Eloquent\factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name','gender','phone_number','address','email'];
    
    public function user()
    {
        return $this->hasOne('App\User', 'member_id');
    }

    public function transaction()
    {
        return $this->hasOne('App\Transaction', 'member_id');
    }
}
