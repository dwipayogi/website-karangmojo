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
            </div>

            <div class="flex gap-8">
                <div class="flex-1 p-4 bg-white rounded-lg shadow-lg">
                    <h1 class="text-4xl font-bold">{{$usaha->nama}}</h1>
                    <p>{{$usaha->deskripsi}}</p>
                    <p>{{$usaha->penjelasan}}</p>
                    <p>Kontak : {{$usaha->nomor_hp}} ({{$usaha->kontak}}) </p>
                </div>
                <div class="flex-1 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{asset('uploads/usaha/'. $usaha->gambar_url)}}" alt="">
                </div>
            </div>
            <p>Upload oleh: {{ $usaha->user_id ?? 'Tidak diketahui' }}</p>


            <div class="mt-8 flex justify-center w-full">
                <div class="w-1/4">
                    <!-- Tombol Edit -->
                    <button 
                        onclick="openEditModal()" 
                        class="bg-blue-500 text-white px-3 py-1 rounded text-center hover:bg-blue-600 transition w-full"
                    >
                        Edit
                    </button>
                </div>
                
            </div>
            <!-- Modal Edit -->
            <div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
                    <h2 class="text-xl font-semibold mb-4">Edit Usaha</h2>
                    
                    <form id="editForm" method="POST" action="{{ route('updateUsaha', $usaha->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-gray-700">Nama Usaha</label>
                            <input type="text" name="nama" id="" class="w-full px-3 py-2 border rounded" value="{{$usaha->nama}}">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Slug</label>
                            <input type="text" name="slug" id="" class="w-full px-3 py-2 border rounded" value="{{$usaha->slug}}">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="" class="w-full px-3 py-2 border rounded">{{$usaha->deskripsi}}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Penjelasan</label>
                            <textarea name="penjelasan" id="" class="w-full px-3 py-2 border rounded">{{$usaha->penjelasan}}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Nama Pemilik</label>
                            <input type="text" name="kontak" id="" class="w-full px-3 py-2 border rounded" value="{{$usaha->kontak}}">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">No. HP</label>
                            <input type="text" name="nomor_hp" id="" class="w-full px-3 py-2 border rounded" value="{{$usaha->nomor_hp}}">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Gambar</label>
                            <input type="file" accept="image/*" name="gambar_url" id="editGambar" class="w-full px-3 py-2 border rounded" onchange="previewEditImage(event)">
    
                            <img id="editPreview" src="{{ asset('uploads/usaha/' . $usaha->gambar_url) }}" class="w-32 h-32 object-cover mt-2 rounded">
                        </div>

                        <div class="flex justify-end space-x-2">
                            <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>

<script>
    function openEditModal(id, nama, deskripsi, kontak) {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModal').classList.add('flex');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editModal').classList.remove('flex');
    }

    function previewEditImage(event) {
    const preview = document.getElementById('editPreview');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.onload = () => {
        URL.revokeObjectURL(preview.src); // bebaskan memory
    }
}
</script>

@endsection