@extends('layouts.guest') 

@section('title', 'Lupa Password')

@section('content')
<!-- Animated Blur Circles -->
<div class="fixed top-20 left-10 w-72 h-72 bg-orange-200 rounded-full blur-3xl opacity-30 blur-circle-1"></div>
<div class="fixed bottom-20 right-10 w-80 h-80 bg-amber-200 rounded-full blur-3xl opacity-20 blur-circle-2"></div>
<div class="fixed -bottom-40 -left-40 w-96 h-96 bg-yellow-200 rounded-full blur-3xl opacity-25"></div>

<div class="relative z-10 w-full max-w-md px-4">
    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Daftar</h1>
        <p class="text-gray-600">Buat akun baru untuk memulai</p>
    </div>

    <!-- Glassmorphic Card -->
    <div class="backdrop-blur-xl bg-white/30 border border-white/40 rounded-3xl p-8 shadow-2xl">
        <form class="space-y-5">
            <!-- Full Name -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" placeholder="Masukkan nama lengkap Anda"
                    class="w-full px-4 py-3 rounded-xl backdrop-blur-md bg-white/40 border border-white/50 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:bg-white/60 transition-all duration-300">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" placeholder="nama@example.com"
                    class="w-full px-4 py-3 rounded-xl backdrop-blur-md bg-white/40 border border-white/50 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:bg-white/60 transition-all duration-300">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <input type="password" placeholder="Minimal 8 karakter"
                    class="w-full px-4 py-3 rounded-xl backdrop-blur-md bg-white/40 border border-white/50 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:bg-white/60 transition-all duration-300">
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password</label>
                <input type="password" placeholder="Ulangi password Anda"
                    class="w-full px-4 py-3 rounded-xl backdrop-blur-md bg-white/40 border border-white/50 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:bg-white/60 transition-all duration-300">
            </div>

            <!-- Terms -->
            <div class="flex items-start gap-3 pt-2">
                <input type="checkbox" id="terms" class="mt-1 w-5 h-5 rounded border-gray-300 text-orange-500 focus:ring-orange-400">
                <label for="terms" class="text-sm text-gray-700">
                    Saya setuju dengan <a href="#" class="text-orange-500 hover:text-orange-600 font-semibold">Syarat & Ketentuan</a>
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-3 mt-6 bg-gradient-to-r from-orange-400 to-orange-500 text-white font-bold rounded-xl hover:from-orange-500 hover:to-orange-600 transition-all duration-300 transform hover:scale-105 shadow-lg">
                Daftar Sekarang
            </button>
        </form>

        <!-- Divider -->
        <div class="flex items-center gap-4 my-6">
            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gray-400 to-transparent"></div>
            <span class="text-sm text-gray-600">atau</span>
            <div class="flex-1 h-px bg-gradient-to-r from-transparent via-gray-400 to-transparent"></div>
        </div>

        <!-- Social Buttons -->
        <div class="grid grid-cols-1 gap-3">
            <button type="button"
                class="flex items-center justify-center gap-2 py-3 rounded-xl backdrop-blur-md bg-white/40 border border-white/50 hover:bg-white/60 transition-all duration-300">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4" />
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853" />
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05" />
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335" />
                </svg>
                <span class="text-sm font-semibold text-gray-700">Google</span>
            </button>
        </div>

        <!-- Login Link -->
        <p class="text-center text-gray-700 mt-6">
            Sudah punya akun?
            <a href="/login" class="text-orange-500 hover:text-orange-600 font-bold transition-colors">Masuk di sini</a>
        </p>
    </div>
</div>
@endsection