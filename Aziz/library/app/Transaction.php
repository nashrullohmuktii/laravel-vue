<?php

namespace App;

use Illuminate\Database\Eloquent\factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function Member()
    {
        return $this->hasOne('App\User','member_id');
    }
    public function transactionditail()
    {
        return $this->hasMany('App\TransactionDitail','transaction_id');
    }
}
