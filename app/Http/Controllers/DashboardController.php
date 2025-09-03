<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Berita;
use App\Models\Usaha;
use App\Models\Galeri;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = Pengguna::count();
        $totalBerita = Berita::count();
        $totalUsaha = Usaha::count();
        $totalGaleri = Galeri::count();

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalBerita' => $totalBerita,
            'totalUsaha' => $totalUsaha,
            'totalGaleri' => $totalGaleri,
        ]);
    }
}
