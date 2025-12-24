<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destinasi;
use Faker\Factory as Faker;

class DestinasiWisataSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $prefixNama = [
            'Pantai', 'Gunung', 'Air Terjun', 'Taman', 'Museum', 
            'Candi', 'Danau', 'Hutan', 'Kolam', 'Kebun',
            'Puncak', 'Bukit', 'Goa', 'Pulau', 'Taman Wisata'
        ];

        $suffixNama = [
            'Indah', 'Permai', 'Asri', 'Sejuk', 'Cantik', 
            'Elok', 'Megah', 'Hijau', 'Biru', 'Merah',
            'Sakti', 'Agung', 'Raya', 'Jaya', 'Mulia'
        ];

        $deskripsiTemplate = [
            'Destinasi wisata yang menawarkan pemandangan alam yang sangat indah dan mempesona.',
            'Tempat wisata favorit keluarga dengan fasilitas lengkap dan pemandangan yang menakjubkan.',
            'Wisata alam yang cocok untuk refreshing dan bersantai bersama keluarga.',
            'Spot foto instagramable dengan panorama alam yang memukau.',
            'Destinasi wisata edukatif yang cocok untuk anak-anak dan keluarga.',
            'Tempat wisata dengan udara sejuk dan pemandangan yang menenangkan.',
            'Wisata alam yang menawarkan petualangan seru dan pengalaman tak terlupakan.',
            'Lokasi wisata yang ramai dikunjungi saat weekend dan hari libur.',
            'Tempat wisata dengan fasilitas lengkap dan harga terjangkau.',
            'Destinasi wisata yang cocok untuk healing dan melepas penat.',
        ];

        $rtList = ['001','002','003','004','005','006','007','008','009','010'];
        $rwList = ['001','002','003','004','005','006','007','008','009','010'];

        $jamBukaList = [
            '08:00 - 17:00', '07:00 - 18:00', '09:00 - 16:00',
            '06:00 - 18:00', '08:00 - 20:00', '24 Jam',
            '07:00 - 17:00', '08:30 - 17:30',
            '09:00 - 21:00', '10:00 - 22:00',
        ];

        for ($i = 1; $i <= 100; $i++) {

            $prefix = $faker->randomElement($prefixNama);
            $suffix = $faker->randomElement($suffixNama);
            $nama = $prefix . ' ' . $suffix;

            // pastikan nama unik
            $counter = 1;
            while (Destinasi::where('nama', $nama)->exists()) {
                $nama = $prefix . ' ' . $suffix . ' ' . $counter;
                $counter++;
            }

            $rt = $faker->randomElement($rtList);
            $rw = $faker->randomElement($rwList);

            $tiket = $faker->randomElement([
                0, 5000, 10000, 15000, 20000, 25000,
                30000, 35000, 40000, 50000, 75000, 100000
            ]);

            Destinasi::create([
                'nama'       => $nama,
                'deskripsi'  => $faker->randomElement($deskripsiTemplate)
                                . ' Terletak di wilayah RT ' . $rt . ' RW ' . $rw . '.',
                'alamat'     => $faker->streetAddress . ', ' . $faker->city,
                'rt'         => $rt,
                'rw'         => $rw,
                'jam_buka'   => $faker->randomElement($jamBukaList),
                'tiket'      => $tiket,
                'kontak'     => $faker->phoneNumber,
                'cover'      => null,
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('✅ 100 Data Destinasi Wisata berhasil di-seed!');
    }
}
