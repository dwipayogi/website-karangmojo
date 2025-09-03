@props(['name', 'id' => null, 'value' => '', 'height' => 800])

<div class="mb-4">
    <textarea 
        id="{{ $id ?? $name }}" 
        name="{{ $name }}" 
        {{ $attributes->merge(['class' => 'tinymce-editor']) }}
    >{{ old($name, $value) }}</textarea>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        tinymce.init({
            selector: '#{{ $id ?? $name }}',
            height: {{ $height }},
            menubar: false,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic forecolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            branding: false,
            promotion: false
        });
    });
</script>