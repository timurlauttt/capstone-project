@extends('layouts.app')
@section('title', 'Bibit Bunga')

@section('content')
    @php
        $products = [
            [
                'name' => 'Tehebogu',
                'price' => 15000,
                'image' => 'images/bibit-bunga1.jpg',
                'desc' => 'Bibit tanaman hias Tehebogu cocok untuk taman rumah.',
            ],
            [
                'name' => 'Plumeria',
                'price' => 12000,
                'image' => 'images/bibit-bunga2.jpg',
                'desc' => 'Bunga kamboja dengan aroma harum dan warna indah.',
            ],
            [
                'name' => 'Rembusa',
                'price' => 18000,
                'image' => 'images/bibit-bunga3.jpg',
                'desc' => 'Rembusa cocok untuk pagar hidup dan cepat tumbuh.',
            ],
            [
                'name' => 'Melati Putih',
                'price' => 20000,
                'image' => 'images/bibit-bunga4.jpg',
                'desc' => 'Melati putih harum, cocok untuk pot maupun taman.',
            ],
            [
                'name' => 'Bunga Matahari',
                'price' => 10000,
                'image' => 'images/bibit-bunga5.jpg',
                'desc' => 'Bunga matahari cerah dan mudah tumbuh di segala cuaca.',
            ],
            [
                'name' => 'Kembang Sepatu',
                'price' => 15000,
                'image' => 'images/bibit-bunga6.jpg',
                'desc' => 'Kembang sepatu berwarna cerah dan cocok untuk pagar taman.',
            ],
        ];
    @endphp

    <section class="pt-10 pb-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-3">Koleksi Bibit Buah</h2>
                <p class="text-gray-600 text-lg">Temukan berbagai bibit buah unggulan.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($products as $product)
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition">
                        <div class="relative">
                            <img src="{{ $product['image'] ?? asset('images/sample-product.jpg') }}"
                                alt="{{ $product['name'] }}" class="w-full h-48 object-cover">

                            <!-- WhatsApp -->
                            <a href="https://wa.me/6281234567890?text=Halo%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product['name']) }}"
                                target="_blank"
                                class="absolute bottom-2 right-2 bg-green-500 text-white p-2 rounded-full hover:bg-green-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path
                                        d="M12.04 2C6.51 2 2 6.23 2 11.44c0 2.01.66 3.87 1.79 5.39L2 22l5.39-1.77a10.4 10.4 0 004.65 1.08c5.53 0 10.04-4.23 10.04-9.44C22.08 6.23 17.57 2 12.04 2z" />
                                </svg>
                            </a>
                        </div>
                        <div class="p-5">
                            <h4 class="font-semibold text-xl mb-2 text-gray-800">{{ $product['name'] }}</h4>
                            <p class="text-gray-500 text-sm mb-4">{{ $product['desc'] }}</p>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-green-600 text-lg">
                                    Rp{{ number_format($product['price'], 0, ',', '.') }}
                                </span>
                                <div class="flex space-x-3">
                                    <a href="#" class="text-gray-600 hover:text-green-600">
                                        <i class="fab fa-whatsapp text-xl"></i>
                                    </a>
                                    <a href="#" class="text-gray-600 hover:text-green-600">
                                        <i class="fas fa-shopping-cart text-xl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
