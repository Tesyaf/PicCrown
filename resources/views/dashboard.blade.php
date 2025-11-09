@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen flex bg-gradient-to-br from-amber-50 to-yellow-100">
  {{-- Sidebar kiri --}}
  <aside class="hidden md:flex flex-col w-64 bg-white/30 backdrop-blur-md border-r border-white/20 p-6 space-y-6">
    <div class="text-3xl font-bold text-orange-500">📸 PicCrown</div>
    <nav class="flex flex-col space-y-3 text-gray-700 font-medium">
      <a href="{{ route('dashboard') }}" class="hover:bg-orange-100 rounded-lg px-3 py-2 flex items-center gap-3">
        <i class="fa-solid fa-house text-orange-500"></i> Beranda
      </a>
      <a href="{{ route('photos.create') }}" class="hover:bg-orange-100 rounded-lg px-3 py-2 flex items-center gap-3">
        <i class="fa-solid fa-upload text-orange-500"></i> Upload Foto
      </a>
      <a href="#" class="hover:bg-orange-100 rounded-lg px-3 py-2 flex items-center gap-3">
        <i class="fa-solid fa-compass text-orange-500"></i> Jelajahi
      </a>
      <a href="{{ route('profile.edit') }}" class="hover:bg-orange-100 rounded-lg px-3 py-2 flex items-center gap-3">
        <i class="fa-solid fa-user text-orange-500"></i> Profil
      </a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="hover:bg-orange-100 rounded-lg px-3 py-2 flex items-center gap-3 w-full text-left">
          <i class="fa-solid fa-right-from-bracket text-orange-500"></i> Logout
        </button>
      </form>
    </nav>
  </aside>

  {{-- Area utama (feed) --}}
  <main class="flex-1 p-6 overflow-y-auto">
    {{-- Search bar --}}
    <div class="flex items-center justify-between mb-6">
      <form class="w-full max-w-md">
        <input type="text" placeholder="Cari foto atau pengguna..." 
          class="w-full px-4 py-2 rounded-lg bg-white/60 border border-white/40 focus:ring-2 focus:ring-orange-300 focus:outline-none" />
      </form>
      <div class="hidden md:flex items-center gap-3">
        <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" 
             class="w-10 h-10 rounded-full border-2 border-orange-300 shadow-md" alt="User">
        <span class="text-gray-800 font-semibold">{{ Auth::user()->name }}</span>
      </div>
    </div>

    {{-- Feed foto --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse($photos as $photo)
        <div class="relative group rounded-2xl overflow-hidden shadow-lg bg-white/30 backdrop-blur-md border border-white/40">
          <img src="{{ $photo->encrypted_path }}" 
               alt="{{ $photo->title }}"
               class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
          
          {{-- Overlay --}}
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-end p-4">
            <h3 class="text-white font-semibold text-lg">{{ $photo->title }}</h3>
            <p class="text-white/80 text-sm mb-2">{{ Str::limit($photo->description, 60) }}</p>

            <div class="flex justify-between items-center text-white/90 text-sm">
              <div class="flex gap-3">
                <span class="flex items-center gap-1"><i class="fa-solid fa-star text-yellow-400"></i> {{ number_format($photo->ratings()->avg('score'), 1) ?? '0.0' }}</span>
                <span class="flex items-center gap-1"><i class="fa-solid fa-comment"></i> {{ $photo->ratings()->count() }}</span>
              </div>
              <a href="{{ route('photos.show', $photo->id) }}" class="text-orange-300 hover:text-orange-400 font-medium">Lihat</a>
            </div>
          </div>
        </div>
      @empty
        <p class="text-gray-600">Belum ada foto yang diunggah 😅</p>
      @endforelse
    </div>
  </main>

  {{-- Sidebar kanan --}}
  <aside class="hidden lg:flex flex-col w-72 p-6 border-l border-white/30 bg-white/20 backdrop-blur-md">
    <h2 class="text-lg font-semibold text-gray-800 mb-4">Top Kontributor</h2>
    <div class="space-y-4">
      @foreach($topUsers as $user)
        <div class="flex items-center gap-3">
          <img src="{{ $user->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}" class="w-10 h-10 rounded-full">
          <div>
            <p class="font-semibold text-gray-800">{{ $user->name }}</p>
            <p class="text-xs text-gray-600">{{ $user->photos_count }} foto</p>
          </div>
        </div>
      @endforeach
    </div>
  </aside>
</div>
@endsection
