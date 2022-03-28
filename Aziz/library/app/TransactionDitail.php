<?php

namespace App;

use Illuminate\Database\Eloquent\factories\Factory;
use Illuminate\Database\Eloquent\Model;

class TransactionDitail extends Model
{

    protected $fillable = ['transaction_id', 'book_id', 'qty'];

    public function transactions()
    {
        return $this->belongsTo('App\Transaction', 'transaction_id');
    }

    public function book()
    {
        return $this->belongsTo('App\Book', 'book_id');
    }
}
