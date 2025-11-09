@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="relative min-h-screen flex items-center justify-center px-4 py-12 bg-gradient-to-br from-amber-50 to-yellow-100 text-neutral-900">
  {{-- Background glow --}}
  <div class="pointer-events-none fixed inset-0 -z-10">
    <div class="absolute -top-40 -left-40 w-[560px] h-[560px] blur-[40px] opacity-35 bg-[radial-gradient(closest-side,rgba(253,224,71,.9),rgba(253,224,71,.3),transparent_70%)]"></div>
    <div class="absolute -bottom-56 -right-56 w-[800px] h-[800px] blur-[40px] opacity-35 bg-[radial-gradient(closest-side,rgba(251,191,36,.9),rgba(249,115,22,.25),transparent_70%)]"></div>
  </div>

  <div class="w-full max-w-md">
    {{-- Logo & Heading --}}
    <div class="text-center mb-8">
      <img src="{{ asset('images/PicCrownLogo.svg') }}" alt="PicCrown" class="h-16 w-auto mx-auto mb-3">
      <h1 class="text-3xl font-extrabold text-amber-600">Selamat Datang Kembali</h1>
      <p class="text-neutral-600 text-sm">Masuk ke akun Anda untuk melanjutkan</p>
    </div>

    {{-- Card --}}
    <div class="backdrop-blur-xl bg-white/70 border border-amber-100/70 rounded-2xl shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)] p-8 transition-all duration-500 hover:-translate-y-0.5">

      @if (session('status'))
        <div class="mb-4 p-4 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm font-medium">
          {{ session('status') }}
        </div>
      @endif

      {{-- Form login --}}
      <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        {{-- Email --}}
        <div class="space-y-2">
          <label for="email" class="block text-sm font-semibold text-neutral-800">Email</label>
          <input type="email" name="email" id="email" value="{{ old('email') }}" required
            class="w-full px-4 py-3 rounded-lg border border-amber-100/70 bg-white/60 backdrop-blur-sm focus:ring-4 focus:ring-amber-300/50 focus:border-amber-400 text-neutral-800 placeholder-neutral-500 transition"
            placeholder="masukkan email Anda">
          @error('email')
            <span class="text-red-500 text-sm font-medium">{{ $message }}</span>
          @enderror
        </div>

        {{-- Password --}}
        <div class="space-y-2" x-data="{ show: false }">
          <label for="password" class="block text-sm font-semibold text-neutral-800">Password</label>
          <div class="relative">
            <input :type="show ? 'text' : 'password'" name="password" id="password" required autocomplete="current-password"
              class="w-full px-4 py-3 pr-10 rounded-lg border border-amber-100/70 bg-white/60 backdrop-blur-sm focus:ring-4 focus:ring-amber-300/50 focus:border-amber-400 text-neutral-800 placeholder-neutral-500 transition"
              placeholder="masukkan password Anda">
            <button type="button" @click="show = !show"
              class="absolute inset-y-0 right-3 flex items-center text-neutral-500 hover:text-amber-600 transition">
              <template x-if="!show">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
              </template>
              <template x-if="show">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.97 9.97 0 012.031-3.362M6.228 6.228A9.97 9.97 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.978 9.978 0 01-4.208 5.337M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
                </svg>
              </template>
            </button>
          </div>
          @error('password')
            <span class="text-red-500 text-sm font-medium">{{ $message }}</span>
          @enderror
        </div>

        {{-- Remember & Forgot --}}
        <div class="flex items-center justify-between">
          <label for="remember" class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="remember" id="remember"
              class="w-4 h-4 rounded border-neutral-300 text-amber-500 focus:ring-amber-300 cursor-pointer">
            <span class="text-sm text-neutral-700">Ingat saya</span>
          </label>
          <a href="{{ route('password.request') }}" class="text-sm text-amber-600 hover:text-amber-700 font-medium transition">Lupa password?</a>
        </div>

        {{-- Tombol Masuk --}}
        <button type="submit"
          class="w-full py-3 px-4 bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 hover:opacity-95 text-white font-semibold rounded-lg shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)] transform hover:scale-[1.02] transition-all duration-300">
          Masuk
        </button>
      </form>

      {{-- Garis Pembatas --}}
      <div class="my-6 flex items-center gap-4">
        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-amber-200/60 to-transparent"></div>
        <span class="text-neutral-600 text-sm font-medium">atau</span>
        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-amber-200/60 to-transparent"></div>
      </div>

      {{-- Tombol Google aja --}}
      <div class="text-center">
        <a 
          href="{{ route('auth.google') }}"
          class="inline-flex items-center justify-center gap-3 w-full py-3 px-4 rounded-lg font-semibold text-neutral-800 bg-white/90 hover:bg-white transition-all duration-300 border border-amber-100/70 shadow-[0_8px_20px_-5px_rgba(251,191,36,.2)]"
        >
          <x-icon-google class="w-5 h-5" /> 
          <span>Masuk dengan Google</span>
        </a>
      </div>

      {{-- Link Daftar --}}
      <p class="text-center text-neutral-700 mt-6 text-sm">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-amber-600 hover:text-amber-700 font-semibold transition-colors">
          Daftar di sini
        </a>
      </p>
    </div>
  </div>
</div>
@endsection