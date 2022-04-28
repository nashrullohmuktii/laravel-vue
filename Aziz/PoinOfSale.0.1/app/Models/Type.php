<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable =['name', 'code', 'suplier_id'];
    
    public function suplier()
    {
        return $this->hasOne('App\Models\Suplier', 'suplier_id');
    }
}
