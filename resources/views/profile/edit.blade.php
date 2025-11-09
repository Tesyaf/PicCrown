@extends('layouts.app')

@section('title', 'Edit Profil — PicCrown')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-amber-50 via-yellow-50 to-orange-100 text-neutral-900 relative overflow-hidden">

  {{-- Background Glow --}}
  <div class="fixed inset-0 -z-10 pointer-events-none">
    <div class="absolute top-[-160px] left-[-160px] w-[560px] h-[560px] rounded-full bg-[radial-gradient(closest-side,rgba(253,224,71,.8),rgba(253,224,71,.2),transparent_70%)] blur-3xl opacity-35"></div>
    <div class="absolute bottom-[-220px] right-[-220px] w-[800px] h-[800px] rounded-full bg-[radial-gradient(closest-side,rgba(251,191,36,.9),rgba(249,115,22,.25),transparent_70%)] blur-3xl opacity-35"></div>
  </div>

  {{-- Header --}}
  <div class="max-w-4xl mx-auto px-6 pt-10 pb-6 text-center sm:text-left">
    <h1 class="text-3xl font-extrabold tracking-tight mb-2">Edit Profil</h1>
    <p class="text-neutral-600">Perbarui informasi profilmu dan tampilkan versi terbaik dirimu di PicCrown 🌟</p>
  </div>

  {{-- Form --}}
  <div class="max-w-4xl mx-auto bg-white/80 backdrop-blur-md border border-amber-100/70 rounded-3xl shadow-lg p-6 sm:p-8 mb-12">
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-8" id="edit-profile-form">
      @csrf
      @method('PATCH')

      {{-- Foto Profil --}}
      <div class="flex flex-col items-center">
        <div id="avatar-container" class="relative group w-32 h-32">
          <img id="avatar-preview"
               src="{{ $user->avatar_url ? asset('storage/'.$user->avatar_url) : asset('images/default-avatar.png') }}"
               alt="{{ $user->name }}"
               class="w-32 h-32 object-cover rounded-2xl border border-amber-100/70 shadow-sm transition-all duration-300">
          <label for="avatar"
                 class="absolute bottom-0 right-0 bg-gradient-to-r from-yellow-300 to-orange-500 text-white rounded-full p-2 cursor-pointer shadow-md hover:scale-105 transition">
            <i class="fa-solid fa-camera"></i>
          </label>
        </div>
        <input type="file" name="avatar" id="avatar" class="hidden" accept="image/*" onchange="previewAvatar(event)">
        @error('avatar') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
      </div>

      {{-- Nama & Email --}}
      <div class="grid md:grid-cols-2 gap-6">
        <div>
          <label class="block text-sm font-medium text-neutral-700 mb-1">Nama Lengkap</label>
          <input type="text" name="name" value="{{ old('name', $user->name) }}"
                 class="w-full rounded-xl border border-amber-200 bg-white/60 px-4 py-2 focus:ring-2 focus:ring-amber-300 outline-none">
          @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
          <label class="block text-sm font-medium text-neutral-700 mb-1">Email</label>
          <input type="email" name="email" value="{{ old('email', $user->email) }}"
                 class="w-full rounded-xl border border-amber-200 bg-white/60 px-4 py-2 focus:ring-2 focus:ring-amber-300 outline-none">
          @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>
      </div>

      {{-- Bio --}}
      <div>
        <label class="block text-sm font-medium text-neutral-700 mb-1">Bio</label>
        <textarea name="bio" id="bio" rows="3" placeholder="Ceritakan sedikit tentang dirimu..."
                  class="w-full rounded-xl border border-amber-200 bg-white/60 px-4 py-2 focus:ring-2 focus:ring-amber-300 outline-none resize-none">{{ old('bio', $user->bio) }}</textarea>
        @error('bio') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
      </div>

      {{-- Lokasi --}}
      <div>
        <label class="block text-sm font-medium text-neutral-700 mb-1">Lokasi</label>
        <input type="text" name="location" value="{{ old('location', $user->location) }}" placeholder="Contoh: Lampung, Indonesia"
               class="w-full rounded-xl border border-amber-200 bg-white/60 px-4 py-2 focus:ring-2 focus:ring-amber-300 outline-none">
        @error('location') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
      </div>

      {{-- Password --}}
      <div class="grid md:grid-cols-2 gap-6">
        <div>
          <label class="block text-sm font-medium text-neutral-700 mb-1">Password Baru</label>
          <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah"
                 class="w-full rounded-xl border border-amber-200 bg-white/60 px-4 py-2 focus:ring-2 focus:ring-amber-300 outline-none">
          @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
          <label class="block text-sm font-medium text-neutral-700 mb-1">Konfirmasi Password Baru</label>
          <input type="password" name="password_confirmation"
                 class="w-full rounded-xl border border-amber-200 bg-white/60 px-4 py-2 focus:ring-2 focus:ring-amber-300 outline-none">
        </div>
      </div>

      {{-- Tombol Aksi --}}
      <div class="flex items-center justify-between pt-6 border-t border-amber-100">
        <a href="{{ route('users.show', $user->id) }}"
           class="inline-flex items-center gap-2 text-amber-700 font-medium hover:underline">
          <i class="fa-solid fa-arrow-left"></i> Kembali ke Profil
        </a>

        <button id="save-btn" type="submit"
                class="flex items-center justify-center gap-2 px-6 py-2.5 rounded-xl bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white font-semibold shadow-md hover:opacity-95 transition">
          <span id="save-text">Simpan Perubahan</span>
          <svg id="loading-spinner" class="hidden animate-spin h-5 w-5 text-white"
               xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
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
  // Preview avatar saat ganti file
  function previewAvatar(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('avatar-preview');
    const container = document.getElementById('avatar-container');
    if (file) {
      const reader = new FileReader();
      reader.onload = e => {
        preview.src = e.target.result;
        container.classList.add('ring-4','ring-amber-300','scale-[1.03]');
        setTimeout(() => container.classList.remove('ring-4','scale-[1.03]'), 400);
      };
      reader.readAsDataURL(file);
    }
  }

  // Auto-resize bio
  const bio = document.getElementById('bio');
  if (bio) {
    bio.addEventListener('input', () => {
      bio.style.height = 'auto';
      bio.style.height = `${bio.scrollHeight}px`;
    });
  }

  // Loading spinner
  document.getElementById('edit-profile-form').addEventListener('submit', () => {
    document.getElementById('save-text').textContent = 'Menyimpan...';
    document.getElementById('loading-spinner').classList.remove('hidden');
  });
</script>
@endsection
