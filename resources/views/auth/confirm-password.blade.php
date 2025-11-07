@extends('layouts.app')

@section('title', 'Lupa Password')

@section('content')
    <div class="w-full max-w-md">
        <!-- Card Container -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border-t-4 border-orange-500">
            <!-- Header -->
            <div class="bg-gradient-to-r from-amber-100 to-yellow-50 px-8 py-8 text-center border-b-2 border-orange-200">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-orange-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-amber-900 mb-2">Confirm Password</h1>
                <p class="text-sm text-amber-700">Masukkan password Anda untuk keamanan ekstra</p>
            </div>

            <!-- Form Body -->
            <form class="px-8 py-8 space-y-6">
                <!-- Password Input -->
                <div>
                    <label class="block text-sm font-semibold text-amber-900 mb-3">Password</label>
                    <div class="relative">
                        <input 
                            type="password" 
                            placeholder="Masukkan password Anda"
                            class="w-full px-4 py-3 border-2 border-amber-200 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all bg-yellow-50 placeholder-amber-300"
                        >
                        <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-amber-600 hover:text-orange-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Confirm Password Input -->
                <div>
                    <label class="block text-sm font-semibold text-amber-900 mb-3">Confirm Password</label>
                    <div class="relative">
                        <input 
                            type="password" 
                            placeholder="Ulangi password Anda"
                            class="w-full px-4 py-3 border-2 border-amber-200 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all bg-yellow-50 placeholder-amber-300"
                        >
                        <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-amber-600 hover:text-orange-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Password Strength Indicator -->
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <p class="text-xs font-medium text-amber-800">Kekuatan Password</p>
                        <span class="text-xs font-semibold text-orange-600">Medium</span>
                    </div>
                    <div class="w-full h-2 bg-amber-100 rounded-full overflow-hidden">
                        <div class="h-full w-2/3 bg-gradient-to-r from-orange-400 to-orange-500 rounded-full"></div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit"
                    class="w-full py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-lg hover:from-orange-600 hover:to-orange-700 transform transition-all hover:scale-105 shadow-lg active:scale-95"
                >
                    Confirm Password
                </button>

                <!-- Alternative Action -->
                <button 
                    type="button"
                    class="w-full py-2 border-2 border-amber-200 text-amber-900 font-medium rounded-lg hover:bg-amber-50 transition-all"
                >
                    Cancel
                </button>
            </form>

            <!-- Footer Info -->
            <div class="bg-amber-50 px-8 py-4 border-t-2 border-amber-100 text-center">
                <p class="text-xs text-amber-700">Password Anda aman dan terenkripsi dengan aman</p>
            </div>
        </div>

        <!-- Security Info -->
        <div class="mt-6 text-center">
            <p class="text-xs text-amber-700 flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 111.414 1.414L7.414 9l3.293 3.293a1 1 0 01-1.414 1.414l-4-4z" clip-rule="evenodd"></path>
                </svg>
                Proses verifikasi 100% aman
            </p>
        </div>
    </div>
@endsection