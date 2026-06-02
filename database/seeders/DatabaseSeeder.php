<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin Utama
        User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. EKSPERIMEN 3 KATEGORI (Sesuai Tugas 4.5 poin 2)
        $catIT = Category::create(['name' => 'Seminar IT', 'slug' => 'seminar-it']);
        $catWorkshop = Category::create(['name' => 'Workshop UI/UX', 'slug' => 'workshop-uiux']);
        $catEsport = Category::create(['name' => 'E-Sport', 'slug' => 'e-sport']);

        // 3. EKSPERIMEN 6 JENIS KEGIATAN (Sesuai Tugas 4.5 poin 2)
        
        // Kategori IT
        Event::create([
            'category_id' => $catIT->id,
            'title' => 'AI Summit & Expo 2026',
            'description' => 'Jelajahi tren terkini AI.',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Ruang Cinema',
            'price' => 45000, 
            'stock' => 150,
            'poster_path' => 'hackathon.png' // <-- TAMBAHAN: Biar poster aman muncul
        ]);
        Event::create([
            'category_id' => $catIT->id,
            'title' => 'Cyber Security Seminar',
            'description' => 'Keamanan data di era digital.',
            'date' => '2026-06-15 09:00:00',
            'location' => 'Aula BSC',
            'price' => 35000, 
            'stock' => 100,
            'poster_path' => 'hackathon.png' // <-- TAMBAHAN: Biar poster aman muncul
        ]);

        // Kategori Workshop
        Event::create([
            'category_id' => $catWorkshop->id,
            'title' => 'UI/UX Masterclass',
            'description' => 'Belajar desain aplikasi dari nol.',
            'date' => '2026-07-20 10:00:00',
            'location' => 'Lab Komputer',
            'price' => 75000, 
            'stock' => 30,
            'poster_path' => 'hackathon.png' // <-- TAMBAHAN: Biar poster aman muncul
        ]);
        Event::create([
            'category_id' => $catWorkshop->id,
            'title' => 'Laravel Backend Pro',
            'description' => 'Optimasi database Laravel.',
            'date' => '2026-08-05 13:00:00',
            'location' => 'Zoom Meeting',
            'price' => 150000, 
            'stock' => 50,
            'poster_path' => 'workshop.png' // <-- TAMBAHAN: Biar poster aman muncul
        ]);

        // Kategori E-Sport
        Event::create([
            'category_id' => $catEsport->id,
            'title' => 'E-Sport U-Champ 2026',
            'description' => 'Turnamen Mobile Legends antar mahasiswa.',
            'date' => '2026-09-10 08:00:00',
            'location' => 'Basement Amikom',
            'price' => 50000, 
            'stock' => 32,
            'poster_path' => 'workshop.png' // <-- TAMBAHAN: Biar poster aman muncul
        ]);
        Event::create([
            'category_id' => $catEsport->id,
            'title' => 'Valorant Amikom Cup',
            'description' => 'Tunjukkan skill menembakmu.',
            'date' => '2026-09-12 08:00:00',
            'location' => 'Basement Amikom',
            'price' => 50000, 
            'stock' => 16,
            'poster_path' => 'workshop.png' // <-- TAMBAHAN: Biar poster aman muncul
        ]);
    }
}