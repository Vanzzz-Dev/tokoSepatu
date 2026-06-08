<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Menampilkan daftar pelanggan.
     */
    public function index()
    {
        $customers = Customer::latest('id')->paginate(5);
        return view('customers', compact('customers')); // Selesai diperbaiki: Menambahkan titik koma (;) yang kurang
    }

    /**
     * Menyimpan pelanggan baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|numeric',
        ]);

        Customer::create([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    /**
     * Memperbarui data pelanggan tertentu.
     * Menggunakan Route Model Binding (Customer $customer) menggantikan $id
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required|numeric',
        ]);

        $customer->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('success', 'Data pelanggan berhasil diperbarui!');
    }

    /**
     * Menghapus pelanggan tertentu dari database.
     * Menggunakan Route Model Binding (Customer $customer) menggantikan $id
     */
    public function destroy(Customer $customer)
    {
        $customer->delete(); // Tidak perlu findOrFail lagi karena sudah di-handle Laravel

        return redirect()->back()->with('success', 'Pelanggan berhasil dihapus!');
    }
}
