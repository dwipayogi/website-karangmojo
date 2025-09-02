<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Berita;
use App\Models\Usaha;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = Pengguna::count();
        $totalBerita = Berita::count();
        $totalUsaha = Usaha::count();

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalBerita' => $totalBerita,
            'totalUsaha' => $totalUsaha,
        ]);
    }
}
