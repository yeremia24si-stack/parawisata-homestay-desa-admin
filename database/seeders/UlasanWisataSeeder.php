<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UlasanWisata;
use App\Models\Destinasi;
use App\Models\Warga;
use App\Models\User;
use Faker\Factory as Faker;

class UlasanWisataSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $destinasiList = Destinasi::pluck('nama');
        $wargaList     = Warga::pluck('warga_id');
        $userList      = User::pluck('id');

        if (
            $destinasiList->count() === 0 ||
            $wargaList->count() === 0 ||
            $userList->count() === 0
        ) {
            $this->command->warn('❌ Data destinasi / warga / user kosong. Seeder ulasan dibatalkan.');
            return;
        }

        $komentarTemplate = [
            'Tempatnya sangat bagus dan nyaman untuk dikunjungi.',
            'Pemandangannya indah, cocok untuk liburan keluarga.',
            'Fasilitas cukup lengkap dan bersih.',
            'Harga tiket sebanding dengan pengalaman yang didapat.',
            'Lokasi mudah dijangkau dan cukup strategis.',
            'Tempatnya ramai saat akhir pekan.',
            'Pelayanan cukup ramah dan membantu.',
            'Cocok untuk refreshing dan healing.',
            'Anak-anak sangat menikmati tempat ini.',
            'Akan berkunjung kembali lain waktu.',
        ];

        for ($i = 1; $i <= 100; $i++) {

            UlasanWisata::create([
                'destinasi' => $faker->randomElement($destinasiList),
                'rating'    => $faker->numberBetween(1, 5),
                'komentar'  => $faker->randomElement($komentarTemplate),
                'warga_id'  => $faker->randomElement($wargaList),
                'user_id'   => $faker->randomElement($userList),
                'created_at'=> $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at'=> now(),
            ]);
        }

        $this->command->info('✅ 100 Data Ulasan Wisata berhasil di-seed!');
    }
}
