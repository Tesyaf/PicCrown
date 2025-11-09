@extends('layouts.app')

@section('title', 'Beranda — PicCrown')

@section('content')
<div x-data="{ scrollY: 0 }" @scroll.window="scrollY = window.scrollY"
     class="relative min-h-screen bg-gradient-to-br from-amber-50 via-yellow-50 to-orange-100 text-neutral-900 overflow-hidden">

  {{-- Glow Background Parallax --}}
  <div class="pointer-events-none fixed inset-0 -z-10">
    <div class="absolute -top-40 -left-40 w-[560px] h-[560px] blur-[60px] opacity-35"
         :style="'transform: translateY(' + scrollY/8 + 'px)'"
         class="bg-[radial-gradient(closest-side,rgba(253,224,71,.9),rgba(253,224,71,.3),transparent_70%)]"></div>
    <div class="absolute -bottom-56 -right-56 w-[800px] h-[800px] blur-[60px] opacity-35"
         :style="'transform: translateY(' + scrollY/12 + 'px)'"
         class="bg-[radial-gradient(closest-side,rgba(251,191,36,.9),rgba(249,115,22,.25),transparent_70%)]"></div>
  </div>

  {{-- HERO --}}
  <section class="relative overflow-hidden">
    <div class="mx-auto max-w-6xl px-6 py-20 lg:py-28 text-center animate-fadein">
      <div class="flex flex-col items-center gap-5">
        <img src="/images/PicCrownLogo.svg" alt="PicCrown" class="h-20 w-auto text-amber-500 drop-shadow-md">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold tracking-tight leading-tight">
          Rate the <span class="text-amber-600">Best Shots</span>
        </h1>
        <p class="max-w-2xl text-lg text-neutral-700 mt-3">
          PicCrown adalah platform rating foto komunitas. Upload karya kamu, dapatkan penilaian adil,
          dan naik ke tahta foto terbaik.
        </p>
        <div class="flex flex-wrap items-center justify-center gap-3 pt-4">
          <a href="#get-started"
             class="inline-flex items-center gap-2 rounded-2xl px-6 py-3 font-semibold bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-lg hover:scale-[1.03] transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"/>
            </svg>
            Mulai Sekarang
          </a>
          <a href="#how-it-works"
             class="inline-flex items-center gap-2 rounded-2xl px-6 py-3 font-semibold border border-amber-300 text-amber-700 hover:bg-amber-50 transition-all duration-300">
            Lihat Cara Kerja
          </a>
        </div>
      </div>
    </div>
  </section>

  {{-- FITUR --}}
  <section class="mx-auto max-w-6xl px-6 py-14">
    <h2 class="text-3xl font-extrabold text-center mb-10">Fitur Unggulan</h2>
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      @php
        $features = [
          ['title' => 'Rating Adil', 'desc' => 'Skor dihitung dari reputasi dan deteksi anti-spam, memastikan penilaian tetap jujur.', 'icon' => 'fa-star'],
          ['title' => 'Cepat & Responsif', 'desc' => 'Antarmuka ringan dengan Tailwind, performa optimal di semua perangkat.', 'icon' => 'fa-bolt'],
          ['title' => 'Upload Mudah', 'desc' => 'Cukup drag & drop foto kamu. Format JPG, PNG, WebP sepenuhnya didukung.', 'icon' => 'fa-cloud-arrow-up'],
        ];
      @endphp
      @foreach ($features as $f)
      <div class="rounded-3xl border border-amber-100/70 bg-white/80 p-8 shadow-lg transition-all hover:shadow-xl hover:-translate-y-1 duration-200">
        <div class="mb-4 inline-flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-yellow-300 via-amber-500 to-orange-500 text-white">
          <i class="fa-solid {{ $f['icon'] }}"></i>
        </div>
        <h3 class="font-semibold text-lg mb-1">{{ $f['title'] }}</h3>
        <p class="text-neutral-600 leading-relaxed">{{ $f['desc'] }}</p>
      </div>
      @endforeach
    </div>
  </section>

  {{-- HOW IT WORKS --}}
  <section id="how-it-works" class="bg-white/70 backdrop-blur-sm border-y border-amber-100/60">
    <div class="mx-auto max-w-6xl px-6 py-16">
      <h2 class="text-3xl font-extrabold text-center mb-10">Cara Kerja</h2>
      @php
        $steps = [
          ['no' => '01', 'title' => 'Daftar / Masuk', 'desc' => 'Buat akun untuk mulai memberi rating dan upload foto.'],
          ['no' => '02', 'title' => 'Unggah Fotomu', 'desc' => 'Tambahkan judul, tag, dan kategori agar mudah ditemukan.'],
          ['no' => '03', 'title' => 'Dapatkan Rating', 'desc' => 'Komunitas menilai fotomu 1–5, hasil dihitung real-time.'],
          ['no' => '04', 'title' => 'Naik Leaderboard', 'desc' => 'Raih mahkota PicCrown dan tampil di ranking teratas.'],
        ];
      @endphp
      <div class="grid gap-6 md:grid-cols-4">
        @foreach ($steps as $s)
        <div class="rounded-2xl border border-amber-100/70 bg-white/80 p-6 text-center shadow-sm hover:shadow-lg transition-all">
          <div class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-full bg-amber-500 text-white font-bold">{{ $s['no'] }}</div>
          <h3 class="font-semibold mb-1">{{ $s['title'] }}</h3>
          <p class="text-neutral-600 text-sm">{{ $s['desc'] }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- GALLERY PREVIEW --}}
  <section class="mx-auto max-w-6xl px-6 py-14">
    <h2 class="text-3xl font-extrabold text-center mb-10">Sorotan Komunitas</h2>
    <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      @foreach(range(1,8) as $i)
      <div class="group relative overflow-hidden aspect-[4/3] rounded-2xl bg-gradient-to-br from-yellow-100 via-amber-100 to-orange-100 border border-amber-100/70 flex items-center justify-center font-semibold text-amber-700 shadow hover:shadow-xl hover:scale-[1.02] transition">
        Preview {{ $i }}
        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-sm">
          <span>Lihat Detail</span>
        </div>
      </div>
      @endforeach
    </div>
  </section>

  {{-- CTA --}}
  <section id="get-started" class="relative overflow-hidden">
    <div class="mx-auto max-w-6xl px-6 py-16 text-center">
      <div class="rounded-3xl border border-amber-100/70 bg-white/70 backdrop-blur-sm p-10 shadow-lg">
        <h3 class="text-2xl font-extrabold mb-2">Siap memahkotai fotomu?</h3>
        <p class="text-neutral-600 mb-5">Gabung PicCrown dan jadilah bagian dari komunitas fotografer yang saling mengapresiasi.</p>
        <a href="{{ route('register') }}"
           class="inline-flex items-center gap-2 rounded-2xl px-6 py-3 font-semibold bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-md hover:opacity-95 transition">
          Daftar Sekarang
        </a>
      </div>
    </div>
  </section>
</div>

{{-- Animasi sederhana --}}
<style>
  .animate-fadein { animation: fadeIn 0.8s ease-out both; }
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }
</style>

{{-- Alpine.js --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
