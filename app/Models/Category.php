<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = false;

    public function getProducts()
    {
        return $this->hasMany(Product::class);
    }
    public function latestProduct()
    {
        return $this->hasOne(Product::class)->latestOfMany();
    }
}
