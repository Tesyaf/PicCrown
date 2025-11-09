@extends('layouts.app')

@section('title', 'Edit Foto')

@section('content')
<div class="min-h-screen flex justify-center items-center bg-gradient-to-br from-yellow-50 to-orange-100 py-10 sm:py-16 px-4 sm:px-6">
    <div class="max-w-2xl w-full bg-white/70 backdrop-blur-lg shadow-xl rounded-3xl p-6 sm:p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">Edit Foto</h1>

        <form action="{{ route('photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Preview Gambar -->
            <div class="flex flex-col items-center">
                <div id="preview-container"
                    class="w-72 h-72 bg-gray-100 rounded-2xl overflow-hidden shadow-md border border-gray-200 flex justify-center items-center">
                    <img id="preview-image"
                        src="{{ $photo->preview_url }}"
                        alt="{{ $photo->title }}"
                        class="object-cover w-full h-full transition-all duration-300 hover:scale-105 rounded-2xl">
                </div>

                <!-- Input File -->
                <label for="photo"
                    class="cursor-pointer mt-4 bg-gradient-to-r from-orange-400 to-amber-500 text-white px-5 py-2 rounded-lg shadow hover:opacity-90 transition flex items-center gap-2">
                    <i class="fa-solid fa-upload"></i> Ganti Foto
                    <input type="file" name="photo" id="photo" accept="image/*" class="hidden" onchange="previewFile(event)">
                </label>

                <p class="text-sm text-gray-500 mt-2">Pilih gambar baru jika ingin mengganti.</p>
                @error('photo')<p class="text-sm text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Input Judul -->
            <div>
                <label for="title" class="block text-gray-800 font-semibold mb-2">Judul</label>
                <input type="text" id="title" name="title" value="{{ old('title', $photo->title) }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none bg-white/80">
                @error('title')<p class="text-sm text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Input Deskripsi -->
            <div>
                <label for="description" class="block text-gray-800 font-semibold mb-2">Deskripsi</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none bg-white/80 resize-none">{{ old('description', $photo->description) }}</textarea>
                @error('description')<p class="text-sm text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-between items-center mt-8">
                <a href="{{ route('photos.show', $photo->id) }}"
                    class="text-gray-800 font-semibold hover:text-orange-600 transition">
                    ← Kembali
                </a>

                <button id="save-btn" type="submit"
                    class="flex items-center justify-center gap-2 px-6 py-3 rounded-lg font-semibold text-white bg-gradient-to-r from-orange-500 to-amber-400 shadow hover:scale-[1.03] hover:opacity-95 transition-all duration-300">
                    <span id="save-text">Simpan Perubahan</span>
                    <i class="fa-solid fa-save"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewFile(event) {
        const image = document.getElementById('preview-image');
        const container = document.getElementById('preview-container');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                image.src = e.target.result;
                container.classList.add('ring-4', 'ring-amber-300', 'scale-[1.02]');
                setTimeout(() => container.classList.remove('ring-4', 'scale-[1.02]'), 400);
            };
            reader.readAsDataURL(file);
        }
    }

    // Loading spinner ketika form disubmit
    document.querySelector('form').addEventListener('submit', () => {
        document.getElementById('save-text').textContent = 'Menyimpan...';
        document.getElementById('loading-spinner').classList.remove('hidden');
    });

    // Auto-resize textarea
    const textarea = document.getElementById('description');
    if (textarea) {
        textarea.addEventListener('input', () => {
            textarea.style.height = 'auto';
            textarea.style.height = `${textarea.scrollHeight}px`;
        });
    }
</script>
@endsection