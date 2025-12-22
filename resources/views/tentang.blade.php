@extends('layouts.app')
@section('title', 'Tentang Kami')

@section('content')

{{-- HERO SECTION --}}
<section class="relative min-h-screen flex items-center justify-center">
    {{-- Background image --}}
    <div class="absolute inset-0 bg-cover bg-center"
         style="background-image: url({{ asset('images/tentang.jpeg') }});"></div>

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-black/60"></div>

    <div class="relative max-w-4xl mx-auto px-4 text-center text-white">
        <h1 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-wide">
            Tentang Kami
        </h1>
        <p class="text-lg md:text-xl text-gray-200">
            Menumbuhkan kehidupan hijau dari bibit terbaik
        </p>
    </div>
</section>

{{-- ABOUT CONTENT --}}
<section class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- Text --}}
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">
                    Siapa Kami?
                </h2>

                <p class="text-gray-600 leading-relaxed mb-4">
                    <strong>Refloreo Iterum</strong> adalah usaha yang bergerak di bidang
                    penjualan bibit tanaman berkualitas, dengan komitmen menghadirkan
                    solusi hijau yang berkelanjutan bagi masyarakat.
                </p>

                <p class="text-gray-600 leading-relaxed">
                    Kami percaya bahwa setiap tanaman memiliki potensi untuk memberikan
                    manfaat bagi lingkungan dan kehidupan. Oleh karena itu, kami
                    menghadirkan bibit unggulan yang dipilih secara cermat.
                </p>
            </div>

            {{-- Image --}}
            <div class="relative">
                <img src="{{ asset('images/tentang2.jpeg') }}"
                     alt="Tentang Refloreo Iterum"
                     class="rounded-xl shadow-lg">
            </div>

        </div>
    </div>
</section>


{{-- KEUNGGULAN --}}
<section class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        <h2 class="text-3xl font-bold text-gray-800 mb-12">
            Kenapa Memilih Kami?
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
                <div class="text-4xl mb-4">🌿</div>
                <h4 class="font-semibold text-lg mb-2">Bibit Berkualitas</h4>
                <p class="text-gray-600 text-sm">
                    Bibit sehat dan siap tumbuh dari sumber terpercaya.
                </p>
            </div>

            <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
                <div class="text-4xl mb-4">🤝</div>
                <h4 class="font-semibold text-lg mb-2">Pelayanan Terbaik</h4>
                <p class="text-gray-600 text-sm">
                    Kami selalu siap membantu kebutuhan pelanggan.
                </p>
            </div>

            <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
                <div class="text-4xl mb-4">♻️</div>
                <h4 class="font-semibold text-lg mb-2">Ramah Lingkungan</h4>
                <p class="text-gray-600 text-sm">
                    Mendukung praktik pertanian dan penghijauan berkelanjutan.
                </p>
            </div>

        </div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-green-700 py-14">
    <div class="max-w-7xl mx-auto px-4 text-center text-white">
        <h2 class="text-3xl font-bold mb-4">
            Mari Menanam Bersama Kami
        </h2>
        <p class="mb-6 text-green-100">
            Dapatkan bibit terbaik untuk masa depan yang lebih hijau
        </p>
        <a href="/menu"
           class="inline-block bg-white text-green-700 font-semibold px-6 py-3 rounded-lg hover:bg-green-100 transition">
            Lihat Produk
        </a>
    </div>
</section>

@endsection
