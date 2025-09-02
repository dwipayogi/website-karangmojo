@extends('admin.layout')

@section('title', 'Kelola Berita')

@section('content')
<div class="min-h-screen bg-blue-50">
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-6 lg:mb-8">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-blue-600 mb-4">
                    Kelola Berita
                </h1>
                <div class="w-16 sm:w-24 h-1 bg-blue-600 rounded-full"></div>
                <p class="text-gray-600 mt-4 text-base lg:text-lg">Kelola artikel berita dan kegiatan di Karangmojo</p>
            </div>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)" 
                     class="mb-6 p-4 bg-green-500 text-white rounded-2xl shadow-lg flex items-center justify-between">
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
                        <h2 class="text-xl sm:text-2xl font-bold text-white">Daftar Berita</h2>
                        <button class="bg-white text-blue-600 px-4 sm:px-6 py-2 sm:py-3 rounded-lg sm:rounded-xl font-semibold hover:bg-blue-50 transition-all duration-200 transform hover:scale-105 shadow-lg text-sm sm:text-base">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Berita
                        </button>
                    </div>
                </div>

                @if($berita->count() > 0)

                <!-- Table for Desktop -->
                <div class="hidden lg:block p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-200">
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700 rounded-l-xl">Judul</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Tanggal</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Penulis</th>
                                    <th class="text-left py-4 px-6 font-semibold text-gray-700 rounded-r-xl">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($berita as $b)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="py-4 px-6 font-medium text-gray-900">{{ $b->judul }}</td>
                                    <td class="py-4 px-6 text-gray-600">{{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}</td>
                                    <td class="py-4 px-6 text-gray-600">{{ $b->penulis }}</td>
                                    <td class="py-4 px-6">
                                        <div class="flex space-x-2">
                                            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 text-sm font-medium">
                                                Edit
                                            </button>
                                            <button onclick="confirmDelete({{ $b->id }}, '{{ $b->judul }}')" 
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
                        @foreach ($berita as $b)
                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 hover:shadow-md transition-shadow duration-200">
                            <div class="flex flex-col space-y-3">
                                <div>
                                    <h3 class="font-semibold text-gray-900 text-lg line-clamp-2">{{ $b->judul }}</h3>
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-2 gap-1">
                                        <p class="text-gray-600 text-sm">Penulis: {{ $b->penulis }}</p>
                                        <p class="text-gray-500 text-sm">{{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row gap-2 pt-2">
                                    <button class="flex-1 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all duration-200 text-sm font-medium">
                                        Edit
                                    </button>
                                    <button onclick="confirmDelete({{ $b->id }}, '{{ $b->judul }}')" 
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
                    {{ $berita->links() }}
                </div>
                @else
                <!-- Empty State -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl lg:rounded-2xl shadow-lg p-8 lg:p-16 text-center">
                    <div class="max-w-md mx-auto">
                        <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl lg:text-2xl font-bold text-gray-700 mb-4">Belum Ada Berita</h3>
                        <p class="text-gray-500 mb-8 text-sm lg:text-base">
                            Anda belum menambahkan berita atau kegiatan apapun. Mulai dengan menambahkan berita pertama Anda.
                        </p>
                        <button class="bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Berita Pertama
                        </button>
                    </div>
                </div>
                @endif
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
                <h3 class="text-xl font-bold text-gray-800 mb-2">Hapus Berita</h3>
                <p class="text-gray-600 mb-6">
                    Apakah Anda yakin ingin menghapus berita "<span id="deleteItemName" class="font-semibold"></span>"? 
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
// Delete Modal Functions
function confirmDelete(id, judul) {
    document.getElementById('deleteItemName').textContent = judul;
    document.getElementById('deleteForm').action = '/kelolaBerita/' + id;
    
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

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        if (!document.getElementById('deleteModal').classList.contains('hidden')) {
            closeDeleteModal();
        }
    }
});
</script>
@endsection