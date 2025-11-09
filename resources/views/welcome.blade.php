@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
  {{-- Glow background --}}
  <div class="pointer-events-none fixed inset-0 -z-10">
    <div class="absolute -top-40 -left-40 w-[560px] h-[560px] blur-[40px] opacity-35 bg-[radial-gradient(closest-side,rgba(253,224,71,.9),rgba(253,224,71,.3),transparent_70%)]"></div>
    <div class="absolute -bottom-56 -right-56 w-[800px] h-[800px] blur-[40px] opacity-35 bg-[radial-gradient(closest-side,rgba(251,191,36,.9),rgba(249,115,22,.25),transparent_70%)]"></div>
  </div>

  {{-- HERO --}}
  <section class="relative overflow-hidden">
    <div class="mx-auto max-w-6xl px-6 py-20 lg:py-28 text-center">
      <div class="flex flex-col items-center gap-5">
        <img src="/images/PicCrownLogo.svg" alt="PicCrown" class="h-20 w-auto text-amber-500">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight">Rate the Best Shots</h1>
        <p class="max-w-2xl text-lg text-neutral-700">
          PicCrown adalah platform rating foto. Upload karya kamu, dapatkan penilaian adil, dan naik ke tahta foto terbaik.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-3 pt-4">
          <a href="#get-started"
             class="inline-flex items-center gap-2 rounded-2xl px-6 py-3 font-semibold bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)] hover:opacity-95 focus:outline-none focus-visible:ring-4 focus-visible:ring-amber-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
              <path d="M12 5v14" />
              <path d="m19 12-7 7-7-7" />
            </svg>
            Mulai Sekarang
          </a>
          <a href="#how-it-works"
             class="inline-flex items-center gap-2 rounded-2xl px-6 py-3 font-semibold border border-amber-300 text-amber-700 hover:bg-amber-50 focus:outline-none focus-visible:ring-4 focus-visible:ring-amber-200">
            Lihat Cara Kerja
          </a>
        </div>
      </div>
    </div>
  </section>

  {{-- FEATURES --}}
  <section class="mx-auto max-w-6xl px-6 py-14">
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 items-stretch">
      @php
        $features = [
          ['title' => 'Rating Adil', 'desc' => 'Skor dihitung dari suara komunitas dan bobot reputasi, meminimalkan spam vote.', 'icon' => 'star'],
          ['title' => 'Cepat & Responsif', 'desc' => 'UI ringan berbasis Tailwind, pengalaman mulus di desktop & mobile.', 'icon' => 'bolt'],
          ['title' => 'Upload Mudah', 'desc' => 'Drag & drop atau pilih file. Format populer JPG/PNG/WebP didukung.', 'icon' => 'cloud'],
        ];
      @endphp

      @foreach ($features as $f)
        <div class="rounded-3xl border border-amber-100/70 bg-white/80 p-8 shadow-[0_25px_80px_-12px_rgba(245,158,11,.30)] transition-all duration-200 hover:-translate-y-0.5">
          <div class="mb-4 inline-flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-yellow-300 via-amber-500 to-orange-500 text-white">
            @if($f['icon'] === 'star')
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5"><path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
            @elseif($f['icon'] === 'bolt')
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5"><path d="M11 21h-1l1-7H7l6-11h1l-1 7h4l-6 11z"/></svg>
            @else
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5"><path d="M19 18H7a4 4 0 0 1-.4-7.99A6 6 0 0 1 18.9 9.7 3.5 3.5 0 0 1 19 18z"/></svg>
            @endif
          </div>
          <h3 class="font-semibold text-lg mb-1">{{ $f['title'] }}</h3>
          <p class="text-neutral-600 leading-relaxed">{{ $f['desc'] }}</p>
        </div>
      @endforeach
    </div>
  </section>

  {{-- HOW IT WORKS --}}
  <section id="how-it-works" class="bg-white">
    <div class="mx-auto max-w-6xl px-6 py-16">
      <h2 class="text-3xl font-extrabold text-center mb-10">Cara Kerja</h2>
      @php
        $steps = [
          ['no' => '01', 'title' => 'Daftar/masuk', 'desc' => 'Buat akun untuk mulai mengunggah dan memberi rating.'],
          ['no' => '02', 'title' => 'Unggah fotomu', 'desc' => 'Tambahkan judul, kategori, dan tag supaya mudah ditemukan.'],
          ['no' => '03', 'title' => 'Dapatkan rating', 'desc' => 'Komunitas menilai fotomu 1–5. Skor dihitung real-time.'],
          ['no' => '04', 'title' => 'Naik leaderboard', 'desc' => 'Kumpulkan skor tinggi untuk meraih mahkota PicCrown.'],
        ];
      @endphp
      <div class="grid gap-6 md:grid-cols-4">
        @foreach ($steps as $s)
          <div class="rounded-2xl border border-amber-100/70 bg-white/80 p-6 text-center shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)]">
            <div class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-full bg-amber-500 text-white font-bold">{{ $s['no'] }}</div>
            <h3 class="font-semibold mb-1">{{ $s['title'] }}</h3>
            <p class="text-neutral-600 text-sm">{{ $s['desc'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- GALLERY PLACEHOLDER --}}
  <section class="mx-auto max-w-6xl px-6 py-8">
    <h2 class="sr-only">Sorotan Komunitas</h2>
    <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      @for($i=1; $i<=8; $i++)
        <div class="aspect-[4/3] rounded-2xl bg-gradient-to-br from-yellow-100 via-amber-100 to-orange-100 border border-amber-100/70 flex items-center justify-center text-amber-600 font-semibold">
          Preview {{ $i }}
        </div>
      @endfor
    </div>
  </section>

  {{-- CTA --}}
  <section id="get-started" class="relative overflow-hidden">
    <div class="mx-auto max-w-6xl px-6 py-16 text-center">
      <div class="rounded-3xl border border-amber-100/70 bg-white/70 backdrop-blur-sm p-10 shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)]">
        <h3 class="text-2xl font-extrabold mb-2">Siap memahkotai fotomu?</h3>
        <p class="text-neutral-600 mb-5">Gabung PicCrown dan jadilah bagian dari komunitas fotografer yang saling mengapresiasi.</p>
        <a href="#"
           class="inline-flex items-center gap-2 rounded-2xl px-6 py-3 font-semibold bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)] hover:opacity-95 focus:outline-none focus-visible:ring-4 focus-visible:ring-amber-300">
          Daftar Sekarang
        </a>
      </div>
    </div>
  </section>
@endsection
