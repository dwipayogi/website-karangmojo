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

    // Accessor for konten attribute - maps to konten_markdown
    public function getKontenAttribute()
    {
        return $this->konten_markdown;
    }

    // Mutator for konten attribute - saves to konten_markdown
    public function setKontenAttribute($value)
    {
        $this->attributes['konten_markdown'] = $value;
    }
}
