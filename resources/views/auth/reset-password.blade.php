@extends('layouts.guest')

@section('title', 'Reset Password')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <!-- Animated background circles -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-orange-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
        <div class="absolute top-40 right-20 w-72 h-72 bg-amber-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-1/2 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse animation-delay-4000"></div>
    </div>

    <!-- Reset Password Card -->
    <div class="relative w-full max-w-md">
        <div class="backdrop-blur-md bg-white/30 border border-white/20 rounded-2xl shadow-2xl p-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Reset Password</h1>
                <p class="text-gray-700">Masukkan password baru Anda untuk melanjutkan.</p>
            </div>

            <!-- Reset Password Form -->
            <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Input -->
                <div class="relative">
                    <label for="email" class="block text-sm font-medium text-gray-800 mb-2">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email"
                        value="{{ old('email', $request->email) }}"
                        required 
                        disabled
                        class="w-full px-4 py-3 backdrop-blur-sm bg-white/50 border border-orange-200/50 rounded-lg text-gray-800 placeholder-gray-500 focus:outline-none focus:border-orange-400 focus:bg-white/70 transition duration-200"
                        placeholder="your@email.com"
                    >
                </div>

                <!-- Password Input -->
                <div class="relative">
                    <label for="password" class="block text-sm font-medium text-gray-800 mb-2">Password Baru</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        required 
                        class="w-full px-4 py-3 backdrop-blur-sm bg-white/50 border border-orange-200/50 rounded-lg text-gray-800 placeholder-gray-500 focus:outline-none focus:border-orange-400 focus:bg-white/70 transition duration-200"
                        placeholder="Masukkan password baru"
                    >
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password Input -->
                <div class="relative">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-800 mb-2">Konfirmasi Password</label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation"
                        required 
                        class="w-full px-4 py-3 backdrop-blur-sm bg-white/50 border border-orange-200/50 rounded-lg text-gray-800 placeholder-gray-500 focus:outline-none focus:border-orange-400 focus:bg-white/70 transition duration-200"
                        placeholder="Konfirmasi password baru"
                    >
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Requirements Info -->
                <div class="bg-orange-50/50 backdrop-blur-sm border border-orange-200/50 rounded-lg p-4">
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold">Password harus:</span>
                        <ul class="mt-2 space-y-1 text-xs text-gray-600">
                            <li>• Minimal 8 karakter</li>
                            <li>• Kombinasi huruf besar dan kecil</li>
                            <li>• Minimal 1 angka dan 1 karakter khusus</li>
                        </ul>
                    </p>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit"
                    class="w-full px-4 py-3 mt-8 bg-gradient-to-r from-orange-400 to-orange-500 hover:from-orange-500 hover:to-orange-600 text-white font-semibold rounded-lg shadow-lg transition duration-200 transform hover:scale-105 active:scale-95"
                >
                    Reset Password
                </button>
            </form>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300/30"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white/30 text-gray-700">atau</span>
                </div>
            </div>

            <!-- Back to Login Link -->
            <div class="text-center">
                <p class="text-gray-700">
                    <a href="{{ route('login') }}" class="text-orange-500 hover:text-orange-600 font-semibold transition duration-200">
                        Kembali ke Login
                    </a>
                </p>
            </div>
        </div>

        <!-- Bottom decorative text -->
        <p class="text-center mt-8 text-sm text-gray-600">
            PicCrown • Secure Password Reset
        </p>
    </div>
</div>
@endsection