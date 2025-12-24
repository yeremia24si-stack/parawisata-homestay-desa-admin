<?php

namespace App\Http\Controllers;

use App\Models\BookingHomestay;
use App\Models\KamarHomestay;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookingHomestayController extends Controller
{
    public function index()
    {
        $bookings = BookingHomestay::with('kamar.homestay', 'warga')->latest()->get();
        return view('pages.booking-homestay.index', compact('bookings'));
    }

    public function create()
    {
        $kamars = KamarHomestay::with('homestay')->get();
        $users = User::all();
        return view('pages.booking-homestay.create', compact('kamars', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kamar_id' => 'required|exists:kamar_homestay,kamar_id',
            'warga_id' => 'required|exists:users,id',
            'checkin' => 'required|date',
            'checkout' => 'required|date|after:checkin',
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'metode_bayar' => 'nullable|string|max:50',
            'media' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('media')) {
            $validated['media'] = $request->file('media')->store('booking_homestay', 'public');
        }

        BookingHomestay::create($validated);

        return redirect()->route('booking-homestay.index')->with('success', 'Booking Homestay berhasil ditambahkan!');
    }

    public function show(BookingHomestay $bookingHomestay)
    {
        $bookingHomestay->load('kamar.homestay', 'warga');
        return view('pages.booking-homestay.show', compact('bookingHomestay'));
    }

    public function edit(BookingHomestay $bookingHomestay)
    {
        $kamars = KamarHomestay::with('homestay')->get();
        $users = User::all();
        return view('pages.booking-homestay.edit', compact('bookingHomestay', 'kamars', 'users'));
    }

    public function update(Request $request, BookingHomestay $bookingHomestay)
    {
        $validated = $request->validate([
            'kamar_id' => 'required|exists:kamar_homestay,kamar_id',
            'warga_id' => 'required|exists:users,id',
            'checkin' => 'required|date',
            'checkout' => 'required|date|after:checkin',
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'metode_bayar' => 'nullable|string|max:50',
            'media' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('media')) {
            if ($bookingHomestay->media) {
                Storage::disk('public')->delete($bookingHomestay->media);
            }
            $validated['media'] = $request->file('media')->store('booking_homestay', 'public');
        }

        $bookingHomestay->update($validated);

        return redirect()->route('booking-homestay.index')->with('success', 'Booking Homestay berhasil diupdate!');
    }

    public function destroy(BookingHomestay $bookingHomestay)
    {
        if ($bookingHomestay->media) {
            Storage::disk('public')->delete($bookingHomestay->media);
        }
        
        $bookingHomestay->delete();

        return redirect()->route('booking-homestay.index')->with('success', 'Booking Homestay berhasil dihapus!');
    }
}