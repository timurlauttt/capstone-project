@extends('layouts.app')
@section('title', 'Bibit Bunga')

@section('content')

    <section class="relative pt-16 pb-20">
        {{-- Background Image --}}
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/produk.jpeg') }}');">
        </div>

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-black/50"></div>

        {{-- Content --}}
        <div class="relative max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-white mb-3">
                Koleksi Kami
            </h2>
            <p class="text-gray-200 text-lg max-w-2xl mx-auto">
                Temukan berbagai bibit tanaman untuk memperindah taman rumahmu.
            </p>
        </div>
    </section>


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

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
