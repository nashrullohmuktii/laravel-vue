<?php

namespace App;

use Illuminate\Database\Eloquent\factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = ['member_id','date_start','date_end','status'];
    
    public function member()
    {
        return $this->belongsTo('App\Member', 'member_id');
    }

    public function transactionditail()
    {
        return $this->hasMany('App\TransactionDitail', 'transaction_id');
    }

}
