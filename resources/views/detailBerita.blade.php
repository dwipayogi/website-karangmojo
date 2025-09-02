@extends('template')
@extends('navbar')

@section('title', '$berita->judul')

@section('content')
<div class="mt-20">
    <img src="{{ asset('uploads/berita/'.$berita->gambar_url) }}" alt="gambar" class="mb-4">
    <h1 class="text-2xl font-bold mb-4">{{ $berita->judul }}</h1>
    <article class="prose lg:prose-xl">
        {!! $konten_html !!}
    </article>
</div>
@endsection
