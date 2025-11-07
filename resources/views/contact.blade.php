<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - PicCrown</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-br from-amber-100 via-yellow-50 to-amber-100">
    <div class="flex-1 flex items-center justify-center p-4 py-16">
        <div class="w-full max-w-2xl">
            <!-- Card Container -->
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border-t-4 border-orange-500">
                <!-- Header -->
                <div class="bg-gradient-to-r from-amber-100 to-yellow-50 px-8 py-10 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-orange-100 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-800">Hubungi Kami</h1>
                    <p class="text-gray-600 text-sm mt-2">Kami senang mendengar dari Anda. Silakan isi formulir di bawah ini</p>
                </div>

                <!-- Form Body -->
                <form action="{{ route('contact.store') }}" method="POST" class="px-8 py-10">
                    @csrf

                    <!-- Row 1: Name and Email -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Name Input -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                required
                                class="w-full px-4 py-3 border-2 border-amber-200 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 bg-yellow-50 transition-all @error('name') border-red-500 @enderror"
                                placeholder="John Doe"
                                value="{{ old('name') }}"
                            />
                            @error('name')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                required
                                class="w-full px-4 py-3 border-2 border-amber-200 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 bg-yellow-50 transition-all @error('email') border-red-500 @enderror"
                                placeholder="email@example.com"
                                value="{{ old('email') }}"
                            />
                            @error('email')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Phone Input -->
                    <div class="mb-6">
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                        <input 
                            type="tel" 
                            id="phone" 
                            name="phone"
                            class="w-full px-4 py-3 border-2 border-amber-200 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 bg-yellow-50 transition-all @error('phone') border-red-500 @enderror"
                            placeholder="+62 812 3456 7890"
                            value="{{ old('phone') }}"
                        />
                        @error('phone')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Subject Input -->
                    <div class="mb-6">
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                        <select 
                            id="subject" 
                            name="subject" 
                            required
                            class="w-full px-4 py-3 border-2 border-amber-200 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 bg-yellow-50 transition-all @error('subject') border-red-500 @enderror"
                        >
                            <option value="">-- Pilih Subjek --</option>
                            <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>Pertanyaan Umum</option>
                            <option value="support" {{ old('subject') == 'support' ? 'selected' : '' }}>Dukungan Teknis</option>
                            <option value="feedback" {{ old('subject') == 'feedback' ? 'selected' : '' }}>Umpan Balik</option>
                            <option value="partnership" {{ old('subject') == 'partnership' ? 'selected' : '' }}>Kerjasama</option>
                            <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('subject')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Message Textarea -->
                    <div class="mb-6">
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                        <textarea 
                            id="message" 
                            name="message" 
                            required
                            rows="5"
                            class="w-full px-4 py-3 border-2 border-amber-200 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 bg-yellow-50 transition-all resize-none @error('message') border-red-500 @enderror"
                            placeholder="Tuliskan pesan Anda di sini..."
                        >{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Checkbox -->
                    <div class="mb-6 flex items-center gap-3">
                        <input 
                            type="checkbox" 
                            id="agree" 
                            name="agree" 
                            required
                            class="w-4 h-4 text-orange-600 bg-yellow-50 border-amber-200 rounded focus:ring-orange-500 cursor-pointer"
                            {{ old('agree') ? 'checked' : '' }}
                        />
                        <label for="agree" class="text-sm text-gray-700">
                            Saya setuju dengan 
                            <a href="#" class="text-orange-600 hover:text-orange-700 font-medium underline">kebijakan privasi</a>
                        </label>
                    </div>

                    @error('agree')
                        <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-red-600 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full py-3 px-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                        Kirim Pesan
                    </button>

                    <!-- Info Section -->
                    <div class="mt-6 p-4 bg-amber-50 rounded-lg border border-amber-200">
                        <p class="text-sm text-gray-700">
                            <span class="font-semibold text-orange-600">Response Time:</span> Kami biasanya merespons dalam 24 jam kerja
                        </p>
                    </div>
                </form>

                <!-- Alternative Contact Info -->
                <div class="bg-amber-50 border-t border-amber-200 px-8 py-6">
                    <p class="text-sm text-gray-600 mb-4 font-medium">Cara Lain Menghubungi Kami:</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Email</p>
                            <p class="text-sm font-medium text-gray-800">contact@piccrown.com</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Telepon</p>
                            <p class="text-sm font-medium text-gray-800">+62 21 1234 5678</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Jam Operasional</p>
                            <p class="text-sm font-medium text-gray-800">Senin - Jumat, 09:00 - 18:00</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back Link -->
            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-orange-600 hover:text-orange-700 font-medium text-sm">
                    ← Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="fixed bottom-4 right-4 p-4 bg-green-500 text-white rounded-lg shadow-lg animate-pulse">
            {{ session('success') }}
        </div>
    @endif
</body>
</html>