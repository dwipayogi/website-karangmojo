@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('content')
<div class="min-h-screen bg-blue-100">
    <div id="dashboard" class="pt-32 pb-16 px-6">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold mb-8 text-center">Dashboard Admin</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4">Pengguna</h3>
                    <p class="text-3xl font-bold text-blue-500">150</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4">Berita</h3>
                    <p class="text-3xl font-bold text-green-500">75</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4">Usaha</h3>
                    <p class="text-3xl font-bold text-red-500">300</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection