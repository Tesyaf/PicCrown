<footer id="contact" class="border-t border-amber-100/70 bg-white/90 backdrop-blur-sm">
  <div class="mx-auto max-w-6xl px-6 py-10 grid gap-8 md:grid-cols-3 text-center md:text-left">

    <!-- Logo dan deskripsi -->
    <div>
      <div class="flex justify-center md:justify-start items-center gap-2 mb-3">
        <img src="/images/PicCrownLogo.svg" alt="PicCrown" class="h-8 w-auto transition-transform duration-300 hover:scale-110">
        <span class="text-lg font-semibold text-amber-700">PicCrown</span>
      </div>
      <p class="text-sm text-neutral-600">Platform komunitas untuk berbagi dan menilai foto.</p>
    </div>

    <!-- Tautan -->
    <div>
      <h4 class="font-semibold mb-3 text-amber-700">Tautan</h4>
      <ul class="space-y-2 text-sm text-neutral-700">
        <li>
          <a href="#skills" class="hover:text-amber-600 hover:translate-x-1 inline-block transition-all duration-200">
            <i class="fa-solid fa-star mr-1 text-amber-400"></i>Keahlian
          </a>
        </li>
        <li>
          <a href="#stats" class="hover:text-amber-600 hover:translate-x-1 inline-block transition-all duration-200">
            <i class="fa-solid fa-chart-line mr-1 text-amber-400"></i>Statistik
          </a>
        </li>
      </ul>
    </div>

    <!-- Kontak -->
    <div>
      <h4 class="font-semibold mb-3 text-amber-700">Kontak</h4>
      <ul class="space-y-2 text-sm text-neutral-700">
        <li class="flex justify-center md:justify-start items-center gap-2 hover:text-amber-600 transition-colors duration-200">
          <i class="fa-solid fa-envelope text-amber-500"></i>
          <a href="mailto:hello@piccrown.app">hello@piccrown.app</a>
        </li>
        <li class="flex justify-center md:justify-start items-center gap-2 hover:text-amber-600 transition-colors duration-200">
          <i class="fa-solid fa-location-dot text-amber-500"></i>
          Bandar Lampung, Indonesia
        </li>
      </ul>
    </div>
  </div>

  <div class="text-center text-xs text-neutral-500 pb-8 border-t border-amber-100/70 pt-4">
    © {{ date('Y') }} <span class="text-amber-600 font-medium">PicCrown</span>. Semua hak cipta.
  </div>
</footer>
