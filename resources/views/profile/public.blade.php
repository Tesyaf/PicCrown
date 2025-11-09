@extends('layouts.app')

@section('title', $user->name . ' — PicCrown')

@section('content')
<div x-data="profileTabs()" class="min-h-screen bg-white text-neutral-900 selection:bg-amber-200 selection:text-neutral-900 relative overflow-hidden">

  {{-- Glow background --}}
  <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
    <div class="absolute top-[-160px] left-[-160px] w-[560px] h-[560px] rounded-full bg-[radial-gradient(closest-side,rgba(253,224,71,.9),rgba(253,224,71,.3),transparent_70%)] blur-3xl opacity-35"></div>
    <div class="absolute bottom-[-220px] right-[-220px] w-[800px] h-[800px] rounded-full bg-[radial-gradient(closest-side,rgba(251,191,36,.9),rgba(249,115,22,.25),transparent_70%)] blur-3xl opacity-35"></div>
  </div>

  {{-- Navbar minimal --}}
  <nav class="sticky top-0 z-10 bg-white/80 backdrop-blur border-b border-amber-100/70">
    <div class="mx-auto max-w-6xl px-6 h-14 flex items-center justify-between">
      <a href="{{ url('/') }}" class="flex items-center gap-2">
        <img src="{{ asset('images/logo.svg') }}" alt="PicCrown" class="h-7 w-auto">
        <span class="font-extrabold text-amber-600">PicCrown</span>
      </a>
    </div>
  </nav>

  {{-- Header Profil --}}
  <section class="mx-auto max-w-6xl px-6 pt-10 pb-6">
    <div class="flex flex-col md:flex-row md:items-center gap-6">
      <img src="{{ $user->avatar_url ? asset('storage/'.$user->avatar_url) : asset('images/default-avatar.png') }}"
           alt="{{ $user->name }}"
           class="h-28 w-28 rounded-2xl object-cover border border-amber-100/70 shadow-sm">

      <div class="flex-1">
        <div class="flex items-center gap-2 flex-wrap">
          <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">{{ $user->name }}</h1>
          @if($rank <= 50)
            <span class="inline-flex items-center gap-1 rounded-full border border-amber-200 bg-amber-50 px-2 py-1 text-xs text-amber-700">
              <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4"><path d="M5 19h14l-1-9-4 3-3-6-3 6-4-3-1 9z"/></svg>
              Top {{ $rank }}
            </span>
          @endif
        </div>

        <p class="text-neutral-600 mt-2">{{ $user->bio ?? 'Fotografer aktif di PicCrown.' }}</p>

        <div class="mt-2 flex flex-wrap items-center gap-2 text-sm text-neutral-600">
          <span class="inline-flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4"><path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
            Skor rata-rata: {{ $avgScore ?: '0.0' }}
          </span>
          <span class="text-neutral-400">•</span>
          <span>Peringkat komunitas: {{ $rank ? '#' . $rank : '-' }}</span>
        </div>
      </div>

      {{-- Tombol aksi --}}
      <div class="flex items-center gap-3">
        @auth
          @if($isOwner)
            <a href="{{ route('profile.edit') }}" class="inline-flex items-center gap-2 rounded-2xl px-5 py-2.5 font-semibold border border-amber-300 text-amber-700 hover:bg-amber-50 transition">
              <i class="fa-solid fa-pen"></i> Edit Profil
            </a>
            <a href="{{ route('photos.create') }}" class="inline-flex items-center gap-2 rounded-2xl px-5 py-2.5 font-semibold bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-lg hover:opacity-95 transition">
              <i class="fa-solid fa-upload"></i> Unggah Foto
            </a>
          @else
            @if($isFollowing)
              <form method="POST" action="{{ route('users.unfollow', $user) }}">
                @csrf @method('DELETE')
                <button type="submit" class="inline-flex items-center gap-2 rounded-2xl px-5 py-2.5 font-semibold border border-amber-300 text-amber-700 hover:bg-amber-50 transition" onclick="showToast('Berhenti mengikuti {{ $user->name }}')">
                  Batal Ikuti
                </button>
              </form>
            @else
              <form method="POST" action="{{ route('users.follow', $user) }}">
                @csrf
                <button type="submit" class="inline-flex items-center gap-2 rounded-2xl px-5 py-2.5 font-semibold bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-lg hover:opacity-95 transition" onclick="showToast('Mengikuti {{ $user->name }} 🎉')">
                  Ikuti
                </button>
              </form>
            @endif
          @endif
        @endauth
      </div>
    </div>
  </section>

  {{-- Statistik --}}
  <section class="mx-auto max-w-6xl px-6 pb-2">
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
      @php
        $stats = [
          ['value' => $photos->count(), 'label' => 'Foto'],
          ['value' => $user->followers()->count(), 'label' => 'Pengikut'],
          ['value' => $user->following()->count(), 'label' => 'Mengikuti'],
          ['value' => number_format($avgScore, 1), 'label' => 'Skor Rata-rata'],
          ['value' => $totalComments, 'label' => 'Komentar'],
          ['value' => $totalLikes, 'label' => 'Like ≥ 4'],
        ];
      @endphp
      @foreach($stats as $stat)
        <div class="rounded-2xl border border-amber-100/70 bg-white/80 p-5 text-center hover:shadow-lg transition">
          <div class="text-2xl font-extrabold">{{ $stat['value'] }}</div>
          <div class="text-sm text-neutral-600 mt-1">{{ $stat['label'] }}</div>
        </div>
      @endforeach
    </div>
  </section>

  {{-- Tabs --}}
  <section class="mx-auto max-w-6xl px-6 pt-4 pb-6 flex items-center gap-2 flex-wrap">
    <button @click="switchTab('photos')" :class="tabButton('photos')" class="px-4 py-2 rounded-xl text-sm font-semibold transition-all">Foto</button>
    @if($isOwner)
      <button @click="switchTab('likes')" :class="tabButton('likes')" class="px-4 py-2 rounded-xl text-sm font-semibold transition-all">Disukai</button>
    @endif
    <button @click="switchTab('about')" :class="tabButton('about')" class="px-4 py-2 rounded-xl text-sm font-semibold transition-all">Tentang</button>
  </section>

  {{-- Konten Foto --}}
  <div class="mx-auto max-w-6xl px-6 pb-12">

    {{-- Tab Foto --}}
    <div x-show="tab==='photos'" x-transition.opacity.duration.300ms x-data="{ visible: 8 }">
      <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach($photos as $index => $photo)
          <a x-show="{{ $index }} < visible" x-transition.opacity
             href="{{ route('photos.show', $photo->id) }}"
             class="group relative overflow-hidden rounded-2xl border border-amber-100/70 bg-gradient-to-br from-yellow-100 via-amber-100 to-orange-100 shadow-sm hover:shadow-xl transition-all duration-300">
            <img src="{{ $photo->url }}" alt="{{ $photo->title }}"
                 class="aspect-[4/3] object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 bg-gradient-to-t from-black/50 to-transparent transition-all duration-300"></div>
            <div class="absolute bottom-2 left-3 right-3 flex items-center justify-between text-xs text-white/90">
              <span class="truncate">{{ $photo->title }}</span>
              <span class="inline-flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-3.5 h-3.5"><path d="M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                {{ number_format($photo->avg_score, 1) }}
              </span>
            </div>
          </a>
        @endforeach
      </div>

      @if($photos->count() > 8)
        <div class="text-center mt-8">
          <button x-show="visible < {{ count($photos) }}" @click="visible += 8"
                  class="px-6 py-2 rounded-xl text-sm font-semibold bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow hover:opacity-90 transition">
            Muat Lebih Banyak
          </button>
        </div>
      @endif
    </div>

    {{-- Tab Disukai --}}
    <div x-show="tab==='likes'" x-cloak x-transition.opacity.duration.300ms>
      @if($isOwner)
        <div class="rounded-2xl border border-amber-100/70 bg-white/70 backdrop-blur-sm p-10 text-center">
          <h3 class="text-xl font-extrabold mb-1">Foto yang Kamu Sukai</h3>
          <p class="text-neutral-600">Saat kamu menyukai foto, foto-foto favoritmu akan tampil di sini.</p>
        </div>
      @else
        <div class="rounded-2xl border border-amber-100/70 bg-white/70 backdrop-blur-sm p-8 text-center text-neutral-600">
          Tab ini bersifat privat.
        </div>
      @endif
    </div>

    {{-- Tab Tentang --}}
    <div x-show="tab==='about'" x-cloak x-transition.opacity.duration.300ms>
      <div class="rounded-2xl border border-amber-100/70 bg-white/80 p-6">
        <h3 class="text-lg font-semibold mb-3">Tentang</h3>
        <p class="text-neutral-700 mb-4">{{ $user->about ?? 'Belum ada deskripsi.' }}</p>
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1 py-3 border-b border-amber-100/70">
          <span class="text-sm text-neutral-500">Lokasi</span>
          <span class="font-medium">{{ $user->location ?? '-' }}</span>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1 py-3 border-b border-amber-100/70">
          <span class="text-sm text-neutral-500">Bergabung</span>
          <span class="font-medium">{{ $user->created_at->translatedFormat('F Y') }}</span>
        </div>
      </div>
    </div>
  </div>

  {{-- Footer --}}
  <footer class="mx-auto max-w-6xl px-6 py-10 text-sm text-neutral-500 text-center">
    © {{ now()->year }} PicCrown. Semua hak cipta.
  </footer>

  {{-- Toast Notification --}}
  <div x-data="{ show: false, message: '' }" 
       x-show="show" 
       x-transition 
       class="fixed top-5 right-5 bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-4 py-2 rounded-xl shadow-lg text-sm z-50">
    <span x-text="message"></span>
  </div>

</div>

{{-- Alpine.js --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
function profileTabs() {
  return {
    tab: 'photos',
    switchTab(newTab) {
      this.tab = newTab;
      window.scrollTo({ top: 0, behavior: 'smooth' });
    },
    tabButton(current) {
      return this.tab === current
        ? 'bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-lg'
        : 'border border-amber-200 text-amber-700 hover:bg-amber-50 hover:shadow transition';
    }
  }
}

// Toast helper
function showToast(text) {
  const toastEl = document.querySelector('[x-data] > [x-show]');
  const comp = Alpine.$data(toastEl.parentElement);
  comp.message = text;
  comp.show = true;
  setTimeout(() => comp.show = false, 3000);
}
</script>
@endsection
