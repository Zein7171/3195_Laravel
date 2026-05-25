<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\Partner; // <-- FIX 1: Tambahkan ini di bagian atas untuk memanggil model Partner
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil semua jenis kategori untuk tampilan filter tab button
        $categories = Category::all();

        // FIX 2: Ambil semua data partner dari database untuk Soal 4
        $partners = Partner::latest()->get();

        // 2. Buat kueri dasar untuk mengambil event:
        // - Gunakan Eager loading `category`
        // - Hanya tampilkan kegiatan dengan jadwal yang belum kedaluwarsa (>= hari ini)
        $query = Event::with('category')
            ->where('date', '>=', now())
            ->orderBy('date', 'asc');

        // 3. Filter query jika url memiliki parameter pencarian spesifik ?category=...
        if ($request->has('category') && $request->category != '') {
            // Saring berdasarkan relasi tabel rujukan melalui properti slug kategori.
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // 4. Eksekusi query dan kirim data hasilnya ke template Blade
        $events = $query->get();

        // FIX 3: Tambahkan 'partners' ke dalam fungsi compact() agar datanya terkirim ke view
        return view('welcome', compact('events', 'categories', 'partners'));
    }
}