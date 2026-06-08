<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $category = Category::all();

        return view('kasir.dashboard', compact('products', 'category'));
    }

    public function prosesCheckout(Request $request)
    {
        $cartData = $request->input('cart_data');
        $cartArray = json_decode($cartData, true);

        session(['kasir_cart' => $cartArray]);

        return redirect()->route('pembayaran.index');
    }

    public function halamanPembayaran()
    {
        // PERBAIKAN 1: Ambil data session asli
        $cart = session('kasir_cart');

        if (!is_array($cart)) {
            $cart = [];
        }

        $total = 0;
        foreach ($cart as $item) {
            if (isset($item['harga']) && isset($item['quantity'])) {
                $total += $item['harga'] * $item['quantity'];
            }
        }

        return view('kasir.pembayaran', compact('cart', 'total'));
    }
}
