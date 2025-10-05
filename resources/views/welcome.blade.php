@extends('layouts.app')
@section('title', 'Selamat Datang')
@section('content')

<section class="bg-white">
	<div class="max-w-7xl mx-auto px-6 lg:px-8">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center py-16">
			<!-- Left column: copy -->
			<div class="order-2 lg:order-1">
				<h1 class="text-6xl lg:text-7xl font-serif text-gray-900 leading-tight">Best house<br>plants varieties.</h1>

				<div class="mt-8">
					<a href="#" class="inline-block bg-black text-white rounded-full px-6 py-3 text-sm font-medium hover:opacity-90">Shop now</a>
				</div>

				<div class="mt-10 max-w-md">
					<h3 class="text-lg font-semibold text-gray-800">Beautiful living greenery for<br>homes and offices</h3>
					<p class="mt-4 text-sm text-gray-500">We've been mentioned in the press</p>

					<div class="mt-8 flex items-center space-x-8">
						<!-- Placeholder logos, replace with real logos if available -->
						<div class="text-gray-400 font-bold text-2xl">Bloomberg</div>
						<div class="text-gray-400 text-xl">Forbes</div>
					</div>
				</div>
			</div>

			<!-- Right column: hero image -->
			<div class="order-1 lg:order-2">
				<div class="w-full overflow-hidden rounded-md">
					<picture>
						<!-- Fallback to Unsplash if local image is missing -->
						<img src="images/plant.jpg" alt="plant" class="w-full h-[520px] object-cover">
					</picture>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection