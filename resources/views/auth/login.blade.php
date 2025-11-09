@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12">
  <div class="w-full max-w-md">
    <!-- Logo/Brand -->
    <div class="text-center mb-8">
      <h1 class="text-4xl font-bold text-orange-600 mb-2">PicCrown</h1>
      <p class="text-gray-700">Selamat datang kembali</p>
    </div>

    <!-- Glassmorphic Card -->
    <div class="backdrop-blur-xl bg-white/30 border border-white/40 rounded-2xl shadow-2xl p-8 hover:shadow-3xl transition-all duration-500">
      
      @if (session('status'))
        <div class="mb-4 p-4 rounded-lg bg-green-50/80 border border-green-200">
          <p class="text-green-700 text-sm">{{ session('status') }}</p>
        </div>
      @endif
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Input -->
        <div class="space-y-2">
          <label for="email" class="block text-sm font-semibold text-gray-800">
            Email Address
          </label>
          <input 
            type="email" 
            name="email" 
            id="email"
            value="{{ old('email') }}"
            required
            class="w-full px-4 py-3 bg-white/40 backdrop-blur-md border border-white/50 rounded-lg focus:outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-300/50 focus:bg-white/50 transition-all duration-300 text-gray-800 placeholder-gray-600"
            placeholder="masukkan email Anda"
          >
          @error('email')
            <span class="text-red-500 text-sm font-medium">{{ $message }}</span>
          @enderror
        </div>

        <!-- Password Input -->
        <div class="space-y-2" x-data="{ show: false }">
          <label for="password" class="block text-sm font-semibold text-gray-800">
            Password
          </label>

          <div class="relative">
            <!-- Input Password -->
            <input 
              :type="show ? 'text' : 'password'"
              name="password"
              id="password"
              required
              placeholder="masukkan password Anda"
              class="w-full px-4 py-3 pr-10 bg-white/40 backdrop-blur-md border border-white/50 rounded-lg focus:outline-none focus:border-orange-400 focus:ring-2 focus:ring-orange-300/50 focus:bg-white/50 transition-all duration-300 text-gray-800 placeholder-gray-600"
              autocomplete="current-password"
            >

            <!-- Tombol Toggle Show/Hide -->
            <button 
              type="button"
              @click="show = !show"
              class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-orange-600 transition-colors"
              tabindex="-1"
            >
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

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
          <label for="remember" class="flex items-center space-x-2 cursor-pointer group">
            <input 
              type="checkbox" 
              name="remember" 
              id="remember"
              class="w-4 h-4 rounded border-gray-300 text-orange-500 focus:ring-orange-300 cursor-pointer"
            >
            <span class="text-sm text-gray-700 group-hover:text-gray-900 transition-colors">Ingat saya</span>
          </label>                                              
          <a href="{{ route('password.request') }}" class="text-sm text-orange-600 hover:text-orange-700 font-medium transition-colors">
            Lupa password?
          </a>
        </div>

        <!-- Submit Button -->
        <button 
          type="submit"
          class="w-full py-3 px-4 bg-gradient-to-r from-orange-400 to-orange-500 hover:from-orange-500 hover:to-orange-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300"
        >
          Masuk
        </button>
      </form>

      <!-- Divider -->
      <div class="my-6 flex items-center gap-4">
        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-white/50 to-transparent"></div>
        <span class="text-gray-600 text-sm font-medium">atau</span>
        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-white/50 to-transparent"></div>
      </div>

      <!-- Social Login -->
      <div class="grid grid-cols-2 gap-4">
        <button 
          type="button"
          class="py-3 px-4 bg-white/20 hover:bg-white/40 border border-white/50 rounded-lg font-medium text-gray-800 transition-all duration-300 flex items-center justify-center gap-2 group"
        >
          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
          </svg>
          Google
        </button>
        <button 
          type="button"
          class="py-3 px-4 bg-white/20 hover:bg-white/40 border border-white/50 rounded-lg font-medium text-gray-800 transition-all duration-300 flex items-center justify-center gap-2 group"
        >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v 3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
          </svg>
          GitHub
        </button>
      </div>

      <!-- Sign Up Link -->
      <p class="text-center text-gray-700 mt-6">
        Belum punya akun? 
        <a href="{{ route('register') }}" class="text-orange-600 hover:text-orange-700 font-semibold transition-colors">
          Daftar di sini
        </a>
      </p>
    </div>
  </div>
</div>
@endsection