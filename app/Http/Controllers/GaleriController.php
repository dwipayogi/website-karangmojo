<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::orderBy('tanggal_dibuat', 'desc')->get();
        return view('admin.kelolaGaleri', compact('galeri'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambar = $request->file('gambar');
        $namaFile = time() . '_' . Str::slug($request->nama) . '.' . $gambar->getClientOriginalExtension();
        
        // Simpan gambar ke folder public/uploads/galeri
        $gambar->move(public_path('uploads/galeri'), $namaFile);

        Galeri::create([
            'nama' => $request->nama,
            'gambar_url' => $namaFile,
            'tanggal_dibuat' => now()->format('Y-m-d'),
        ]);

        return redirect()->route('kelolaGaleri')->with('success', 'Galeri berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $galeri = Galeri::findOrFail($id);
        
        // Update nama
        $galeri->nama = $request->nama;

        // Jika ada gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($galeri->gambar_url && file_exists(public_path('uploads/galeri/' . $galeri->gambar_url))) {
                unlink(public_path('uploads/galeri/' . $galeri->gambar_url));
            }

            $gambar = $request->file('gambar');
            $namaFile = time() . '_' . Str::slug($request->nama) . '.' . $gambar->getClientOriginalExtension();
            
            // Simpan gambar baru
            $gambar->move(public_path('uploads/galeri'), $namaFile);
            $galeri->gambar_url = $namaFile;
        }

        $galeri->save();

        return redirect()->route('kelolaGaleri')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        
        // Hapus file gambar jika ada
        if ($galeri->gambar_url && file_exists(public_path('uploads/galeri/' . $galeri->gambar_url))) {
            unlink(public_path('uploads/galeri/' . $galeri->gambar_url));
        }

        $galeri->delete();

        return redirect()->route('kelolaGaleri')->with('success', 'Galeri berhasil dihapus!');
    }
}
