<aside class="hidden md:flex flex-col w-64 bg-white/30 backdrop-blur-xl border-r border-white/20 p-6 space-y-8">
  <div class="flex items-center">
      <a href="{{ url('/') }}" class="flex items-center gap-2 font-extrabold text-lg text-amber-600 hover:text-amber-700 transition-colors">
        <img src="/images/PicCrownLogo.svg" alt="PicCrown" class="h-9 w-auto">
        <span>PicCrown</span>
      </a>
    </div>
  <nav class="flex flex-col space-y-3 text-gray-800 font-medium">
    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-orange-100 transition">
      <i class="fa-solid fa-house text-orange-500"></i> Beranda
    </a>
    <a href="{{ route('photos.create') }}" class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-orange-100 transition">
      <i class="fa-solid fa-upload text-orange-500"></i> Upload Foto
    </a>
    </a>
    <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-orange-100 transition">
      <i class="fa-solid fa-user text-orange-500"></i> Profil
    </a>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="flex items-center gap-3 px-4 py-2 w-full text-left rounded-xl hover:bg-orange-100 transition">
        <i class="fa-solid fa-right-from-bracket text-orange-500"></i> Logout
      </button>
    </form>
  </nav>
</aside>
