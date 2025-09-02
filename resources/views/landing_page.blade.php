@extends('template')
@section('title', 'Karangmojo')

@include('navbar')

@section('content')

<div>
    <!-- Hero Section -->
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse"></div>
            <div class="absolute top-40 right-20 w-56 h-56 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse animation-delay-2000"></div>
            <div class="absolute bottom-20 left-1/3 w-64 h-64 bg-pink-400 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse animation-delay-4000"></div>
        </div>
        <div class="text-center flex flex-col gap-6 z-10 px-4">
            <p class="text-2xl md:text-4xl font-semibold text-white/90 animate-fade-in-up">Selamat Datang di</p>
            <h1 class="text-6xl md:text-8xl lg:text-9xl font-bold text-white drop-shadow-2xl animate-fade-in-up animation-delay-500">Karangmojo</h1>
            <p class="text-lg md:text-xl text-white/80 max-w-2xl mx-auto leading-relaxed animate-fade-in-up animation-delay-1000">
                Pedukuhan yang kaya akan budaya, tradisi, dan keindahan alam yang memukau
            </p>
            <div class="flex justify-center mt-8 animate-fade-in-up animation-delay-1500">
                <a href="#profil" class="bg-white text-blue-700 px-8 py-4 rounded-full font-semibold text-lg hover:bg-blue-50 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Jelajahi Lebih Lanjut
                </a>
            </div>
        </div>
    </div>

    <!-- Profil Pedukuhan -->
    <div id="profil" class="min-h-screen flex lg:flex-row flex-col items-center justify-center bg-white px-8 py-20">
        <div class="container mx-auto">
            <div class="flex lg:flex-row flex-col items-center gap-16">
                <div class="flex flex-col gap-8 max-w-2xl lg:flex-1">
                    <div class="text-center lg:text-left">
                        <h2 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-4">
                            Profil Pedukuhan
                        </h2>
                        <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto lg:mx-0 rounded-full"></div>
                    </div>
                    <p class="text-lg md:text-xl text-gray-700 leading-relaxed text-justify">
                        Karangmojo adalah sebuah pedukuhan yang terletak di wilayah yang kaya akan budaya dan tradisi.
                        Pedukuhan ini dikenal dengan keindahan alamnya yang memukau, serta masyarakatnya yang ramah dan 
                        menjunjung tinggi nilai-nilai gotong royong.
                    </p>
                    <p class="text-lg md:text-xl text-gray-700 leading-relaxed text-justify">
                        Di Karangmojo, Anda dapat menemukan berbagai kegiatan budaya, kerajinan tangan, dan kuliner khas yang mencerminkan kekayaan warisan lokal.
                        Dengan lingkungan yang asri dan udara yang sejuk, Karangmojo menjadi tempat yang ideal untuk berwisata maupun menetap. 
                        Setiap sudut pedukuhan menawarkan pengalaman unik yang tak terlupakan bagi setiap pengunjung.
                    </p>
                </div>
                <div class="lg:flex-1 flex justify-center">
                    <div class="relative group">
                        <img src="{{ asset('uploads/gambar pedukuhan.jpg') }}" alt="Gambar Pedukuhan" 
                            class="w-full max-w-lg h-96 md:h-[28rem] object-cover rounded-2xl shadow-2xl transform group-hover:scale-105 transition-all duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lokasi -->
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 px-8 py-20">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-4">
                    Lokasi Padukuhan Karangmojo
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto rounded-full"></div>
            </div>
            <div class="max-w-6xl mx-auto">
                <div class="bg-white rounded-3xl p-8 shadow-2xl border border-blue-100">
                    <div class="aspect-[16/9] rounded-2xl overflow-hidden shadow-lg">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7906.834359102334!2d110.4498492699409!3d-7.745497387992018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5bb41c4e8ead%3A0xf1059d04e7d203dc!2sKarangmojo%2C%20Purwomartani%2C%20Kec.%20Kalasan%2C%20Kabupaten%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1756393822817!5m2!1sid!2sid" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen=""
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Google Map"
                            class="w-full h-full"
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk & Usaha -->
    <div id="produk" class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-white to-gray-50 px-8 py-20">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-4">
                    Produk & Usaha
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto rounded-full mb-4"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan berbagai produk unggulan dan usaha masyarakat Karangmojo</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 justify-items-center">
                @foreach ($usaha as $usaha)
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 overflow-hidden max-w-sm w-full">
                    <div class="aspect-[4/3] overflow-hidden">
                        <img src="{{ asset('uploads/usaha/' . $usaha->gambar_url) }}" alt="{{ $usaha->nama }}" 
                            class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">{{ $usaha->nama }}</h3>
                        <p class="text-gray-600 text-center leading-relaxed mb-4">{{ $usaha->deskripsi }}</p>
                        <div class="bg-blue-50 rounded-lg p-3 text-center">
                            <p class="text-sm text-blue-700 font-medium">
                                <span class="block">Kontak: {{ $usaha->nomor_hp }}</span>
                                <span class="text-blue-600">({{ $usaha->kontak }})</span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Berita & Kegiatan -->
    <div id="berita" class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-slate-50 to-blue-50 px-8 py-20">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-4">
                    Berita & Kegiatan
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto rounded-full mb-4"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Ikuti perkembangan terbaru dan kegiatan menarik di Karangmojo</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach ($berita as $berita)
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 overflow-hidden">
                    <div class="aspect-[16/9] overflow-hidden">
                        <img src="{{ asset('uploads/berita/' . $berita->gambar_url) }}" alt="{{ $berita->slug }}" 
                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-blue-600 font-medium mb-2">
                            {{ \Carbon\Carbon::parse($berita->created_at)->format('d M Y') }}
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">{{ $berita->judul }}</h3>
                        <p class="text-gray-600 leading-relaxed line-clamp-3 mb-4">
                            {{ $berita->deskripsi ?? 'Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis.' }}
                        </p>
                        <a href="{{ route('berita.detail', $berita->id) }}" 
                           class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200">
                            Baca Selengkapnya
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="/berita" class="inline-block bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-full font-semibold text-lg hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    Lihat Semua Berita
                </a>
            </div>
        </div>
    </div>

    <!-- Galeri -->
    <div id="galeri" class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-white to-gray-50 px-8 py-20">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-4">
                    Galeri
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 mx-auto rounded-full mb-4"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Momen-momen indah dan kegiatan menarik di Karangmojo</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($galeri as $galeri)
                <div class="group relative w-full h-64 bg-gray-200 rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300">
                    <img src="{{ asset('uploads/galeri/' . $galeri->gambar_url) }}" alt="{{ $galeri->nama }}" 
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute bottom-4 left-4 right-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <h3 class="font-semibold text-lg">{{ $galeri->nama }}</h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    
    <!-- Footer -->
    <div id="footer">
        <div class="w-full bottom-0 h-max">
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 text-white mt-16 py-8">
                <div class="container mx-auto text-center px-4">
                    <div class="flex flex-col items-center gap-4">
                        <h3 class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent">
                            Karangmojo
                        </h3>
                        <p class="text-gray-300 max-w-md">
                            Pedukuhan yang kaya akan budaya, tradisi, dan keindahan alam yang memukau
                        </p>
                        <div class="w-16 h-0.5 bg-gradient-to-r from-blue-400 to-indigo-400"></div>
                        <p class="text-gray-400">&copy; 2025 Karangmojo. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
