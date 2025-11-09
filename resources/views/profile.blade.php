@extends('layouts.app')

@section('title', 'Profil')

@section('content')
  {{-- Amber corner glow (matching pages sebelumnya) --}}
  <div class="pointer-events-none fixed inset-0 -z-10">
    <div class="absolute -top-40 -left-40 w-[560px] h-[560px] blur-[40px] opacity-35 bg-[radial-gradient(closest-side,rgba(253,224,71,.9),rgba(253,224,71,.3),transparent_70%)]"></div>
    <div class="absolute -bottom-56 -right-56 w-[800px] h-[800px] blur-[40px] opacity-35 bg-[radial-gradient(closest-side,rgba(251,191,36,.9),rgba(249,115,22,.25),transparent_70%)]"></div>
  </div>

  <div x-data="{ tab: 'photos' }" class="mx-auto max-w-6xl px-6 py-8">
    {{-- Header profil --}}
    <section class="pt-2 pb-6">
      <div class="flex flex-col md:flex-row md:items-center gap-6">
        <img
          src="{{ $user->avatar ?? asset('images/avatar-placeholder.jpg') }}"
          alt="Avatar"
          class="h-28 w-28 rounded-2xl object-cover border border-amber-100/70"
        >

        <div class="flex-1">
          <div class="flex items-center gap-2 flex-wrap">
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
              {{ $user->name ?? 'Nama Pengguna' }}
            </h1>
            @isset($user->badge)
              <span class="inline-flex items-center gap-1 rounded-full border border-amber-200 bg-amber-50 px-2 py-1 text-xs text-amber-700">
                {{-- crown icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M5 19h14l-1-9-4 3-3-6-3 6-4-3-1 9z"/>
                </svg>
                {{ $user->badge }}
              </span>
            @endisset
          </div>

          <p class="text-neutral-600 mt-2">
            {{ $user->bio ?? 'Fotografer hobi • Suka street & candid • Bergabung sejak 2025.' }}
          </p>

          <div class="mt-2 flex flex-wrap items-center gap-2 text-sm text-neutral-600">
            <span class="inline-flex items-center gap-1">
              {{-- star icon --}}
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
              </svg>
              Skor rata-rata: {{ $avgScore ?? '4.7' }}
            </span>
            <span class="text-neutral-400">•</span>
            <span>Peringkat komunitas: {{ $rank ?? '#42' }}</span>
          </div>
        </div>

        {{-- actions --}}
        <div class="flex items-center gap-3">
          @auth
            @if(auth()->id() === ($user->id ?? null))
              <a href="{{ route('profile.edit') }}"
                 class="inline-flex items-center gap-2 rounded-2xl px-5 py-2.5 font-semibold border border-amber-300 text-amber-700 hover:bg-amber-50 transition">
                {{-- edit icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4 12.5-12.5z"/>
                </svg>
                Edit Profil
              </a>
              <a href="{{ route('photos.create') }}"
                 class="inline-flex items-center gap-2 rounded-2xl px-5 py-2.5 font-semibold bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)] hover:opacity-95 transition">
                {{-- upload icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                  <path d="M7 10l5-5 5 5"/>
                  <path d="M12 15V5"/>
                </svg>
                Unggah Foto
              </a>
            @endif
          @endauth
        </div>
      </div>
    </section>

    {{-- Tab --}}
    <div class="pt-2 pb-6 flex items-center gap-2">
      <button
        @click="tab='photos'"
        :class="tab==='photos'
          ? 'bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)]'
          : 'border border-amber-200 text-amber-700 hover:bg-amber-50'"
        class="px-4 py-2 rounded-xl text-sm font-semibold transition">
        Foto
      </button>
      <button
        @click="tab='likes'"
        :class="tab==='likes'
          ? 'bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)]'
          : 'border border-amber-200 text-amber-700 hover:bg-amber-50'"
        class="px-4 py-2 rounded-xl text-sm font-semibold transition">
        Disukai
      </button>
      <button
        @click="tab='about'"
        :class="tab==='about'
          ? 'bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)]'
          : 'border border-amber-200 text-amber-700 hover:bg-amber-50'"
        class="px-4 py-2 rounded-xl text-sm font-semibold transition">
        Tentang
      </button>
    </div>

    {{-- Grid Foto --}}
    <div x-show="tab==='photos'" x-cloak class="pb-12">
      @php
        $photos = $photos ?? collect(range(1,12))->map(fn($i)=>['title'=>"Judul Foto $i",'score'=>4 + ($i % 5)/10]);
      @endphp

      <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($photos as $p)
          <a href="#"
             class="group relative overflow-hidden rounded-2xl border border-amber-100/70 bg-gradient-to-br from-yellow-100 via-amber-100 to-orange-100">
            <div class="aspect-[4/3]">
              {{-- contoh gambar fit: object-cover agar penuh & proporsional --}}
              <img src="{{ $p['url'] ?? 'https://images.unsplash.com/photo-1471341971476-ae15ff5dd4ea?q=80&w=800&auto=format&fit=crop' }}"
                   alt="{{ $p['title'] }}"
                   class="w-full h-full object-cover">
            </div>
            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition bg-black/10"></div>
            <div class="absolute bottom-2 left-2 right-2 flex items-center justify-between text-xs text-white/90 drop-shadow">
              <span class="truncate">{{ $p['title'] }}</span>
              <span class="inline-flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                </svg>
                {{ number_format($p['score'],1) }}
              </span>
            </div>
          </a>
        @endforeach
      </div>
    </div>

    {{-- Disukai --}}
    <div x-show="tab==='likes'" x-cloak class="pb-12">
      <div class="rounded-2xl border border-amber-100/70 bg-white/70 backdrop-blur-sm p-10 text-center">
        <div class="mx-auto mb-3 inline-flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-yellow-300 via-amber-500 to-orange-500 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
          </svg>
        </div>
        <h3 class="text-xl font-extrabold mb-1">Foto yang Kamu Sukai</h3>
        <p class="text-neutral-600">Saat kamu menyukai foto, foto-foto favoritmu akan tampil di sini.</p>
      </div>
    </div>

    {{-- Tentang --}}
    <div x-show="tab==='about'" x-cloak class="pb-12">
      <div class="rounded-2xl border border-amber-100/70 bg-white/80 p-6">
        <h3 class="text-lg font-semibold mb-3">Tentang</h3>
        <p class="text-neutral-700 mb-4">
          {{ $user->about ?? 'Suka hunting street malam, editing ringan di mobile, dan challenge tema mingguan. Terbuka untuk kolaborasi.' }}
        </p>

        {{-- rows --}}
        @php
          $rows = [
            'Lokasi' => $user->location ?? 'Bandar Lampung',
            'Bidang utama' => $user->main_field ?? 'Street, Candid',
            'Bergabung' => $user->joined_at?->format('M Y') ?? 'Mei 2025',
            'Website' => $user->website ?? 'piccrown.id/@username',
          ];
        @endphp
        @foreach ($rows as $label => $val)
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1 py-3 border-b last:border-none border-amber-100/70">
            <div class="text-sm text-neutral-500">{{ $label }}</div>
            <div class="font-medium">{{ $val }}</div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection