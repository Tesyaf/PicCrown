@extends('layouts.app') 

@section('title', 'Profil Publik ' . $user->name)

@section('content')
<div class="container mx-auto p-6">
    
    {{-- Header Profil Publik --}}
    <div class="bg-white p-8 rounded-lg shadow-xl mb-8 text-center">
        {{-- Jika ingin menampilkan gambar profil --}}
        {{--  --}}
        
        <h1 class="text-4xl font-extrabold text-gray-900 mb-2">{{ $user->name }}</h1>
        <p class="text-xl text-indigo-600">
            <span class="text-gray-500">@</span>{{ $user->username ?? 'Tidak ada username' }}
        </p>
        
        {{-- Opsional: Tombol Follow / Kirim Pesan --}}
        @auth
            @if (Auth::id() !== $user->id)
                <button class="mt-4 bg-indigo-500 text-white py-2 px-4 rounded hover:bg-indigo-600 transition">
                    Ikuti
                </button>
            @endif
        @endauth
    </div>

    {{-- Galeri Foto --}}
    <h2 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-2">Foto Terbaru dari {{ $user->name }}</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
        
        @forelse ($photos as $photo)
            <a href="{{ route('photos.show', $photo) }}" class="block overflow-hidden rounded-lg shadow-md hover:shadow-xl transform hover:scale-[1.02] transition duration-300">
                {{-- Ambil path yang sudah didekripsi dari accessor model --}}
                <img 
                    src="{{ asset('storage/' . $photo->encrypted_path) }}" 
                    alt="{{ $photo->title }}" 
                    class="w-full h-48 object-cover"
                >
                <div class="p-3 bg-white">
                    <h3 class="text-sm font-semibold text-gray-800 truncate">{{ $photo->title }}</h3>
                </div>
            </a>
        @empty
            <div class="col-span-full bg-gray-100 border-l-4 border-gray-400 text-gray-700 p-4 rounded" role="alert">
                <p class="font-bold">{{ $user->name }}</p>
                <p>Pengguna ini belum mengunggah foto publik.</p>
            </div>
        @endforelse
        
    </div>
</div>
@endsection