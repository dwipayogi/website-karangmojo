@extends('template')
@section('title', 'Karangmojo')

@include('navbar')

@section('content')

<div>
    <!-- Selamat Datang -->
    <div class="min-h-screen flex items-center justify-center bg-blue-100">
        <div class="text-center flex flex-col gap-4">
            <p class="text-4xl font-bold">Selamat Datang di</p>
            <h1 class="lg:text-9xl font-bold sm:text-7xl">Karangmojo</h1>
        </div>
    </div>

    <!-- Profil Pedukuhan -->
    <div id="profil" class="min-h-screen flex lg:flex-row items-center justify-center bg-white gap-16 px-8 py-20">
        <div class="flex flex-col gap-6 max-w-2xl sm:flex-2">
            <h2 class="text-4xl md:text-5xl font-bold text-center lg:text-left">Profil Pedukuhan</h2>
            <p class="text-lg md:text-xl mx-auto lg:mx-0 text-left lg:text-left leading-relaxed">
                Karangmojo adalah sebuah pedukuhan yang terletak di wilayah yang kaya akan budaya dan tradisi.<br>
                Pedukuhan ini dikenal dengan keindahan alamnya yang memukau, serta masyarakatnya yang ramah dan 
                menjunjung tinggi nilai-nilai gotong royong.<br>
                Di Karangmojo, Anda dapat menemukan berbagai kegiatan budaya, kerajinan tangan, dan kuliner khas yang mencerminkan kekayaan warisan lokal.<br>
                Dengan lingkungan yang asri dan udara yang sejuk, Karangmojo menjadi tempat yang ideal untuk berwisata maupun menetap. 
                Setiap sudut pedukuhan menawarkan pengalaman unik yang tak terlupakan bagi setiap pengunjung.
            </p>
        </div>
        <div class="w-full max-w-lg flex justify-center mt-8 lg:mt-0">
            <img src="{{ asset('uploads/gambar pedukuhan.jpg') }}" alt="Gambar Pedukuhan" class="w-full h-96 md:h-[28rem] object-cover rounded-xl shadow-2xl">
        </div>
    </div>

    <!-- Lokasi -->
    <div class="min-h-screen items-center justify-center bg-blue-50 gap-16 px-8 py-20">
        <div class="w-full justify-center items-center">
            <div class="flex justify-center mb-8">
                <h2 class="text-4xl md:text-5xl font-bold text-center lg:text-left">Lokasi Padukuhan Karangmojo</h2>
            </div>
            <div class="aspect-[16/9] rounded-2xl overflow-hidden shadow-lg border border-blue-200 p-4">
            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7906.834359102334!2d110.4498492699409!3d-7.745497387992018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5bb41c4e8ead%3A0xf1059d04e7d203dc!2sKarangmojo%2C%20Purwomartani%2C%20Kec.%20Kalasan%2C%20Kabupaten%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1756393822817!5m2!1sid!2sid" width="600" height="450" style="border:0;" 
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

    <!-- Produk & Usaha -->
    <div id="produk">
        <div class="min-h-screen flex flex-col items-center justify-center bg-white gap-16 px-8 py-20">
            <h2 class="text-4xl md:text-5xl font-bold text-center lg:text-left">Produk & Usaha</h2>
            <div class="flex gap-10 flex-wrap justify-center">
                @foreach ($usaha as $usaha)
                <div class="w-64 h-64 bg-gray-200 rounded-lg shadow-lg flex flex-col items-center justify-center min-h-max p-4 gap-2.5 min-w-md">
                    <div class="wfull flex justify-center">
                        <img src="{{ asset('uploads/usaha/' . $usaha->gambar_url) }}" alt="{{ $usaha->nama }}" class="object-fill w-full h-full rounded-2xl mb-4">
                    </div>
                    <h1 class="text-2xl font-bold text-center">{{ $usaha->nama }}</h1>
                    <p class="text-center">{{ $usaha->deskripsi }}.</p>

                    <p>Kontak : {{ $usaha->nomor_hp }} ({{$usaha->kontak}})</p>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>

    <!-- Berita & Kegiatan -->
    <div id="berita">
        <div class="min-h-screen flex flex-col items-center justify-center bg-blue-50 gap-16 px-8 py-20">
            <h2 class="text-4xl md:text-5xl font-bold text-center lg:text-left">Berita & Kegiatan</h2>
            <div class="flex gap-10 flex-wrap justify-center">
                @foreach ($berita as $berita)
                <div class="w-128 h-128 bg-gray-200 rounded-lg shadow-lg flex flex-col min-h-max p-4 gap-2.5">
                    <img src="{{ asset('uploads/berita/' . $berita->gambar_url) }}" alt="{{ $berita->slug }}" class="w-full object-cover rounded-2xl mb-4">
                    <p>Tanggal</p>
                    <h1 class="text-2xl font-bold">{{ $berita->judul }}</h1>
                    <p class="line-clamp-3">Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
                        Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
                        Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
                        Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
                        Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.</p>   
                    <a href="{{ route('berita.detail', $berita->id) }}" class="mt-4 inline-block text-blue-500 hover:underline">Baca Selengkapnya</a>
                </div>
                @endforeach
            </div>
            <div>
                <a href="/berita">
                    <button class="mt-4 inline-block text-white bg-blue-500 hover:bg-blue-600 font-semibold py-2 px-4 rounded">
                        Lihat Semua Berita
                    </button>
                </a>
            </div>
    </div>

    <!-- Galeri -->
    <div>
        <div id="galeri" class="min-h-max flex flex-col items-center justify-center bg-white gap-16 px-8 py-20">
            <h2 class="text-4xl md:text-5xl font-bold text-center lg:text-left">Galeri</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($galeri as $galeri)
                <div class="w-full h-64 bg-gray-200 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset('uploads/galeri/' . $galeri->gambar_url) }}" alt="{{ $galeri->nama }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                @endforeach
        </div>
    </div>

    
    <!-- Footer -->
    <div id="footer">
        <div class="w-full bottom-0 h-max">
            <div class="w-screen bg-gray-800 text-white mt-12 py-4">
                <div class="mx-auto text-center">
                    <p>&copy; 2025 Karangmojo. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
    
</div>
