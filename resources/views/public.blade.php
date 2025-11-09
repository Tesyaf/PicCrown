@extends('layouts.app')

@section('title', 'Profil Publik — ' . $user->name)

@section('content')
<div x-data="{ following: {{ $isFollowing ? 'true' : 'false' }} }"
     class="min-h-screen bg-gradient-to-br from-amber-50 via-yellow-50 to-orange-100 text-neutral-900">

  {{-- Header Profil Publik --}}
  <section class="max-w-6xl mx-auto px-6 pt-12 pb-10 text-center">
    <div class="flex flex-col items-center mb-6">
      <div class="relative">
        <img src="{{ $user->profile_photo_url ?? asset('images/default-avatar.png') }}"
             alt="{{ $user->name }}"
             class="w-28 h-28 rounded-2xl object-cover border-4 border-white shadow-md">
        <div class="absolute bottom-1 right-1 w-4 h-4 bg-green-400 border-2 border-white rounded-full"></div>
      </div>

      <h1 class="text-3xl font-extrabold mt-4">{{ $user->name }}</h1>
      <p class="text-sm text-gray-600 mt-1">
        <span class="text-amber-500 font-medium">@</span>{{ $user->username ?? 'tanpa_username' }}
      </p>

      @if ($user->bio)
        <p class="text-gray-700 mt-3 max-w-lg">{{ $user->bio }}</p>
      @endif

      {{-- Tombol Follow --}}
      @auth
        @if (Auth::id() !== $user->id)
          <form x-on:submit.prevent="following = !following"
                method="POST"
                action="{{ $isFollowing ? route('users.unfollow', $user) : route('users.follow', $user) }}"
                class="mt-5">
            @csrf
            @if ($isFollowing)
              @method('DELETE')
            @endif
            <button type="submit"
                    x-text="following ? 'Mengikuti' : 'Ikuti'"
                    :class="following 
                      ? 'bg-gradient-to-r from-yellow-200 via-amber-400 to-orange-500 text-white' 
                      : 'bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-600 text-white'"
                    class="px-6 py-2.5 rounded-xl font-semibold shadow hover:scale-[1.03] transition-all duration-300">
            </button>
          </form>
        @endif
      @endauth
    </div>

    {{-- Statistik pengguna --}}
    <div class="flex justify-center flex-wrap gap-6 mt-6">
      <div class="bg-white/70 backdrop-blur-sm rounded-2xl px-5 py-3 shadow border border-amber-100/70">
        <div class="text-2xl font-extrabold">{{ $photos->count() }}</div>
        <div class="text-sm text-gray-600">Foto</div>
      </div>
      <div class="bg-white/70 backdrop-blur-sm rounded-2xl px-5 py-3 shadow border border-amber-100/70">
        <div class="text-2xl font-extrabold">{{ $user->followers()->count() }}</div>
        <div class="text-sm text-gray-600">Pengikut</div>
      </div>
      <div class="bg-white/70 backdrop-blur-sm rounded-2xl px-5 py-3 shadow border border-amber-100/70">
        <div class="text-2xl font-extrabold">{{ $user->following()->count() }}</div>
        <div class="text-sm text-gray-600">Mengikuti</div>
      </div>
    </div>
  </section>

  {{-- Galeri Foto --}}
  <section class="max-w-6xl mx-auto px-6 pb-20">
    <h2 class="text-2xl font-bold text-gray-800 border-b border-amber-200 pb-2 mb-6">
      Foto Terbaru dari {{ $user->name }}
    </h2>

    @forelse ($photos as $photo)
      <a href="{{ route('photos.show', $photo) }}"
         class="group relative block rounded-2xl overflow-hidden shadow-md hover:shadow-xl transform hover:scale-[1.02] transition duration-300">
        <img src="{{ asset('storage/' . $photo->encrypted_path) }}"
             alt="{{ $photo->title }}"
             class="w-full h-56 object-cover group-hover:brightness-90 transition duration-500">

        {{-- Overlay info --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-all flex flex-col justify-end p-4">
          <h3 class="text-white font-bold text-base mb-1 truncate">{{ $photo->title }}</h3>
          <div class="flex justify-between text-sm text-white/90">
            <span class="flex items-center gap-1">
              <i class="fa-solid fa-star text-yellow-400"></i>
              {{ number_format($photo->ratings()->avg('score') ?? 0, 1) }}
            </span>
            <span class="flex items-center gap-1">
              <i class="fa-solid fa-comment"></i>
              {{ $photo->ratings()->count() }}
            </span>
          </div>
        </div>
      </a>
    @empty
      <div class="bg-white/70 border border-amber-100 rounded-xl p-6 text-center text-gray-700">
        <p class="font-semibold text-lg mb-1">{{ $user->name }}</p>
        <p>Belum mengunggah foto publik.</p>
      </div>
    @endforelse

    {{-- Grid responsive --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 mt-8">
      {{-- Foto sudah ditampilkan di atas, bisa juga render di grid --}}
    </div>
  </section>
</div>

{{-- Alpine.js --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
