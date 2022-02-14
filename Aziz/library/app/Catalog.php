<?php

namespace App;

use Illuminate\Database\Eloquent\factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{

    protected $fillable = ['name'];

    public function books()
    {
        return $this->hasMany('App\Book','catalog_id');
    }
}
