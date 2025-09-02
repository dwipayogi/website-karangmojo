@extends('admin.layout')

@section('title', 'Kelola Berita')

@section('content')
<div class="min-h-screen bg-blue-100">
    <div id="kelolaBerita" class="pt-32 pb-16 px-6">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold mb-8 text-center">Kelola Berita</h2>
            <div>
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-300">Judul</th>
                            <th class="py-2 px-4 border-b border-gray-300">Tanggal</th>
                            <th class="py-2 px-4 border-b border-gray-300">Penulis</th>
                            <th class="py-2 px-4 border-b border-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berita as $b)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $b->judul }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $b->tanggal }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $b->penulis }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">
                                <!-- Aksi seperti Edit, Hapus bisa ditambahkan di sini -->
                                <button class="bg-blue-500 text-white px-3 py-1 rounded mr-2">Edit</button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $berita->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection