@props(['categories'])

<section id="produkSection" class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-xl md:text-3xl font-bold text-gray-800 mb-10 text-center">
            Katalog Produk
        </h2>

        @foreach ($categories as $category)
            <div class="mb-12">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg md:text-2xl font-semibold text-gray-800">
                        Bibit {{ $category['name'] }}
                    </h3>

                    @php
                        $link = '#';
                        if (isset($category['route'])) {
                            if (is_array($category['route'])) {
                                // ['route.name', param]
                                $link = route($category['route'][0], $category['route'][1]);
                            } else {
                                $link = route($category['route']);
                            }
                        }
                    @endphp
                    <a href="{{ $link }}"
                       class="text-sm md:text-base text-green-600 hover:text-green-700 font-medium">
                        Lihat semua →
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($category['products'] as $product)
                        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition relative">
                            <div class="relative">
                                <img src="{{ $product['image'] ?? asset('images/sample-product.jpg') }}"
                                     alt="{{ $product['name'] }}"
                                     class="w-full h-48 object-cover">
                            </div>

                            <div class="p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="font-semibold text-base md:text-lg">
                                       Bibit {{ $product['name'] }}
                                    </h4>
                                    
                                    <!-- WhatsApp Button -->
                                    <a href="https://wa.me/6288216178244?text=Halo%20pak%20Harmoko%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product['name']) }}%20yang%20ada%20di%20Refloreo%20Iterum."
                                       target="_blank"
                                       class="bg-green-500 text-white p-2 rounded-full hover:bg-green-600 transition flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                             fill="currentColor" class="w-5 h-5">
                                            <path d="M12.04 2C6.51 2 2 6.23 2 11.44c0 2.01.66 3.87 1.79 5.39L2 22l5.39-1.77a10.4 10.4 0 004.65 1.08c5.53 0 10.04-4.23 10.04-9.44C22.08 6.23 17.57 2 12.04 2zm0 17.3a8.33 8.33 0 01-4.26-1.16l-.31-.18-3.2 1.05 1.07-3.06-.2-.32a8.02 8.02 0 01-1.26-4.18c0-4.43 3.79-8.03 8.16-8.03s8.16 3.6 8.16 8.03-3.79 8.03-8.16 8.03zm4.45-5.55c-.24-.12-1.43-.7-1.65-.78-.22-.08-.38-.12-.54.12-.16.24-.62.78-.76.94-.14.16-.28.18-.52.06-.24-.12-1.02-.38-1.94-1.2-.72-.64-1.21-1.43-1.35-1.67-.14-.24-.02-.37.1-.49.1-.1.24-.26.36-.39.12-.13.16-.22.24-.36.08-.14.04-.26-.02-.38-.06-.12-.54-1.3-.74-1.78-.2-.48-.4-.42-.54-.42h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 2s.86 2.32.98 2.48c.12.16 1.7 2.6 4.12 3.64.58.25 1.03.4 1.38.51.58.18 1.1.15 1.52.09.46-.07 1.43-.58 1.63-1.14.2-.56.2-1.04.14-1.14-.06-.1-.22-.16-.46-.28z"/>
                                        </svg>
                                    </a>
                                </div>
                                
                                <p class="text-gray-500 text-sm mb-3">
                                    {{ $product['desc'] ?? 'Deskripsi produk belum tersedia.' }}
                                </p>

                                <span class="font-bold text-green-600">
                                    {{ $product['price'] ?? 'Rp0' }} /batang
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>
