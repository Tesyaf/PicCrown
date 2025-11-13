<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'PicCrown') }} | @yield('title', 'Dashboard')</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body x-data="{ sidebarOpen: false }"
      class="bg-gradient-to-br from-amber-50 via-yellow-50 to-orange-100 text-neutral-900 antialiased">

  {{-- ==== NAVBAR (hanya muncul di mobile) ==== --}}
  <header class="sticky top-0 z-40 flex items-center justify-between bg-white/80 backdrop-blur-md shadow-sm px-4 py-3 border-b border-amber-100 lg:hidden">
    <button @click="sidebarOpen = true" class="p-2 rounded-md text-orange-600 hover:bg-orange-50">
      <i class="fa-solid fa-bars text-xl"></i>
    </button>
    <h1 class="font-bold text-lg">PicCrown</h1>
    <a href="{{ route('profile.public', Auth::id()) }}" class="flex items-center gap-2">
      <img src="{{ Auth::user()->avatar_url ? asset('storage/'.Auth::user()->avatar_url) : asset('images/default-avatar.png') }}"
           class="w-8 h-8 rounded-full border border-amber-300"
           alt="Avatar">
    </a>
  </header>

  <div class="flex flex-1 min-h-screen overflow-hidden">

    {{-- ==== SIDEBAR KIRI (overlay di mobile) ==== --}}
<div 
  x-show="sidebarOpen"
  @click.away="sidebarOpen = false"
  x-transition.opacity
  class="fixed inset-0 z-50 bg-black/40 backdrop-blur-sm lg:hidden flex">

  {{-- Panel Sidebar --}}
  <aside 
    x-transition:enter="transition transform duration-300"
    x-transition:enter-start="-translate-x-full opacity-0"
    x-transition:enter-end="translate-x-0 opacity-100"
    x-transition:leave="transition transform duration-300"
    x-transition:leave-start="translate-x-0 opacity-100"
    x-transition:leave-end="-translate-x-full opacity-0"
    class="relative w-64 h-full bg-gradient-to-b from-white to-amber-50 border-r border-amber-100 shadow-xl rounded-r-3xl flex flex-col">
    
    {{-- Header --}}
    <div class="flex items-center justify-between p-4 border-b border-amber-100">
      <div class="flex items-center gap-2">
        <img src="{{ asset('images/PicCrownLogo.svg') }}" class="w-7 h-7" alt="Logo">
        <h2 class="text-lg font-extrabold text-orange-600">PicCrown</h2>
      </div>
      <button @click="sidebarOpen = false" class="text-gray-500 hover:text-orange-500">
        <i class="fa-solid fa-xmark text-xl"></i>
      </button>
    </div>

    {{-- Menu --}}
    <nav class="flex-1 p-5 space-y-4 text-[15px] font-medium text-gray-800">
      <a href="{{ route('dashboard') }}" class="flex items-center gap-3 hover:text-orange-500 transition">
        <i class="fa-solid fa-house"></i> Beranda
      </a>
      <a href="{{ route('photos.create') }}" class="flex items-center gap-3 hover:text-orange-500 transition">
        <i class="fa-solid fa-upload"></i> Upload Foto
      </a>
      <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 hover:text-orange-500 transition">
        <i class="fa-solid fa-user"></i> Profil
      </a>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="flex items-center gap-3 text-left w-full hover:text-orange-500 transition">
          <i class="fa-solid fa-right-from-bracket"></i> Logout
        </button>
      </form>
    </nav>
  </aside>
</div>


    {{-- ==== SIDEBAR KIRI (desktop) ==== --}}
    <aside class="hidden lg:flex w-64 shrink-0 bg-white/60 backdrop-blur-md border-r border-amber-100 shadow-md fixed inset-y-0 left-0 z-30">
      @include('partials.sidebar')
    </aside>

    {{-- ==== KONTEN UTAMA ==== --}}
    <main class="flex-1 px-5 py-8 overflow-y-auto transition-all duration-300 lg:ml-64 lg:mr-80">
      @yield('content')
    </main>

    {{-- ==== SIDEBAR KANAN (hanya tampil di layar besar) ==== --}}
    <aside class="hidden lg:flex w-80 shrink-0 bg-white/60 backdrop-blur-md border-l border-amber-100 shadow-md fixed inset-y-0 right-0 z-20 flex-col">
      <div class="p-6 border-b border-amber-100">
        <h2 class="text-lg font-semibold text-gray-900">Top Kontributor</h2>
      </div>
      <div class="p-6 flex-1 overflow-y-auto space-y-3">
        @yield('sidebar-right')
      </div>
    </aside>

  </div>

  @stack('scripts')
</body>
</html>
