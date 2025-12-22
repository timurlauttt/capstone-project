@props(['categories'])

<section id="produkSection" class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center">
            Katalog Produk
        </h2>

        @foreach ($categories as $category)
            <div class="mb-12">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-semibold text-gray-800">
                        {{ $category['name'] }}
                    </h3>

                    <a href="{{ route($category['route']) }}"
                       class="text-green-600 hover:text-green-700 font-medium">
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

                                <!-- WhatsApp -->
                                <a href="https://wa.me/6281234567890?text=Halo%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product['name']) }}"
                                   target="_blank"
                                   class="absolute bottom-2 right-2 bg-green-500 text-white p-2 rounded-full hover:bg-green-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                         fill="currentColor" class="w-6 h-6">
                                        <path d="M12.04 2C6.51 2 2 6.23 2 11.44c0 2.01.66 3.87 1.79 5.39L2 22l5.39-1.77a10.4 10.4 0 004.65 1.08c5.53 0 10.04-4.23 10.04-9.44C22.08 6.23 17.57 2 12.04 2z"/>
                                    </svg>
                                </a>
                            </div>

                            <div class="p-4">
                                <h4 class="font-semibold text-lg mb-2">
                                    {{ $product['name'] }}
                                </h4>
                                <p class="text-gray-500 text-sm mb-3">
                                    {{ $product['desc'] ?? 'Deskripsi produk belum tersedia.' }}
                                </p>

                                <span class="font-bold text-green-600">
                                    {{ $product['price'] ?? 'Rp0' }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>
