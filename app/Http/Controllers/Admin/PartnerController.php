<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $partners = Partner::all();
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
}