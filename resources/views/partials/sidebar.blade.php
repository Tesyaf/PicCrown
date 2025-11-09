<aside x-data="{ open: false }" class="relative">
  <!-- Tombol toggle untuk HP -->
  <button @click="open = !open"
    class="md:hidden fixed top-4 left-4 z-30 bg-white/70 backdrop-blur-lg border border-white/20 shadow-lg p-2 rounded-lg text-amber-600 hover:bg-orange-50 transition-all duration-200">
    <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
      viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
      viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg>
  </button>

  <!-- Sidebar utama -->
  <div
    class="fixed inset-y-0 left-0 w-64 transform bg-white/30 backdrop-blur-xl border-r border-white/20 p-6 space-y-8 shadow-xl z-20 transition-transform duration-300 ease-in-out md:translate-x-0"
    :class="{ '-translate-x-full': !open, 'translate-x-0': open }">

    <div class="flex items-center justify-between">
      <a href="{{ url('/') }}" class="flex items-center gap-2 font-extrabold text-lg text-amber-600 hover:text-amber-700 transition-colors">
        <img src="/images/PicCrownLogo.svg" alt="PicCrown" class="h-9 w-auto">
        <span>PicCrown</span>
      </a>
      <!-- Tombol close (khusus mobile) -->
      <button @click="open = false" class="md:hidden text-amber-600 hover:text-orange-500 transition">
        <i class="fa-solid fa-xmark text-lg"></i>
      </button>
    </div>

    <nav class="flex flex-col space-y-3 text-gray-800 font-medium">
      <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-orange-100 transition">
        <i class="fa-solid fa-house text-orange-500"></i> Beranda
      </a>
      <a href="{{ route('photos.create') }}" class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-orange-100 transition">
        <i class="fa-solid fa-upload text-orange-500"></i> Upload Foto
      </a>
      <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-orange-100 transition">
        <i class="fa-solid fa-user text-orange-500"></i> Profil
      </a>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
          class="flex items-center gap-3 px-4 py-2 w-full text-left rounded-xl hover:bg-orange-100 transition">
          <i class="fa-solid fa-right-from-bracket text-orange-500"></i> Logout
        </button>
      </form>
    </nav>
  </div>

  <!-- Overlay hitam transparan (klik untuk tutup di HP) -->
  <div x-show="open" @click="open = false"
       class="fixed inset-0 bg-black/40 backdrop-blur-sm z-10 md:hidden"
       x-transition:enter="transition-opacity ease-out duration-200"
       x-transition:enter-start="opacity-0"
       x-transition:enter-end="opacity-100"
       x-transition:leave="transition-opacity ease-in duration-150"
       x-transition:leave-start="opacity-100"
       x-transition:leave-end="opacity-0">
  </div>
</aside>
