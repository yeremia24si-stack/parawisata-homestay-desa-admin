<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    use HasFactory;

    protected $table = 'homestay';
    protected $primaryKey = 'homestay_id';

    protected $fillable = [
        'pemilik_warga_id',
        'nama',
        'alamat',
        'rt',
        'rw',
        'fasilitas_json',
        'harga_per_malam',
        'status',
        'media'
    ];

    protected $casts = [
        'fasilitas_json' => 'array',
        'harga_per_malam' => 'decimal:2'
    ];

    // Relasi ke User (Pemilik)
    public function pemilik()
    {
        return $this->belongsTo(Warga::class, 'pemilik_warga_id', 'warga_id');
    }

    // Relasi ke Kamar Homestay
    public function kamar()
    {
        return $this->hasMany(KamarHomestay::class, 'homestay_id', 'homestay_id');
    }
}