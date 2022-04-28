<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable =['name', 'gender', 'phone_number', 'address', 'email'];
    //penambahan protection karena di controller create request all

    public function user()
    {
        return $this->hasOne('App\Models\User', 'user_id');
    }

    public function baskets()
    {
        return $this->hasMany('App\Models\Basket', 'basket_id');
    }

    public function checkout()
    {
        return $this->hasMany('App\Models\checkout', 'checkout_id');
    }

    public function konfimations()
    {
        return $this->hasMany('App\Models\Konfirmation', 'konfirmation_id');
    }
}
