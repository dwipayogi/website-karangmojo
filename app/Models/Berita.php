<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $casts = [
        'tanggal_dibuat' => 'datetime',
        'tanggal_dipublish' => 'datetime',
        'tanggal_diubah' => 'datetime',
    ];

    protected $fillable = [
        'slug',
        'judul',
        'gambar_url',
        'status',
        'tanggal_dibuat',
        'tanggal_dipublish',
        'tanggal_diubah',
    ];
}
