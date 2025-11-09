<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'PicCrown') }} | @yield('title', 'Beranda')</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="min-h-screen flex flex-col bg-gradient-to-br from-amber-50 to-yellow-100">
  @if (!Request::is('dashboard'))
    <nav>
      @include('partials.navbar')
    </nav>
  @endif

  @include('partials.alerts')

  <main class="flex-1">
    @yield('content')
  </main>

  @include('partials.footer')
  @stack('scripts')
</body>
</html>