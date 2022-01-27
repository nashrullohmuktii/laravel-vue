<?php

namespace App;

use Illuminate\Database\Eloquent\factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    public function books()
    {
        return $this->hasMany('App\Book','publisher_id');
    }
}
