@extends('farmer.layouts.app')
@section('title','Dashboard Admin')
@section('content')
<div class="bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Dashboard Admin</h1>
            <p class="text-gray-600 mt-1">Selamat datang kembali, Admin</p>
        </div>

        <!-- Quick Actions -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Aksi Cepat</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="{{ route('farmer.products.create') }}" class="bg-green-200 hover:bg-green-300 transition p-6 rounded-lg flex items-center justify-center space-x-3">
                    <svg class="w-8 h-8 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span class="text-lg font-semibold text-gray-800">Tambah Bibit</span>
                </a>

                <a href="#" class="bg-orange-200 hover:bg-orange-300 transition p-6 rounded-lg flex items-center justify-center space-x-3">
                    <svg class="w-8 h-8 text-orange-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                    <span class="text-lg font-semibold text-gray-800">Tambah Transaksi</span>
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <!-- Trembesi -->
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm mb-1">Trembesi</p>
                    <p class="text-3xl font-bold text-gray-900">248</p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>

            <!-- Beringin -->
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm mb-1">Beringin</p>
                    <p class="text-3xl font-bold text-gray-900">186</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>

            <!-- Pucuk Merah -->
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm mb-1">Pucuk Merah</p>
                    <p class="text-3xl font-bold text-gray-900">42</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>

            <!-- Durian -->
            <div class="bg-white rounded-lg shadow p-6 flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm mb-1">Durian</p>
                    <p class="text-3xl font-bold text-gray-900">20</p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Recent Submissions -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b">
                <h2 class="text-xl font-semibold text-gray-900">Pengajuan Terbaru</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                        <span class="text-blue-600 font-semibold">BS</span>
                                    </div>
                                    <span class="font-medium text-gray-900">Budi Santoso</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="text-gray-900 font-semibold">Rp 250.000</span>
                            </td>
                        </tr>
                        @forelse($products->take(5) as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                        <span class="text-green-600 font-semibold">{{ substr($product->name, 0, 2) }}</span>
                                    </div>
                                    <span class="font-medium text-gray-900">{{ $product->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="text-gray-900 font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="px-6 py-4 text-center text-gray-500">Belum ada produk</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
