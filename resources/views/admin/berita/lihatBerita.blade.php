@extends('admin.layout')
@section('title', 'Lihat Berita')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-3xl font-bold mb-4">{{ $berita->judul }}</h1>
                <p class="text-gray-600 mb-2">Tanggal Dibuat: {{ \Carbon\Carbon::parse($berita->tanggal_dibuat)->format('d M Y') }}</p>
                <p class="text-gray-600 mb-6">Penulis: {{ $berita->user_id }}</p>
                @if($berita->gambar_url)
                    <img src="{{ asset('uploads/berita/' . $berita->gambar_url) }}" alt="Gambar Berita" class="w-full h-auto mb-6 rounded-lg">
                @endif
                <div class="prose max-w-none">
                    {!! $konten_html !!}
                </div>

                <!-- Action Button -->
                <div class="flex justify-center lg:justify-start">
                    <a href="{{ route('editBerita', $berita->id) }}"
                            class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-3 rounded-xl font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 transform hover:scale-105 shadow-lg flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Berita
                    </a>
                </div>


            </div>
        </div>
    </div>
@endsection