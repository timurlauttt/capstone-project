@extends('layouts.app')
@section('title', 'Selamat Datang')
@section('content')
    <section class="relative bg-gray-900">
        <!-- Background image -->
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url({{ asset('images/hero.png') }});"></div>
        <!-- Dark overlay -->
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center min-h-screen">
                <div class="max-w-2xl text-center">
                    <h1 class="text-2xl lg:text-6xl font-extrabold text-white mb-4">Selamat Datang</h1>
                    <p class="text-2xl text-gray-100 mb-6">Roflereo Iterum</p>
                    <a href="#produkSection"
                        class="inline-block bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 transition">Jelajahi
                        Produk Kami</a>
                </div>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="flex flex-col gap-16">

            {{-- Header Section --}}
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="text-center md:text-left">
                    <h1 class="text-7xl font-extrabold tracking-wide text-gray-900">
                        REFLOREO
                    </h1>
                    <h2 class="text-5xl font-bold text-green-600">
                        ITERUM
                    </h2>
                </div>

                <img src="{{ asset('images/logo.png') }}" alt="Refloireo Iterum" class="h-80 w-auto object-contain">
            </div>

            {{-- Content Section --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

                {{-- Image --}}
                <div class="flex justify-center">
                    <img src="{{ asset('images/tentang.jpeg') }}" alt="Ilustrasi pembibitan"
                        class="h-94 w-auto object-contain rounded-xl shadow-md">
                </div>

                {{-- Text Content --}}
                <div class="flex flex-col gap-6 text-gray-700">

                    <h3 class="inline-block w-fit px-6 py-3 bg-green-700 text-white font-semibold rounded-lg shadow">
                        Pondasi untuk Masa Depan yang Lebih Hijau
                    </h3>

                    <p class="leading-relaxed">
                        Kami adalah perusahaan pembibitan terkemuka yang berlokasi di Sokaraja, Jawa Tengah, didirikan
                        pada tahun 2015. Kami mengkhususkan diri dalam budidaya bibit pohon dan benih yang berkualitas
                        tinggi, tangguh, dan sangat cocok untuk iklim Indonesia. Dengan fokus pada keberlanjutan dan
                        pengetahuan ahli lokal, kami bertujuan menjadi pemasok utama untuk proyek reboisasi dan
                        penghijauan pribadi.
                    </p>

                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-600 mt-1 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Buah-buahan</span>
                        </li>

                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-600 mt-1 flex-shrink-0" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span>Kayu-kayuan</span>
                        </li>
                    </ul>


                </div>
            </div>

        </div>
    </div>


    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
