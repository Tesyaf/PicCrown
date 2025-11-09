@extends('layouts.app')

@section('title', 'Reset Password')

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
              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
          </svg>
        </div>
        <h1 class="text-2xl font-bold text-amber-900 mb-2">Reset Password</h1>
        <p class="text-sm text-amber-700">Masukkan password baru Anda untuk melanjutkan.</p>
      </div>

      <!-- Form -->
      <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-semibold text-amber-900 mb-2">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" required
            readonly
            class="w-full px-4 py-3 bg-white/50 border border-amber-200 rounded-lg text-gray-800 placeholder-amber-400 focus:ring-2 focus:ring-amber-300 focus:border-orange-400 outline-none transition-all duration-300"
            placeholder="email@domain.com">
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-semibold text-amber-900 mb-2">Password Baru</label>
          <input type="password" id="password" name="password" required
            class="w-full px-4 py-3 bg-white/50 border border-amber-200 rounded-lg text-gray-800 placeholder-amber-400 focus:ring-2 focus:ring-amber-300 focus:border-orange-400 outline-none transition-all duration-300"
            placeholder="Masukkan password baru">
          @error('password')
          <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
          @enderror
        </div>

        <!-- Confirm Password -->
        <div>
          <label for="password_confirmation" class="block text-sm font-semibold text-amber-900 mb-2">Konfirmasi Password</label>
          <input type="password" id="password_confirmation" name="password_confirmation" required
            class="w-full px-4 py-3 bg-white/50 border border-amber-200 rounded-lg text-gray-800 placeholder-amber-400 focus:ring-2 focus:ring-amber-300 focus:border-orange-400 outline-none transition-all duration-300"
            placeholder="Ulangi password baru">
          @error('password_confirmation')
          <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
          @enderror
        </div>

        <!-- Tips -->
        <div class="bg-white/40 border border-amber-100 rounded-lg p-4 backdrop-blur-sm">
          <p class="text-sm text-amber-800 font-medium">Kriteria Password:</p>
          <ul class="mt-2 text-xs text-amber-700 space-y-1">
            <li>• Minimal 8 karakter</li>
            <li>• Gunakan huruf besar dan kecil</li>
            <li>• Sertakan angka dan karakter khusus</li>
          </ul>
        </div>

        <!-- Submit -->
        <button type="submit"
          class="w-full py-3 bg-gradient-to-r from-yellow-400 via-amber-500 to-orange-600 text-white font-semibold rounded-lg shadow-lg hover:scale-[1.03] hover:opacity-95 transform transition-all duration-300">
          Reset Password
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

      <!-- Back to login -->
      <div class="text-center">
        <a href="{{ route('login') }}"
          class="inline-block px-6 py-2 border-2 border-amber-300 text-amber-700 hover:bg-amber-50 font-semibold rounded-lg transition-all duration-300">
          Kembali ke Login
        </a>
      </div>
    </div>

    <!-- Footer -->
    <p class="text-center text-amber-700 text-xs mt-6">
      © {{ date('Y') }} PicCrown • Secure Password Reset
    </p>
  </div>
</div>
@endsection
