@extends('admin.layout')

@section('title', 'Kelola Berita')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-6 lg:mb-8">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-4">
                    Kelola Berita
                </h1>
                <div class="w-16 sm:w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full"></div>
                <p class="text-gray-600 mt-4 text-base lg:text-lg">Kelola artikel berita dan kegiatan di Karangmojo</p>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white/80 backdrop-blur-sm rounded-xl lg:rounded-2xl shadow-lg overflow-hidden">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-4 sm:p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <h2 class="text-xl sm:text-2xl font-bold text-white">Daftar Berita</h2>
                        <a href="{{ route('tambahBerita') }}" class="bg-white text-purple-600 px-4 sm:px-6 py-2 sm:py-3 rounded-lg sm:rounded-xl font-semibold hover:bg-purple-50 transition-all duration-200 transform hover:scale-105 shadow-lg text-sm sm:text-base">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Berita
                        </a>
                    </div>
                </div>

                <!-- Table for Desktop -->
                <div class="hidden lg:block p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700 rounded-l-xl">Judul</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Tanggal</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Penulis</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700 rounded-r-xl">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($berita as $b)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="py-4 px-6 font-medium text-gray-900">{{ $b->judul }}</td>
                                    <td class="py-4 px-6 text-gray-600">{{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}</td>
                                    <td class="py-4 px-6 text-gray-600">{{ $b->id_user }}</td>
                                    <td class="py-4 px-6">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('lihatBerita', $b->id)  }}" class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 transform hover:scale-105 text-sm font-medium">
                                                Lihat
                                            </a>
                                            <button class="bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 transform hover:scale-105 text-sm font-medium">
                                                Hapus
                                            </button>
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
                        @foreach ($berita as $b)
                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 hover:shadow-md transition-shadow duration-200">
                            <div class="flex flex-col space-y-3">
                                <div>
                                    <h3 class="font-semibold text-gray-900 text-lg line-clamp-2">{{ $b->judul }}</h3>
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-2 gap-1">
                                        <p class="text-gray-600 text-sm">Penulis: {{ $b->penulis }}</p>
                                        <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row gap-2 pt-2">
                                    <button class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 text-sm font-medium">
                                        Edit
                                    </button>
                                    <button class="flex-1 bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 text-sm font-medium">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="px-4 sm:px-6 pb-6">
                    {{ $berita->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection