@extends('layouts.app')
@section('title', 'Bibit Bunga')

@section('content')
@php
    $products = [
        [
            'name' => 'Tehebogu',
            'price' => 15000,
            'image' => 'images/bibit-bunga1.jpg',
            'desc' => 'Bibit tanaman hias Tehebogu cocok untuk taman rumah.'
        ],
        [
            'name' => 'Plumeria',
            'price' => 12000,
            'image' => 'images/bibit-bunga2.jpg',
            'desc' => 'Bunga kamboja dengan aroma harum dan warna indah.'
        ],
        [
            'name' => 'Rembusa',
            'price' => 18000,
            'image' => 'images/bibit-bunga3.jpg',
            'desc' => 'Rembusa cocok untuk pagar hidup dan cepat tumbuh.'
        ],
        [
            'name' => 'Melati Putih',
            'price' => 20000,
            'image' => 'images/bibit-bunga4.jpg',
            'desc' => 'Melati putih harum, cocok untuk pot maupun taman.'
        ],
        [
            'name' => 'Bunga Matahari',
            'price' => 10000,
            'image' => 'images/bibit-bunga5.jpg',
            'desc' => 'Bunga matahari cerah dan mudah tumbuh di segala cuaca.'
        ],
        [
            'name' => 'Kembang Sepatu',
            'price' => 15000,
            'image' => 'images/bibit-bunga6.jpg',
            'desc' => 'Kembang sepatu berwarna cerah dan cocok untuk pagar taman.'
        ],
    ];
@endphp

<section class="pt-10 pb-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-3">Koleksi Kayu</h2>
            <p class="text-gray-600 text-lg">Temukan berbagai bibit kayu disini.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($products as $product)
                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition">
                    <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="w-full h-56 object-cover">
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
