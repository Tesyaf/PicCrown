@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="flex-1">
    <!-- Hero Section -->
    <section class="py-20 px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="space-y-6">
                    <h1 class="text-5xl md:text-6xl font-bold text-gray-800 leading-tight">
                        Selamat Datang di <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-orange-600">PicCrown</span>
                    </h1>
                    <p class="text-lg text-gray-600">
                        Platform terpercaya untuk membuat desain grafis yang memukau tanpa perlu keahlian teknis. Wujudkan ide kreatif Anda dengan mudah.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-200 shadow-lg hover:shadow-xl text-center">
                            Mulai Gratis
                        </a>
                        <a href="{{ route('contact') }}" class="px-8 py-4 border-2 border-orange-500 text-orange-600 font-semibold rounded-lg hover:bg-orange-50 transition-all duration-200 text-center">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="relative">
                    <div class="w-full aspect-square bg-gradient-to-br from-amber-100 to-yellow-50 rounded-2xl shadow-2xl flex items-center justify-center border-4 border-orange-200">
                        <div class="text-center space-y-4">
                            <div class="w-24 h-24 mx-auto bg-orange-100 rounded-full flex items-center justify-center">
                                <svg class="w-12 h-12 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600 font-medium">Buat Desain Memukau</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 px-4 bg-white bg-opacity-50">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Fitur Unggulan</h2>
                <p class="text-gray-600 text-lg">Semua yang Anda butuhkan untuk desain profesional</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white rounded-2xl shadow-lg border-t-4 border-orange-500 p-8 hover:shadow-xl transition-all duration-200">
                    <div class="w-14 h-14 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Template Siap Pakai</h3>
                    <p class="text-gray-600">Ribuan template profesional yang dirancang oleh desainer berpengalaman siap digunakan.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white rounded-2xl shadow-lg border-t-4 border-orange-500 p-8 hover:shadow-xl transition-all duration-200">
                    <div class="w-14 h-14 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Editor Intuitif</h3>
                    <p class="text-gray-600">Interface yang user-friendly membuat siapa saja bisa membuat desain tanpa pelatihan khusus.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white rounded-2xl shadow-lg border-t-4 border-orange-500 p-8 hover:shadow-xl transition-all duration-200">
                    <div class="w-14 h-14 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Harga Terjangkau</h3>
                    <p class="text-gray-600">Paket berlangganan yang fleksibel sesuai dengan kebutuhan dan budget Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-gradient-to-r from-amber-100 to-yellow-50 rounded-2xl shadow-2xl border-4 border-orange-200 p-12 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Siap untuk Memulai?</h2>
                <p class="text-gray-600 text-lg mb-8">Bergabunglah dengan ribuan desainer dan kreator yang telah menggunakan PicCrown.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="px-8 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                        Daftar Sekarang
                    </a>
                    <a href="{{ route('login') }}" class="px-8 py-4 border-2 border-orange-500 text-orange-600 font-semibold rounded-lg hover:bg-white transition-all duration-200">
                        Sudah Punya Akun?
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection