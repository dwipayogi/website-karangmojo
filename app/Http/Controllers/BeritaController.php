<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\CommonMarkConverter;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::paginate(10);
        return view('admin.kelolaBerita', compact('berita'));
    }

    public function tambah()
    {
        return view('admin.berita.tambahBerita');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten_markdown' => 'required|string',
            'gambar_url' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:Draf,Arsip,Posting',
        ]);

        // Buat slug unik
        $slug = Str::slug($request->judul, '-');
        if (Berita::where('slug', $slug)->exists()) {
            $slug .= '-' . now()->timestamp;
        }

        // Upload gambar kalau ada
        $gambarPath = null;
        if ($request->hasFile('gambar_url')) {
            $gambar = $request->file('gambar_url');
            $namaFile = time() . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();

            $gambar->move(public_path('uploads/berita'), $namaFile);
            $gambarPath = $namaFile;
        }

        Berita::create([
            'slug' => $slug,
            'judul' => $request->judul,
            'konten_markdown' => $request->konten_markdown,
            'gambar_url' => $gambarPath,
            'status' => $request->status,
            'user_id' => Auth::id(),
            'tanggal_dibuat' => now(),
            'tanggal_diubah' => now(),
            'tanggal_dipublish' => $request->status === 'Posting' ? now() : null,
        ]);

        return redirect()->route('kelolaBerita')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $berita = Berita::findOrFail($id);
        $converter = new CommonMarkConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
        $konten_html = $converter->convert($berita->konten_markdown)->getContent();
        return view('admin.berita.lihatBerita', compact(['berita', 'konten_html']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $berita = Berita::findOrFail($id);
        return view('admin.berita.editBerita', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $berita = Berita::findOrFail($id);
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten_markdown' => 'required|string',
            'gambar_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:Draf,Arsip,Posting',
        ]);
        // Update slug jika judul berubah
        if ($request->judul !== $berita->judul) {
            $slug = Str::slug($request->judul, '-');
            if (Berita::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug .= '-' . now()->timestamp;
            }
            $berita->slug = $slug;
        }

        // Upload gambar kalau ada
        if ($request->hasFile('gambar_url')) {
            $gambar = $request->file('gambar_url');
            $namaFile = time() . '_' . uniqid() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads/berita'), $namaFile);
            $berita->gambar_url = $namaFile;
        }

        $berita->judul = $request->judul;
        $berita->konten_markdown = $request->konten_markdown;
        $berita->status = $request->status;
        $berita->tanggal_diubah = now();
        if ($request->status === 'Posting' && !$berita->tanggal_dipublish) {
            $berita->tanggal_dipublish = now();
        }

        $berita->save();
        return redirect()->route('kelolaBerita')->with('success', 'Berita berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $berita = Berita::findOrFail($id);
            
            // Delete the image file if it exists
            if ($berita->gambar_url && file_exists(public_path('uploads/berita/' . $berita->gambar_url))) {
                unlink(public_path('uploads/berita/' . $berita->gambar_url));
            }
            
            $berita->delete();
            
            return redirect()->route('kelolaBerita')->with('success', 'Berita berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('kelolaBerita')->with('error', 'Gagal menghapus berita');
        }
    }
}
