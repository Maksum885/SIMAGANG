@extends('layouts.app')

@section('content')
<!-- Beranda -->
<section id="beranda" class="px-16 sm:px-10 md:px-16 lg:px-20 pt-32 mx-auto flex flex-col lg:flex-row items-center lg:justify-between gap-10 lg:gap-20 mb-30 bg-gradient-to-b from-white via-sky-50 to-white">
  <div class="w-full lg:w-1/2 text-center lg:text-left">
    <h4 class="text-xl sm:text-2xl lg:text-3xl font-normal mb-7">Selamat Datang di</h4>
    <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold font-serif mb-10">E-PKL SMK N 6 BATAM!</h3>
    <p class="text-md sm:text-lg lg:text-xl xl:text-2xl text-gray-600 mb-18">Melalui E-PKL SMK N 6 Batam, siswa/i didukung untuk mengembangkan potensi diri, meningkatkan keterampilan teknis (hard skill) dan non-teknis (soft skill), serta memperoleh pengalaman langsung di lingkungan kerja profesional.</p>
    <a href="{{ route('login') }}" class="text-lg sm:text-xl xl:text-2xl bg-blue-400 text-white opacity-90 px-8 py-3 hover:bg-blue-500 rounded-3xl">Masuk</a>
  </div>
  <div class="w-full lg:w-1/2 flex justify-center lg:justify-end">
    <img class="w-full sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-4xl rounded-4xl shadow-2xl" src="{{ asset('images/smk6.png') }}">
  </div>
</section>

<!-- Tentang Kami -->
<section id="tentang" class="px-16 sm:px-10 lg:px-20 mx-auto py-30">
  <h2 class="text-xl sm:text-2xl xl:text-3xl font-semibold font-mono text-center pb-10">-Tentang Kami-</h2>
  <div class="flex flex-col xl:flex-row items-center gap-1">
    <div class="w-full xl:w-1/2 flex justify-center xl:justify-start">
      <img class="w-full sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl rounded-4xl shadow-2xl" src="{{ asset('images/tentang.png') }}">
    </div>
    <div class="w-full xl:w-1/2">
      <p class="text-md sm:text-lg xl:text-xl text-gray-600 leading-relaxed">
        <strong>E-PKL SMK N 6 Batam</strong> adalah platform digital yang dikembangkan untuk memfasilitasi pengelolaan kegiatan Praktik Kerja Lapangan (PKL) secara efektif dan efisien.
        <br><br>
        Sistem ini membantu siswa/i dalam mencatat kehadiran harian dan mengisi logbook kegiatan secara digital. Pihak sekolah dan industri dapat memantau aktivitas harian siswa/i selama pelaksanaan PKL secara real-time.
        <br><br>
        Dengan E-PKL, diharapkan pelaksanaan PKL menjadi lebih transparan, terstruktur, serta memberikan pengalaman pembelajaran yang optimal bagi siswa/i.
      </p>
    </div>
  </div>
</section>

<!-- Kontak -->
<section id="kontak" class="min-h-screen flex flex-col justify-center items-center bg-gray-50 px-6 py-25">
  <h2 class="text-xl sm:text-2xl xl:text-3xl font-semibold font-mono text-center mb-8">-Kontak-</h2>

  <!-- Info Kontak -->
  <div class="text-center mb-12">
    <h3 class="text-lg sm:text-xl lg:text-2xl font-normal mb-4">Hubungi Kami</h3>
    <p class="text-md sm:text-lg lg:text-xl text-gray-600">Tim <strong>E-PKL SMK N 6 Batam</strong> siap membantu Anda</p>

    <div class="flex items-center justify-center space-x-4 text-base sm:text-md md:text-lg text-gray-700 mt-6">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M3 5a2 2 0 012-2h2.28a2 2 0 011.72 1.06l1.16 2.33a2 2 0 01-.45 2.4l-.88.88a16.01 16.01 0 006.06 6.06l.88-.88a2 2 0 012.4-.45l2.33 1.16A2 2 0 0119 18.72V21a2 2 0 01-2 2h-1C7.373 23 1 16.627 1 9V8a2 2 0 012-2h0z" />
      </svg>
      <span>+62 812 6248 6191</span>
    </div>

    <div class="flex items-center justify-center space-x-4 text-base sm:text-md md:text-lg text-gray-700 mt-4">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m0 0V6a2 2 0 00-2-2H5a2 2 0 00-2 2v2m18 0v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8" />
      </svg>
      <span>supportepkl@gmail.com</span>
    </div>
  </div>

  <!-- Formulir -->
  <form action="https://formspree.io/f/mwplglnv" method="POST" class="w-full max-w-xl space-y-6">
    <input type="text" placeholder="Nama Anda" class="w-full px-5 py-2 border border-gray-500 rounded-lg text-md">
    <input type="email" name="email" placeholder="Email" class="w-full px-5 py-2 border border-gray-500 rounded-lg text-md">
    <textarea name="message" placeholder="Pesan Anda" class="w-full px-5 py-2 border border-gray-500 rounded-lg text-md h-30 resize-none"></textarea>
    <div class="flex justify-center">
      <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-8 rounded-full text-lg">
        Kirim
      </button>
    </div>
  </form>
</section>
@endsection