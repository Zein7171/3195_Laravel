<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
    // 1. Ambil keyword pencarian dari input bernama 'search'
    $search = $request->input('search');

    // 2. Jika ada keyword pencarian, seleksi dengan query LIKE Eloquent
    if ($search) {
        $partners = Partner::where('name', 'LIKE', "%{$search}%")->latest()->get();
    } else {
        // Jika tidak ada pencarian, tampilkan semua data seperti biasa
        $partners = Partner::latest()->get();
    }

    return view('admin.partners.index', compact('partners'));
    }

    // 1. Method untuk menampilkan halaman form tambah partner
    public function create(Request $request)
    {
        return view('admin.partners.create');
    }

    // 2. Method untuk memproses penyimpanan data partner baru
    public function store(Request $request)
    {
        // Validasi input form biar wajib diisi
        $request->validate([
            'name' => 'required|string|max:255',
            'logo_url' => 'required|url',
        ]);

        // Menyimpan data menggunakan Eloquent Model
        Partner::create([
            'name' => $request->name,
            'logo_url' => $request->logo_url,
        ]);

        // Redirect kembali ke halaman list partner dengan pesan sukses
        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil ditambahkan!');
    }

    // ===================================================================
    // TAMBAHAN BARU: SILAKAN COPAS KODE DI BAWAH INI TEPAT DI BAWAH METHOD STORE() LO
    // ===================================================================

    // 3. Method untuk menampilkan halaman form edit partner (Update)
    public function edit(string $id)
    {
        // Cari data partner berdasarkan ID, kalau tidak ketemu otomatis error 404
        $partner = Partner::findOrFail($id);
        
        return view('admin.partners.edit', compact('partner'));
    }

    // 4. Method untuk memproses update data partner ke database
    public function update(Request $request, string $id)
    {
        // Validasi input form biar wajib diisi
        $request->validate([
            'name' => 'required|string|max:255',
            'logo_url' => 'required|url',
        ]);

        $partner = Partner::findOrFail($id);
        
        // Memperbarui data di database
        $partner->update([
            'name' => $request->name,
            'logo_url' => $request->logo_url,
        ]);

        // Redirect kembali ke halaman list partner dengan pesan sukses
        return redirect()->route('admin.partners.index')->with('success', 'Data partner berhasil diperbarui!');
    }

    // 5. Method untuk menghapus data partner (Delete)
    public function destroy(string $id)
    {
        $partner = Partner::findOrFail($id);
        
        // Menghapus data dari database
        $partner->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil dihapus!');
    }
}