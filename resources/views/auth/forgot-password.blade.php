@extends('layouts.guest')

@section('title', 'Lupa Password')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4">
  <!-- Animated blur circles in background -->
  <div class="fixed inset-0 pointer-events-none overflow-hidden">
    <div class="absolute top-20 left-10 w-72 h-72 bg-orange-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute top-40 right-10 w-72 h-72 bg-yellow-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    <div class="absolute bottom-20 left-1/2 w-72 h-72 bg-amber-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
  </div>

  <!-- Main Container -->
  <div class="relative z-10 w-full max-w-md">
    <!-- Glassmorphic Card -->
    <div class="backdrop-blur-xl bg-white/30 border border-white/20 rounded-2xl shadow-2xl p-8 space-y-8">
      
      <!-- Header -->
      <div class="text-center space-y-2">
        <h1 class="text-3xl font-bold text-gray-900">Lupa Password?</h1>
        <p class="text-gray-600 text-sm">Masukkan email Anda dan kami akan mengirimkan link untuk mengatur ulang password</p>
      </div>

      <!-- Form -->
      <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email Field -->
        <div class="space-y-2">
          <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
          <div class="relative">
            <input 
              type="email" 
              id="email" 
              name="email" 
              value="{{ old('email') }}"
              required
              placeholder="masukkan@email.com"
              class="w-full px-4 py-3 backdrop-blur-md bg-white/40 border border-white/50 rounded-lg placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:border-transparent transition-all duration-300"
            >
          </div>
          @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Status Message -->
        @if (session('status'))
          <div class="p-4 rounded-lg bg-green-50/80 border border-green-200">
            <p class="text-green-700 text-sm">{{ session('status') }}</p>
          </div>
        @endif

        <!-- Submit Button -->
        <button 
          type="submit"
          class="w-full py-3 bg-gradient-to-r from-orange-400 to-orange-500 hover:from-orange-500 hover:to-orange-600 text-white font-semibold rounded-lg transition-all duration-300 transform hover:scale-105 active:scale-95 shadow-lg"
        >
          Kirim Link Reset
        </button>
      </form>

      <!-- Divider -->
      <div class="relative">
        <div class="absolute inset-0 flex items-center">
          <div class="w-full border-t border-white/30"></div>
        </div>
        <div class="relative flex justify-center text-sm">
          <span class="px-2 text-gray-600 bg-white/30 backdrop-blur-md">atau</span>
        </div>
      </div>

      <!-- Back to Login Link -->
      <div class="text-center space-y-2">
        <p class="text-gray-600 text-sm">Kembali ke halaman login?</p>
        <a 
          href="{{ route('login') }}"
          class="inline-block px-6 py-2 border-2 border-orange-400 text-orange-600 hover:bg-orange-50 font-semibold rounded-lg transition-all duration-300"
        >
          Login
        </a>
      </div>

      <!-- Signup Link -->
      <div class="text-center">
        <p class="text-gray-600 text-sm">
          Belum punya akun? 
          <a href="{{ route('register') }}" class="text-orange-600 hover:text-orange-700 font-semibold">Daftar sekarang</a>
        </p>
      </div>
    </div>

    <!-- Footer Text -->
    <p class="text-center text-gray-500 text-xs mt-6">
      © 2025 PicCrown. Semua hak dilindungi.
    </p>
  </div>
</div>

<style>
  @keyframes blob {
    0%, 100% {
      transform: translate(0, 0) scale(1);
    }
    33% {
      transform: translate(30px, -50px) scale(1.1);
    }
    66% {
      transform: translate(-20px, 20px) scale(0.9);
    }
  }

  .animate-blob {
    animation: blob 7s infinite;
  }

  .animation-delay-2000 {
    animation-delay: 2s;
  }

  .animation-delay-4000 {
    animation-delay: 4s;
  }
</style>
@endsection