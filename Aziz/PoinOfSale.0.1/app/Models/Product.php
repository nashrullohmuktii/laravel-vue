<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //protected $table = 'product';
    //untuk menjembatani data base ke aplikasi
    protected $fillable =['name_product', 'type_id', 'price', 'qty'];
    //untuk memproteksi data yang akan di save
    public function type()
    {
        return $this->hasOne('App\Models\Type', 'type_id');
    }

    public function konfimations()
    {
        return $this->hasMany('App\Models\Konfirmation', 'konfirmation_id');
    }

    
}
