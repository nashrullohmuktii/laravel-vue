<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfirmation extends Model
{
    use HasFactory;

    protected $fillable =['product_id', 'checkout_id', 'qty'];

    public function checkout()
    {
        return $this->belongsTo('App\Models\Checkout', 'checkout_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
    
    public function suplier()
    {
        return $this->belongsTo('App\Models\Suplier', 'suplier_id');
    }
}
