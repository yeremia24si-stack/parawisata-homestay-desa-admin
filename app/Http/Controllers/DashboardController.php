<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi; // ✅ PAKAI MODEL DESTINASI YANG SUDAH ADA
use App\Models\Homestay;
use App\Models\KamarHomestay;
use App\Models\BookingHomestay;
use App\Models\UlasanWisata;
use App\Models\Warga;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 📊 STATISTIK UTAMA
        $totalDestinasi = Destinasi::count();
        $totalHomestay = Homestay::count();
        $totalKamar = KamarHomestay::count();
        $totalBooking = BookingHomestay::count();
        $totalWarga = Warga::count();
        $totalUlasan = UlasanWisata::count();

        // 💰 PENDAPATAN
        $totalPendapatan = BookingHomestay::where('status', 'completed')->sum('total');
        $pendapatanBulanIni = BookingHomestay::where('status', 'completed')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total');

        // 📈 BOOKING STATUS
        $bookingPending = BookingHomestay::where('status', 'pending')->count();
        $bookingConfirmed = BookingHomestay::where('status', 'confirmed')->count();
        $bookingCompleted = BookingHomestay::where('status', 'completed')->count();
        $bookingCancelled = BookingHomestay::where('status', 'cancelled')->count();

        // 🏠 HOMESTAY STATUS
        $homestayTersedia = Homestay::where('status', 'tersedia')->count();
        $homestayPenuh = Homestay::where('status', 'penuh')->count();
        $homestayMaintenance = Homestay::where('status', 'maintenance')->count();

        // 📊 CHART DATA - Booking per Bulan (12 bulan terakhir)
        $bookingPerBulan = BookingHomestay::select(
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('created_at', now()->year)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Format data untuk chart
        $chartLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $chartData = array_fill(0, 12, 0);
        
        foreach ($bookingPerBulan as $booking) {
            $chartData[$booking->bulan - 1] = $booking->total;
        }

        // ⭐ TOP 5 DESTINASI (berdasarkan ulasan)
        $topDestinasi = UlasanWisata::select('destinasi', DB::raw('COUNT(*) as total_ulasan'), DB::raw('AVG(rating) as rata_rating'))
            ->groupBy('destinasi')
            ->orderByDesc('total_ulasan')
            ->take(5)
            ->get();

        // 🏆 TOP 5 HOMESTAY (berdasarkan booking)
        $topHomestay = BookingHomestay::select('kamar_homestay.homestay_id', 'homestay.nama', DB::raw('COUNT(*) as total_booking'))
            ->join('kamar_homestay', 'booking_homestay.kamar_id', '=', 'kamar_homestay.kamar_id')
            ->join('homestay', 'kamar_homestay.homestay_id', '=', 'homestay.homestay_id')
            ->groupBy('kamar_homestay.homestay_id', 'homestay.nama')
            ->orderByDesc('total_booking')
            ->take(5)
            ->get();

        // 📝 ULASAN TERBARU
        $ulasanTerbaru = UlasanWisata::with('warga')
            ->latest()
            ->take(5)
            ->get();

        // 📅 BOOKING TERBARU
        $bookingTerbaru = BookingHomestay::with(['kamar.homestay', 'warga'])
            ->latest()
            ->take(5)
            ->get();

        return view('pages.dashboard', compact(
            'totalDestinasi',
            'totalHomestay',
            'totalKamar',
            'totalBooking',
            'totalWarga',
            'totalUlasan',
            'totalPendapatan',
            'pendapatanBulanIni',
            'bookingPending',
            'bookingConfirmed',
            'bookingCompleted',
            'bookingCancelled',
            'homestayTersedia',
            'homestayPenuh',
            'homestayMaintenance',
            'chartLabels',
            'chartData',
            'topDestinasi',
            'topHomestay',
            'ulasanTerbaru',
            'bookingTerbaru'
        ));
    }
}