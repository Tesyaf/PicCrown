<nav x-data="{ open: false }" class="sticky top-0 z-20 bg-white/70 backdrop-blur-md border-b border-amber-100/70 shadow-md">
  <div class="mx-auto max-w-6xl px-6 h-14 flex items-center justify-between">
    {{-- Logo --}}
    <div class="flex items-center gap-2">
      <a href="{{ url('/') }}" class="flex items-center gap-2 font-extrabold text-lg text-amber-600 hover:text-amber-700 transition-colors">
        <img src="/images/PicCrownLogo.svg" alt="PicCrown" class="h-7 w-auto">
        <span>PicCrown</span>
      </a>
    </div>

    {{-- Menu desktop --}}
    <div class="hidden sm:flex items-center gap-4 text-sm font-medium">
      @auth
        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-orange-500 transition-colors">Dashboard</a>
        <a href="{{ route('photos.create') }}" class="text-gray-700 hover:text-orange-500 transition-colors">Upload Foto</a>
        <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-orange-500 transition-colors">Profil</a>
      @else
        <a href="{{ route('about') }}"
          class="transition-colors {{ request()->routeIs('about') ? 'text-orange-500' : 'text-gray-700 hover:text-orange-500' }}">
          Tentang
        </a>
        <a href="{{ route('login') }}" class="text-gray-700 hover:text-orange-500 transition-colors">Masuk</a>
        <a href="{{ route('register') }}"
           class="rounded-xl px-3 py-2 font-semibold bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-md hover:opacity-95 transition-all duration-150">
          Daftar
        </a>
      @endauth
    </div>

    {{-- Tombol hamburger (mobile) --}}
    <button @click="open = !open" class="sm:hidden p-2 rounded-md text-amber-600 hover:bg-amber-100/50 transition">
      <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
        stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
      <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
        stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>

  {{-- Menu dropdown (mobile) --}}
  <div x-show="open" @click.away="open = false"
       x-transition:enter="transition ease-out duration-200"
       x-transition:enter-start="opacity-0 -translate-y-2"
       x-transition:enter-end="opacity-100 translate-y-0"
       x-transition:leave="transition ease-in duration-150"
       x-transition:leave-start="opacity-100 translate-y-0"
       x-transition:leave-end="opacity-0 -translate-y-2"
       class="sm:hidden bg-white/95 backdrop-blur-md border-t border-amber-100/70 shadow-md">
    <div class="px-6 py-4 space-y-3 text-sm font-medium">
      @auth
        <a href="{{ route('dashboard') }}" class="block text-gray-700 hover:text-orange-500 transition-colors">Dashboard</a>
        <a href="{{ route('photos.create') }}" class="block text-gray-700 hover:text-orange-500 transition-colors">Upload Foto</a>
        <a href="{{ route('profile.edit') }}" class="block text-gray-700 hover:text-orange-500 transition-colors">Profil</a>
      @else
        <a href="{{ route('about') }}"
          class="block transition-colors {{ request()->routeIs('about') ? 'text-orange-500' : 'text-gray-700 hover:text-orange-500' }}">
          Tentang
        </a>
        <a href="{{ route('login') }}" class="block text-gray-700 hover:text-orange-500 transition-colors">Masuk</a>
        <a href="{{ route('register') }}"
           class="block text-center rounded-xl px-3 py-2 font-semibold bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-md hover:opacity-95 transition-all duration-150">
          Daftar
        </a>
      @endauth
    </div>
  </div>
</nav>
