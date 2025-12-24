<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KamarHomestay;
use App\Models\Homestay;
use Faker\Factory as Faker;

class KamarHomestaySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // ambil semua homestay
        $homestayList = Homestay::pluck('homestay_id');

        if ($homestayList->count() === 0) {
            $this->command->warn('❌ Data homestay kosong. Seeder KamarHomestay dibatalkan.');
            return;
        }

        $namaKamarList = [
            'Standard',
            'Superior',
            'Deluxe',
            'Family',
            'VIP',
            'Executive',
            'Suite',
            'Single',
            'Double',
        ];

        $fasilitasList = [
            'AC',
            'Kamar Mandi Dalam',
            'TV',
            'WiFi',
            'Air Panas',
            'Lemari',
            'Meja Kerja',
            'Balkon',
            'Sarapan',
        ];

        for ($i = 1; $i <= 100; $i++) {

            $homestayId = $faker->randomElement($homestayList);

            $namaKamar = $faker->randomElement($namaKamarList);

            // biar nama kamar unik per homestay
            $counter = 1;
            $namaFix = $namaKamar;
            while (
                KamarHomestay::where('homestay_id', $homestayId)
                    ->where('nama_kamar', $namaFix)
                    ->exists()
            ) {
                $namaFix = $namaKamar . ' ' . $counter;
                $counter++;
            }

            $fasilitas = $faker->randomElements(
                $fasilitasList,
                rand(3, 6)
            );

            KamarHomestay::create([
                'homestay_id'    => $homestayId,
                'nama_kamar'     => $namaFix,
                'kapasitas'      => $faker->numberBetween(1, 6),
                'fasilitas_json' => $fasilitas, // auto json
                'harga'          => $faker->randomElement([
                    150000, 200000, 250000,
                    300000, 350000, 400000,
                    450000, 500000
                ]),
                'media'          => null,
                'created_at'     => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at'     => now(),
            ]);
        }

        $this->command->info('✅ 100 Data Kamar Homestay berhasil di-seed!');
    }
}
