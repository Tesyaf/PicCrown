<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PicCrown — 404</title>
  @vite(['resources/css/app.css'])
  <meta name="description" content="Halaman tidak ditemukan — PicCrown">
</head>
<body class="min-h-screen bg-gradient-to-br from-amber-50 to-yellow-100 text-neutral-900 antialiased selection:bg-amber-200 selection:text-neutral-900">

  {{-- Corner glows --}}
  <div class="pointer-events-none fixed inset-0 -z-10">
    <div class="absolute -top-40 -left-40 w-[520px] h-[520px] blur-[40px] opacity-35 bg-[radial-gradient(closest-side,rgba(253,224,71,.9),rgba(253,224,71,.3),transparent_70%)]"></div>
    <div class="absolute -bottom-56 -right-56 w-[720px] h-[720px] blur-[40px] opacity-35 bg-[radial-gradient(closest-side,rgba(251,191,36,.9),rgba(249,115,22,.25),transparent_70%)]"></div>
  </div>

  <main class="grid place-items-center min-h-screen p-6">
    <section class="w-full max-w-3xl">
      <div class="mx-auto flex flex-col items-center text-center gap-6 rounded-3xl border border-amber-100/70 bg-white/80 backdrop-blur-sm p-10 shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)]">
        {{-- Logo --}}
        <img src="/images/PicCrownLogo.svg" alt="Logo PicCrown" class="h-24 w-auto drop-shadow-sm">

        {{-- Texts --}}
        <p class="uppercase text-2xl tracking-widest font-bold text-amber-600/90">Error 404</p>
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold leading-tight">Halaman tidak ditemukan</h1>
        <p class="max-w-xl text-neutral-600">
          Maaf, link yang kamu buka nggak tersedia atau sudah dipindahkan.
          Yuk kembali ke beranda atau cari halaman lain yang kamu butuhkan.
        </p>

        {{-- Tombol kembali --}}
        <div class="pt-2">
          <a href="{{ url('/') }}"
             class="inline-flex items-center gap-2 rounded-2xl px-6 py-3 font-semibold bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)] hover:opacity-95 focus:outline-none focus-visible:ring-4 focus-visible:ring-amber-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
              <path d="M10.707 2.293a1 1 0 0 0-1.414 0l-8 8A1 1 0 0 0 2 12h1v8a2 2 0 0 0 2 2h5a1 1 0 0 0 1-1v-5h2v5a1 1 0 0 0 1 1h5a2 2 0 0 0 2-2v-8h1a1 1 0 0 0 .707-1.707l-8-8z"/>
            </svg>
            Kembali ke Beranda
          </a>
        </div>

        <div class="pt-2 text-xs text-neutral-500">Kode: 404 • PicCrown</div>
      </div>
    </section>
  </main>

</body>
</html>
