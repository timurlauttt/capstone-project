@extends('farmer.layouts.app')
@section('title', 'Edit Transaksi #'.$inquiry->id)
@section('content')
<div class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <div class="flex items-center space-x-3 mb-2">
                <a href="{{ route('farmer.inquiries.index') }}" class="text-gray-600 hover:text-gray-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <h1 class="text-3xl font-bold text-gray-900">Edit Transaksi</h1>
            </div>
            <p class="text-gray-600 ml-9">Perbarui detail transaksi</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <form action="{{ route('farmer.inquiries.update', $inquiry) }}" method="POST">
                @csrf
                @method('PATCH')

                <!-- Reuse same fields as create -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Produk</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Produk <span class="text-red-500">*</span></label>
                            <select name="product_id" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('product_id') border-red-500 @enderror" required>
                                <option value="">-- Pilih Produk --</option>
                                @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('product_id', $inquiry->product_id) == $product->id ? 'selected' : '' }}>
                                    {{ $product->title }} - Rp {{ number_format($product->price ?? 0,0,',','.') }}
                                </option>
                                @endforeach
                            </select>
                            @error('product_id')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah (Qty) <span class="text-red-500">*</span></label>
                            <input type="number" name="qty" value="{{ old('qty', $inquiry->qty) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('qty') border-red-500 @enderror" min="1" required>
                            @error('qty')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status <span class="text-red-500">*</span></label>
                            <select name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('status') border-red-500 @enderror" required>
                                <option value="paid" {{ old('status', $inquiry->status) == 'paid' ? 'selected' : '' }}>Paid</option>
                                <option value="unpaid" {{ old('status', $inquiry->status) == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                <option value="partial" {{ old('status', $inquiry->status) == 'partial' ? 'selected' : '' }}>Partial</option>
                            </select>
                            @error('status')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div class="mb-6 pt-6 border-t border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Pelanggan</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name', $inquiry->name) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('name') border-red-500 @enderror" required>
                            @error('name')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ old('email', $inquiry->email) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('email') border-red-500 @enderror" required>
                            @error('email')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" value="{{ old('phone', $inquiry->phone) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('phone') border-red-500 @enderror" required>
                            @error('phone')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pesan/Catatan</label>
                            <textarea name="message" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-green-500 focus:border-transparent @error('message') border-red-500 @enderror">{{ old('message', $inquiry->message) }}</textarea>
                            @error('message')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('farmer.inquiries.index') }}" class="px-6 py-2.5 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition">Batal</a>
                    <button type="submit" class="px-6 py-2.5 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Simpan Perubahan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection