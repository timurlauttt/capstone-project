@extends('layouts.app')
@section('title', isset($category->name) ? $category->name : 'Kategori')

@section('content')
    <section class="pt-10 pb-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-start md:text-center mb-8">
                <h2 class="text-xl md:text-4xl font-bold text-gray-800 mb-2">Bibit {{ $category->name }}</h2>
                        <p class="text-gray-600">Menampilkan semua produk untuk kategori bibit <strong>{{ $category->name }}</strong>.</p>
                        @if(method_exists($products, 'total'))
                            <p class="text-sm text-gray-500 mt-2">
                                Menampilkan {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} produk
                            </p>
                        @endif
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($products as $p)
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition relative">
                        <div class="relative">
                            @php
                                $img = $p->images()->first();
                                $imgUrl = $img ? asset($img->path) : asset('images/sample-product.jpg');
                            @endphp
                            <img src="{{ $imgUrl }}" alt="{{ $p->title }}" class="w-full h-48 object-cover">
                        </div>

                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="font-semibold text-base md:text-lg">
                                    Bibit {{ $p->title }}
                                </h4>
                                
                                <!-- WhatsApp Button -->
                                <a href="https://wa.me/6288216178244?text=Halo%20pak%20Harmoko%20saya%20tertarik%20dengan%20produk%20{{ urlencode($p->title) }}%20yang%20ada%20di%20Refloreo%20Iterum."
                                   target="_blank"
                                   class="bg-green-500 text-white p-2 rounded-full hover:bg-green-600 transition flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                         fill="currentColor" class="w-5 h-5">
                                        <path d="M12.04 2C6.51 2 2 6.23 2 11.44c0 2.01.66 3.87 1.79 5.39L2 22l5.39-1.77a10.4 10.4 0 004.65 1.08c5.53 0 10.04-4.23 10.04-9.44C22.08 6.23 17.57 2 12.04 2zm0 17.3a8.33 8.33 0 01-4.26-1.16l-.31-.18-3.2 1.05 1.07-3.06-.2-.32a8.02 8.02 0 01-1.26-4.18c0-4.43 3.79-8.03 8.16-8.03s8.16 3.6 8.16 8.03-3.79 8.03-8.16 8.03zm4.45-5.55c-.24-.12-1.43-.7-1.65-.78-.22-.08-.38-.12-.54.12-.16.24-.62.78-.76.94-.14.16-.28.18-.52.06-.24-.12-1.02-.38-1.94-1.2-.72-.64-1.21-1.43-1.35-1.67-.14-.24-.02-.37.1-.49.1-.1.24-.26.36-.39.12-.13.16-.22.24-.36.08-.14.04-.26-.02-.38-.06-.12-.54-1.3-.74-1.78-.2-.48-.4-.42-.54-.42h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.32.98 2.48c.12.16 1.7 2.6 4.12 3.64.58.25 1.03.4 1.38.51.58.18 1.1.15 1.52.09.46-.07 1.43-.58 1.63-1.14.2-.56.2-1.04.14-1.14-.06-.1-.22-.16-.46-.28z"/>
                                    </svg>
                                </a>
                            </div>
                            
                            <p class="text-gray-500 text-sm mb-3">
                                {{ $p->description }}
                            </p>

                            <span class="font-bold text-green-600">
                                Rp{{ number_format($p->price,0,',','.') }} /batang
                            </span>
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
