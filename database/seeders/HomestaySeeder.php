<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Homestay;
use App\Models\User;
use Faker\Factory as Faker;

class HomestaySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // ambil user pemilik (role warga)
        $pemilikList = User::where('role', 'warga')->pluck('id');

        if ($pemilikList->count() === 0) {
            $this->command->warn('❌ Tidak ada user warga. Seeder Homestay dibatalkan.');
            return;
        }

        // Nama homestay
        $prefixNama = [
            'Homestay', 'Penginapan', 'Villa', 'Guest House', 'Rumah Inap',
            'Pondok', 'Rumah Singgah'
        ];

        $suffixNama = [
            'Sejahtera', 'Indah', 'Asri', 'Damai', 'Nyaman',
            'Makmur', 'Lestari', 'Sentosa', 'Bahagia'
        ];

        // Fasilitas
        $fasilitasList = [
            'WiFi',
            'AC',
            'Kamar Mandi Dalam',
            'Parkir Luas',
            'Sarapan',
            'TV',
            'Air Panas',
            'Dapur',
            'Laundry',
            'Balkon',
        ];

        $statusList = ['tersedia', 'penuh', 'maintenance'];

        for ($i = 1; $i <= 100; $i++) {

            $prefix = $faker->randomElement($prefixNama);
            $suffix = $faker->randomElement($suffixNama);
            $nama = $prefix . ' ' . $suffix;

            // pastikan nama unik
            $counter = 1;
            while (Homestay::where('nama', $nama)->exists()) {
                $nama = $prefix . ' ' . $suffix . ' ' . $counter;
                $counter++;
            }

            $rt = str_pad($faker->numberBetween(1, 10), 3, '0', STR_PAD_LEFT);
            $rw = str_pad($faker->numberBetween(1, 10), 3, '0', STR_PAD_LEFT);

            // random fasilitas (3–6 item)
            $fasilitas = $faker->randomElements(
                $fasilitasList,
                rand(3, 6)
            );

            Homestay::create([
                'pemilik_warga_id' => $faker->randomElement($pemilikList),
                'nama'             => $nama,
                'alamat'           => $faker->streetAddress . ', ' . $faker->city,
                'rt'               => $rt,
                'rw'               => $rw,
                'fasilitas_json'   => $fasilitas, // auto json karena cast
                'harga_per_malam'  => $faker->randomElement([
                    150000, 200000, 250000, 300000,
                    350000, 400000, 500000, 600000
                ]),
                'status'           => $faker->randomElement($statusList),
                'media'            => null,
                'created_at'       => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at'       => now(),
            ]);
        }

        $this->command->info('✅ 100 Data Homestay berhasil di-seed!');
    }
}
