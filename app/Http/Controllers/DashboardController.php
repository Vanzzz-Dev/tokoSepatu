<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::all()->count();
        $totalCustomers = Customer::all()->count();
        $totalTransactions = Transaction::all()->count();

        $details = TransactionDetail::with('product', 'transaction')
            ->latest()
            ->get();

        return view('dashboard', compact(
            'totalProducts',
            'totalCustomers',
            'totalTransactions',
            'details'
        ));
    }
}
