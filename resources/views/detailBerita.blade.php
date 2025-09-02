@extends('template')
@extends('navbar')

@section('title', '$berita->judul')

@section('content')
<div class="mt-20">
    <h1 class="text-2xl font-bold mb-4">{{ $berita->judul }}</h1>
    <p class="text-gray-700">{{ $berita->isi }}</p>
</div>
@endsection
