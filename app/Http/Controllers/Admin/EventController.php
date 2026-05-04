<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event; // Import model Event
use App\Models\Category; // Import model Category
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * 5.4.4. Implementasi Read - Menampilkan Daftar Event
     */
    public function index()
    {
        $events = Event::with('category')->latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    /**
     * 5.4.5 Implementasi Create - Menampilkan Form
     */
    public function create()
    {
        $categories = Category::all(); 
        return view('admin.events.create', compact('categories'));
    }

    /**
     * 5.4.5 Implementasi Store - Menyimpan Data Baru
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'date'        => 'required|date',
            'location'    => 'required|string|max:255',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric'
        ]);

        Event::create($data);

        return redirect()->route('admin.events.index')
                         ->with('success', 'Data Event berhasil ditambahkan.');
    }

    /**
     * 5.4.7. Implementasi Update - Menampilkan Form Edit
     */
    public function edit(Event $event)
    {
        $categories = Category::all(); 
        return view('admin.events.edit', compact('event', 'categories'));
    }

    /**
     * 5.4.7. Implementasi Update - Menyimpan Perubahan Data
     */
    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'date'        => 'required|date',
            'location'    => 'required|string|max:255',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric'
        ]);

        $event->update($data);

        return redirect()->route('admin.events.index')
                         ->with('success', 'Rincian data event berhasil diperbarui.');
    }

    /**
     * 5.4.6. Implementasi Delete - Menghapus Event
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')
                         ->with('success', 'Data event berhasil dihapus secara permanen.');
    }
}