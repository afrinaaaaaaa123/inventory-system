<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // ✅ MUST be here (outside class)

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::insert([
            ['name'=>'Laptop','category'=>'Electronics','unit_price'=>3500,'stock_quantity'=>20],
            ['name'=>'Keyboard','category'=>'Accessories','unit_price'=>120,'stock_quantity'=>50],
            ['name'=>'Mouse','category'=>'Accessories','unit_price'=>60,'stock_quantity'=>100],
            ['name'=>'A4 Paper','category'=>'Supplies','unit_price'=>45,'stock_quantity'=>30],
            ['name'=>'LAN Cable','category'=>'Supplies','unit_price'=>3,'stock_quantity'=>500],
        ]);
    }
}