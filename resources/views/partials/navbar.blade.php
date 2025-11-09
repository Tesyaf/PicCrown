<nav class="sticky top-0 z-20 bg-white/60 backdrop-blur-md border-b border-amber-100/70 shadow-md">
  <div class="mx-auto max-w-6xl px-6 h-14 flex items-center justify-between">
    {{-- Logo --}}
    <div class="flex items-center gap-2">
      <a href="{{ url('/') }}" class="flex items-center gap-2 font-extrabold text-lg text-amber-600 hover:text-amber-700 transition-colors">
        <img src="/images/PicCrownLogo.svg" alt="PicCrown" class="h-7 w-auto">
        <span>PicCrown</span>
      </a>
    </div>

    {{-- Menu kanan --}}
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
  </div>
</nav>