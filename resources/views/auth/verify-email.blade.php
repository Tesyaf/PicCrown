<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - PicCrown</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-br from-amber-100 via-yellow-50 to-amber-100">
    <div class="flex-1 flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <!-- Card Container -->
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border-t-4 border-orange-500">
                <!-- Header -->
                <div class="bg-gradient-to-r from-amber-100 to-yellow-50 px-8 py-8 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 bg-orange-100 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800">Verifikasi Email</h1>
                    <p class="text-gray-600 text-sm mt-2">Masukkan kode verifikasi yang telah kami kirimkan</p>
                </div>

                <!-- Form Body -->
                <form action="#" method="POST" class="px-8 py-8">
                    <!-- Email Display -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Anda</label>
                        <div class="w-full px-4 py-3 bg-amber-50 border-2 border-amber-200 rounded-lg text-gray-700 font-medium">
                            user@example.com
                        </div>
                    </div>

                    <!-- OTP Input -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-3">Kode Verifikasi (6 digit)</label>
                        <div class="flex gap-2 justify-between">
                            <input type="text" inputmode="numeric" maxlength="1" class="w-12 h-12 text-center text-xl font-bold border-2 border-amber-200 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 bg-yellow-50 transition-all" autofocus />
                            <input type="text" inputmode="numeric" maxlength="1" class="w-12 h-12 text-center text-xl font-bold border-2 border-amber-200 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 bg-yellow-50 transition-all" />
                            <input type="text" inputmode="numeric" maxlength="1" class="w-12 h-12 text-center text-xl font-bold border-2 border-amber-200 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 bg-yellow-50 transition-all" />
                            <input type="text" inputmode="numeric" maxlength="1" class="w-12 h-12 text-center text-xl font-bold border-2 border-amber-200 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 bg-yellow-50 transition-all" />
                            <input type="text" inputmode="numeric" maxlength="1" class="w-12 h-12 text-center text-xl font-bold border-2 border-amber-200 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 bg-yellow-50 transition-all" />
                            <input type="text" inputmode="numeric" maxlength="1" class="w-12 h-12 text-center text-xl font-bold border-2 border-amber-200 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 bg-yellow-50 transition-all" />
                        </div>
                    </div>

                    <!-- Verify Button -->
                    <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                        Verifikasi Email
                    </button>

                    <!-- Info Section -->
                    <div class="mt-6 p-4 bg-amber-50 rounded-lg border border-amber-200">
                        <p class="text-sm text-gray-700">
                            <span class="font-semibold text-orange-600">Tidak menerima kode?</span>
                            <a href="#" class="text-orange-600 hover:text-orange-700 font-medium underline">
                                Kirim ulang
                            </a>
                        </p>
                    </div>

                    <!-- Security Footer -->
                    <div class="mt-6 pt-6 border-t border-amber-100 text-center">
                        <p class="text-xs text-gray-500 flex items-center justify-center gap-1">
                            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414L10 3.586l4.707 4.707a1 1 0 01-1.414 1.414L10 6.414l-3.293 3.293a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Email Anda aman dan terlindungi
                        </p>
                    </div>
                </form>
            </div>

            <!-- Footer Link -->
            <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">
                    Email salah? 
                    <a href="#" class="text-orange-600 hover:text-orange-700 font-medium underline">
                        Kembali ke login
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script>
        const inputs = document.querySelectorAll('input[type="text"]');
        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                if (e.target.value && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !e.target.value && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });
    </script>
</body>
</html>