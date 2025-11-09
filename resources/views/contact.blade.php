@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-amber-50 to-yellow-100 px-6 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-6xl w-full">

        {{-- Kiri: Info Kontak --}}
        <div class="flex flex-col justify-center bg-white/80 backdrop-blur-xl rounded-3xl border border-white/40 shadow-lg p-10">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Hubungi Kami</h1>
            <p class="text-gray-600 mb-8 leading-relaxed">
                Tim <span class="font-semibold text-orange-500">PicCrown</span> siap membantu Anda.
                Hubungi kami melalui kanal resmi berikut.
            </p>

            <div class="space-y-5">
                {{-- WhatsApp --}}
                <div class="flex items-center gap-4 hover:bg-orange-50 rounded-xl p-3 transition">
                    <div class="w-11 h-11 flex items-center justify-center rounded-xl bg-orange-100 text-orange-600">
                        <i class="fa-brands fa-whatsapp text-xl"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">WhatsApp</p>
                        <a href="https://wa.me/6281234567890" target="_blank"
                            class="text-sm text-gray-600 hover:text-orange-600 transition">+62 812 3456 7890</a>
                    </div>
                </div>

                {{-- Email --}}
                <div class="flex items-center gap-4 hover:bg-orange-50 rounded-xl p-3 transition">
                    <div class="w-11 h-11 flex items-center justify-center rounded-xl bg-orange-100 text-orange-600">
                        <i class="fa-solid fa-envelope text-lg"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Email</p>
                        <a href="mailto:contact@piccrown.com"
                            class="text-sm text-gray-600 hover:text-orange-600 transition">contact@piccrown.com</a>
                    </div>
                </div>

                {{-- Instagram --}}
                <div class="flex items-center gap-4 hover:bg-orange-50 rounded-xl p-3 transition">
                    <div class="w-11 h-11 flex items-center justify-center rounded-xl bg-orange-100 text-orange-600">
                        <i class="fa-brands fa-instagram text-lg"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Instagram</p>
                        <a href="https://instagram.com/piccrown.id" target="_blank"
                            class="text-sm text-gray-600 hover:text-orange-600 transition">@piccrown.id</a>
                    </div>
                </div>

                {{-- Twitter / X --}}
                <div class="flex items-center gap-4 hover:bg-orange-50 rounded-xl p-3 transition">
                    <div class="w-11 h-11 flex items-center justify-center rounded-xl bg-orange-100 text-orange-600">
                        <i class="fa-brands fa-x-twitter text-lg"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Twitter / X</p>
                        <a href="https://x.com/piccrown" target="_blank"
                            class="text-sm text-gray-600 hover:text-orange-600 transition">@piccrown</a>
                    </div>
                </div>
            </div>

            <div class="mt-10 text-sm text-gray-600 border-t border-amber-200 pt-4">
                <p><span class="font-semibold text-orange-500">Jam Operasional:</span> Senin – Jumat, 09:00 – 18:00</p>
                <p><span class="font-semibold text-orange-500">Respon Cepat:</span> WhatsApp & Instagram DM</p>
            </div>
        </div>

        {{-- Kanan: Ilustrasi / Branding --}}
        <div class="flex items-center justify-center relative">
            <div class="absolute inset-0 bg-gradient-to-tr from-amber-100 to-orange-50 rounded-3xl blur-3xl opacity-50"></div>
            <div class="relative bg-white/70 backdrop-blur-lg rounded-3xl border border-white/30 shadow-md p-12 flex flex-col items-center text-center space-y-6">
                <div class="relative overflow-hidden rounded-2xl shadow-lg">
                    <img src="{{ asset('images/contact-minimal.jpg') }}"
                        alt="PicCrown Office"
                        class="object-cover w-full h-96 rounded-2xl scale-105 hover:scale-110 transition-transform duration-700 ease-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-amber-200/40 via-transparent to-white/60"></div>
                </div>

                <h2 class="text-2xl font-semibold text-gray-800">Terhubung Dengan Kami</h2>
                <p class="text-gray-600 text-sm max-w-sm leading-relaxed">
                    Dapatkan update terbaru tentang event, fitur baru, dan komunitas kreatif dari PicCrown.
                </p>
                <div class="flex gap-4 text-xl text-gray-500">
                    <a href="https://instagram.com/piccrown.id" target="_blank" class="hover:text-orange-600 transition"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://x.com/piccrown" target="_blank" class="hover:text-orange-600 transition"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="https://wa.me/6281234567890" target="_blank" class="hover:text-orange-600 transition"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="mailto:contact@piccrown.com" class="hover:text-orange-600 transition"><i class="fa-solid fa-envelope"></i></a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection