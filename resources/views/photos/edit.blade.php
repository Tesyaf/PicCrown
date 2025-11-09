@extends('layouts.app')

@section('title', 'Edit Foto')

@section('content')
<div class="min-h-screen flex justify-center items-center bg-gradient-to-br from-yellow-50 to-orange-100 py-16 px-6">
  <div class="max-w-2xl w-full bg-white/70 backdrop-blur-lg shadow-xl rounded-3xl p-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">Edit Foto</h1>

    <form action="{{ route('photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      @method('PUT')

      <!-- Preview Gambar -->
      <div class="flex flex-col items-center">
        <div class="w-64 h-64 bg-gray-100 rounded-2xl overflow-hidden shadow-md border border-gray-200 mb-4">
          <img id="preview-image"
               src="{{ $photo->encrypted_path }}"
               alt="Preview Foto"
               class="object-cover w-full h-full transition-all duration-300 hover:scale-105">
        </div>

        <label for="photo" class="cursor-pointer bg-gradient-to-r from-orange-400 to-amber-500 text-white px-5 py-2 rounded-lg shadow hover:opacity-90 transition">
          Ganti Foto
          <input type="file" name="photo" id="photo" accept="image/*" class="hidden" onchange="previewFile(event)">
        </label>

        <p class="text-sm text-gray-500 mt-2">Pilih gambar baru jika ingin mengganti.</p>
      </div>

      <!-- Input Judul -->
      <div>
        <label for="title" class="block text-gray-800 font-medium mb-2">Judul</label>
        <input type="text" id="title" name="title" value="{{ old('title', $photo->title) }}"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none bg-white/80">
      </div>

      <!-- Input Deskripsi -->
      <div>
        <label for="description" class="block text-gray-800 font-medium mb-2">Deskripsi</label>
        <textarea id="description" name="description" rows="4"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none bg-white/80">{{ old('description', $photo->description) }}</textarea>
      </div>

      <!-- Tombol Aksi -->
      <div class="flex justify-between items-center mt-8">
        <a href="{{ route('photos.show', $photo->id) }}" class="text-gray-800 font-semibold hover:text-orange-600 transition">
          Kembali
        </a>
        <button type="submit"
          class="px-6 py-2 rounded-lg font-semibold text-white bg-gradient-to-r from-orange-500 to-amber-400 shadow hover:scale-[1.03] hover:opacity-95 transition-all duration-300">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</div>

<script>
function previewFile(event) {
  const image = document.getElementById('preview-image');
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = e => image.src = e.target.result;
    reader.readAsDataURL(file);
  }
}
</script>
@endsection
