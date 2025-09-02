@vite('resources/css/app.css')

<nav class="flex justify-between items-center p-6 bg-gray-100 fixed top-0 left-0 w-full z-50 shadow">
    <div class="font-bold text-2xl">
        <a href="/">Karangmojo</a>
    </div>
    <ul class="flex gap-10 list-none m-0 p-0">
        <li>
            <a href="#profil" class="no-underline border-b-2 border-transparent transition-colors duration-200 hover:border-gray-800 text-lg" onclick="event.preventDefault(); document.getElementById('profil').scrollIntoView({ behavior: 'smooth' });">
            Profil
            </a>
        </li>
        <li>
            <a href="#produk" class="no-underline border-b-2 border-transparent transition-colors duration-200 hover:border-gray-800 text-lg" onclick="event.preventDefault(); document.getElementById('produk').scrollIntoView({ behavior: 'smooth' });">
                Produk
            </a>
        </li>
        <li>
            <a href="#berita" class="no-underline border-b-2 border-transparent transition-colors duration-200 hover:border-gray-800 text-lg" onclick="event.preventDefault(); document.getElementById('berita').scrollIntoView({ behavior: 'smooth' });">
                Berita
            </a>
        </li>
        <li>
            <a href="#galeri" class="no-underline border-b-2 border-transparent transition-colors duration-200 hover:border-gray-800 text-lg" onclick="event.preventDefault(); document.getElementById('galeri').scrollIntoView({ behavior: 'smooth' });">
                Galeri
            </a>
        </li>
    </ul>
</nav>
