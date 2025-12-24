<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    protected $primaryKey = 'media_id';

    protected $fillable = [
        'ref_table',
        'ref_id',
        'file_url',
        'caption',
        'mime_type',
        'sort_order',
    ];

    public $timestamps = true;

    /**
     * CUSTOM POLYMORPH RELATION
     * -------------------------
     * ref_table = nama tabel pemilik (homestay, kamar_homestay, destinasi_wisata, dll)
     * ref_id    = PK dari tabel tersebut
     */
    public function owner()
    {
        return $this->morphTo(
            name: 'owner',             // nama relasi (bebas)
            type: 'ref_table',         // kolom penentu model
            id: 'ref_id'               // kolom id model
        );
    }

    /**
     * File URL accessor (auto convert ke full URL)
     */
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->file_url);
    }
}
