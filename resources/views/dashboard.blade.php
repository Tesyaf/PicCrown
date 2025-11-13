@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="grid gap-8">
  {{-- Search bar --}}
  <div class="flex justify-between items-center">
    <form action="{{ route('dashboard') }}" method="GET" class="relative w-full max-w-2xl lg:max-w-3xl">
      <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
      <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari foto..."
        class="w-full pl-11 pr-4 py-2 rounded-xl bg-white/80 border border-white/40 
              focus:ring-2 focus:ring-orange-400 focus:outline-none 
              placeholder-gray-500 shadow-sm transition-all duration-200" />
    </form>

    {{-- Profil kanan atas --}}
    <a href="{{ route('profile.public', Auth::user()->id) }}" class="hidden md:flex items-center gap-3">
      <img
        src="{{ Auth::user()->avatar_url ? asset('storage/'.Auth::user()->avatar_url) : asset('images/default-avatar.png') }}"
        class="w-10 h-10 rounded-full border-2 border-orange-300 shadow"
        alt="{{ $photo->title ?? 'Foto tidak ditemukan' }}"
        loading="lazy"
        decoding="async"
        onerror="this.onerror=null;this.src=@json(asset('images/fallback-photo.png'));">
      <span class="font-semibold text-gray-800">{{ Auth::user()->name }}</span>
    </a>
  </div>

  {{-- Galeri foto --}}
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
    @forelse($photos as $photo)
    <div
      x-data="{ isLoaded: false }"
      class="group relative rounded-3xl overflow-hidden bg-white/50 backdrop-blur-md border border-white/30 shadow-md hover:shadow-xl transition-all">
      {{-- Skeleton shimmer --}}
      <div x-show="!isLoaded" class="absolute inset-0 bg-gradient-to-r from-gray-200 via-gray-100 to-gray-200 animate-pulse"></div>

      {{-- Foto preview --}}
      <img
        id="preview-image"
        src="{{ $photo->preview_url }}"
        alt="{{ $photo->title ?? 'Foto tidak ditemukan' }}"
        @load="isLoaded = true"
        class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105"
        loading="lazy"
        decoding="async"
        onload="this.previousElementSibling.remove(); this.classList.remove('opacity-0');"
        onerror="this.onerror=null;this.src=@json(asset('images/fallback-photo.png'));">

      {{-- Overlay judul --}}
      <div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-all p-5">
        <h3 class="text-white font-bold text-lg mb-1">{{ $photo->title }}</h3>
        <p class="text-white/90 text-sm mb-3">{{ Str::limit($photo->description, 50) }}</p>
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
  @if ($photos->hasPages())
  <div class="mt-10 flex justify-center">
    <div class="flex items-center gap-2 px-5 py-3 text-sm font-medium">

      {{-- Tombol Previous --}}
      @if ($photos->onFirstPage())
      <span class="flex items-center justify-center w-9 h-9 rounded-xl text-gray-400 bg-white/40 border border-white/30 cursor-not-allowed">
        <i class="fa-regular fa-circle-left"></i>
      </span>
      @else
      <a href="{{ $photos->previousPageUrl() }}"
        class="flex items-center justify-center w-9 h-9 rounded-xl bg-gradient-to-tr from-amber-400 to-orange-400 text-white shadow hover:from-amber-500 hover:to-orange-500 transition-all duration-200">
        <i class="fa-solid fa-circle-left"></i>
      </a>
      @endif

      {{-- Nomor Halaman --}}
      @foreach ($photos->getUrlRange(1, $photos->lastPage()) as $page => $url)
      @if ($page == $photos->currentPage())
      <span class="w-9 h-9 flex items-center justify-center rounded-xl bg-gradient-to-tr from-amber-400 to-orange-400 text-white shadow font-semibold">
        {{ $page }}
      </span>
      @elseif ($page == 1 || $page == $photos->lastPage() || abs($page - $photos->currentPage()) <= 2)
        <a href="{{ $url }}"
        class="w-9 h-9 flex items-center justify-center rounded-xl bg-white/60 border border-white/30 text-gray-700 hover:bg-amber-100 transition">
        {{ $page }}
        </a>
        @elseif ($page == 2 && $photos->currentPage() > 4)
        <span class="px-2 text-gray-400">...</span>
        @elseif ($page == $photos->lastPage() - 1 && $photos->currentPage() < $photos->lastPage() - 3)
          <span class="px-2 text-gray-400">...</span>
          @endif
          @endforeach

          {{-- Tombol Next --}}
          @if ($photos->hasMorePages())
          <a href="{{ $photos->nextPageUrl() }}"
            class="flex items-center justify-center w-9 h-9 rounded-xl bg-gradient-to-tr from-amber-400 to-orange-400 text-white shadow hover:from-amber-500 hover:to-orange-500 transition-all duration-200">
            <i class="fa-solid fa-circle-right"></i>
          </a>
          @else
          <span class="flex items-center justify-center w-9 h-9 rounded-xl text-gray-400 bg-white/40 border border-white/30 cursor-not-allowed">
            <i class="fa-regular fa-circle-right"></i>
          </span>
          @endif

    </div>
  </div>
  @endif
  @endsection

  @section('sidebar-right')
  @foreach($topUsers as $user)
  <a href="{{ route('profile.public', $user->id) }}" class="flex items-center gap-3 bg-white/40 p-2 rounded-xl hover:shadow-md transition">
    <img
      src="{{ $user->avatar_url ? asset('storage/'.$user->avatar_url) : asset('images/default-avatar.png') }}"
      class="w-10 h-10 rounded-full border border-amber-300"
      alt="{{ $user->name ?? 'Foto tidak ditemukan' }}"
      loading="lazy"
      decoding="async"
      onerror=" this.onerror=null;this.src=@json(asset('images/fallback-photo.png'));">
    <div>
      <p class="font-semibold text-gray-900">{{ $user->name }}</p>
      <p class="text-xs text-gray-600">{{ $user->photos_count }} foto</p>
    </div>
  </a>
  @endforeach
  @endsection