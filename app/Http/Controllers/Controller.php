<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Usaha;

class Controller
{
    public function index() {
        $berita = Berita::all()->take(6);
        $galeri = Galeri::all();
        $usaha = Usaha::all();
        
        // dd($berita);

        return view('landing_page', compact(['berita', 'galeri', 'usaha']));
    }
}
