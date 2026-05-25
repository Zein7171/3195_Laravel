<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Penting untuk membuat slug otomatis

class CategoryController extends Controller
{
/**
     * 1. READ: Menampilkan tabel daftar Kategori + Fitur Pencarian
     */
    public function index(Request $request)
    {
        // 1. Ambil keyword pencarian dari form input 'search'
        $search = $request->input('search');

        // 2. Jika ada pencarian, gunakan query LIKE untuk menyeleksi hasil
        if ($search) {
            $categories = Category::where('name', 'LIKE', "%{$search}%")->latest()->get();
        } else {
            // Jika tidak ada pencarian, ambil semua seperti biasa
            $categories = Category::latest()->get();
        }
        
        // Mengarahkan ke halaman view admin/categories/index
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * 2. CREATE: Menyimpan data kategori baru dari form
     */
    public function store(Request $request)
    {
        // Validasi input nama wajib diisi dan harus unik di tabel categories
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        // Menyimpan data beserta slug-nya otomatis
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        // Balik ke halaman index dengan notifikasi sukses
        return redirect()->route('admin.categories.index')->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    /**
     * 3. UPDATE: Mengedit Nama Kategori
     */
    public function update(Request $request, string $id)
    {
        // Validasi input, abaikan pengecekan unik untuk ID kategori ini sendiri
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        
        // Update nama dan update slug barunya
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * 4. DELETE: Fungsi Menghapus Kategori
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}