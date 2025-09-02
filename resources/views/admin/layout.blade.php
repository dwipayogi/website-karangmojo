<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    
    <title>@yield('title')</title>
</head>
<body class="h-screen">
    <nav class="flex">
        <!-- Sidebar -->
        <div class="fixed top-0 left-0 w-64 h-screen bg-gray-900 text-white flex flex-col">
            <!-- Title -->
            <div class="p-6 text-2xl font-bold border-b border-gray-700">
            Admin Area
            </div>

            <!-- Menu -->
            <nav class="flex-1 p-4 space-y-3">
            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-800 transition">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    class="w-6 h-6" fill="none" viewBox="0 0 24 24" 
                    stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"/>
                </svg>
                <span>Dashboard</span>
            </a>

            <!-- Kelola Akun -->
            @if(auth()->user()->role === 'Superadmin')
            <a href="{{ route('kelolaAkun')}}"
                class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-800 transition">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    class="w-6 h-6" fill="none" viewBox="0 0 24 24" 
                    stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A9.005 9.005 0 0112 15a9.005 9.005 0 016.879 2.804M15 11a3 3 0 11-6 0 
                        3 3 0 016 0z"/>
                </svg>
                <span>Kelola Akun</span>
            </a>
            @endif

            <!-- Kelola Berita -->
            <a href="{{ route('kelolaBerita') }}"
                class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-800 transition">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    class="w-6 h-6" fill="none" viewBox="0 0 24 24" 
                    stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21H5a2 2 0 01-2-2V7a2 2 0 
                        012-2h3l2-2h4l2 2h3a2 2 0 
                        012 2v12a2 2 0 01-2 2z"/>
                </svg>
                <span>Kelola Berita</span>
            </a>

            <!-- Kelola Usaha -->
            <a href="{{ route('kelolaUsaha') }}"
                class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-800 transition">
                <svg xmlns="http://www.w3.org/2000/svg" 
                    class="w-6 h-6" fill="none" viewBox="0 0 24 24" 
                    stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7h18M3 10h18M7 21h10M12 3v18"/>
                </svg>
                <span>Kelola Usaha</span>
            </a>

            <!-- Tombol Logout -->
            <div class="p-4 border-t border-gray-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="flex items-center gap-3 w-full p-2 rounded-lg bg-red-600 hover:bg-red-700 transition">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5"/>
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
            </nav>
        </div>

        <!-- Content Area -->
        <div class="ml-64 flex-1">
            @yield('content')
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>
</html>