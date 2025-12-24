<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BookingHomestay;
use App\Models\KamarHomestay;
use App\Models\User;
use Faker\Factory as Faker;
use Carbon\Carbon;

class BookingHomestaySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $kamarList = KamarHomestay::all();
        $userList  = User::pluck('id');

        if ($kamarList->count() === 0 || $userList->count() === 0) {
            $this->command->warn('❌ Data kamar atau user kosong. Seeder Booking dibatalkan.');
            return;
        }

        $statusList = ['pending', 'confirmed', 'cancelled', 'completed'];
        $metodeBayarList = [
            'Transfer Bank',
            'QRIS',
            'Cash',
            'E-Wallet',
            'Kartu Kredit'
        ];

        for ($i = 1; $i <= 100; $i++) {

            $kamar = $faker->randomElement($kamarList);

            // tanggal booking
            $checkin = Carbon::instance(
                $faker->dateTimeBetween('-1 year', '+1 month')
            );
            $durasi = rand(1, 5); // malam
            $checkout = (clone $checkin)->addDays($durasi);

            $total = $kamar->harga * $durasi;

            BookingHomestay::create([
                'kamar_id'    => $kamar->kamar_id,
                'warga_id'    => $faker->randomElement($userList),
                'checkin'     => $checkin->toDateString(),
                'checkout'    => $checkout->toDateString(),
                'total'       => $total,
                'status'      => $faker->randomElement($statusList),
                'metode_bayar'=> $faker->randomElement($metodeBayarList),
                'media'       => null,
                'created_at'  => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at'  => now(),
            ]);
        }

        $this->command->info('✅ 100 Data Booking Homestay berhasil di-seed!');
    }
}
