@extends('farmer.layouts.app')
@section('title','Tambah Bibit Baru')
@section('content')
<div class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <div class="flex items-center space-x-3 mb-2">
                <a href="{{ route('farmer.products.index') }}" class="text-gray-600 hover:text-gray-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <h1 class="text-3xl font-bold text-gray-900">Tambah Bibit Baru</h1>
            </div>
            <p class="text-gray-600 ml-9">Lengkapi form di bawah untuk menambahkan bibit baru</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <form action="{{ route('farmer.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Informasi Dasar -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Dasar</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nama Bibit -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Bibit <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="title" 
                                value="{{ old('title') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('title') border-red-500 @enderror"
                                placeholder="Contoh: Bibit Trembesi Premium"
                                required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="category_id" 
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('category_id') border-red-500 @enderror"
                                required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories ?? [] as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Status <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="status" 
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('status') border-red-500 @enderror"
                                required>
                                <option value="available">Tersedia</option>
                                <option value="unavailable">Tidak Tersedia</option>
                                <option value="preorder">Pre-Order</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi <span class="text-red-500">*</span>
                            </label>
                            <textarea 
                                name="description" 
                                rows="4"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('description') border-red-500 @enderror"
                                placeholder="Jelaskan detail tentang bibit ini..."
                                required>{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Informasi Harga & Stok -->
                <div class="mb-6 pt-6 border-t border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Harga & Stok</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Harga -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Harga (Rp) <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="number" 
                                name="price" 
                                value="{{ old('price') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('price') border-red-500 @enderror"
                                placeholder="50000"
                                min="0"
                                required>
                            @error('price')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stok -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Stok <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="number" 
                                name="stock" 
                                value="{{ old('stock') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('stock') border-red-500 @enderror"
                                placeholder="100"
                                min="0"
                                required>
                            @error('stock')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Unit -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Satuan
                            </label>
                            <input 
                                type="text" 
                                name="unit" 
                                value="{{ old('unit', 'batang') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="batang">
                        </div>
                    </div>
                </div>

                <!-- Upload Gambar -->
                <div class="mb-6 pt-6 border-t border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Foto Bibit</h2>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Upload Gambar <span class="text-gray-500">(Maksimal 5 gambar)</span>
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-green-500 transition">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                            </svg>
                            <p class="text-sm text-gray-600 mb-2">Klik untuk upload atau drag & drop</p>
                            <p class="text-xs text-gray-500">PNG, JPG, JPEG hingga 5MB</p>
                            <input 
                                type="file" 
                                name="images[]" 
                                multiple 
                                accept="image/*"
                                class="hidden image-input" 
                                id="imageUpload"
                                data-preview-target="images-preview">
                            <label for="imageUpload" class="mt-3 inline-block cursor-pointer bg-white border border-gray-300 rounded-lg px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Pilih File
                            </label>
                        </div>
                        <div id="images-preview" class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4"></div>
                        @error('images')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('farmer.products.index') }}" 
                       class="px-6 py-2.5 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition">
                        Batal
                    </a>
                    <button 
                        type="submit" 
                        class="px-6 py-2.5 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition flex items-center space-x-2">
                        <span> + Tambah Bibit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('imageUpload').addEventListener('change', function(e) {
    const preview = document.getElementById('images-preview');
    preview.innerHTML = '';
    
    Array.from(e.target.files).slice(0, 5).forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function(event) {
            const div = document.createElement('div');
            div.className = 'relative group';
            div.innerHTML = `
                <img src="${event.target.result}" class="w-full h-32 object-cover rounded-lg">
                <div class="absolute top-2 right-2 bg-white rounded-full p-1 shadow-lg">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
            `;
            preview.appendChild(div);
        };
        reader.readAsDataURL(file);
    });
});
</script>
@endsection
