@extends('admin.layout')

@section('title', 'Kelola Usaha')

@section('content')
<div class="min-h-screen bg-blue-100">
    <div id="kelolaUsaha" class="pt-32 pb-16 px-6">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold mb-8 text-center">Kelola Usaha</h2>
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

                <div class="mb-4 flex justify-end">
                    <button onclick="openModal()" 
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        + Tambah Usaha
                    </button>
                </div>

                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b border-gray-300">Nama Usaha</th>
                            <th class="py-2 px-4 border-b border-gray-300">Deskripsi</th>
                            <th class="py-2 px-4 border-b border-gray-300">Pemilik</th>
                            <th class="py-2 px-4 border-b border-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usaha as $u)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $u->nama }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $u->deskripsi }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $u->kontak }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">
                                <!-- Tombol Edit -->
                                <a href="{{ route('updateUsaha', $u->id) }}" 
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded mr-2">
                                    Lihat
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('hapusUsaha', $u->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Yakin ingin menghapus usaha ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $usaha->links() }}
                </div>
            </div>
            

            {{-- Modal Tambah Usaha --}}
            <div id="modalTambah" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white w-full max-w-lg rounded-lg shadow-lg p-6 relative">
                    <h2 class="text-xl font-bold mb-4">Tambah Usaha Baru</h2>

                    <form action="{{ route('tambahUsaha') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="block font-semibold">Nama Usaha</label>
                            <input type="text" name="nama" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-3">
                            <label class="block font-semibold">Deskripsi</label>
                            <textarea name="deskripsi" rows="3" class="w-full border rounded p-2" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="block font-semibold">Penjelasan</label>
                            <textarea name="penjelasan" rows="3" class="w-full border rounded p-2"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="block font-semibold">Nama Pemilik</label>
                            <input type="text" name="kontak" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-3">
                            <label class="block font-semibold">Nomor HP</label>
                            <input type="text" name="nomor_hp" class="w-full border rounded p-2">
                        </div>

                        <div class="mb-3">
                            <label class="block font-semibold">Upload Gambar</label>
                            <input type="file" name="gambar_url" class="w-full border rounded p-2">
                        </div>

                        <div class="mb-3">
                            <label class="block font-semibold">Status</label>
                            <select name="status" class="w-full border rounded p-2">
                                <option value="Draf">Draf</option>
                                <option value="Arsip">Arsip</option>
                                <option value="Posting">Posting</option>
                            </select>
                        </div>

                        <div class="flex justify-end mt-4">
                            <button type="button" onclick="closeModal()" 
                                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded mr-2">
                                Batal
                            </button>
                            <button type="submit" 
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                Simpan
                            </button>
                        </div>
                    </form>

                    {{-- Tombol close pojok kanan atas --}}
                    <button onclick="closeModal()" 
                        class="absolute top-3 right-3 text-gray-600 hover:text-black">
                        ✕
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('modalTambah').classList.remove('hidden');
    }
    function closeModal() {
        document.getElementById('modalTambah').classList.add('hidden');
    }
</script>
@endsection