<?php

namespace App;

use Illuminate\Database\Eloquent\factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function publiser()
    {
        return $this->belongsTo('App\Publisher','publisher_id');
    }
    public function author()
    {
        return $this->belongsTo('App\Author','author_id');
    }
    public function catalog()
    {
        return $this->belongsTo('App\Catalog','catalog_id');
    }
    public function transactionditail()
    {
        return $this->hasMany('App\TransactionDitail','book>_id');
    }
}
