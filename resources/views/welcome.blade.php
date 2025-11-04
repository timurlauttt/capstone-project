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
					<h1 class="text-2xl lg:text-8xl font-extrabold text-white mb-4">Lorem Ipsum</h1>
					<p class="text-2xl text-gray-100 mb-6">Lorem ipsum dolor sit amet.</p>
					<a href="#produkSection"
						class="inline-block bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 transition">Jelajahi
						Produk Kami</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Produk Section (panggil komponen) -->
	@php
		$categories = [
			'Bibit Bunga' => [
				['name' => 'Tehebogu', 'price' => 'Rp150.000', 'desc' => 'Bibit Tehebogu siap tanam.', 'image' => asset('images/sample-product.jpg')],
				['name' => 'Plumeria', 'price' => 'Rp84.000', 'desc' => 'Bibit Plumeria warna putih.', 'image' => asset('images/sample-product.jpg')],
				['name' => 'Rembusa', 'price' => 'Rp18.000', 'desc' => 'Rembusa berbunga merah.', 'image' => asset('images/sample-product.jpg')],
			],
			'Bibit Pohon Buah' => [
				['name' => 'Sneakers Off-White', 'price' => '$36.00', 'desc' => 'Edisi terbatas 2024.', 'image' => asset('images/sample-product.jpg')],
				['name' => 'Sneakers Off-White', 'price' => '$36.00', 'desc' => 'Model 2024 klasik.', 'image' => asset('images/sample-product.jpg')],
				['name' => 'Sneakers Off-White', 'price' => '$36.00', 'desc' => 'Tersedia warna merah.', 'image' => asset('images/sample-product.jpg')],
			],
			'Bibit Pohon Kayu' => [
				['name' => 'Sneakers Off-White', 'price' => '$36.00', 'desc' => 'Edisi 2025 premium.', 'image' => asset('images/sample-product.jpg')],
				['name' => 'Sneakers Off-White', 'price' => '$36.00', 'desc' => 'Desain hitam elegan.', 'image' => asset('images/sample-product.jpg')],
				['name' => 'Sneakers Off-White', 'price' => '$36.00', 'desc' => 'Warna merah menyala.', 'image' => asset('images/sample-product.jpg')],
			],
			'Bibit Sayuran' => [
				['name' => 'Sneakers Off-White', 'price' => '$36.00', 'desc' => 'Ringan dan nyaman.', 'image' => asset('images/sample-product.jpg')],
				['name' => 'Sneakers Off-White', 'price' => '$36.00', 'desc' => 'Kualitas premium.', 'image' => asset('images/sample-product.jpg')],
				['name' => 'Sneakers Off-White', 'price' => '$36.00', 'desc' => 'Tersedia berbagai ukuran.', 'image' => asset('images/sample-product.jpg')],
			],
		];
	@endphp

	<x-product-section :categories="$categories" />

	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
