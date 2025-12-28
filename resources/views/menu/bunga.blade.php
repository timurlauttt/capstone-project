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
        @extends('layouts.app')
        @section('title', 'Redirecting')
        @section('content')
            <meta http-equiv="refresh" content="0;url={{ route('menu.category', ['slug' => 'bunga']) }}">
            <p class="p-8 text-center">Halaman ini telah dipindahkan. Mengarahkan ke kategori Bunga...</p>
        @endsection
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
