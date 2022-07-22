<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'tension',
        'brand_id'
    ];

    public function brand(){
        return $this->hasOne(Brand::class, 'id' , 'brand_id');
    }
}
