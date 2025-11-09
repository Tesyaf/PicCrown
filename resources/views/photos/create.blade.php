@extends('layouts.app')

@section('title', 'Upload Foto Baru')

@section('content')
<div class="max-w-4xl mx-auto">
<h1 class="text-3xl font-bold mb-6">Unggah Foto Baru</h1>
{{-- Form mengarah ke PhotoController@store --}}
<form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md space-y-6">
    @csrf

    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">
            Judul Foto (Maks. 255 karakter) <span class="text-red-500">*</span>
        </label>
        <input 
            type="text" 
            name="title" 
            id="title" 
            value="{{ old('title') }}" 
            required 
            class="w-full border border-gray-300 rounded-md p-2 mt-1"
        >
        @error('title')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- 2. Input Deskripsi --}}
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">
            Deskripsi (Opsional, Maks. 1000 karakter)
        </label>
        <textarea 
            name="description" 
            id="description" 
            rows="4" 
            class="w-full border border-gray-300 rounded-md p-2 mt-1"
        >{{ old('description') }}</textarea>
        @error('description')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- 3. Input File Foto --}}
    <div>
        <label for="photo_file" class="block text-sm font-medium text-gray-700">
            Pilih File Foto <span class="text-red-500">*</span>
        </label>
        <input 
            type="file" 
            name="photo_file" 
            id="photo_file" 
            accept="image/*"
            required 
            class="w-full mt-1"
        >
        <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF. Maksimum: 5MB.</p>
        @error('photo_file')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
    </div>

    {{-- 4. Tombol Submit --}}
    <div class="pt-4 flex justify-end">
        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 transition duration-150">
            Unggah Foto
        </button>
    </div>

</form>
</div>
@endsection