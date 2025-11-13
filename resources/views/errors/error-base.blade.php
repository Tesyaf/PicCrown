<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PicCrown — {{ $title ?? 'Error' }}</title>
  @vite(['resources/css/app.css'])
</head>

<body class="min-h-screen bg-gradient-to-br from-amber-50 via-yellow-50 to-orange-100 text-neutral-900 antialiased selection:bg-amber-200 selection:text-neutral-900">

  <!-- Glow -->
  <div class="pointer-events-none fixed inset-0 -z-10">
    <div class="absolute -top-40 -left-40 w-[520px] h-[520px] blur-[40px] opacity-35
      bg-[radial-gradient(closest-side,rgba(253,224,71,.9),rgba(253,224,71,.3),transparent_70%)]"></div>
    <div class="absolute -bottom-56 -right-56 w-[720px] h-[720px] blur-[40px] opacity-35
      bg-[radial-gradient(closest-side,rgba(251,191,36,.9),rgba(249,115,22,.25),transparent_70%)]"></div>
  </div>

  <main class="grid place-items-center min-h-screen p-6">
    <section class="w-full max-w-3xl">
      <div class="mx-auto flex flex-col items-center text-center gap-6 rounded-3xl
        border border-amber-100/70 bg-white/80 backdrop-blur-sm p-10 shadow-xl">

        <img src="/images/PicCrownLogo.svg" alt="Logo PicCrown" class="h-24 w-auto drop-shadow-sm">

        <p class="uppercase text-2xl tracking-widest font-bold text-amber-600/90">
          {{ $code ?? 'Error' }}
        </p>

        <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold leading-tight">
          {{ $title ?? 'Terjadi Kesalahan' }}
        </h1>

        <p class="max-w-xl text-neutral-600">
          {{ $message ?? 'Maaf, terjadi kesalahan pada sistem.' }}
        </p>

        <div class="pt-2">
          <a href="{{ url('/') }}"
             class="inline-flex items-center gap-2 rounded-2xl px-6 py-3 font-semibold
             bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500
             text-white shadow-lg hover:opacity-95 transition">
            <i class="fa-solid fa-house"></i>
            Kembali ke Beranda
          </a>
        </div>

        <div class="pt-2 text-xs text-neutral-500">
          Kode: {{ $code ?? '?' }} • PicCrown
        </div>
      </div>
    </section>
  </main>

</body>
</html>
