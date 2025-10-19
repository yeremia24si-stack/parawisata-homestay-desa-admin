<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasan_wisata';
    protected $fillable = ['destinasi_id', 'warga_id', 'rating', 'komentar', 'waktu'];
}
