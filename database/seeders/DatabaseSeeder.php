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
        // 1. Akun Admin Utama [cite: 151, 152]
        User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. EKSPERIMEN 3 KATEGORI (Sesuai Tugas 4.5 poin 2) [cite: 207]
        $catIT = Category::create(['name' => 'Seminar IT', 'slug' => 'seminar-it']);
        $catWorkshop = Category::create(['name' => 'Workshop UI/UX', 'slug' => 'workshop-uiux']);
        $catEsport = Category::create(['name' => 'E-Sport', 'slug' => 'e-sport']);

        // 3. EKSPERIMEN 6 JENIS KEGIATAN (Sesuai Tugas 4.5 poin 2) [cite: 207]
        
        // Kategori IT
        Event::create([
            'category_id' => $catIT->id,
            'title' => 'AI Summit & Expo 2026',
            'description' => 'Jelajahi tren terkini AI.',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Ruang Cinema',
            'price' => 45000, 'stock' => 150
        ]);
        Event::create([
            'category_id' => $catIT->id,
            'title' => 'Cyber Security Seminar',
            'description' => 'Keamanan data di era digital.',
            'date' => '2026-06-15 09:00:00',
            'location' => 'Aula BSC',
            'price' => 35000, 'stock' => 100
        ]);

        // Kategori Workshop
        Event::create([
            'category_id' => $catWorkshop->id,
            'title' => 'UI/UX Masterclass',
            'description' => 'Belajar desain aplikasi dari nol.',
            'date' => '2026-07-20 10:00:00',
            'location' => 'Lab Komputer',
            'price' => 75000, 'stock' => 30
        ]);
        Event::create([
            'category_id' => $catWorkshop->id,
            'title' => 'Laravel Backend Pro',
            'description' => 'Optimasi database Laravel.',
            'date' => '2026-08-05 13:00:00',
            'location' => 'Zoom Meeting',
            'price' => 150000, 'stock' => 50
        ]);

        // Kategori E-Sport
        Event::create([
            'category_id' => $catEsport->id,
            'title' => 'E-Sport U-Champ 2026',
            'description' => 'Turnamen Mobile Legends antar mahasiswa.',
            'date' => '2026-09-10 08:00:00',
            'location' => 'Basement Amikom',
            'price' => 50000, 'stock' => 32
        ]);
        Event::create([
            'category_id' => $catEsport->id,
            'title' => 'Valorant Amikom Cup',
            'description' => 'Tunjukkan skill menembakmu.',
            'date' => '2026-09-12 08:00:00',
            'location' => 'Basement Amikom',
            'price' => 50000, 'stock' => 16
        ]);
    }
}