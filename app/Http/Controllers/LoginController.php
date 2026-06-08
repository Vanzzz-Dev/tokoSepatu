<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validasi input terlebih dahulu agar lebih aman
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = $request->only('email', 'password');

        // 2. LAKUKAN PROSES LOGIN (Auth::attempt)
        // Jalankan pengecekan kecocokan email & password ke database
        if (Auth::attempt($data)) {

            // 3. AMBIL DATA USER (Setelah dipastikan sukses login)
            $user = Auth::user();

            // 4. ALIKAN HALAMAN BERDASARKAN ROLE
            if ($user->role === 'admin') {
                return redirect()->intended('/dashboard');
            } elseif ($user->role === 'kasir') {
                // Catatan: Pastikan endpoint '/kasir-dahsboard' sudah sesuai dengan web.php kamu
                return redirect()->intended('/kasir-dashboard');
            }

            // Jika user punya role lain yang tidak terdaftar, logout otomatis
            Auth::logout();
            return redirect()->back()->with('store', 'Hak akses tidak dikenali.');
        }

        // 5. JIKA EMAIL/PASSWORD SALAH
        return redirect()->back()->with('store', 'Email atau Password Salah');
    }
}
