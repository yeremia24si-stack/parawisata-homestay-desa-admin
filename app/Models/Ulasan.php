<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasan_wisata';

    protected $fillable = [
        'destinasi',
        'rating',
        'komentar',
        'warga_id',
        'user_id'
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
