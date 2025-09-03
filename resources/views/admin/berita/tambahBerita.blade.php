@extends('admin.layout')
@section('title' , 'Tambah Berita')

@section('content')
<x-head.tinymce-config />
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('simpanBerita') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                Judul
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                id="title" type="text" name="judul" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                                Gambar
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                id="image" type="file" name="gambar_url" accept="image/*" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                                Status
                            </label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                id="status" name="status">
                                <option value="Draf">Draf</option>
                                <option value="Posting">Posting</option>
                                <option value="Arsip">Arsip</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                                Konten
                            </label>
                            <x-forms.tinymce-editor name="konten" id="rich-text-editor" />
                        </div>

                        <div class="flex items-center justify-end">
                            <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl focus:outline-none focus:shadow-outline transition-all duration-200 transform hover:scale-105 shadow-lg" 
                                type="submit">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection