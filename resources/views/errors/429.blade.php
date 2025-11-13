@include('errors.error-base', [
    'code' => 429,
    'title' => 'Terlalu Banyak Permintaan',
    'message' => 'Tunggu sebentar sebelum mencoba lagi.'
])