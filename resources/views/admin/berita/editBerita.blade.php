@extends('admin.layout')
@section('title', 'Edit Berita')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-3xl font-bold mb-4">Edit Berita</h1>
                <form action="{{ route('updateBerita', $berita->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            Judul
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="title" type="text" name="judul" value="{{ $berita->judul }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                            Gambar
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="image" type="file" name="gambar_url" accept="image/*">
                        @if($berita->gambar_url)
                            <img src="{{ asset('uploads/berita/' . $berita->gambar_url) }}" alt="Gambar Berita" class="w-full h-auto mt-4 rounded-lg">
                        @endif
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                            Status
                        </label>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="status" name="status">
                            <option value="Draf" {{ $berita->status == 'Draf' ? 'selected' : '' }}>Draf</option>
                            <option value="Posting" {{ $berita->status == 'Posting' ? 'selected' : '' }}>Posting</option>
                            <option value="Arsip" {{ $berita->status == 'Arsip' ? 'selected' : '' }}>Arsip</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                            Konten
                        </label>
                        <textarea id="markdown-editor" name="konten_markdown">{{ $berita->konten_markdown }}</textarea>
                    </div>
                    <div class="flex items-center justify-end">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl focus:outline-none focus:shadow-outline transition-all duration-200 transform hover:scale-105 shadow-lg" 
                            type="submit">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
<script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
<script>
    const easyMDE = new EasyMDE({
        element: document.getElementById('markdown-editor'),
        spellChecker: false,
        autosave: { 
            enabled: true, 
            uniqueId: "artikel_md_edit", 
            delay: 1000 
        },
        placeholder: "Tulis konten berita di sini...",
        autofocus: true,
        uploadImage: false,
        previewRender: function(plainText) {
            return marked.parse(plainText);
        },
        toolbar: [
            "bold", "italic", "heading", "|",
            "quote", "unordered-list", "ordered-list", "|",
            "link", "image", "|",
            "preview", "side-by-side", "fullscreen", "|",
            "guide"
        ],
        status: ["autosave", "lines", "words", "cursor"],
        renderingConfig: {
            singleLineBreaks: false,
            codeSyntaxHighlighting: true,
        }
    });

    // Saat form disubmit → sinkronkan editor ke textarea
    document.querySelector("form").addEventListener("submit", function() {
        document.querySelector("#markdown-editor").value = easyMDE.value();
    });
</script>
@endsection