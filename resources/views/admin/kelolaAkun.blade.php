@extends('admin.layout')

@section('title', 'Kelola Akun')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-6 lg:mb-8">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-4">
                    Kelola Akun
                </h1>
                <div class="w-16 sm:w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full"></div>
                <p class="text-gray-600 mt-4 text-base lg:text-lg">Kelola akun pengguna dan status verifikasi</p>
            </div>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)" 
                     class="mb-6 p-4 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-2xl shadow-lg flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                    <button @click="show = false" class="text-white hover:text-gray-200 font-bold">&times;</button>
                </div>
            @endif

            @if(session('error'))
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)" 
                     class="mb-6 p-4 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-2xl shadow-lg flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>
                    <button @click="show = false" class="text-white hover:text-gray-200 font-bold">&times;</button>
                </div>
            @endif

            <!-- Main Content Card -->
            <div class="bg-white/80 backdrop-blur-sm rounded-xl lg:rounded-2xl shadow-lg overflow-hidden">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-green-600 to-teal-600 p-4 sm:p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <h2 class="text-xl sm:text-2xl font-bold text-white">Daftar Akun Pengguna</h2>
                        <div class="flex items-center space-x-2">
                            <span class="bg-white/20 text-white px-3 py-1 rounded-full text-sm">
                                Total: {{ $pengguna->total() }} akun
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Table for Desktop -->
                <div class="hidden lg:block p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700 rounded-l-xl">Username</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Role</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Status</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700 rounded-r-xl">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($pengguna as $p)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="py-4 px-6 font-medium text-gray-900">{{ $p->username }}</td>
                                    <td class="py-4 px-6">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                            {{ $p->role === 'Superadmin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                            {{ $p->role }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                            {{ $p->status === 'Diterima' ? 'bg-green-100 text-green-800' : 
                                               ($p->status === 'Menunggu' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                            {{ $p->status }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex space-x-2">
                                            <form action="{{ route('updateAkun', $p->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" 
                                                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                                        onchange="this.form.submit()">
                                                    <option value="Diterima" {{ $p->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                                    <option value="Menunggu" {{ $p->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                                    <option value="Ditolak" {{ $p->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                </select>
                                            </form>
                                            <form action="{{ route('hapusAkun', $p->id) }}" method="POST" class="inline" 
                                                  onsubmit="return confirm('Yakin ingin menghapus akun ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 transform hover:scale-105 text-sm font-medium">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Card Layout for Mobile/Tablet -->
                <div class="lg:hidden p-4 sm:p-6">
                    <div class="space-y-4">
                        @foreach ($pengguna as $p)
                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 hover:shadow-md transition-shadow duration-200">
                            <div class="flex flex-col space-y-3">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h3 class="font-semibold text-gray-900 text-lg">{{ $p->username }}</h3>
                                        <div class="flex items-center gap-2 mt-2">
                                            <span class="px-2 py-1 rounded-full text-xs font-semibold 
                                                {{ $p->role === 'Superadmin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                                {{ $p->role }}
                                            </span>
                                            <span class="px-2 py-1 rounded-full text-xs font-semibold 
                                                {{ $p->status === 'Diterima' ? 'bg-green-100 text-green-800' : 
                                                   ($p->status === 'Menunggu' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                                {{ $p->status }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row gap-2 pt-2">
                                    <form action="{{ route('updateAkun', $p->id) }}" method="POST" class="flex-1">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" 
                                                class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                                onchange="this.form.submit()">
                                            <option value="Diterima" {{ $p->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                            <option value="Menunggu" {{ $p->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                            <option value="Ditolak" {{ $p->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                        </select>
                                    </form>
                                    <form action="{{ route('hapusAkun', $p->id) }}" method="POST" class="flex-1 sm:flex-initial" 
                                          onsubmit="return confirm('Yakin ingin menghapus akun ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="w-full sm:w-auto bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 text-sm font-medium">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="px-4 sm:px-6 pb-6">
                    {{ $pengguna->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection