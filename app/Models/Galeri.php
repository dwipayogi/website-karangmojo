<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    
    // Disable Laravel's automatic timestamps
    public $timestamps = false;
    
    protected $fillable = [
        'nama',
        'gambar_url',
        'tanggal_dibuat',
    ];
    
    // Cast tanggal_dibuat as date
    protected $casts = [
        'tanggal_dibuat' => 'date',
    ];
}
