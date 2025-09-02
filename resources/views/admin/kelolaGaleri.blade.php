@extends('admin.layout')

@section('title', 'Kelola Galeri')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-6 lg:mb-8">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-4">
                    Kelola Galeri
                </h1>
                <div class="w-16 sm:w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full"></div>
                <p class="text-gray-600 mt-4 text-base lg:text-lg">Kelola koleksi gambar dan foto untuk website</p>
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

            <!-- Action Button -->
            <div class="flex justify-end mb-6">
                <button onclick="openAddModal()" 
                        class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 transform hover:scale-105 shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Gambar
                </button>
            </div>

            <!-- Gallery Content -->
            @if($galeri->count() > 0)
                <!-- Gallery Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
                    @foreach($galeri as $item)
                    <div class="group bg-white/80 backdrop-blur-sm rounded-xl lg:rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                        <!-- Image Container -->
                        <div class="relative aspect-square overflow-hidden">
                            <img src="{{ asset('uploads/galeri/' . $item->gambar_url) }}" 
                                 alt="{{ $item->nama }}" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                                <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex space-x-3">
                                    <button onclick="openEditModal({{ $item->id }}, '{{ $item->nama }}', '{{ asset('uploads/galeri/' . $item->gambar_url) }}')" 
                                            class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-xl transition-all duration-200 transform hover:scale-110 shadow-lg">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                    <button onclick="confirmDelete({{ $item->id }}, '{{ $item->nama }}')" 
                                            class="bg-red-600 hover:bg-red-700 text-white p-3 rounded-xl transition-all duration-200 transform hover:scale-110 shadow-lg">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-4 lg:p-6">
                            <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2 text-sm lg:text-base">{{ $item->nama }}</h3>
                            <p class="text-xs lg:text-sm text-gray-500">{{ \Carbon\Carbon::parse($item->tanggal_dibuat)->format('d M Y') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl lg:rounded-2xl shadow-lg p-8 lg:p-16 text-center">
                    <div class="max-w-md mx-auto">
                        <div class="w-24 h-24 lg:w-32 lg:h-32 mx-auto bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-12 h-12 lg:w-16 lg:h-16 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-900 mb-3">Belum ada gambar</h3>
                        <p class="text-gray-600 mb-8 text-sm lg:text-base">Mulai tambahkan gambar pertama Anda ke galeri untuk menampilkan koleksi foto</p>
                        <button onclick="openAddModal()" 
                                class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-xl font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 transform hover:scale-105 shadow-lg">
                            Tambah Gambar Pertama
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Add Modal -->
<div id="addModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm items-center justify-center z-50 p-4 hidden">
    <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl relative max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6 rounded-t-2xl">
            <h2 class="text-2xl font-bold text-white">Tambah Gambar Baru</h2>
            <p class="text-blue-100 mt-1">Upload gambar untuk galeri website</p>
        </div>

        <!-- Modal Body -->
        <form action="{{ route('tambahGaleri') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Gambar</label>
                    <input type="text" name="nama" required 
                           class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                           placeholder="Masukkan judul gambar">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Pilih Gambar</label>
                    <input type="file" name="gambar" accept="image/*" required id="addImageInput"
                           class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                           onchange="previewAddImage(this)">
                    <p class="text-sm text-gray-500 mt-1">Format yang didukung: JPG, PNG, GIF (max 2MB)</p>
                </div>
                
                <!-- Image Preview -->
                <div id="addPreviewContainer" class="hidden">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Preview Gambar</label>
                    <div class="flex items-center justify-center">
                        <div class="relative">
                            <img id="addPreviewImg" src="" alt="Preview" 
                                 class="w-64 h-48 object-cover rounded-xl border border-gray-200 shadow-md">
                            <button type="button" onclick="removeAddPreview()" 
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
            <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-6 border-t border-gray-200">
                <button type="button" onclick="closeAddModal()" 
                        class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all duration-200 font-medium">
                    Batal
                </button>
                <button type="submit" 
                        class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 transform hover:scale-105 font-medium shadow-lg">
                    Tambah Gambar
                </button>
            </div>
        </form>

        <!-- Close Button -->
        <button onclick="closeAddModal()" 
                class="absolute top-4 right-4 text-white hover:text-gray-200 transition-colors duration-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm items-center justify-center z-50 p-4 hidden">
    <div class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl relative max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-green-600 to-teal-600 p-6 rounded-t-2xl">
            <h2 class="text-2xl font-bold text-white">Edit Gambar</h2>
            <p class="text-green-100 mt-1">Perbarui informasi gambar</p>
        </div>

        <!-- Modal Body -->
        <form id="editForm" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Gambar</label>
                    <input type="text" id="editNama" name="nama" required 
                           class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Saat Ini</label>
                    <div class="flex items-center justify-center">
                        <img id="currentImage" src="" alt="Current Image" 
                             class="w-64 h-48 object-cover rounded-xl border border-gray-200 shadow-md">
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Ganti Gambar (Opsional)</label>
                    <input type="file" name="gambar" accept="image/*" id="editImageInput"
                           class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200"
                           onchange="previewEditImage(this)">
                    <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti gambar</p>
                </div>
                
                <!-- New Image Preview -->
                <div id="editPreviewContainer" class="hidden">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Preview Gambar Baru</label>
                    <div class="flex items-center justify-center">
                        <div class="relative">
                            <img id="editPreviewImg" src="" alt="Preview" 
                                 class="w-64 h-48 object-cover rounded-xl border border-gray-200 shadow-md">
                            <button type="button" onclick="removeEditPreview()" 
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
            <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-6 border-t border-gray-200">
                <button type="button" onclick="closeEditModal()" 
                        class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all duration-200 font-medium">
                    Batal
                </button>
                <button type="submit" 
                        class="px-6 py-3 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-xl hover:from-green-700 hover:to-teal-700 transition-all duration-200 transform hover:scale-105 font-medium shadow-lg">
                    Update Gambar
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

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm items-center justify-center z-50 p-4 hidden">
    <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl relative">
        <!-- Modal Body -->
        <div class="p-6">
            <div class="text-center">
                <div class="w-16 h-16 mx-auto bg-red-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Hapus Gambar</h3>
                <p class="text-gray-600 mb-6">Apakah Anda yakin ingin menghapus gambar "<span id="deleteItemName" class="font-semibold"></span>"? Tindakan ini tidak dapat dibatalkan.</p>
                
                <div class="flex flex-col sm:flex-row justify-center space-y-3 sm:space-y-0 sm:space-x-3">
                    <button onclick="closeDeleteModal()" 
                            class="px-6 py-3 bg-gray-500 text-white rounded-xl hover:bg-gray-600 transition-all duration-200 font-medium">
                        Batal
                    </button>
                    <form id="deleteForm" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-xl hover:from-red-700 hover:to-red-800 transition-all duration-200 transform hover:scale-105 font-medium shadow-lg">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Add Modal Functions
function openAddModal() {
    const modal = document.getElementById('addModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeAddModal() {
    const modal = document.getElementById('addModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = 'auto';
    
    // Reset form
    const form = document.querySelector('#addModal form');
    if (form) form.reset();
    
    // Hide preview
    const previewContainer = document.getElementById('addPreviewContainer');
    if (previewContainer) previewContainer.classList.add('hidden');
}

// Edit Modal Functions
function openEditModal(id, nama, gambarUrl) {
    document.getElementById('editNama').value = nama;
    document.getElementById('currentImage').src = gambarUrl;
    document.getElementById('editForm').action = '/kelolaGaleri/' + id;
    
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
    
    // Reset edit preview
    const previewContainer = document.getElementById('editPreviewContainer');
    if (previewContainer) previewContainer.classList.add('hidden');
    
    // Reset file input
    const fileInput = document.getElementById('editImageInput');
    if (fileInput) fileInput.value = '';
}

// Delete Modal Functions
function confirmDelete(id, nama) {
    document.getElementById('deleteItemName').textContent = nama;
    document.getElementById('deleteForm').action = '/kelolaGaleri/' + id;
    
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

// Image Preview Functions
function previewAddImage(input) {
    const file = input.files[0];
    const previewContainer = document.getElementById('addPreviewContainer');
    const previewImg = document.getElementById('addPreviewImg');
    
    if (file) {
        // Check file size (2MB = 2 * 1024 * 1024 bytes)
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file terlalu besar. Maksimal 2MB.');
            input.value = '';
            return;
        }
        
        // Check file type
        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        if (!allowedTypes.includes(file.type)) {
            alert('Format file tidak didukung. Gunakan JPG, PNG, atau GIF.');
            input.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewContainer.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    } else {
        previewContainer.classList.add('hidden');
    }
}

function previewEditImage(input) {
    const file = input.files[0];
    const previewContainer = document.getElementById('editPreviewContainer');
    const previewImg = document.getElementById('editPreviewImg');
    
    if (file) {
        // Check file size (2MB = 2 * 1024 * 1024 bytes)
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file terlalu besar. Maksimal 2MB.');
            input.value = '';
            return;
        }
        
        // Check file type
        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        if (!allowedTypes.includes(file.type)) {
            alert('Format file tidak didukung. Gunakan JPG, PNG, atau GIF.');
            input.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewContainer.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    } else {
        previewContainer.classList.add('hidden');
    }
}

function removeAddPreview() {
    const input = document.getElementById('addImageInput');
    const previewContainer = document.getElementById('addPreviewContainer');
    const previewImg = document.getElementById('addPreviewImg');
    
    input.value = '';
    previewContainer.classList.add('hidden');
    previewImg.src = '';
}

function removeEditPreview() {
    const input = document.getElementById('editImageInput');
    const previewContainer = document.getElementById('editPreviewContainer');
    const previewImg = document.getElementById('editPreviewImg');
    
    input.value = '';
    previewContainer.classList.add('hidden');
    previewImg.src = '';
}

// Close modals when clicking outside
document.getElementById('addModal').addEventListener('click', function(e) {
    if (e.target === this) closeAddModal();
});

document.getElementById('editModal').addEventListener('click', function(e) {
    if (e.target === this) closeEditModal();
});

document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) closeDeleteModal();
});

// Close modals with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        if (!document.getElementById('addModal').classList.contains('hidden')) closeAddModal();
        if (!document.getElementById('editModal').classList.contains('hidden')) closeEditModal();
        if (!document.getElementById('deleteModal').classList.contains('hidden')) closeDeleteModal();
    }
});
</script>
@endsection
