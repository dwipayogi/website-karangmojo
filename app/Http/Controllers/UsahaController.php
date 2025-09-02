<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usaha = Usaha::paginate(10);
        return view('admin.kelolaUsaha', compact('usaha'));
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
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kontak'    => 'required|string|max:255',
            'nomor_hp'  => 'nullable|string|max:20',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status'    => 'required|in:Draf,Arsip,Posting',
        ]);

        // Buat slug unik
        $slug = Str::slug($request->nama, '-');
        $cekSlug = Usaha::where('slug', $slug)->exists();
        if ($cekSlug) {
            $slug .= '-' . time();
        }

        // Upload gambar kalau ada
        $gambarPath = null;
        if ($request->hasFile('gambar_url')) {
            $gambar = $request->file('gambar_url');
            $namaFile = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move('uploads/usaha/', $namaFile);
            $gambarPath = $namaFile;
        }

        // Simpan ke database
        Usaha::create([
            'slug'            => $slug,
            'nama'            => $request->nama,
            'gambar_url'      => $gambarPath,
            'deskripsi'       => $request->deskripsi,
            'penjelasan'      => $request->penjelasan ?? null,
            'kontak'          => $request->kontak,
            'nomor_hp'        => $request->nomor_hp ?? null,
            'status'          => $request->status,
            'user_id'         => Auth::id(),
            'tanggal_dibuat'  => now(),
            'tanggal_dipublish'=> now(),
            'tanggal_diubah'  => now(),
        ]);

        return redirect()->route('kelolaUsaha')->with('success', 'Usaha baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $usaha = Usaha::findOrFail($id);
        return view('admin.usaha.lihatUsaha', compact('usaha'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $usaha = Usaha::findOrFail($id);

        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:usaha,slug,' . $usaha->id, // unique tapi abaikan slug dirinya sendiri
            'deskripsi' => 'required|string',
            'penjelasan' => 'nullable|string',
            'kontak' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:20',
            'gambar_url' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Update field biasa
        $usaha->nama = $request->nama;
        $usaha->slug = $request->slug;
        $usaha->deskripsi = $request->deskripsi;
        $usaha->penjelasan = $request->penjelasan;
        $usaha->kontak = $request->kontak;
        $usaha->nomor_hp = $request->nomor_hp;
        $usaha->tanggal_diubah = now();

        // Jika ada gambar baru diupload
        if ($request->hasFile('gambar_url')) {
            // Hapus file lama jika ada
            if ($usaha->gambar_url && file_exists(public_path('uploads/usaha/' . $usaha->gambar_url))) {
                unlink(public_path('uploads/usaha/' . $usaha->gambar_url));
            }

            // Simpan file baru
            $file = $request->file('gambar_url');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/usaha/', $filename);

            $usaha->gambar_url = $filename;
        }

        // Simpan ke database
        $usaha->save();

        return redirect()->route('kelolaUsaha')->with('success', 'Data usaha berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usaha = Usaha::findOrFail($id);
        $usaha->delete();

        return redirect()->route('kelolaUsaha')->with('success', 'Usaha berhasil dihapus.');
    }
}
