<?php

namespace App\Http\Controllers;

// use Illuminate\Container\Attributes\DB;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class viewBeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('berita', compact('berita'));
    }

    public function detail($id)
    {
        $berita = Berita::findOrFail($id);
        return view('detailBerita', compact('berita'));
    }
}
