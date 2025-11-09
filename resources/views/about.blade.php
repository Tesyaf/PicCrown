@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')

{{-- Background glow --}}
<div class="pointer-events-none fixed inset-0 -z-10">
  <div class="absolute -top-40 -left-40 w-[560px] h-[560px] blur-[40px] opacity-35 bg-[radial-gradient(closest-side,rgba(253,224,71,.9),rgba(253,224,71,.3),transparent_70%)]"></div>
  <div class="absolute -bottom-56 -right-56 w-[800px] h-[800px] blur-[40px] opacity-35 bg-[radial-gradient(closest-side,rgba(251,191,36,.9),rgba(249,115,22,.25),transparent_70%)]"></div>
</div>
{{-- HERO --}}
<header class="relative">
  <div class="mx-auto max-w-6xl px-6 py-12 text-center">
    <h1 class="text-4xl sm:text-5xl font-extrabold">Tentang Kami</h1>
    <div class="mt-2 text-sm text-neutral-500">
      <a href="{{ url('/') }}" class="hover:text-amber-500">Beranda</a> › Tentang
    </div>
  </div>
</header>

{{-- ABOUT SPLIT --}}
<section class="mx-auto max-w-6xl px-6 pb-12 grid gap-8 md:grid-cols-2 md:items-center">
  <div>
    <div class="overflow-hidden rounded-2xl border border-amber-100/70 shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)]">
      <img src="https://images.unsplash.com/photo-1468487422149-5edc422b1c21?q=80&w=1200&auto=format&fit=crop"
           alt="Tentang PicCrown"
           class="w-full h-full object-cover">
    </div>
  </div>
  <div>
    <h3 class="uppercase tracking-widest text-amber-600 font-semibold mb-2">Tentang PicCrown</h3>
    <h2 class="text-3xl font-extrabold mb-3">Kami Mengutamakan Penilaian yang Adil</h2>
    <p class="text-neutral-700 mb-6">
      PicCrown adalah platform rating foto komunitas. Kami membantu kreator mendapatkan penilaian yang adil, cepat, dan mudah.
      Dengan bobot reputasi dan anti-spam vote, skor lebih akurat dan transparan.
    </p>
    <a href="#contact"
       class="inline-flex items-center gap-2 rounded-2xl px-5 py-2.5 font-semibold bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-md hover:opacity-95">
      Hubungi Kami
    </a>
  </div>
</section>

{{-- SKILLS --}}
<section id="skills" class="mx-auto max-w-6xl px-6 pb-4">
  <h3 class="text-2xl font-extrabold mb-2">Keahlian Kami</h3>
  <p class="text-neutral-600 mb-6 max-w-3xl">
    Apa yang membuat PicCrown beda? Kami fokus pada fairness, performa, dan pengalaman pengguna.
  </p>

  <div class="grid gap-6 md:grid-cols-2">
    {{-- Skill Bar --}}
    <div>
      @php
        $skills = [
          ['label' => 'Moderasi & Anti-Spam', 'val' => 90],
          ['label' => 'Algoritma Penilaian', 'val' => 88],
          ['label' => 'Kecepatan UI', 'val' => 95],
        ];
      @endphp
      @foreach ($skills as $skill)
        <div class="mb-5">
          <div class="flex items-center justify-between text-sm mb-1">
            <span>{{ $skill['label'] }}</span>
            <span class="text-neutral-500">{{ $skill['val'] }}%</span>
          </div>
          <div class="h-2 rounded-full bg-amber-100">
            <div class="h-2 rounded-full bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500"
                 style="width: {{ $skill['val'] }}%"></div>
          </div>
        </div>
      @endforeach
    </div>

    {{-- Stats --}}
    <div id="stats" class="grid grid-cols-2 gap-4">
      @php
        $stats = [
          ['val' => '5+', 'label' => 'Tahun Pengalaman'],
          ['val' => '1.000+', 'label' => 'Proyek Selesai'],
          ['val' => '300+', 'label' => 'Kreator Aktif'],
          ['val' => '64', 'label' => 'Penghargaan'],
        ];
      @endphp
      @foreach ($stats as $s)
        <div class="rounded-2xl border border-amber-100/70 bg-white/80 p-6 text-center shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)]">
          <div class="text-3xl font-extrabold mb-1">{{ $s['val'] }}</div>
          <div class="text-xs text-neutral-600">{{ $s['label'] }}</div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- CTA --}}
<section class="mx-auto max-w-6xl px-6 py-12">
  <div class="relative overflow-hidden rounded-2xl border border-amber-100/70 shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)]">
    <img src="https://images.unsplash.com/photo-1471341971476-ae15ff5dd4ea?q=80&w=1600&auto=format&fit=crop"
         alt="CTA"
         class="w-full h-64 object-cover brightness-[.7]">
    <div class="absolute inset-0 grid place-items-center text-center text-white p-6">
      <div>
        <div class="uppercase tracking-widest text-amber-200 font-semibold">Gabung Sekarang</div>
        <h3 class="text-2xl sm:text-3xl font-extrabold mt-1">Siap Naik ke Tahta Foto Terbaik?</h3>
        <a href="#"
           class="mt-4 inline-flex items-center gap-2 rounded-2xl px-5 py-2.5 font-semibold bg-white/90 text-amber-700 hover:bg-white">
          Mulai
        </a>
      </div>
    </div>
  </div>
</section>
@endsection