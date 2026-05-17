<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Partner; // Pastikan import model Partner
use Faker\Factory as Faker;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Menggunakan bahasa Indonesia (opsional)

        for ($i = 1; $i <= 5; $i++) {
             Partner::create([
                    'name' => $faker->company,
                    'logo_url' => 'https://placehold.co/200x200', // Pakai URL ini agar langsung muncul kotakan gambar abu-abu rapi
                ]);
        }
    }
}