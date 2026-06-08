<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $movements = Stock::with('product')->latest('id')->paginate(5);

        return view('stok', compact('products', 'movements'));
    }

    public function store(Request $request)
    {
        // 1. Ambil data produk dan quantity dari request
        $product = Product::findOrFail($request->product_id);
        $qty = $request->quantity;

        // 2. Simpan data ke riwayat gerakan stok (StockMovement)
        Stock::create([
            'product_id' => $request->product_id,
            'type'       => $request->type,
            'quantity'   => $qty,
            'date'       => $request->date,
        ]);

        if ($request->type === 'IN') {
            $product->increment('stock', $qty); 
        } else if ($request->type === 'OUT') {
            $product->decrement('stock', $qty); 
        }

        return redirect()->back()->with('store', 'Pergerakan stok berhasil dicatat!');
    }
}
