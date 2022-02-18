<?php

namespace App;

use Illuminate\Database\Eloquent\factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name','email','phone_number','address'];
    
}
