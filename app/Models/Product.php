<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'unit_price',
        'stock_quantity'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}