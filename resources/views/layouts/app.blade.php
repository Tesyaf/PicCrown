<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'PicCrown') }} | @yield('title', 'Beranda')</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="https://kit.fontawesome.com/2a3d3dfcfb.js" crossorigin="anonymous"></script>
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