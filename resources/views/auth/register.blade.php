@extends('layouts.app') 

@section('title', 'Daftar Akun Baru')

@section('content')
  {{-- Amber corner glow (konsisten dengan pages sebelumnya) --}}
  <div class="pointer-events-none fixed inset-0 -z-10">
    <div class="absolute -top-40 -left-40 w-[560px] h-[560px] blur-[40px] opacity-35 bg-[radial-gradient(closest-side,rgba(253,224,71,.9),rgba(253,224,71,.3),transparent_70%)]"></div>
    <div class="absolute -bottom-56 -right-56 w-[800px] h-[800px] blur-[40px] opacity-35 bg-[radial-gradient(closest-side,rgba(251,191,36,.9),rgba(249,115,22,.25),transparent_70%)]"></div>
  </div>

  <div class="w-full max-w-md mx-auto px-6 py-10">
    {{-- Header --}}
    <div class="text-center mb-8">
      <h1 class="text-4xl font-extrabold tracking-tight text-neutral-900 mb-2">Daftar</h1>
      <p class="text-neutral-600">Buat akun baru untuk memulai</p>
    </div>

    {{-- Glassy Card --}}
    <div class="rounded-3xl border border-amber-100/70 bg-white/70 backdrop-blur p-8 shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)]">
      {{-- Status global (opsional) --}}
      @if (session('status'))
        <div class="mb-4 p-3 rounded-xl border border-emerald-200 bg-emerald-50 text-emerald-700 text-sm">
          {{ session('status') }}
        </div>
      @endif

      <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        {{-- Nama --}}
        <div>
          <label for="name" class="block text-sm font-semibold text-neutral-800 mb-2">Nama Lengkap</label>
          <input
            id="name"
            type="text"
            name="name"
            value="{{ old('name') }}"
            required
            autofocus
            placeholder="Nama lengkap"
            class="w-full px-4 py-3 rounded-xl bg-white/40 backdrop-blur-md border border-white/50 text-neutral-900 placeholder-neutral-500
                   focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-300/50 focus:bg-white/60 transition"
          >
          @error('name')
            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
          @enderror
        </div>

        {{-- Email --}}
        <div>
          <label for="email" class="block text-sm font-semibold text-neutral-800 mb-2">Email</label>
          <input
            id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
            placeholder="nama@gmail.com"
            class="w-full px-4 py-3 rounded-xl bg-white/40 backdrop-blur-md border border-white/50 text-neutral-900 placeholder-neutral-500
                   focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-300/50 focus:bg-white/60 transition"
          >
          @error('email')
            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
          @enderror
        </div>

        {{-- Password --}}
        <div>
          <label for="password" class="block text-sm font-semibold text-neutral-800 mb-2">Password</label>
          <input
            id="password"
            type="password"
            name="password"
            required
            placeholder="Minimal 8 karakter"
            class="w-full px-4 py-3 rounded-xl bg-white/40 backdrop-blur-md border border-white/50 text-neutral-900 placeholder-neutral-500
                   focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-300/50 focus:bg-white/60 transition"
          >
          @error('password')
            <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
          @enderror
        </div>

        {{-- Konfirmasi Password --}}
        <div>
          <label for="password_confirmation" class="block text-sm font-semibold text-neutral-800 mb-2">Konfirmasi Password</label>
          <input
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            required
            placeholder="Ulangi password Anda"
            class="w-full px-4 py-3 rounded-xl bg-white/40 backdrop-blur-md border border-white/50 text-neutral-900 placeholder-neutral-500
                   focus:outline-none focus:border-amber-400 focus:ring-2 focus:ring-amber-300/50 focus:bg-white/60 transition"
          >
        </div>

        {{-- Terms --}}
        <div class="flex items-start gap-3 pt-1">
          <input
            id="terms"
            type="checkbox"
            required
            class="mt-1 w-5 h-5 rounded border-neutral-300 text-amber-500 focus:ring-amber-300"
          >
          <label for="terms" class="text-sm text-neutral-700">
            Saya setuju dengan <a href="#" class="text-amber-700 hover:underline font-semibold">Syarat & Ketentuan</a>
          </label>
        </div>

        {{-- Submit --}}
        <button
          type="submit"
          class="w-full py-3 mt-2 rounded-xl font-semibold text-white
                 bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500
                 hover:opacity-95 focus:outline-none focus-visible:ring-4 focus-visible:ring-amber-300
                 shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)] transition"
        >
          Daftar Sekarang
        </button>
      </form>

      {{-- Divider --}}
      <div class="flex items-center gap-4 my-6">
        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-amber-200 to-transparent"></div>
        <span class="text-sm text-neutral-600">atau</span>
        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-amber-200 to-transparent"></div>
      </div>

      {{-- Social: Google only --}}
      <div class="grid grid-cols-1 gap-3">
        <a href="{{ route('auth.google') }}"
           class="flex items-center justify-center gap-2 py-3 rounded-xl bg-white/70 hover:bg-white border border-amber-100/70 text-neutral-800 font-semibold transition">
          <svg class="w-5 h-5" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
          </svg>
          <span>Daftar dengan Google</span>
        </a>
      </div>

      {{-- Link login --}}
      <p class="text-center text-neutral-700 mt-6">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-amber-700 hover:underline font-semibold">Masuk di sini</a>
      </p>
    </div>
  </div>
@endsection
