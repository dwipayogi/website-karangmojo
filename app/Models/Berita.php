<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    public $timestamps = false;


    protected $fillable = [
        'slug',
        'user_id',
        'judul',
        'konten_markdown',
        'gambar_url',
        'status',
        'tanggal_dibuat',
        'tanggal_dipublish',
        'tanggal_diubah',
    ];
}
