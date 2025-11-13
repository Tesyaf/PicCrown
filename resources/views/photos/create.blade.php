@extends('layouts.app')

@section('title', 'Upload Foto Baru')

@section('content')
<div class="min-h-screen flex justify-center items-center bg-gradient-to-br from-yellow-50 to-orange-100 py-10 sm:py-16 px-4 sm:px-6">
  <div class="max-w-2xl w-full bg-white/70 backdrop-blur-lg shadow-xl rounded-3xl p-6 sm:p-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">Upload Foto Baru</h1>

    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <!-- Preview -->
      <div class="flex flex-col items-center">
        <div id="preview-container"
             class="w-72 h-72 bg-gray-100 border-2 border-dashed border-amber-300 rounded-2xl flex flex-col justify-center items-center cursor-pointer hover:bg-amber-50 transition"
             onclick="document.getElementById('photo').click()"
             ondragover="event.preventDefault(); this.classList.add('bg-amber-50','scale-[1.02]');"
             ondragleave="this.classList.remove('bg-amber-50','scale-[1.02]');"
             ondrop="event.preventDefault(); document.getElementById('photo').files = event.dataTransfer.files; previewFile(event);">

          <svg id="camera-icon" xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 7h4l2-3h6l2 3h4a2 2 0 012 2v10a2 2 0 01-2 2H3a2 2 0 01-2-2V9a2 2 0 012-2z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 11a3 3 0 100 6 3 3 0 000-6z" />
          </svg>
          <p id="upload-text" class="mt-2 text-gray-600 text-center">Klik atau seret foto ke sini</p>
          <img id="preview-image" class="hidden object-cover w-full h-full rounded-2xl" />
        </div>
        <input type="file" name="photo" id="photo" accept="image/*" required class="hidden" onchange="previewFile(event)">
        @error('photo')<p class="text-sm text-red-500 mt-2">{{ $message }}</p>@enderror
      </div>

      <!-- Judul -->
      <div>
        <label for="title" class="block text-gray-800 font-semibold mb-2">Judul Foto</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none bg-white/80">
        @error('title')<p class="text-sm text-red-500 mt-1">{{ $message }}</p>@enderror
      </div>

      <!-- Deskripsi -->
      <div>
        <label for="description" class="block text-gray-800 font-semibold mb-2">Deskripsi (Opsional)</label>
        <textarea name="description" id="description" rows="4"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-400 outline-none bg-white/80 resize-none">{{ old('description') }}</textarea>
        @error('description')<p class="text-sm text-red-500 mt-1">{{ $message }}</p>@enderror
      </div>

      <!-- Tombol -->
      <div class="flex justify-center mt-8">
        <button id="upload-btn" type="submit"
          class="flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-orange-400 to-amber-500 text-white font-semibold rounded-lg shadow-md hover:scale-[1.03] hover:opacity-95 transform transition-all duration-300">
          <span id="upload-text-btn">Unggah Foto</span>
          <svg id="loading-spinner" class="hidden animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
               fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10"
                    stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                  d="M4 12a8 8 0 018-8v8H4z"></path>
          </svg>
        </button>
      </div>
    </form>
  </div>
</div>

<script>
function previewFile(event) {
  const file = event.target.files[0];
  const preview = document.getElementById('preview-image');
  const icon = document.getElementById('camera-icon');
  const text = document.getElementById('upload-text');
  const container = document.getElementById('preview-container');

  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      preview.src = e.target.result;
      preview.classList.remove('hidden');
      icon.classList.add('hidden');
      text.classList.add('hidden');
      container.classList.add('ring-4', 'ring-amber-300', 'scale-[1.02]');
      setTimeout(() => container.classList.remove('ring-4', 'scale-[1.02]'), 400);
    };
    reader.readAsDataURL(file);
  }
}

// Indikator loading saat submit
document.querySelector('form').addEventListener('submit', () => {
  document.getElementById('upload-text-btn').textContent = 'Mengunggah...';
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
