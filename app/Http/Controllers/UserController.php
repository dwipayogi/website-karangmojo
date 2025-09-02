<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = Pengguna::paginate(10);
        return view('admin.kelolaAkun', compact('pengguna'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, $id)
    {
        $akun = Pengguna::findOrFail($id);
        
        // Cegah perubahan role superadmin
        if ($akun->role === 'Superadmin') {
            return redirect()->route('kelolaAkun')->with('error', 'Role superadmin tidak boleh diubah.');
        }

        $request->validate([
            'status' => 'required|in:Menunggu,Diterima,Ditolak',
        ]);

        $akun->status = $request->status;
        $akun->save();

        return redirect()->route('kelolaAkun')->with('success', 'Status pengguna berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $akun = Pengguna::findOrFail($id);
        $akun = Pengguna::findOrFail($id);
        
        // Cegah perubahan role superadmin
        if ($akun->role === 'Superadmin') {
            return redirect()->route('kelolaAkun')->with('error', 'Role superadmin tidak bisa dihapus.');
        }

        $akun->delete();

        return redirect()->route('kelolaAkun')->with('success', 'Akun berhasil dihapus.');

    }
}
