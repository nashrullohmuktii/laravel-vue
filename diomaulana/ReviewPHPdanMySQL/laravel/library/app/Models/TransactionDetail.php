<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    public function transaction ()
    {
        return $this->belongsTo('App\Models\transaction', 'transaction_id'); 
    }
    public function book ()
    {
        return $this->belongsTo('App\Models\Book', 'book_id'); 
    }
}
