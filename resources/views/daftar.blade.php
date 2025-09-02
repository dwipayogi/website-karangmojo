@extends('template')

@section('title', 'Daftar - Karangmojo')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 relative overflow-hidden">

        <div class="relative z-10 w-full max-w-md mx-4">
            <!-- Registration Card -->
            <div class="bg-white/95 backdrop-blur-md p-8 rounded-3xl shadow-2xl border border-white/20">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-600 to-teal-600 rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold bg-gradient-to-r from-green-600 to-teal-600 bg-clip-text text-transparent mb-2">
                        Bergabung dengan Kami
                    </h2>
                    <p class="text-gray-600">Daftar untuk mendapatkan akses ke sistem Karangmojo</p>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <ul class="text-sm text-red-700 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('daftar.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label for="username" class="block text-sm font-semibold text-gray-700">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input type="text" id="username" name="username" required 
                                   value="{{ old('username') }}"
                                   class="block w-full pl-10 pr-3 py-3 border {{ $errors->has('username') ? 'border-red-300' : 'border-gray-200' }} rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Pilih username unik">
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" required 
                                   class="block w-full pl-10 pr-3 py-3 border {{ $errors->has('password') ? 'border-red-300' : 'border-gray-200' }} rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Buat password yang kuat">
                        </div>
                    </div>
                    
                    <div class="pt-4">
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-green-600 to-teal-600 text-white py-3 px-4 rounded-xl font-semibold text-lg hover:from-green-700 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transform hover:scale-105 transition-all duration-200 shadow-lg">
                            Daftar Sekarang
                        </button>
                    </div>
                </form>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="text-center">
                        <span class="text-gray-600">Sudah punya akun?</span>
                        <a href="/login" class="ml-1 text-green-600 hover:text-green-800 font-semibold hover:underline transition-colors duration-200">
                            Masuk di sini
                        </a>
                    </div>
                </div>
            </div>

            <!-- Back to Home Link -->
            <div class="text-center mt-6">
                <a href="/" class="inline-flex items-center text-white/80 hover:text-white font-medium transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
