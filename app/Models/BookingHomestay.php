<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingHomestay extends Model
{
    use HasFactory;

    protected $table = 'booking_homestay';
    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'kamar_id',
        'warga_id',
        'checkin',
        'checkout',
        'total',
        'status',
        'metode_bayar',
        'media'
    ];

    protected $casts = [
        'checkin' => 'date',
        'checkout' => 'date',
        'total' => 'decimal:2'
    ];

    // Relasi ke Kamar
    public function kamar()
    {
        return $this->belongsTo(KamarHomestay::class, 'kamar_id', 'kamar_id');
    }

    // Relasi ke User (Warga yang booking)
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'warga_id');
    }
}