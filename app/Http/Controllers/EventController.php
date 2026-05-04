<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event; // Import Model Event agar bisa digunakan [cite: 61]
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        // Memakai relasi dan pengaturan limit paginasi (10 entri per halaman) [cite: 76]
        $events = \App\Models\Event::with('category')->latest()->paginate(10); [cite: 77]

        return view('admin.events.index', compact('events')); [cite: 78]
    }

    // Tambahkan method destroy di bawah ini 
    /**
     * 5.4.6. Implementasi Delete - Menghapus Event
     */
    public function destroy(Event $event)
    {
        // Menghapus data dari database 
        $event->delete(); [cite: 213]

        // Mengalihkan kembali ke halaman index dengan pesan sukses 
        return redirect()->route('admin.events.index')
            ->with('success', 'Data event berhasil dihapus secara permanen.'); [cite: 214]
    }
}