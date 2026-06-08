<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'total_tagihan' => 'required|numeric',
            'jumlah_diterima' => 'required|numeric',
            'kembalian' => 'required|numeric',
            'metode_pembayaran' => 'required|in:Tunai,QRIS,Kartu',
        ]);

        $transaction = Transaction::create([
            'total_tagihan' => $request->total_tagihan,
            'jumlah_diterima' => $request->jumlah_diterima,
            'kembalian' => $request->kembalian,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        $cart = session()->get('kasir_cart', []);
        
        foreach ($cart as $item) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id, 
                'product_id'     => $item['id'],
                'qty'            => $item['quantity'],
                'harga_satuan'   => $item['harga'],
                'subtotal'       => $item['harga'] * $item['quantity'],
            ]);
        }

        session()->forget('kasir_cart');
        return redirect()->route('kasir-dahsboard')->with('store', 'Transaksi berhasil disimpan!');
    }
}
