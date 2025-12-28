@extends('layouts.app')
@section('title', 'Selamat Datang di Refloreo Iterum')
@section('content')

<!-- hero section -->
<section class="relative bg-gray-900">
    <!-- Background image -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url({{ asset('images/hero.png') }});"></div>
    <!-- Dark overlay -->
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center min-h-screen">
            <div class="max-w-2xl text-center">
                <h1 class="text-2xl lg:text-3xl  text-white mb-4">Selamat Datang di</h1>
                <p class="text-2xl lg:text-6xl font-extrabold text-gray-100 mb-6">Roflereo Iterum</p>
                <a href="#produkSection"
                    class="inline-block bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 transition">Jelajahi
                    Produk Kami</a>
            </div>
        </div>
    </div>
</section>

<!-- product section (data-driven) -->
<x-product-section :categories="$categories" />

<!-- tentang section -->
<section id="tentangSection" class="bg-gray-100 py-20">
    <div class="max-w-6xl mx-auto px-4">

        {{-- TITLE --}}
        <div class="text-center mb-12">
            <p class="text-gray-500">Tentang</p>
            <h1 class="text-2xl md:text-3xl font-bold tracking-wide">
                REFLOREO ITERUM
            </h1>
        </div>

        {{-- CARD --}}
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-0">

                {{-- IMAGE --}}
                <div>
                    <img src="{{ asset('images/tentang3.jpg') }}"
                        alt="Refloreo Iterum"
                        class="w-full h-full object-cover">
                </div>

                {{-- CONTENT --}}
                <div class="p-8 md:p-10 flex flex-col justify-center">
                    {{-- Badge --}}
                    <span class="inline-block bg-gray-800 text-white text-sm px-5 py-2 rounded-md mb-5 self-start">
                        Pondasi untuk Masa Depan yang Lebih Hijau.
                    </span>

                    {{-- Description --}}
                    <p class="text-gray-700 leading-relaxed mb-6 text-justify">
                        Kami adalah perusahaan pembibitan terkemuka yang berlokasi di Sokaraja, Jawa Tengah, didirikan pada tahun 2015. Kami mengkhususkan diri dalam budidaya bibit pohon dan benih yang berkualitas tinggi, tangguh, dan sangat cocok untuk iklim Indonesia. Dengan fokus pada keberlanjutan dan pengetahuan ahli lokal, kami bertujuan menjadi pemasok utama untuk proyek reboisasi dan penghijauan pribadi.
                    </p>

                    {{-- Checklist --}}
                    <ul class="grid grid-cols-2 gap-3 text-gray-700 text-sm mb-6">
                        @foreach ([
                            'Bibit Bunga',
                            'Bibit Buah',
                            'Bibit Kayu',
                            'Bibit Sayuran'
                        ] as $item)
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-gray-700 mt-0.5 flex-shrink-0"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span>{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>

                    {{-- CTA Button --}}
                    <div class="flex flex-wrap gap-3 mt-4">
                        <a href="https://wa.me/6288216178244?text=Halo%20pak%20Harmoko%2C%20saya%20ingin%20bertanya%20tentang%20bibit%20tanaman%20di%20Refloreo%20Iterum"
                           target="_blank"
                           class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium transition">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path d="M12.04 2C6.51 2 2 6.23 2 11.44c0 2.01.66 3.87 1.79 5.39L2 22l5.39-1.77a10.4 10.4 0 004.65 1.08c5.53 0 10.04-4.23 10.04-9.44C22.08 6.23 17.57 2 12.04 2zm0 17.3a8.33 8.33 0 01-4.26-1.16l-.31-.18-3.2 1.05 1.07-3.06-.2-.32a8.02 8.02 0 01-1.26-4.18c0-4.43 3.79-8.03 8.16-8.03s8.16 3.6 8.16 8.03-3.79 8.03-8.16 8.03zm4.45-5.55c-.24-.12-1.43-.7-1.65-.78-.22-.08-.38-.12-.54.12-.16.24-.62.78-.76.94-.14.16-.28.18-.52.06-.24-.12-1.02-.38-1.94-1.2-.72-.64-1.21-1.43-1.35-1.67-.14-.24-.02-.37.1-.49.1-.1.24-.26.36-.39.12-.13.16-.22.24-.36.08-.14.04-.26-.02-.38-.06-.12-.54-1.3-.74-1.78-.2-.48-.4-.42-.54-.42h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.32.98 2.48c.12.16 1.7 2.6 4.12 3.64.58.25 1.03.4 1.38.51.58.18 1.1.15 1.52.09.46-.07 1.43-.58 1.63-1.14.2-.56.2-1.04.14-1.14-.06-.1-.22-.16-.46-.28z"/>
                            </svg>
                            Hubungi Kami
                        </a>
                        <a href="#produkSection"
                           class="inline-flex items-center gap-2 bg-gray-800 hover:bg-gray-900 text-white px-6 py-3 rounded-lg font-medium transition">
                            Lihat Produk
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection