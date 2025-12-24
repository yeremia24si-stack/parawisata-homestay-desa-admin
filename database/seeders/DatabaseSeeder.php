<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            WargaSeeder::class,

            DestinasiWisataSeeder::class,

            HomestaySeeder::class,        // ⬅️ INI PENTING
            KamarHomestaySeeder::class,   // ⬅️ INI PENTING
            BookingHomestaySeeder::class, // ⬅️ INI TERAKHIR
            UlasanWisataSeeder::class,
        ]);
    }
}
