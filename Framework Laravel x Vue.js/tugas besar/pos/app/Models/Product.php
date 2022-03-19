<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'product_code', 'qty', 'price', 'kategori_id'];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'kategori_id');
    }

    public function transDetails()
    {
        return $this->hasMany('App\Models\TransDetail', 'product_id');
    }
}
