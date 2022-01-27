<?php

namespace App;

use Illuminate\Database\Eloquent\factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    public function books()
    {
        return $this->hasMany('App\Book','catalog_id');
    }
}
