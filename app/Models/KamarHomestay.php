<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KamarHomestay extends Model
{
    use HasFactory;

    protected $table = 'kamar_homestay';
    protected $primaryKey = 'kamar_id';

    protected $fillable = [
        'homestay_id',
        'nama_kamar',
        'kapasitas',
        'fasilitas_json',
        'harga',
        'media'
    ];

    protected $casts = [
        'fasilitas_json' => 'array',
        'harga' => 'decimal:2'
    ];

    // Relasi ke Homestay
    public function homestay()
    {
        return $this->belongsTo(Homestay::class, 'homestay_id', 'homestay_id');
    }

    // Relasi ke Booking
    public function bookings()
    {
        return $this->hasMany(BookingHomestay::class, 'kamar_id', 'kamar_id');
    }
}