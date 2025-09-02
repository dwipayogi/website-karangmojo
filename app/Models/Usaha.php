<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    //
    protected $table = 'usaha';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'slug',
        'nama',
        'gambar_url',
        'deskripsi',
        'penjelasan',
        'kontak',
        'nomor_hp',
        'status',
        'tanggal_dibuat',
        'tanggal_dipublish',
        'tanggal_diubah'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(Pengguna::class);
    }
}
