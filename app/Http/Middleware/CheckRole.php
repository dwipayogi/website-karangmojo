<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();

        // Jika belum login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return $next($request);

        // Cek role user (hanya admin & superadmin yang diizinkan)
        // if (!in_array($user->role, explode(',', $role))) {
        //     abort(403, 'Anda tidak memiliki akses.');
        // }

        // Cek status akun
        // switch ($user->status) {
        //     case 'Diterima':
        //         // Lanjutkan
        //         return $next($request);

        //     case 'Menunggu':
        //         return redirect()->route('home')->with('warning', 'Akun Anda masih menunggu persetujuan.');

        //     case 'Ditolak':
        //         return redirect()->route('home')->with('error', 'Akun Anda ditolak, silakan hubungi admin.');

        //     default:
        //         abort(403, 'Status akun tidak valid.');
        // }
    }
}
