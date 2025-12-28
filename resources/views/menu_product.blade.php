@extends('layouts.app')
@section('title', 'Bibit Bunga')

@section('content')

  

    @php
        $categories = [
            [
                'name' => 'Bibit Bunga',
                'route' => ['menu.category', 'bunga'],
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
                'route' => ['menu.category', 'buah'],
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
                'route' => ['menu.category', 'kayu'],
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
