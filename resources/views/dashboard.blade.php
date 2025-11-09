@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen flex bg-gradient-to-br from-amber-50 via-yellow-50 to-orange-100">

  {{-- Sidebar kiri --}}
  @include('partials.sidebar')

  {{-- Feed utama --}}
  <main class="flex-1 p-6 overflow-y-auto">
    {{-- Search Bar --}}
    <div class="flex justify-between items-center mb-8">
      <form action="{{ route('dashboard') }}" method="GET" class="relative w-full max-w-lg">
        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari foto..."
          class="w-full pl-11 pr-4 py-2 rounded-xl bg-white/80 border border-white/40 
                focus:ring-2 focus:ring-orange-400 focus:outline-none 
                placeholder-gray-500 shadow-sm transition-all duration-200" />
      </form>

      <div class="hidden md:flex items-center gap-3">
        <a href="{{ route('profile.public', Auth::user()->id) }}" class="flex items-center gap-2">
          <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
              class="w-10 h-10 rounded-full border-2 border-orange-300 shadow" alt="User">
          <span class="font-semibold text-gray-800">{{ Auth::user()->name }}</span>
        </a>
      </div>
    </div>

    {{-- Feed foto --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse($photos as $photo)
        <div class="group relative rounded-3xl overflow-hidden bg-white/40 backdrop-blur-xl border border-white/30 shadow-lg transition-all hover:shadow-2xl">
          <a href="{{ route('photos.show', $photo->id) }}">
            <img src="{{ $photo->encrypted_path }}" alt="{{ $photo->title }}"
                 class="w-full h-72 object-cover transition-transform duration-500 group-hover:scale-105">
          </a>

          {{-- Overlay --}}
          <div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-all p-5">
            {{-- Info pengguna --}}
            <div class="flex items-center gap-2 mb-3">
              <a href="{{ route('profile.public', $photo->user->id) }}" class="flex items-center gap-2 group/user hover:underline">
                <img src="{{ $photo->user->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($photo->user->name) }}"
                     class="w-8 h-8 rounded-full border border-orange-300 group-hover/user:scale-105 transition-transform">
                <span class="text-white font-semibold group-hover/user:text-orange-300">{{ $photo->user->name }}</span>
              </a>
            </div>

            {{-- Judul & Deskripsi --}}
            <h3 class="text-white font-bold text-lg mb-1">{{ $photo->title }}</h3>
            <p class="text-white/90 text-sm mb-3">{{ Str::limit($photo->description, 50) }}</p>

            {{-- Statistik foto --}}
            <div class="flex justify-between items-center text-white/80 text-sm">
              <div class="flex items-center gap-3">
                <span class="flex items-center gap-1"><i class="fa-solid fa-star text-yellow-400"></i> {{ number_format($photo->ratings()->avg('score'), 1) ?? '0.0' }}</span>
                <span class="flex items-center gap-1"><i class="fa-solid fa-comment"></i> {{ $photo->ratings()->count() }}</span>
              </div>
              <a href="{{ route('photos.show', $photo->id) }}" class="text-orange-300 hover:text-orange-400 font-semibold">Lihat</a>
            </div>
          </div>
        </div>
      @empty
        <p class="text-gray-600 text-center col-span-3">Belum ada foto yang diunggah 😅</p>
      @endforelse
    </div>
  </main>

  {{-- Sidebar kanan --}}
  <aside class="hidden lg:flex flex-col w-72 p-6 border-l border-white/30 bg-white/20 backdrop-blur-lg">
    <h2 class="text-lg font-semibold text-gray-900 mb-4">Top Kontributor</h2>
    <div class="space-y-4">
      @foreach($topUsers as $user)
        <a href="{{ route('profile.public', $user->id) }}" class="flex items-center gap-3 bg-white/40 p-2 rounded-xl hover:shadow-md transition">
          <img src="{{ $user->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}" class="w-10 h-10 rounded-full border border-amber-300">
          <div>
            <p class="font-semibold text-gray-900">{{ $user->name }}</p>
            <p class="text-xs text-gray-600">{{ $user->photos_count }} foto</p>
          </div>
        </a>
      @endforeach
    </div>
  </aside>
</div>
@endsection