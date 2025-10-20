@extends('layouts.app')
@section('title', 'Selamat Datang')
@section('content')

	<section class="relative bg-gray-900">
		<!-- Background image -->
		<div class="absolute inset-0 bg-cover bg-center" style="background-image: url({{ asset('images/hero.png') }});">
		</div>
		<!-- Dark overlay to improve text readability -->
		<div class="absolute inset-0 bg-black opacity-40"></div>
		<div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex items-center justify-center min-h-screen">
				<div class="max-w-2xl text-center">
					<h1 class="text-2xl lg:text-8xl font-extrabold text-white mb-4">Lorem Ipsum </h1>
					<p class="text-2xl text-gray-100 mb-6">Lorem ipsum dolor sit amet.</p>
					<a href="#"
						class="inline-block bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 transition">Jelajahi
						Produk Kami</a>
				</div>
			</div>
		</div>
	</section>

@endsection