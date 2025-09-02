@extends('template')
@extends('navbar')

@yield('title', 'Berita')

@yield('content')
<div id="berita" class="pt-32 pb-16 px-6 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold mb-8 text-center">Berita & Kegiatan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($berita as $berita)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('uploads/berita/' . $berita->gambar_url) }}" alt="{{ $berita->slug }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $berita->judul }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ $berita->tanggal_dibuat->format('d M Y') }}</p>
                        <p class="text-gray-700">{{ Str::limit($berita->penjelasan, 100) }}</p>
                        <a href="{{ route('berita.detail', $berita->id) }}" class="mt-4 inline-block text-blue-500 hover:underline">Baca Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>