<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{    
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        $user = Pengguna::where('username', $credentials['username'])->first();

        if ($user && password_verify($credentials['password'], $user->password)) {
            Auth::login($user);

            // Superadmin → langsung dashboard
            if ($user->role === 'Superadmin') {
                return redirect()->intended('/dashboard');
            }

            // Admin → cek status
            if ($user->role === 'Admin') {
                if ($user->status === 'Diterima') {
                    return redirect()->intended('/dashboard');
                }

                Auth::logout(); // logout dulu
                $message = $user->status === 'Menunggu'
                    ? 'Akun Anda sedang menunggu persetujuan.'
                    : 'Akun Anda telah ditolak.';

                return back()->withErrors(['username' => $message]);
            }

            // Role lain (jaga-jaga)
            Auth::logout();
            return back()->withErrors(['username' => 'Role tidak dikenali.']);
        }

        // Username / password salah
        return back()->withErrors([
            'username' => 'Error: username atau password salah.',
        ]);
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
