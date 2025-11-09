<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'PicCrown') }} | @yield('title', 'Akses')</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        * { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-yellow-50 via-amber-50 to-amber-100 flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <div class="relative">
            
            @yield('content')

        </div>

        <div class="mt-6 text-center">
             <p class="text-xs text-amber-700 flex items-center justify-center gap-2">
                 Proses verifikasi 100% aman
             </p>
         </div>
    </div>
</body>
</html>