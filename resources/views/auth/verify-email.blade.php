@extends('layouts.app')

@section('title', 'Verifikasi Email')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12 bg-white text-neutral-900 selection:bg-amber-200 selection:text-neutral-900">
  <!-- Glow Background -->
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
              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
          </svg>
        </div>
        <h1 class="text-2xl font-bold text-amber-900 mb-2">Verifikasi Email</h1>
        <p class="text-sm text-amber-700">Masukkan kode 6 digit yang telah dikirim ke email Anda</p>
      </div>

      <!-- Form -->
      <form method="POST" action="{{ route('verification.verify') }}" class="space-y-6">
        @csrf

        <!-- Email Display -->
        <div>
          <label class="block text-sm font-semibold text-amber-900 mb-2">Email Anda</label>
          <div class="w-full px-4 py-3 bg-white/60 border border-amber-200 rounded-lg text-gray-800 font-medium select-none">
            {{ auth()->user()->email }}
          </div>
        </div>

        <!-- OTP Input -->
        <div>
          <label for="code" class="block text-sm font-semibold text-amber-900 mb-3">Kode Verifikasi</label>
          <div class="flex justify-between gap-2">
            @for ($i = 0; $i < 6; $i++)
              <input 
                type="text"
                inputmode="numeric"
                maxlength="1"
                class="w-12 h-12 text-center text-xl font-bold border border-amber-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-300 focus:border-orange-400 bg-white/60 backdrop-blur-sm transition-all otp-input"
                data-index="{{ $i }}"
                @if($i === 0) autofocus @endif
              />
            @endfor
          </div>
          <input type="hidden" id="code" name="code" />
        </div>

        @error('code')
        <div class="p-3 bg-red-50 border border-red-200 rounded-lg text-red-600 text-sm">
          {{ $message }}
        </div>
        @enderror

        <!-- Submit -->
        <button type="submit"
          class="w-full py-3 bg-gradient-to-r from-yellow-400 via-amber-500 to-orange-600 text-white font-semibold rounded-lg shadow-lg hover:scale-[1.03] hover:opacity-95 transform transition-all duration-300">
          Verifikasi Email
        </button>

        <!-- Resend Info -->
        <div class="bg-white/50 border border-amber-100 rounded-lg p-4 mt-4 text-center">
          <p class="text-sm text-amber-700">
            Tidak menerima kode?
            <a href="{{ route('verification.resend') }}" class="text-orange-600 hover:text-orange-700 font-semibold underline">
              Kirim ulang
            </a>
          </p>
        </div>

        <!-- Security Note -->
        <div class="text-center mt-6 text-xs text-amber-700">
          <p class="flex items-center justify-center gap-1">
            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414L10 3.586l4.707 4.707a1 1 0 01-1.414 1.414L10 6.414l-3.293 3.293a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            Email Anda aman dan terenkripsi
          </p>
        </div>
      </form>
    </div>

    <!-- Footer -->
    <div class="text-center mt-6">
      <p class="text-sm text-amber-700">
        Email salah?
        <a href="{{ route('login') }}" class="text-orange-600 hover:text-orange-700 font-semibold underline">
          Kembali ke Login
        </a>
      </p>
      <p class="text-xs text-amber-700 mt-3">© {{ date('Y') }} PicCrown • Secure Verification</p>
    </div>
  </div>
</div>

<!-- OTP JS -->
<script>
  const inputs = document.querySelectorAll('.otp-input');
  const codeInput = document.getElementById('code');

  inputs.forEach((input, i) => {
    input.addEventListener('input', (e) => {
      if (e.target.value && i < inputs.length - 1) inputs[i + 1].focus();
      updateCode();
    });

    input.addEventListener('keydown', (e) => {
      if (e.key === 'Backspace' && !e.target.value && i > 0) inputs[i - 1].focus();
      if (!/[0-9]/.test(e.key) && e.key !== 'Backspace') e.preventDefault();
    });
  });

  function updateCode() {
    const code = Array.from(inputs).map(input => input.value).join('');
    codeInput.value = code;
  }
</script>
@endsection
