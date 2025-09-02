<?php

namespace App\Http\Controllers;

// use Illuminate\Container\Attributes\DB;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\CommonMark\CommonMarkConverter;

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

        $converter = new CommonMarkConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
        $konten_html = $converter->convert($berita->konten_markdown)->getContent();

        return view('detailBerita', compact('berita', 'konten_html'));
    }
}
