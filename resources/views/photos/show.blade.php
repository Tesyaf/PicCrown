@extends('layouts.app')

@section('title', $photo->title)

@section('content')
<div class="min-h-screen py-16 px-6 bg-gradient-to-br from-amber-50 via-yellow-50 to-orange-100 flex justify-center">
  <div class="max-w-3xl w-full space-y-10">
    
    <!-- Foto Detail -->
    <div class="backdrop-blur-lg bg-white/40 border border-white/30 shadow-2xl rounded-3xl overflow-hidden p-6">
      <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $photo->title }}</h1>
      
      <div class="relative mb-6">
        <img 
          src="{{ $photo->encrypted_path }}" 
          alt="{{ $photo->title }}" 
          class="rounded-2xl shadow-lg w-full object-cover max-h-[450px] transition-transform duration-500 hover:scale-[1.02]"
        >
      </div>

      <p class="text-gray-700 text-lg mb-4 leading-relaxed">
        {{ $photo->description ?? 'Tidak ada deskripsi untuk foto ini.' }}
      </p>

      <div class="flex items-center justify-between">
        <div>
          <span class="text-sm font-medium text-gray-600">Rata-rata Rating:</span>
          <span class="ml-2 text-xl font-semibold text-orange-500">{{ $averageRating }}/5</span>
        </div>
        <div>
          <a href="{{ route('photos.edit', $photo->id) }}" 
            class="inline-flex items-center gap-2 text-sm text-orange-600 hover:text-orange-700 font-semibold transition-colors">
            ✏️ Edit
          </a>
        </div>
      </div>
    </div>

    <!-- Komentar -->
    <div class="backdrop-blur-lg bg-white/30 border border-white/20 shadow-xl rounded-3xl p-6">
      <h2 class="text-2xl font-semibold text-gray-800 mb-6">Komentar & Penilaian</h2>

      @forelse ($mainComments as $comment)
        <div class="mb-8">
          <!-- Komentar utama -->
          <div class="p-4 bg-white/60 rounded-xl shadow-inner">
            <div class="flex justify-between items-start">
              <div>
                <p class="font-semibold text-gray-800">{{ $comment->user->name ?? 'Anonim' }}</p>
                @if ($comment->score)
                  <p class="text-orange-500 text-sm font-medium">⭐ {{ $comment->score }}/5</p>
                @endif
              </div>
              <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <p class="mt-2 text-gray-700">
              {{ decrypt($comment->encrypted_comment) }}
            </p>
          </div>

          <!-- Balasan komentar -->
          @if ($comment->replies->isNotEmpty())
            <div class="ml-8 mt-4 space-y-3 border-l-2 border-orange-200 pl-4">
              @foreach ($comment->replies as $reply)
                <div class="bg-white/40 p-3 rounded-lg shadow-inner">
                  <div class="flex justify-between items-start">
                    <p class="font-medium text-gray-800">{{ $reply->user->name ?? 'Anonim' }}</p>
                    <span class="text-xs text-gray-500">{{ $reply->created_at->diffForHumans() }}</span>
                  </div>
                  <p class="mt-1 text-gray-700">{{ decrypt($reply->encrypted_comment) }}</p>
                </div>
              @endforeach
            </div>
          @endif
        </div>
      @empty
        <p class="text-gray-600 text-center italic">Belum ada komentar.</p>
      @endforelse

      <!-- Form Tambah Komentar -->
      <div class="mt-10 border-t border-gray-300/40 pt-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Tulis Komentar</h3>
        <form action="{{ route('ratings.store', $photo->id) }}" method="POST" class="space-y-4">
          @csrf
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nilai (1–5)</label>
            <select name="score" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-400 outline-none">
              <option value="">Tanpa nilai</option>
              @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
              @endfor
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Komentar</label>
            <textarea name="comment" rows="3" placeholder="Tulis komentar Anda..."
              class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-orange-400 outline-none resize-none"></textarea>
          </div>
          <button type="submit" 
            class="w-full py-3 bg-gradient-to-r from-orange-400 to-orange-500 hover:from-orange-500 hover:to-orange-600 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300">
            Kirim Komentar
          </button>
        </form>
      </div>
    </div>

  </div>
</div>
@endsection
