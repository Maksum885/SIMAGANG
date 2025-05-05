@extends('layouts.app')

@section('content')
<!-- Beranda -->
<section id="beranda" class="px-28 pt-24 mx-auto lg:flex items-center lg:justify-between space-x-10 mb-30 bg-gradient-to-b from-white via-sky-50 to-white">
  <div class="lg:w-3/6 text-center lg:text-left">
    <h4 class="lg:text-5xl text-4xl font-normal mb-7">Selamat Datang di</h4>
    <h3 class="lg:text-6xl text-5xl font-semibold font-serif mb-18">SIMAGANG!</h3>
    <p class="text-3xl text-gray-600 mb-18">Sistem Manajemen Magang memberikan kesempatan berharga bagi mahasiswa untuk belajar dan berkembang di dunia profesional serta meningkatkan keterampilan sebagai bekal karir masa depan.</p>
    <a href="{{ route('login') }}" class="text-3xl bg-blue-400 text-white opacity-90 px-10 py-3 hover:bg-blue-500 rounded-3xl">Masuk</a>
  </div>
  <div class="lg:w-3/6 flex justify-end">
    <img class="w-700" src="{{ asset('images/lp1.png') }}">
  </div>
</section>

<!-- Tentang Kami -->
<section id="tentang" class="px-28 mx-auto m-50">
  <h2 class="xl:text-5xl text-4xl font-semibold font-mono text-center xl:pb-5 xl:pt-30 pt-1">-Tentang Kami-</h2>
  <div class="xl:flex items-center xl:justify-between space-x-10">
    <div class="xl:w-3/6 flex justify-start">
      <img class="w-700" src="{{ asset('images/lp2.jpg') }}">
    </div>
    <div class="xl:w-3/6">
      <p class="text-3xl text-gray-600 2xl:leading-relaxed ">
        SIMAGANG adalah platform inovatif yang dirancang untuk mempermudah manajemen program magang di berbagai instansi dan perusahaan. Kami menyediakan sistem terintegrasi yang membantu pemagang, mentor, dan administrator dalam mengelola seluruh proses magang, mulai dari pendaftaran, penjadwalan, absensi, hingga laporan akhir.
        <br><br>
        Dengan SIMAGANG, pemagang dapat dengan mudah mengakses tugas, mencatat kehadiran, dan mendapatkan evaluasi kinerja secara transparan. Sementara itu, perusahaan dan instansi dapat lebih efisien dalam mengawasi dan mengelola program magang mereka.
        <br><br>
        Bergabunglah dengan SIMAGANG dan rasakan pengalaman magang yang lebih terstruktur, profesional, dan produktif!
      </p>
    </div>
  </div>
</section>

<!-- Kontak -->
<section id="kontak" class="min-h-screen flex flex-col justify-center items-center bg-gray-50 px-6 py-20">
  <h2 class="text-5xl font-semibold font-mono text-center mb-12">-Kontak-</h2>

  <!-- Info Kontak -->
  <div class="text-center mb-16">
    <h3 class="text-4xl font-normal mb-6">Hubungi Kami</h3>
    <p class="text-2xl text-gray-600">Tim <strong>SIMAGANG</strong> siap membantu Anda</p>

    <div class="flex items-center justify-center space-x-4 text-xl text-gray-700 mt-6">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M3 5a2 2 0 012-2h2.28a2 2 0 011.72 1.06l1.16 2.33a2 2 0 01-.45 2.4l-.88.88a16.01 16.01 0 006.06 6.06l.88-.88a2 2 0 012.4-.45l2.33 1.16A2 2 0 0119 18.72V21a2 2 0 01-2 2h-1C7.373 23 1 16.627 1 9V8a2 2 0 012-2h0z" />
      </svg>
      <span>+62 812 6248 6191</span>
    </div>

    <div class="flex items-center justify-center space-x-4 text-xl text-gray-700 mt-4">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m0 0V6a2 2 0 00-2-2H5a2 2 0 00-2 2v2m18 0v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8" />
      </svg>
      <span>support@simagang.id</span>
    </div>
  </div>

  <!-- Formulir -->
  <form action="https://formspree.io/f/mwplglnv" method="POST" class="w-full max-w-2xl space-y-6">
    <input type="text" placeholder="Nama Anda" class="w-full px-6 py-4 border border-gray-500 rounded-lg text-lg">
    <input type="email" name="email" placeholder="Email" class="w-full px-6 py-4 border border-gray-500 rounded-lg text-lg">
    <textarea name="message" placeholder="Pesan Anda" class="w-full px-6 py-4 border border-gray-500 rounded-lg text-lg h-40 resize-none"></textarea>
    <div class="flex justify-center">
      <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-10 rounded-full text-xl">
        Kirim
      </button>
    </div>
  </form>
</section>

@endsection