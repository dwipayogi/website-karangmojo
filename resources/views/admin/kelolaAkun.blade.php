@extends('admin.layout')

@section('title', 'Kelola Akun')

@section('content')
<div class="min-h-screen bg-blue-100">
    <div id="kelolaAkun" class="pt-32 pb-16 px-6">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold mb-8 text-center">Kelola Akun</h2>
            <div>
                {{-- Pesan sukses --}}
                @if(session('success'))
                    <div 
                        x-data="{ show: true }" 
                        x-show="show" 
                        x-transition 
                        x-init="setTimeout(() => show = false, 3000)" 
                        class="mb-4 p-4 bg-green-500 text-white rounded-lg shadow flex items-center justify-between"
                    >
                        <div class="flex items-center space-x-2">
                            <!-- Ikon centang -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                        <!-- Tombol close -->
                        <button @click="show = false" class="ml-4 text-white hover:text-gray-200">&times;</button>
                    </div>
                @endif

                {{-- Pesan error --}}
                @if(session('error'))
                    <div 
                        x-data="{ show: true }" 
                        x-show="show" 
                        x-transition 
                        x-init="setTimeout(() => show = false, 3000)" 
                        class="mb-4 p-4 bg-red-500 text-white rounded-lg shadow flex items-center justify-between"
                    >
                        <div class="flex items-center space-x-2">
                            <!-- Ikon centang -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>{{ session('error') }}</span>
                        </div>
                        <!-- Tombol close -->
                        <button @click="show = false" class="ml-4 text-white hover:text-gray-200">&times;</button>
                    </div>
                @endif

                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-300">Username</th>
                            <th class="py-2 px-4 border-b border-gray-300">Role</th>
                            <th class="py-2 px-4 border-b border-gray-300">Status</th>
                            <th class="py-2 px-4 border-b border-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengguna as $p)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $p->username }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $p->role }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $p->status }}</td>
                            <td>
                                <form action="{{ route('updateAkun', $p->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="border border-gray-300 rounded px-2 py-1">
                                        <option value="Diterima" {{ $p->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                        <option value="Menunggu" {{ $p->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                        <option value="Ditolak" {{ $p->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    </select>
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded ml-2">Update</button>
                                </form>
                                <form action="{{ route('hapusAkun', $p->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus akun ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded ml-2">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $pengguna->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection