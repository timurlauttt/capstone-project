@extends('layouts.app')
@section('title', 'Selamat Datang')
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

    <!-- product section -->
    @php
        $categories = [
            [
                'name' => 'Bibit Bunga',
                'route' => 'menu.bunga',
                'products' => [
                    [
                        'name' => 'Tehebogu',
                        'price' => 'Rp150.000',
                        'desc' => 'Bibit Tehebogu siap tanam.',
                        'image' => asset('images/sample-product.jpg'),
                    ],
                    [
                        'name' => 'Plumeria',
                        'price' => 'Rp84.000',
                        'desc' => 'Bibit Plumeria warna putih.',
                        'image' => asset('images/sample-product.jpg'),
                    ],
                    [
                        'name' => 'Rembusa',
                        'price' => 'Rp18.000',
                        'desc' => 'Rembusa berbunga merah.',
                        'image' => asset('images/sample-product.jpg'),
                    ],
                ],
            ],
            [
                'name' => 'Bibit Pohon Buah',
                'route' => 'menu.buah',
                'products' => [
                    [
                        'name' => 'Sneakers Off-White',
                        'price' => '$36.00',
                        'desc' => 'Edisi terbatas 2024.',
                        'image' => asset('images/sample-product.jpg'),
                    ],
                    [
                        'name' => 'Sneakers Off-White',
                        'price' => '$36.00',
                        'desc' => 'Model 2024 klasik.',
                        'image' => asset('images/sample-product.jpg'),
                    ],
                    [
                        'name' => 'Sneakers Off-White',
                        'price' => '$36.00',
                        'desc' => 'Tersedia warna merah.',
                        'image' => asset('images/sample-product.jpg'),
                    ],
                ],
            ],
            [
                'name' => 'Bibit Pohon Kayu',
                'route' => 'menu.kayu',
                'products' => [
                    [
                        'name' => 'Sneakers Off-White',
                        'price' => '$36.00',
                        'desc' => 'Edisi 2025 premium.',
                        'image' => asset('images/sample-product.jpg'),
                    ],
                    [
                        'name' => 'Sneakers Off-White',
                        'price' => '$36.00',
                        'desc' => 'Desain hitam elegan.',
                        'image' => asset('images/sample-product.jpg'),
                    ],
                    [
                        'name' => 'Sneakers Off-White',
                        'price' => '$36.00',
                        'desc' => 'Warna merah menyala.',
                        'image' => asset('images/sample-product.jpg'),
                    ],
                ],
            ],

        ];
    @endphp

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
            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

                    {{-- IMAGE --}}
                    <div>
                        <img src="{{ asset('images/tentang2.jpeg') }}"
                             alt="Refloreo Iterum"
                             class="rounded-xl w-full object-cover">
                    </div>

                    {{-- CONTENT --}}
                    <div>
                        {{-- Badge --}}
                        <span class="inline-block bg-gray-800 text-white text-sm px-5 py-2 rounded-full mb-5">
                            Pondasi untuk Masa Depan yang Lebih Hijau
                        </span>

                        {{-- Description --}}
                        <p class="text-gray-600 leading-relaxed mb-6">
                            Kami adalah perusahaan pembibitan tanaman yang berlokasi di
                            <strong>Sokaraja, Jawa Tengah</strong>, berdiri sejak tahun 2015.
                            Kami fokus menyediakan bibit unggulan yang cocok dengan iklim
                            Indonesia dan mendukung penghijauan berkelanjutan.
                        </p>

                        {{-- Checklist --}}
                        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700 text-sm">
                            @foreach ([
                                'Buah-buahan',
                                'Kayu-kayuan',
                                'Tanaman Hias',
                                'Reboisasi'
                            ] as $item)
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-green-600 mt-0.5"
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
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
