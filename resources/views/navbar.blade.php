@vite('resources/css/app.css')

<nav class="fixed top-0 left-0 w-full z-50 transition-all duration-300" id="navbar">
    <div class="bg-white/95 backdrop-blur-md shadow-lg border-b border-white/20">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="font-bold text-2xl">
                    <a href="/" class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent hover:from-blue-700 hover:to-indigo-700 transition-all duration-300">
                        Karangmojo
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <ul class="hidden md:flex gap-8 list-none m-0 p-0">
                    <li>
                        <a href="#profil" 
                           class="relative no-underline text-gray-700 hover:text-blue-600 text-lg font-medium transition-all duration-300 group" 
                           onclick="event.preventDefault(); document.getElementById('profil').scrollIntoView({ behavior: 'smooth' });">
                            Profil
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-indigo-600 group-hover:w-full transition-all duration-300"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#produk" 
                           class="relative no-underline text-gray-700 hover:text-blue-600 text-lg font-medium transition-all duration-300 group" 
                           onclick="event.preventDefault(); document.getElementById('produk').scrollIntoView({ behavior: 'smooth' });">
                            Produk
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-indigo-600 group-hover:w-full transition-all duration-300"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#berita" 
                           class="relative no-underline text-gray-700 hover:text-blue-600 text-lg font-medium transition-all duration-300 group" 
                           onclick="event.preventDefault(); document.getElementById('berita').scrollIntoView({ behavior: 'smooth' });">
                            Berita
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-indigo-600 group-hover:w-full transition-all duration-300"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#galeri" 
                           class="relative no-underline text-gray-700 hover:text-blue-600 text-lg font-medium transition-all duration-300 group" 
                           onclick="event.preventDefault(); document.getElementById('galeri').scrollIntoView({ behavior: 'smooth' });">
                            Galeri
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-indigo-600 group-hover:w-full transition-all duration-300"></span>
                        </a>
                    </li>
                </ul>

                <!-- Mobile Menu Button -->
                <button class="md:hidden flex flex-col gap-1 p-2" id="mobile-menu-btn">
                    <span class="w-6 h-0.5 bg-gray-700 transition-all duration-300" id="line1"></span>
                    <span class="w-6 h-0.5 bg-gray-700 transition-all duration-300" id="line2"></span>
                    <span class="w-6 h-0.5 bg-gray-700 transition-all duration-300" id="line3"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden bg-white/95 backdrop-blur-md shadow-lg border-b border-white/20 hidden" id="mobile-menu">
        <div class="container mx-auto px-6 py-4">
            <ul class="flex flex-col gap-4 list-none m-0 p-0">
                <li>
                    <a href="#profil" 
                       class="block no-underline text-gray-700 hover:text-blue-600 text-lg font-medium transition-all duration-300 py-2 border-l-4 border-transparent hover:border-blue-600 pl-4" 
                       onclick="event.preventDefault(); document.getElementById('profil').scrollIntoView({ behavior: 'smooth' }); toggleMobileMenu();">
                        Profil
                    </a>
                </li>
                <li>
                    <a href="#produk" 
                       class="block no-underline text-gray-700 hover:text-blue-600 text-lg font-medium transition-all duration-300 py-2 border-l-4 border-transparent hover:border-blue-600 pl-4" 
                       onclick="event.preventDefault(); document.getElementById('produk').scrollIntoView({ behavior: 'smooth' }); toggleMobileMenu();">
                        Produk
                    </a>
                </li>
                <li>
                    <a href="#berita" 
                       class="block no-underline text-gray-700 hover:text-blue-600 text-lg font-medium transition-all duration-300 py-2 border-l-4 border-transparent hover:border-blue-600 pl-4" 
                       onclick="event.preventDefault(); document.getElementById('berita').scrollIntoView({ behavior: 'smooth' }); toggleMobileMenu();">
                        Berita
                    </a>
                </li>
                <li>
                    <a href="#galeri" 
                       class="block no-underline text-gray-700 hover:text-blue-600 text-lg font-medium transition-all duration-300 py-2 border-l-4 border-transparent hover:border-blue-600 pl-4" 
                       onclick="event.preventDefault(); document.getElementById('galeri').scrollIntoView({ behavior: 'smooth' }); toggleMobileMenu();">
                        Galeri
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        const line1 = document.getElementById('line1');
        const line2 = document.getElementById('line2');
        const line3 = document.getElementById('line3');
        
        mobileMenu.classList.toggle('hidden');
        
        // Animate hamburger to X
        if (mobileMenu.classList.contains('hidden')) {
            line1.style.transform = 'rotate(0deg)';
            line2.style.opacity = '1';
            line3.style.transform = 'rotate(0deg)';
        } else {
            line1.style.transform = 'rotate(45deg) translateY(6px)';
            line2.style.opacity = '0';
            line3.style.transform = 'rotate(-45deg) translateY(-6px)';
        }
    }

    document.getElementById('mobile-menu-btn').addEventListener('click', toggleMobileMenu);

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        const navbarContent = navbar.querySelector('div');
        
        if (window.scrollY > 50) {
            navbarContent.classList.add('shadow-xl');
            navbarContent.classList.remove('shadow-lg');
        } else {
            navbarContent.classList.add('shadow-lg');
            navbarContent.classList.remove('shadow-xl');
        }
    });
</script>
