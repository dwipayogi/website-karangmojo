<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Menampilkan halaman pendaftaran
     */
    public function index()
    {
        return view('daftar');
    }

    /**
     * Proses pendaftaran akun baru
     */
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|max:50|unique:pengguna,username',
            'password' => 'required|string|min:6',
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.min' => 'Username minimal 3 karakter.',
            'username.max' => 'Username maksimal 50 karakter.',
            'username.unique' => 'Username sudah digunakan, pilih username lain.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        try {
            // Generate random ID yang unik
            do {
                $randomId = rand(100000, 999999); // Generate 6 digit random number
            } while (Pengguna::where('id', $randomId)->exists());

            // Buat akun baru dengan status "Menunggu"
            $pengguna = Pengguna::create([
                'id' => $randomId,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => 'Admin', // Default role untuk pendaftar baru
                'status' => 'Menunggu' // Status default menunggu persetujuan
            ]);

            return redirect('/login')->with('success', 
                'Pendaftaran berhasil! Akun Anda sedang menunggu persetujuan dari administrator.'
            );

        } catch (\Exception $e) {
            return back()->withErrors([
                'username' => 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.'
            ])->withInput();
        }
    }
}
