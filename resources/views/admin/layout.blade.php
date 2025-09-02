<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    
    <title>@yield('title')</title>
</head>
<body class="h-screen bg-gradient-to-br from-slate-50 to-blue-50">
    <!-- Mobile Header -->
    <div class="lg:hidden fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md shadow-lg border-b border-gray-200">
        <div class="flex items-center justify-between px-4 py-3">
            <h1 class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                Admin Karangmojo
            </h1>
            <button id="mobile-menu-btn" class="p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="lg:hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-40 hidden"></div>

    <nav class="flex">
        <!-- Sidebar -->
        <div id="sidebar" class="fixed top-0 left-0 w-64 h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-white flex flex-col shadow-2xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-50">
            <!-- Title -->
            <div class="p-6 border-b border-gray-700/50">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent">
                            Admin Area
                        </h1>
                        <p class="text-gray-400 text-sm mt-1">Dashboard Karangmojo</p>
                    </div>
                    <!-- Close button for mobile -->
                    <button id="close-sidebar" class="lg:hidden p-2 rounded-lg hover:bg-gray-700/50 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Menu -->
            <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-700/50 transition-all duration-200 group mobile-menu-item">
                    <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center group-hover:bg-blue-500/30 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" 
                            stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"/>
                        </svg>
                    </div>
                    <span class="font-medium">Dashboard</span>
                </a>

                <!-- Kelola Akun -->
                @if(auth()->user()->role === 'Superadmin')
                <a href="{{ route('kelolaAkun')}}"
                    class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-700/50 transition-all duration-200 group mobile-menu-item">
                    <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center group-hover:bg-green-500/30 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-5 h-5 text-green-400" fill="none" viewBox="0 0 24 24" 
                            stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                        </svg>
                    </div>
                    <span class="font-medium">Kelola Akun</span>
                </a>
                @endif

                <!-- Kelola Berita -->
                <a href="{{ route('kelolaBerita') }}"
                    class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-700/50 transition-all duration-200 group mobile-menu-item">
                    <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center group-hover:bg-purple-500/30 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24" 
                            stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                    </div>
                    <span class="font-medium">Kelola Berita</span>
                </a>

                <!-- Kelola Galeri -->
                <a href="{{ route('kelolaGaleri') }}"
                    class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-700/50 transition-all duration-200 group mobile-menu-item">
                    <div class="w-10 h-10 bg-pink-500/20 rounded-lg flex items-center justify-center group-hover:bg-pink-500/30 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-5 h-5 text-pink-400" fill="none" viewBox="0 0 24 24" 
                            stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <span class="font-medium">Kelola Galeri</span>
                </a>

                <!-- Kelola Usaha -->
                <a href="{{ route('kelolaUsaha') }}"
                    class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-700/50 transition-all duration-200 group mobile-menu-item">
                    <div class="w-10 h-10 bg-orange-500/20 rounded-lg flex items-center justify-center group-hover:bg-orange-500/30 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-5 h-5 text-orange-400" fill="none" viewBox="0 0 24 24" 
                            stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <span class="font-medium">Kelola Usaha</span>
                </a>

                <!-- Back to Website -->
                <a href="/"
                    class="flex items-center gap-3 p-3 rounded-xl hover:bg-gray-700/50 transition-all duration-200 group mobile-menu-item">
                    <div class="w-10 h-10 bg-indigo-500/20 rounded-lg flex items-center justify-center group-hover:bg-indigo-500/30 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                            class="w-5 h-5 text-indigo-400" fill="none" viewBox="0 0 24 24" 
                            stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </div>
                    <span class="font-medium">Kembali ke Website</span>
                </a>
            </nav>

            <!-- Logout Button -->
            <div class="p-4 border-t border-gray-700/50">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="flex items-center gap-3 w-full p-3 rounded-xl bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 transition-all duration-200 shadow-lg transform hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5"/>
                        </svg>
                        <span class="font-medium">Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Content Area -->
        <div class="lg:ml-64 flex-1 min-h-screen">
            <!-- Mobile padding for header -->
            <div class="lg:hidden h-16"></div>
            @yield('content')
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script>
        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        const mobileOverlay = document.getElementById('mobile-overlay');
        const closeSidebarBtn = document.getElementById('close-sidebar');
        const mobileMenuItems = document.querySelectorAll('.mobile-menu-item');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            mobileOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            mobileOverlay.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Event listeners
        mobileMenuBtn.addEventListener('click', openSidebar);
        closeSidebarBtn.addEventListener('click', closeSidebar);
        mobileOverlay.addEventListener('click', closeSidebar);

        // Close sidebar when clicking menu items on mobile
        mobileMenuItems.forEach(item => {
            item.addEventListener('click', () => {
                if (window.innerWidth < 1024) { // lg breakpoint
                    closeSidebar();
                }
            });
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                closeSidebar();
            }
        });

        // Close sidebar on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeSidebar();
            }
        });
    </script>

</body>
</html>