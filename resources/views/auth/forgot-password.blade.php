@extends('layouts.app')

@section('title', 'Lupa Password')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12 bg-white text-neutral-900 selection:bg-amber-200 selection:text-neutral-900">
  <!-- Glow background -->
  <div class="absolute inset-0 -z-10 pointer-events-none overflow-hidden">
    <div class="absolute top-[-160px] left-[-160px] w-[560px] h-[560px] rounded-full bg-[radial-gradient(closest-side,rgba(253,224,71,.9),rgba(253,224,71,.3),transparent_70%)] blur-3xl opacity-35"></div>
    <div class="absolute bottom-[-220px] right-[-220px] w-[800px] h-[800px] rounded-full bg-[radial-gradient(closest-side,rgba(251,191,36,.9),rgba(249,115,22,.25),transparent_70%)] blur-3xl opacity-35"></div>
  </div>

  <!-- Card -->
  <div class="relative z-10 w-full max-w-md">
    <div class="backdrop-blur-xl bg-white/40 border border-white/50 rounded-2xl shadow-2xl p-8 hover:shadow-3xl transition-all duration-500">
      <!-- Header -->
      <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-yellow-300 via-amber-500 to-orange-500 rounded-full mb-4 shadow-lg">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M16.5 9.4A5 5 0 1 0 12 14.5v1.5m0 3v.01" />
          </svg>
        </div>
        <h1 class="text-2xl font-bold text-amber-900 mb-2">Lupa Password?</h1>
        <p class="text-sm text-amber-700">Masukkan email Anda dan kami akan mengirimkan link reset password</p>
      </div>

      <!-- Form -->
      <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email -->
        <div class="space-y-2">
          <label for="email" class="block text-sm font-semibold text-amber-900">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" required
            class="w-full px-4 py-3 bg-white/50 border border-amber-200 rounded-lg text-gray-800 placeholder-amber-400 focus:ring-2 focus:ring-amber-300 focus:border-orange-400 outline-none transition-all duration-300"
            placeholder="masukkan@email.com">
          @error('email')
          <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
          @enderror
        </div>

        <!-- Success message -->
        @if (session('status'))
        <div class="p-4 rounded-lg bg-green-50/80 border border-green-200">
          <p class="text-green-700 text-sm">{{ session('status') }}</p>
        </div>
        @endif

        <!-- Submit -->
        <button type="submit"
          class="w-full py-3 bg-gradient-to-r from-yellow-400 via-amber-500 to-orange-600 text-white font-semibold rounded-lg shadow-lg hover:scale-[1.03] hover:opacity-95 transform transition-all duration-300">
          Kirim Link Reset
        </button>
      </form>

      <!-- Divider -->
      <div class="relative py-6">
        <div class="absolute inset-0 flex items-center">
          <div class="w-full border-t border-amber-100/70"></div>
        </div>
        <div class="relative flex justify-center text-sm">
          <span class="px-3 text-amber-700 bg-white/40 backdrop-blur-md">atau</span>
        </div>
      </div>

      <!-- Back to Login -->
      <div class="text-center space-y-2">
        <p class="text-sm text-amber-700">Kembali ke halaman login?</p>
        <a href="{{ route('login') }}"
          class="inline-block px-6 py-2 border-2 border-amber-300 text-amber-700 hover:bg-amber-50 font-semibold rounded-lg transition-all duration-300">
          Login
        </a>
      </div>

      <!-- Register -->
      <div class="text-center mt-4">
        <p class="text-sm text-amber-700">Belum punya akun?
          <a href="{{ route('register') }}" class="text-orange-600 hover:text-orange-700 font-semibold">
            Daftar sekarang
          </a>
        </p>
      </div>
    </div>

    <!-- Footer -->
    <p class="text-center text-amber-700 text-xs mt-6">
      © {{ date('Y') }} PicCrown. Semua hak dilindungi.
    </p>
  </div>
</div>
@endsection
