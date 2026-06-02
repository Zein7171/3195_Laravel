<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // Meneruskan warisan base controller
use Illuminate\Http\Request;          // Menangkap data request inputan dari form
use Illuminate\Support\Facades\Auth; // Memanggil facade Auth bawaan Laravel

class AuthController extends Controller
{
    // 1. Fungsi menampilkan halaman view formulir login
    public function showLogin() 
    {
        return view('auth.login'); // Mengarah ke file login.blade.php yang kita buat tadi
    }

    // 2. Fungsi memproses validasi Submit Log In
    public function login(Request $request) 
    {
        // Proses validasi format input email dan password
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Mencoba mencocokkan inputan dengan data di database (Auth::attempt)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerasi session biar aman dari pembajakan

            // Diarahkan ke rute dashboard admin utama
            return redirect()->route('admin.dashboard'); 
        }

        // Jika salah email/password, kembalikan ke halaman login beserta pesan error
        return back()->withErrors([
            'email' => 'Email atau Password yang Anda berikan tidak terdaftar di rekaman kami.',
        ]);
    }

    // 3. Fungsi memproses Log Out (Keluar)
    public function logout(Request $request) 
    {
        Auth::logout(); // Menghapus status login user

        $request->session()->invalidate(); // Menghancurkan session lama

        $request->session()->regenerateToken(); // Membuat ulang token csrf baru

        return redirect('/'); // Diarahkan kembali ke halaman depan landing page
    }
}