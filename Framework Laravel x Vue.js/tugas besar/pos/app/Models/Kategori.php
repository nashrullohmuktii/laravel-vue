<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'kategori_code', 'suplier_id'];

    public function suplier()
    {
        return $this->belongsTo('App\Models\Suplier', 'suplier_id');
    }

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'kategori_id');
    }
}
