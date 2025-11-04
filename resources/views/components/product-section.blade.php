<!-- resources/views/components/product-section.blade.php -->
@props(['categories'])

<section id="produkSection" class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center">Katalog Produk</h2>

        @foreach ($categories as $category => $products)
            <div class="mb-12">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-semibold text-gray-800">{{ $category }}</h3>
                    <a href="{{ route('menu.products') }}" class="text-green-600 hover:text-green-700 font-medium">Lihat semua →</a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($products as $product)
                        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition relative">
                            <div class="relative">
                                <img src="{{ $product['image'] ?? asset('images/sample-product.jpg') }}" 
                                     alt="{{ $product['name'] }}" 
                                     class="w-full h-48 object-cover">
                                
                                <!-- Logo WhatsApp di pojok kanan bawah -->
                                <a href="https://wa.me/6281234567890?text=Halo%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product['name']) }}" 
                                   target="_blank"
                                   class="absolute bottom-2 right-2 bg-green-500 text-white p-2 rounded-full hover:bg-green-600 transition">
                                    <i class="fab fa-whatsapp text-lg"></i>
                                </a>
                            </div>

                            <div class="p-4">
                                <h4 class="font-semibold text-lg mb-2">{{ $product['name'] }}</h4>
                                <p class="text-gray-500 text-sm mb-3">{{ $product['desc'] ?? 'Deskripsi produk belum tersedia.' }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="font-bold text-green-600">
                                        {{ $product['price'] ?? 'Rp0' }}
                                    </span>
                                    <div class="flex space-x-2">
                                        <a href="#" class="text-gray-600 hover:text-green-600">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Font Awesome untuk ikon -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
