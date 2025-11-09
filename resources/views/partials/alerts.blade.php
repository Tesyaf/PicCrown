{{-- Tes include --}}
<div
  x-data="{ show: true }"
  x-show="show"
  x-transition:enter="transition transform ease-out duration-300"
  x-transition:enter-start="opacity-0 translate-y-4 scale-95"
  x-transition:enter-end="opacity-100 translate-y-0 scale-100"
  x-transition:leave="transition transform ease-in duration-200"
  x-transition:leave-start="opacity-100 translate-y-0 scale-100"
  x-transition:leave-end="opacity-0 translate-y-4 scale-95"
  @if (session('success') || session('error') || session('warning') || session('info') || $errors->any())
  x-init="setTimeout(() => show = false, 3000)"
  @endif
  class="fixed top-16 left-1/2 -translate-x-1/2
  z-[9999] space-y-6 w-full max-w-md px-4"
  >

  @if (session('success'))
  <div class="flex items-center gap-3 px-5 py-4 rounded-2xl border border-green-200/60 bg-green-50/70 backdrop-blur-xl shadow-xl">
    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
    </svg>
    <span class="text-green-800 font-medium">{{ session('success') }}</span>
    <button @click="show = false" class="ml-auto text-green-600 hover:text-green-800 font-semibold">✕</button>
  </div>
  @endif

  @if (session('error'))
  <div class="flex items-center gap-3 px-5 py-4 rounded-2xl border border-red-200/60 bg-red-50/70 backdrop-blur-xl shadow-xl">
    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg>
    <span class="text-red-800 font-medium">{{ session('error') }}</span>
    <button @click="show = false" class="ml-auto text-red-600 hover:text-red-800 font-semibold">✕</button>
  </div>
  @endif

  @if (session('warning'))
  <div class="flex items-center gap-3 px-5 py-4 rounded-2xl border border-yellow-200/60 bg-yellow-50/70 backdrop-blur-xl shadow-xl">
    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.054 0 1.635-1.136 1.054-2.054L13.054 4.946a1.2 1.2 0 00-2.108 0L3.028 17.946C2.447 18.864 3.028 20 4.082 20z" />
    </svg>
    <span class="text-yellow-800 font-medium">{{ session('warning') }}</span>
    <button @click="show = false" class="ml-auto text-yellow-600 hover:text-yellow-800 font-semibold">✕</button>
  </div>
  @endif

  @if (session('info'))
  <div class="flex items-center gap-3 px-5 py-4 rounded-2xl border border-blue-200/60 bg-blue-50/70 backdrop-blur-xl shadow-xl">
    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M12 18a9 9 0 100-18 9 9 0 000 18z" />
    </svg>
    <span class="text-blue-800 font-medium">{{ session('info') }}</span>
    <button @click="show = false" class="ml-auto text-blue-600 hover:text-blue-800 font-semibold">✕</button>
  </div>
  @endif

  @if ($errors->any())
  <div
    x-transition
    x-init="setTimeout(() => show = false, 5000)"
    class="flex flex-col gap-1 px-5 py-4 rounded-2xl border border-red-200/60 bg-red-50/70 backdrop-blur-xl shadow-xl max-w-sm">
    <div class="flex items-center justify-between">
      <span class="font-semibold text-red-800">Terjadi kesalahan validasi:</span>
      <button @click="show = false" class="text-red-600 hover:text-red-800 font-semibold">✕</button>
    </div>
    <ul class="list-disc list-inside text-red-700 mt-2 text-sm">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

</div>