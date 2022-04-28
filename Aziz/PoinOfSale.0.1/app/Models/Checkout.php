<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable =['customer_id', 'date_start', 'product_id', 'status'];
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }

    public function konfimations()
    {
        return $this->hasMany('App\Models\Konfirmation', 'konfirmation_id');
    }

    
}
