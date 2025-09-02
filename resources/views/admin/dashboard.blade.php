@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-8 lg:mb-12">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-4">
                    Dashboard Admin
                </h1>
                <div class="w-16 sm:w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full"></div>
                <p class="text-gray-600 mt-4 text-base lg:text-lg">Selamat datang di panel administrasi Karangmojo</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8 mb-8 lg:mb-12">
                <!-- Users Card -->
                <div class="group bg-white/80 backdrop-blur-sm rounded-xl lg:rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 overflow-hidden">
                    <div class="p-6 lg:p-8">
                        <div class="flex items-center justify-between mb-4 lg:mb-6">
                            <div class="w-12 h-12 lg:w-16 lg:h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl lg:rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 lg:w-8 lg:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                                </svg>
                            </div>
                            <div class="text-right">
                                <p class="text-4xl lg:text-5xl font-bold text-blue-600">{{ $totalUsers }}</p>
                            </div>
                        </div>
                        <h3 class="text-lg lg:text-xl font-semibold text-gray-800 mb-2">Total Pengguna</h3>
                        <p class="text-sm lg:text-base text-gray-600">Pengguna yang terdaftar dalam sistem</p>
                    </div>
                    <div class="h-1 bg-gradient-to-r from-blue-500 to-blue-600"></div>
                </div>

                <!-- News Card -->
                <div class="group bg-white/80 backdrop-blur-sm rounded-xl lg:rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 overflow-hidden">
                    <div class="p-6 lg:p-8">
                        <div class="flex items-center justify-between mb-4 lg:mb-6">
                            <div class="w-12 h-12 lg:w-16 lg:h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-xl lg:rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 lg:w-8 lg:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <div class="text-right">
                                <p class="text-4xl lg:text-5xl font-bold text-green-600">{{ $totalBerita }}</p>
                            </div>
                        </div>
                        <h3 class="text-lg lg:text-xl font-semibold text-gray-800 mb-2">Total Berita</h3>
                        <p class="text-sm lg:text-base text-gray-600">Artikel berita yang telah dipublikasi</p>
                    </div>
                    <div class="h-1 bg-gradient-to-r from-green-500 to-green-600"></div>
                </div>

                <!-- Business Card -->
                <div class="group bg-white/80 backdrop-blur-sm rounded-xl lg:rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 overflow-hidden">
                    <div class="p-6 lg:p-8">
                        <div class="flex items-center justify-between mb-4 lg:mb-6">
                            <div class="w-12 h-12 lg:w-16 lg:h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl lg:rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 lg:w-8 lg:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div class="text-right">
                                <p class="text-4xl lg:text-5xl font-bold text-orange-600">{{ $totalUsaha }}</p>
                            </div>
                        </div>
                        <h3 class="text-lg lg:text-xl font-semibold text-gray-800 mb-2">Total Usaha</h3>
                        <p class="text-sm lg:text-base text-gray-600">Usaha yang terdaftar di sistem</p>
                    </div>
                    <div class="h-1 bg-gradient-to-r from-orange-500 to-orange-600"></div>
                </div>

                <!-- Gallery Card -->
                <div class="group bg-white/80 backdrop-blur-sm rounded-xl lg:rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 overflow-hidden">
                    <div class="p-6 lg:p-8">
                        <div class="flex items-center justify-between mb-4 lg:mb-6">
                            <div class="w-12 h-12 lg:w-16 lg:h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl lg:rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 lg:w-8 lg:h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="text-right">
                                <p class="text-4xl lg:text-5xl font-bold text-purple-600">{{ $totalGaleri }}</p>
                            </div>
                        </div>
                        <h3 class="text-lg lg:text-xl font-semibold text-gray-800 mb-2">Total Galeri</h3>
                        <p class="text-sm lg:text-base text-gray-600">Gambar yang tersimpan di galeri</p>
                    </div>
                    <div class="h-1 bg-gradient-to-r from-purple-500 to-purple-600"></div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white/80 backdrop-blur-sm rounded-xl lg:rounded-2xl shadow-lg p-6 lg:p-8">
                <h2 class="text-xl lg:text-2xl font-bold text-gray-800 mb-4 lg:mb-6">Aksi Cepat</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
                    <a href="{{ route('kelolaBerita') }}" class="group flex items-center gap-3 p-3 lg:p-4 rounded-lg lg:rounded-xl bg-gradient-to-r from-purple-500 to-purple-600 text-white hover:from-purple-600 hover:to-purple-700 transition-all duration-200 transform hover:scale-105">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span class="font-medium text-sm lg:text-base">Tambah Berita</span>
                    </a>
                    
                    <a href="{{ route('kelolaUsaha') }}" class="group flex items-center gap-3 p-3 lg:p-4 rounded-lg lg:rounded-xl bg-gradient-to-r from-indigo-500 to-indigo-600 text-white hover:from-indigo-600 hover:to-indigo-700 transition-all duration-200 transform hover:scale-105">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="font-medium text-sm lg:text-base">Kelola Usaha</span>
                    </a>
                    
                    <a href="{{ route('kelolaGaleri') }}" class="group flex items-center gap-3 p-3 lg:p-4 rounded-lg lg:rounded-xl bg-gradient-to-r from-pink-500 to-pink-600 text-white hover:from-pink-600 hover:to-pink-700 transition-all duration-200 transform hover:scale-105">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-medium text-sm lg:text-base">Kelola Galeri</span>
                    </a>
                    
                    @if(auth()->user()->role === 'Superadmin')
                    <a href="{{ route('kelolaAkun') }}" class="group flex items-center gap-3 p-3 lg:p-4 rounded-lg lg:rounded-xl bg-gradient-to-r from-green-500 to-green-600 text-white hover:from-green-600 hover:to-green-700 transition-all duration-200 transform hover:scale-105">
                        <svg class="w-5 h-5 lg:w-6 lg:h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                        </svg>
                        <span class="font-medium text-sm lg:text-base">Kelola Akun</span>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection