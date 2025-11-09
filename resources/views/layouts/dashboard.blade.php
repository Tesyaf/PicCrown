<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'PicCrown') }} | @yield('title', 'Dashboard')</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gradient-to-br from-amber-50 via-yellow-50 to-orange-100 text-neutral-900 antialiased">
  <div class="flex min-h-screen overflow-hidden">

    {{-- ==== Sidebar kiri ==== --}}
    <aside class="w-64 shrink-0 bg-white/60 backdrop-blur-md border-r border-amber-100 shadow-md fixed inset-y-0 left-0 z-30">
      @include('partials.sidebar')
    </aside>

    {{-- ==== Konten utama ==== --}}
    <main class="flex-1 ml-64 mr-72 px-6 py-8 overflow-y-auto min-h-screen">
      @yield('content')
    </main>

    {{-- ==== Sidebar kanan ==== --}}
    <aside class="w-72 shrink-0 bg-white/60 backdrop-blur-md border-l border-amber-100 shadow-md fixed inset-y-0 right-0 z-20 hidden lg:flex flex-col">
      <div class="p-6 border-b border-amber-100">
        <h2 class="text-lg font-semibold text-gray-900">Top Kontributor</h2>
      </div>
      <div class="p-6 flex-1 overflow-y-auto">
        @yield('sidebar-right')
      </div>
    </aside>

  </div>

  @stack('scripts')
</body>
</html>
