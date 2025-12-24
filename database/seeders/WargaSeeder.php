<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warga;
use App\Models\User;
use Faker\Factory as Faker;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $agamaList = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
        $pekerjaanList = [
            'PNS', 'TNI/Polri', 'Karyawan Swasta', 'Wiraswasta', 'Petani',
            'Nelayan', 'Guru', 'Dokter', 'Perawat', 'Pedagang',
            'Buruh', 'Sopir', 'Tukang', 'Pensiunan', 'Ibu Rumah Tangga'
        ];

        // ambil user warga (PASTIKAN SUDAH ADA)
        $users = User::where('role', 'warga')->get();

        foreach ($users as $user) {

            $jenisKelamin = $faker->randomElement(['Laki-laki', 'Perempuan']);
            $gender = $jenisKelamin === 'Laki-laki' ? 'male' : 'female';

            Warga::create([
                'user_id'       => $user->id, // ✅ WAJIB
                'no_ktp'        => $faker->unique()->numerify('3###############'),
                'nama'          => $faker->name($gender),
                'jenis_kelamin' => $jenisKelamin, // ✅ SESUAI ENUM
                'agama'         => $faker->randomElement($agamaList),
                'pekerjaan'     => $faker->randomElement($pekerjaanList),
                'telp'          => $faker->phoneNumber,
                'email'         => $faker->unique()->safeEmail,
                'created_at'    => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at'    => now(),
            ]);
        }

        $this->command->info('Data Warga berhasil di-seed!');
    }
}
