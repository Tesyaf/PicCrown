@extends('layouts.app')

@section('title', $photo->title)

@section('content')
<div class="min-h-screen py-10 sm:py-16 px-4 sm:px-6 bg-gradient-to-br from-amber-50 via-yellow-50 to-orange-100 flex justify-center">
  <div class="max-w-3xl w-full space-y-10">

    <!-- Detail Foto -->
    <div class="backdrop-blur-xl bg-white/40 border border-white/20 rounded-3xl shadow-2xl p-6 sm:p-8 hover:shadow-3xl transition-all duration-300">
      <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $photo->title }}</h1>

      <div class="relative mb-6 overflow-hidden rounded-2xl border border-amber-100/70 shadow-md">
        <img src="{{ $photo->encrypted_path }}" alt="{{ $photo->title }}"
             class="w-full object-cover max-h-[450px] transition-transform duration-500 hover:scale-[1.02]">
      </div>

      <p class="text-gray-700 text-lg leading-relaxed mb-4">
        {{ $photo->description ?? 'Tidak ada deskripsi untuk foto ini.' }}
      </p>

      <div class="flex items-center justify-between border-t border-gray-300/40 pt-4 flex-wrap gap-3">
        <div class="flex items-center gap-2">
          <span class="text-sm font-medium text-gray-700">Rata-rata Rating:</span>
          <div class="flex items-center gap-1">
            @for ($i = 1; $i <= 5; $i++)
              <svg class="w-5 h-5 {{ $i <= round($averageRating) ? 'text-orange-500' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.457a1 1 0 00-.364 1.118l1.286 3.967c.3.921-.755 1.688-1.54 1.118l-3.38-2.457a1 1 0 00-1.175 0l-3.38 2.457c-.784.57-1.838-.197-1.54-1.118l1.286-3.967a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/>
              </svg>
            @endfor
          </div>
          <span class="ml-2 text-lg font-semibold text-orange-500">{{ number_format($averageRating, 1) }}/5</span>
        </div>

        @auth
        @if (auth()->id() === $photo->user_id)
          <div class="flex items-center gap-3">
            <a href="{{ route('photos.edit', $photo->id) }}"
               class="inline-flex items-center gap-2 text-sm font-semibold text-orange-600 hover:text-orange-700 transition">
              ✏️ Edit
            </a>
            <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?')" class="inline">
              @csrf @method('DELETE')
              <button type="submit"
                      class="inline-flex items-center gap-2 text-sm font-semibold text-red-600 hover:text-red-700 transition">
                🗑️ Hapus
              </button>
            </form>
          </div>
        @endif
        @endauth
      </div>
    </div>

    <!-- Komentar -->
    <div class="backdrop-blur-xl bg-white/30 border border-white/20 rounded-3xl shadow-xl p-6 sm:p-8">
      <h2 class="text-2xl font-semibold text-gray-900 mb-6">Komentar & Penilaian</h2>

      @forelse ($mainComments as $comment)
        <div x-data="{ showReply: false, showEdit: false, openMenu: false }"
             class="mb-8 border-l-4 border-transparent hover:border-amber-300 transition-all duration-300 pl-2">

          <div class="p-4 bg-white/60 rounded-xl shadow-inner border border-amber-100/50">
            <div class="flex justify-between items-start">
              <div>
                <p class="font-semibold text-gray-900">{{ $comment->user->name ?? 'Anonim' }}</p>
                @if ($comment->score)
                  <div class="flex gap-1 text-orange-500 text-sm">
                    @for ($i = 1; $i <= 5; $i++)
                      <svg class="w-4 h-4 {{ $i <= $comment->score ? 'text-orange-500' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.457a1 1 0 00-.364 1.118l1.286 3.967c.3.921-.755 1.688-1.54 1.118l-3.38-2.457a1 1 0 00-1.175 0l-3.38 2.457c-.784.57-1.838-.197-1.54-1.118l1.286-3.967a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/>
                      </svg>
                    @endfor
                  </div>
                @endif
                <p class="mt-2 text-gray-800 whitespace-pre-line">{{ $comment->encrypted_comment }}</p>
              </div>

              <!-- Menu Titik Tiga -->
              <div class="relative">
                <button @click="openMenu = !openMenu" class="p-2 text-gray-500 hover:text-gray-700">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zm0 6a.75.75 0 110-1.5.75.75 0 010 1.5zm0 6a.75.75 0 110-1.5.75.75 0 010 1.5z"/>
                  </svg>
                </button>

                <div x-show="openMenu" @click.away="openMenu = false"
                     x-transition
                     class="absolute right-0 mt-2 w-36 bg-white border border-gray-200 rounded-lg shadow-lg py-1 z-50 text-sm origin-top-right">
                  <button @click="showReply = !showReply; openMenu = false"
                    class="block w-full text-left px-4 py-2 hover:bg-amber-50 text-amber-700">Balas</button>
                  @if (Auth::id() === $comment->user_id)
                    <button @click="showEdit = !showEdit; openMenu = false"
                      class="block w-full text-left px-4 py-2 hover:bg-blue-50 text-blue-600">Edit</button>
                    <form action="{{ route('ratings.destroy', $comment->id) }}" method="POST"
                          onsubmit="return confirm('Hapus komentar ini?')">
                      @csrf @method('DELETE')
                      <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-red-50 text-red-600">Hapus</button>
                    </form>
                  @endif
                </div>
              </div>
            </div>

            <!-- Edit Form -->
            <form x-show="showEdit" x-collapse x-transition
                  action="{{ route('ratings.update', $comment->id) }}" method="POST" class="mt-4 space-y-3">
              @csrf @method('PUT')
              <textarea name="comment" rows="2" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400">{{ $comment->encrypted_comment }}</textarea>
              <button type="submit" class="px-4 py-2 bg-blue-500 text-white text-sm font-semibold rounded-lg hover:bg-blue-600">Simpan</button>
            </form>

            <!-- Reply Form -->
            <form x-show="showReply" x-collapse x-transition
                  action="{{ route('ratings.store', $photo->id) }}" method="POST" class="mt-4 space-y-3">
              @csrf
              <input type="hidden" name="parent_id" value="{{ $comment->id }}">
              <textarea name="comment" rows="2" placeholder="Tulis balasan..."
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-amber-400"></textarea>
              <button type="submit" class="px-4 py-2 bg-amber-500 text-white text-sm font-semibold rounded-lg hover:bg-amber-600">Kirim Balasan</button>
            </form>

            <!-- Balasan -->
            @if ($comment->replies->isNotEmpty())
              <div class="ml-8 mt-4 space-y-3 border-l-2 border-amber-200 pl-4">
                @foreach ($comment->replies as $reply)
                  <div class="bg-white/40 p-3 rounded-lg shadow-inner border border-amber-100/50">
                    <div class="flex justify-between items-start">
                      <p class="font-medium text-gray-800">{{ $reply->user->name ?? 'Anonim' }}</p>
                      <span class="text-xs text-gray-500">{{ $reply->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="mt-1 text-gray-700">{{ $reply->encrypted_comment }}</p>
                  </div>
                @endforeach
              </div>
            @endif
          </div>
        </div>
      @empty
        <p class="text-gray-600 text-center italic">Belum ada komentar.</p>
      @endforelse

      <!-- Tambah Komentar -->
      <div class="mt-10 border-t border-gray-300/30 pt-6">
        <h3 class="text-xl font-semibold text-gray-900 mb-4">Tulis Komentar</h3>
        <form action="{{ route('ratings.store', $photo->id) }}" method="POST" class="space-y-5">
          @csrf
          <div x-data="{ rating: 0 }" class="flex items-center gap-2 justify-center sm:justify-start">
            <template x-for="i in 5">
              <svg @click="rating = i" :class="i <= rating ? 'text-orange-500 scale-110' : 'text-gray-300'"
                   class="w-8 h-8 cursor-pointer transition-all transform duration-200"
                   fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.457a1 1 0 00-.364 1.118l1.286 3.967c.3.921-.755 1.688-1.54 1.118l-3.38-2.457a1 1 0 00-1.175 0l-3.38 2.457c-.784.57-1.838-.197-1.54-1.118l1.286-3.967a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/>
              </svg>
            </template>
            <input type="hidden" name="score" x-model="rating">
          </div>

          <textarea name="comment" id="comment" rows="3" placeholder="Tulis komentar Anda..."
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-400 outline-none resize-none backdrop-blur-md bg-white/50 text-gray-800 placeholder-gray-500 transition"></textarea>

          <button type="submit"
            class="w-full py-3 bg-gradient-to-r from-yellow-400 via-amber-500 to-orange-600 text-white font-semibold rounded-lg shadow-lg hover:opacity-95 transform hover:scale-[1.03] transition-all duration-300">
            Kirim Komentar
          </button>
        </form>
      </div>
    </div>

  </div>
</div>

<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
  // Auto-resize textarea komentar utama
  const textarea = document.getElementById('comment');
  if (textarea) {
    textarea.addEventListener('input', () => {
      textarea.style.height = 'auto';
      textarea.style.height = `${textarea.scrollHeight}px`;
    });
  }
</script>
@endsection
