<nav class="flex justify-between items-center px-8 py-4 bg-white/40 backdrop-blur-md rounded-b-2xl shadow-lg">
  <div class="flex items-center gap-6">
    <a href="{{ url('/') }}" class="font-bold text-lg text-gray-800">📸 PicCrown</a>
    @auth
      <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-orange-500">Dashboard</a>
      <a href="{{ route('photos.create') }}" class="text-gray-700 hover:text-orange-500">Upload Foto</a>
      <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-orange-500">Profil</a>
    @else
      <a href="{{ route('login') }}" class="text-gray-700 hover:text-orange-500">Masuk</a>
      <a href="{{ route('register') }}" class="text-gray-700 hover:text-orange-500">Daftar</a>
    @endauth
  </div>

  @auth
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="text-sm text-gray-600 hover:text-red-500 font-semibold">Keluar</button>
    </form>
  @endauth
</nav>