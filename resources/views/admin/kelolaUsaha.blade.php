@extends('admin.layout')

@section('title', 'Kelola Usaha')

@section('content')
<div class="min-h-screen bg-blue-50">
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-6 lg:mb-8">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-blue-600 mb-4">
                    Kelola Usaha
                </h1>
                <div class="w-16 sm:w-24 h-1 bg-blue-600 rounded-full"></div>
                <p class="text-gray-600 mt-4 text-base lg:text-lg">Kelola data usaha dan produk masyarakat Karangmojo</p>
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
                     class="mb-6 p-4 bg-red-500 text-white rounded-2xl shadow-lg flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-medium">{{ session('error') }}</span>
                    </div>
                    <button @click="show = false" class="text-white hover:text-gray-200 font-bold">&times;</button>
                </div>
            @endif

            <!-- Main Content Card -->
            <div class="bg-white/80 backdrop-blur-sm rounded-xl lg:rounded-2xl shadow-lg overflow-hidden">
                <!-- Card Header -->
                <div class="bg-blue-600 p-4 sm:p-6">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <h2 class="text-xl sm:text-2xl font-bold text-white">Daftar Usaha</h2>
                        <button onclick="openModal()" 
                                class="bg-white text-blue-600 px-4 sm:px-6 py-2 sm:py-3 rounded-lg sm:rounded-xl font-semibold hover:bg-blue-50 transition-all duration-200 transform hover:scale-105 shadow-lg text-sm sm:text-base">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Usaha
                        </button>
                    </div>
                </div>

                @if($usaha->count() > 0)

                <!-- Table for Desktop -->
                <div class="hidden lg:block p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700 rounded-l-xl">Nama Usaha</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Deskripsi</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Pemilik</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700 rounded-r-xl">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($usaha as $u)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="py-4 px-6 font-medium text-gray-900">{{ $u->nama }}</td>
                                    <td class="py-4 px-6 text-gray-600">{{ Str::limit($u->deskripsi, 50) }}</td>
                                    <td class="py-4 px-6 text-gray-600">{{ $u->kontak }}</td>
                                    <td class="py-4 px-6">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('updateUsaha', $u->id) }}" 
                                               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 text-sm font-medium">
                                                Lihat
                                            </a>
                                            <button onclick="confirmDelete({{ $u->id }}, '{{ $u->nama }}')" 
                                                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-all duration-200 transform hover:scale-105 text-sm font-medium">
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
                        @foreach ($usaha as $u)
                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 hover:shadow-md transition-shadow duration-200">
                            <div class="flex flex-col space-y-3">
                                <div>
                                    <h3 class="font-semibold text-gray-900 text-lg">{{ $u->nama }}</h3>
                                    <p class="text-gray-600 text-sm mt-1">Pemilik: {{ $u->kontak }}</p>
                                </div>
                                <p class="text-gray-600 text-sm leading-relaxed">{{ Str::limit($u->deskripsi, 100) }}</p>
                                <div class="flex flex-col sm:flex-row gap-2 pt-2">
                                    <a href="{{ route('updateUsaha', $u->id) }}" 
                                       class="flex-1 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-200 text-sm font-medium text-center">
                                        Lihat Detail
                                    </a>
                                    <button onclick="confirmDelete({{ $u->id }}, '{{ $u->nama }}')" 
                                            class="flex-1 bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-all duration-200 text-sm font-medium">
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
                    {{ $usaha->links() }}
                </div>
                @else
                <!-- Empty State -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl lg:rounded-2xl shadow-lg p-8 lg:p-16 text-center">
                    <div class="max-w-md mx-auto">
                        <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0h3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-700 mb-4">Belum Ada Usaha</h3>
                        <p class="text-gray-500 mb-8 text-sm lg:text-base">
                            Anda belum menambahkan usaha atau produk apapun. Mulai dengan menambahkan usaha pertama Anda.
                        </p>
                        <button onclick="openModal()" class="bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Usaha Pertama
                        </button>
                    </div>
                </div>
                @endif
            </div>

            <!-- Modal Tambah Usaha -->
            <div id="modalTambah" class="fixed inset-0 bg-black/50 backdrop-blur-sm items-center justify-center z-50 p-4 hidden">
                <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl relative max-h-[90vh] overflow-y-auto">
                    <!-- Modal Header -->
                    <div class="bg-blue-600 p-6 rounded-t-2xl">
                        <h2 class="text-2xl font-bold text-white">Tambah Usaha Baru</h2>
                        <p class="text-blue-100 mt-1">Lengkapi informasi usaha yang akan ditambahkan</p>
                    </div>

                    <!-- Modal Body -->
                    <form action="{{ route('tambahUsaha') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Usaha</label>
                                <input type="text" name="nama" 
                                       class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                       placeholder="Masukkan nama usaha" required>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                                <textarea name="deskripsi" rows="3" 
                                          class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                          placeholder="Deskripsi singkat usaha" required></textarea>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Penjelasan Detail</label>
                                <textarea name="penjelasan" rows="4" 
                                          class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                          placeholder="Penjelasan detail tentang usaha"></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Pemilik</label>
                                <input type="text" name="kontak" 
                                       class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                       placeholder="Nama pemilik usaha" required>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor HP</label>
                                <input type="text" name="nomor_hp" 
                                       class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" 
                                       placeholder="Nomor HP pemilik">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Upload Gambar</label>
                                <input type="file" name="gambar_url" id="uploadGambar"
                                       class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                       accept="image/*" onchange="previewImage(event)">
                                <p class="text-sm text-gray-500 mt-1">Format yang didukung: JPG, PNG, GIF (max 2MB)</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                                <select name="status" 
                                        class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                    <option value="Draf">Draf</option>
                                    <option value="Arsip">Arsip</option>
                                    <option value="Posting" selected>Posting</option>
                                </select>
                            </div>

                            <!-- Image Preview -->
                            <div id="imagePreviewContainer" class="md:col-span-2 hidden">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Preview Gambar</label>
                                <div class="flex items-center justify-center">
                                    <div class="relative">
                                        <img id="imagePreview" src="" alt="Preview" 
                                             class="w-48 h-48 object-cover rounded-xl border border-gray-200 shadow-md">
                                        <button type="button" onclick="removePreview()" 
                                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-600 transition-colors duration-200">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                            <button type="button" onclick="closeModal()" 
                                    class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all duration-200 font-medium">
                                Batal
                            </button>
                            <button type="submit" 
                                    class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 font-medium shadow-lg">
                                Simpan Usaha
                            </button>
                        </div>
                    </form>

                    <!-- Close Button -->
                    <button onclick="closeModal()" 
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

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm items-center justify-center z-50 p-4 hidden">
    <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl relative">
        <!-- Modal Body -->
        <div class="p-6">
            <div class="text-center">
                <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Hapus Usaha</h3>
                <p class="text-gray-600 mb-6">
                    Apakah Anda yakin ingin menghapus usaha "<span id="deleteItemName" class="font-semibold"></span>"? 
                    Tindakan ini tidak dapat dibatalkan.
                </p>
                <div class="flex flex-col sm:flex-row gap-3">
                    <button onclick="closeDeleteModal()" 
                            class="flex-1 bg-gray-200 text-gray-800 px-6 py-3 rounded-xl font-semibold hover:bg-gray-300 transition-all duration-200">
                        Batal
                    </button>
                    <form id="deleteForm" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full bg-red-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-red-700 transition-all duration-200">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal() {
        const modal = document.getElementById('modalTambah');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    
    function closeModal() {
        const modal = document.getElementById('modalTambah');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
        
        // Reset form and preview when closing modal
        resetForm();
    }

    // Delete Modal Functions
    function confirmDelete(id, nama) {
        document.getElementById('deleteItemName').textContent = nama;
        document.getElementById('deleteForm').action = '/kelolaUsaha/' + id;
        
        const modal = document.getElementById('deleteModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    function previewImage(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('imagePreviewContainer');
        const previewImage = document.getElementById('imagePreview');
        
        if (file) {
            // Check file size (2MB = 2 * 1024 * 1024 bytes)
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file terlalu besar. Maksimal 2MB.');
                event.target.value = '';
                return;
            }
            
            // Check file type
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            if (!allowedTypes.includes(file.type)) {
                alert('Format file tidak didukung. Gunakan JPG, PNG, atau GIF.');
                event.target.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            previewContainer.classList.add('hidden');
        }
    }

    function removePreview() {
        const uploadInput = document.getElementById('uploadGambar');
        const previewContainer = document.getElementById('imagePreviewContainer');
        const previewImage = document.getElementById('imagePreview');
        
        // Clear the file input
        uploadInput.value = '';
        
        // Hide preview container
        previewContainer.classList.add('hidden');
        
        // Clear the preview image src
        previewImage.src = '';
    }

    function resetForm() {
        // Reset the form
        const form = document.querySelector('#modalTambah form');
        if (form) {
            form.reset();
        }
        
        // Hide preview container
        const previewContainer = document.getElementById('imagePreviewContainer');
        if (previewContainer) {
            previewContainer.classList.add('hidden');
        }
        
        // Clear preview image
        const previewImage = document.getElementById('imagePreview');
        if (previewImage) {
            previewImage.src = '';
        }
    }

    // Close modal when clicking outside
    document.getElementById('modalTambah').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Close delete modal when clicking outside
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDeleteModal();
        }
    });

    // Close modal on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('modalTambah');
            const deleteModal = document.getElementById('deleteModal');
            
            if (!modal.classList.contains('hidden')) {
                closeModal();
            }
            if (!deleteModal.classList.contains('hidden')) {
                closeDeleteModal();
            }
        }
    });
</script>
@endsection