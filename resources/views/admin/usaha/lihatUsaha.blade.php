@extends('admin.layout')
@section('title', 'Detail Usaha')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header with Back Button -->
            <div class="mb-6 lg:mb-8">
                <div class="flex items-center gap-4 mb-4">
                    <a href="{{ route('kelolaUsaha') }}" 
                    class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Kelola Usaha
                    </a>
                </div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-4">
                    Detail Usaha
                </h1>
                <div class="w-16 sm:w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full"></div>
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

            <!-- Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 mb-8">
                <!-- Content Section -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl lg:rounded-2xl shadow-lg p-6 lg:p-8 order-2 lg:order-1">
                    <div class="space-y-6">
                        <!-- Business Name -->
                        <div>
                            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                                {{ $usaha->nama }}
                            </h2>
                        </div>

                        <!-- Description -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Deskripsi
                            </h3>
                            <p class="text-gray-700 leading-relaxed">{{ $usaha->deskripsi }}</p>
                        </div>

                        <!-- Detailed Explanation -->
                        @if($usaha->penjelasan)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Penjelasan Detail
                            </h3>
                            <p class="text-gray-700 leading-relaxed">{{ $usaha->penjelasan }}</p>
                        </div>
                        @endif

                        <!-- Contact Information -->
                        <div class="bg-gray-50 rounded-xl p-4 lg:p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Informasi Kontak
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-center gap-3">
                                    <span class="font-medium text-gray-600 min-w-[100px]">Pemilik:</span>
                                    <span class="text-gray-900">{{ $usaha->kontak }}</span>
                                </div>
                                @if($usaha->nomor_hp)
                                <div class="flex items-center gap-3">
                                    <span class="font-medium text-gray-600 min-w-[100px]">No. HP:</span>
                                    <a href="tel:{{ $usaha->nomor_hp }}" class="text-blue-600 hover:text-blue-800 font-medium">
                                        {{ $usaha->nomor_hp }}
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Upload Info -->
                        @if($usaha->user_id)
                        <div class="text-sm text-gray-500 bg-blue-50 rounded-lg p-3">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Upload oleh: {{ $usaha->user_id }}
                            </span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Image Section -->
                <div class="order-1 lg:order-2">
                    <div class="bg-white/80 backdrop-blur-sm rounded-xl lg:rounded-2xl shadow-lg overflow-hidden h-64 sm:h-80 lg:h-full min-h-[400px]">
                        @if($usaha->gambar_url)
                            <img src="{{ asset('uploads/usaha/' . $usaha->gambar_url) }}" 
                                alt="{{ $usaha->nama }}"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                <div class="text-center text-gray-500">
                                    <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p>Tidak ada gambar</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Action Button -->
            <div class="flex justify-center lg:justify-start">
                <button onclick="openEditModal()" 
                        class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-3 rounded-xl font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 transform hover:scale-105 shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Usaha
                </button>
            </div>
            <!-- Modal Edit -->
            <div id="editModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm items-center justify-center z-50 p-4 hidden">
                <div class="bg-white w-full max-w-4xl rounded-2xl shadow-2xl relative max-h-[90vh] overflow-y-auto">
                    <!-- Modal Header -->
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6 rounded-t-2xl">
                        <h2 class="text-2xl font-bold text-white">Edit Usaha</h2>
                        <p class="text-blue-100 mt-1">Perbarui informasi usaha</p>
                    </div>

                    <!-- Modal Body -->
                    <form id="editForm" method="POST" action="{{ route('updateUsaha', $usaha->id) }}" enctype="multipart/form-data" class="p-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Usaha</label>
                                <input type="text" name="nama" 
                                    class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                    value="{{ $usaha->nama }}" required>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                                <textarea name="deskripsi" rows="3" 
                                        class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                        required>{{ $usaha->deskripsi }}</textarea>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Penjelasan Detail</label>
                                <textarea name="penjelasan" rows="4" 
                                    class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">{{ $usaha->penjelasan }}</textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Pemilik</label>
                                <input type="text" name="kontak" 
                                    class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                    value="{{ $usaha->kontak }}" required>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor HP</label>
                                <input type="text" name="nomor_hp" 
                                    class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                    value="{{ $usaha->nomor_hp }}">
                            </div>
                            <div class="md:col-span-2">
                                <label for="" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                                <select class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                    id="status" name="status">
                                    <option value="Draft">Draft</option>
                                    <option value="Posting">Posting</option>
                                    <option value="Arsip">Arsip</option>
                                </select>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Upload Gambar Baru</label>
                                <input type="file" accept="image/*" name="gambar_url" id="editGambar" 
                                       class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                       onchange="previewEditImage(event)">
                                <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar</p>
                            </div>

                            <!-- Image Preview -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Preview Gambar</label>
                                <div class="flex items-center justify-center">
                                    @if($usaha->gambar_url)
                                        <img id="editPreview" src="{{ asset('uploads/usaha/' . $usaha->gambar_url) }}" 
                                             class="w-32 h-32 sm:w-48 sm:h-48 object-cover rounded-xl border border-gray-200 shadow-md">
                                    @else
                                        <div id="editPreview" class="w-32 h-32 sm:w-48 sm:h-48 bg-gray-100 rounded-xl border border-gray-200 flex items-center justify-center">
                                            <span class="text-gray-500 text-sm">Tidak ada gambar</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-6 border-t border-gray-200 mt-6">
                            <button type="button" onclick="closeEditModal()" 
                                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all duration-200 font-medium">
                                Batal
                            </button>
                            <button type="submit" 
                                    class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 transform hover:scale-105 font-medium shadow-lg">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>

                    <!-- Close Button -->
                    <button onclick="closeEditModal()" 
                            class="absolute top-4 right-4 text-white hover:text-gray-200 transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>


        </div>
    </div>
</div>

<script>
    function openEditModal() {
        const modal = document.getElementById('editModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeEditModal() {
        const modal = document.getElementById('editModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    function previewEditImage(event) {
        const preview = document.getElementById('editPreview');
        const file = event.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // If preview is an img element, update src
                if (preview.tagName === 'IMG') {
                    preview.src = e.target.result;
                } else {
                    // If preview is a div, replace it with an img element
                    const img = document.createElement('img');
                    img.id = 'editPreview';
                    img.src = e.target.result;
                    img.className = 'w-32 h-32 sm:w-48 sm:h-48 object-cover rounded-xl border border-gray-200 shadow-md';
                    preview.parentNode.replaceChild(img, preview);
                }
            };
            reader.readAsDataURL(file);
        }
    }

    // Close modal when clicking outside
    document.getElementById('editModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeEditModal();
        }
    });

    // Close modal on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeEditModal();
        }
    });
</script>

@endsection