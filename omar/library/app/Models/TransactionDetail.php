<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = ['transaction_id', 'book_id', 'qty'];

    public function transactions()
    {
        return $this->belongsTo('App\Models\Transaction', 'transaction_id');
    }

    public function book()
    {
        return $this->belongsTo('App\Models\Book', 'book_id');
    }

    // public function setBookIdAttribute($value)
    // {
    //     $this->attributes['book_id'] = json_encode($value);
    // }

    // public function getBookIdAttribute($value)
    // {
    //     return $this->attributes['book_id'] = json_decode($value);
    // }
}
