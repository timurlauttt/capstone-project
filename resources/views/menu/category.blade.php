@extends('layouts.app')
@section('title', isset($category->name) ? $category->name : 'Kategori')

@section('content')
    <section class="pt-10 pb-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-gray-800 mb-2">{{ $category->name }}</h2>
                        <p class="text-gray-600">Menampilkan semua produk untuk kategori <strong>{{ $category->name }}</strong>.</p>
                        @if(method_exists($products, 'total'))
                            <p class="text-sm text-gray-500 mt-2">
                                Menampilkan {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} produk
                            </p>
                        @endif
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($products as $p)
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition">
                        <div class="relative">
                            @php
                                $img = $p->images()->first();
                                $imgUrl = $img ? asset($img->path) : asset('images/sample-product.jpg');
                            @endphp
                            <img src="{{ $imgUrl }}" alt="{{ $p->title }}" class="w-full h-48 object-cover">

                            <a href="https://wa.me/6281234567890?text=Halo%20saya%20tertarik%20dengan%20produk%20{{ urlencode($p->title) }}"
                               target="_blank"
                               class="absolute bottom-2 right-2 bg-green-500 text-white p-2 rounded-full hover:bg-green-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path d="M12.04 2C6.51 2 2 6.23 2 11.44c0 2.01.66 3.87 1.79 5.39L2 22l5.39-1.77a10.4 10.4 0 004.65 1.08c5.53 0 10.04-4.23 10.04-9.44C22.08 6.23 17.57 2 12.04 2z"/>
                                </svg>
                            </a>
                        </div>

                        <div class="p-5">
                            <h4 class="font-semibold text-xl mb-2 text-gray-800">{{ $p->title }}</h4>
                            <p class="text-gray-500 text-sm mb-4">{{ $p->description }}</p>
                            <div class="flex justify-between items-center">
                                <span class="font-bold text-green-600 text-lg">Rp{{ number_format($p->price,0,',','.') }}</span>
                                <div class="flex space-x-3">
                                    <a href="#" class="text-gray-600 hover:text-green-600"><i class="fab fa-whatsapp text-xl"></i></a>
                                    <a href="#" class="text-gray-600 hover:text-green-600"><i class="fas fa-shopping-cart text-xl"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 col-span-3">Belum ada produk untuk kategori ini.</p>
                @endforelse
            </div>

            <div class="mt-8 flex items-center justify-between">
                <div class="text-sm text-gray-600">
                    @if(method_exists($products, 'total'))
                        Menampilkan halaman {{ $products->currentPage() }} dari {{ $products->lastPage() }}
                    @endif
                </div>
                <div>
                    {{ method_exists($products, 'links') ? $products->onEachSide(1)->links() : '' }}
                </div>
            </div>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
