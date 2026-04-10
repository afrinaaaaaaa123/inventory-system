<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class InventoryController extends Controller
{
    public function addTransaction(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'quantity' => 'required|integer|min:1',
            'transaction_type' => 'required|in:IN,OUT'
        ]);

        $product = Product::where('name', $request->item_name)->first();

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Prevent negative stock
        if ($request->transaction_type == 'OUT' && $product->stock_quantity < $request->quantity) {
            return response()->json(['message' => 'Not enough stock'], 400);
        }

        // Update stock
        if ($request->transaction_type == 'IN') {
            $product->stock_quantity += $request->quantity;
        } else {
            $product->stock_quantity -= $request->quantity;
        }

        $product->save();

        // Save transaction
        Transaction::create([
            'product_id' => $product->id,
            'transaction_type' => $request->transaction_type,
            'quantity' => $request->quantity,
            'unit_price' => $product->unit_price,
            'remarks' => $request->remarks
        ]);

        return response()->json(['message' => 'Transaction successful']);
    }

    // ✅ Inventory Summary
    public function summary()
    {
        $products = Product::all();

        $data = $products->map(function ($p) {
            return [
                'name' => $p->name,
                'stock_quantity' => $p->stock_quantity,
                'total_value' => $p->stock_quantity * $p->unit_price
            ];
        });

        return response()->json($data);
    }

    // ✅ Group by Category
    public function groupByCategory()
    {
        return Product::select('category')
            ->selectRaw('SUM(stock_quantity) as total_stock')
            ->groupBy('category')
            ->get();
    }

    // ✅ Group by Transaction Type
    public function groupByType()
    {
        return Transaction::select('transaction_type')
            ->selectRaw('SUM(quantity) as total')
            ->groupBy('transaction_type')
            ->get();
    }
}