<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sex', 'phone', 'email', 'address'];

    public function transaction()
    {
        return $this->hasOne('App\Models\Transaction', 'customer_id');
    }
}
