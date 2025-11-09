@extends('layouts.app')

@section('title', 'Konfirmasi Password')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12 bg-white text-neutral-900 selection:bg-amber-200 selection:text-neutral-900">
  <div class="relative w-full max-w-md">
    {{-- Background glow --}}
    <div class="absolute inset-0 -z-10">
      <div class="absolute top-[-160px] left-[-160px] w-[560px] h-[560px] rounded-full bg-[radial-gradient(closest-side,rgba(253,224,71,.9),rgba(253,224,71,.3),transparent_70%)] blur-3xl opacity-35"></div>
      <div class="absolute bottom-[-220px] right-[-220px] w-[800px] h-[800px] rounded-full bg-[radial-gradient(closest-side,rgba(251,191,36,.9),rgba(249,115,22,.25),transparent_70%)] blur-3xl opacity-35"></div>
    </div>

    {{-- Card --}}
    <div class="backdrop-blur-xl bg-white/40 border border-white/50 rounded-2xl shadow-2xl p-8 hover:shadow-3xl transition-all duration-500">
      {{-- Header --}}
      <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-yellow-300 via-amber-500 to-orange-500 rounded-full mb-4 shadow-lg">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
            </path>
          </svg>
        </div>
        <h1 class="text-2xl font-bold text-amber-900 mb-2">Konfirmasi Password</h1>
        <p class="text-sm text-amber-700">Masukkan password Anda untuk keamanan tambahan</p>
      </div>

      {{-- Form --}}
      <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
        @csrf

        {{-- Password --}}
        <div class="space-y-2">
          <label for="password" class="block text-sm font-semibold text-amber-900">Password</label>
          <div class="relative">
            <input id="password" type="password" name="password" required placeholder="Masukkan password Anda"
              class="w-full px-4 py-3 pr-10 bg-white/50 border border-amber-200 rounded-lg text-gray-800 placeholder-amber-400 focus:ring-2 focus:ring-amber-300 focus:border-orange-400 outline-none transition-all duration-300" />
            <button type="button"
              class="absolute inset-y-0 right-3 flex items-center text-amber-600 hover:text-orange-600 transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
            </button>
          </div>
          @error('password')
          <span class="text-sm text-red-500 font-medium">{{ $message }}</span>
          @enderror
        </div>

        {{-- Strength Indicator (Dummy visual) --}}
        <div>
          <div class="flex justify-between items-center text-xs text-amber-700 mb-2">
            <span>Kekuatan Password</span>
            <span class="font-semibold text-orange-600">Sedang</span>
          </div>
          <div class="w-full h-2 bg-amber-100 rounded-full overflow-hidden">
            <div class="h-full w-2/3 bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 rounded-full"></div>
          </div>
        </div>

        {{-- Submit --}}
        <button type="submit"
          class="w-full py-3 bg-gradient-to-r from-yellow-400 via-amber-500 to-orange-600 text-white font-semibold rounded-lg shadow-lg hover:scale-[1.03] hover:opacity-95 transform transition-all duration-300">
          Konfirmasi Password
        </button>

        {{-- Cancel --}}
        <a href="{{ url()->previous() }}"
          class="block w-full text-center py-2 border-2 border-amber-200 text-amber-900 font-medium rounded-lg hover:bg-amber-50 transition-all duration-300">
          Batal
        </a>
      </form>

      {{-- Footer --}}
      <div class="text-center text-xs text-amber-700 mt-8">
        <p>Password Anda aman dan terenkripsi sepenuhnya 🔒</p>
      </div>
    </div>
  </div>
</div>
@endsection
