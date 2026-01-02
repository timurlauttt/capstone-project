@extends('farmer.layouts.app')
@section('title', 'Dashboard Admin')
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
                    <a href="{{ route('farmer.products.create') }}"
                        class="bg-green-200 hover:bg-green-300 transition p-6 rounded-lg flex items-center justify-center space-x-3">
                        <svg class="w-8 h-8 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span class="text-lg font-semibold text-gray-800">Tambah Bibit</span>
                    </a>

                    <a href="{{ route('farmer.inquiries.create') }}"
                        class="bg-orange-200 hover:bg-orange-300 transition p-6 rounded-lg flex items-center justify-center space-x-3">
                        <svg class="w-8 h-8 text-orange-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        <span class="text-lg font-semibold text-gray-800">Tambah Transaksi</span>
                    </a>
                </div>
            </div>

            <!-- bibit Cards -->
            <p class="font-semibold text-xl mb-4">Bibit terakhir yang ditambahkan</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-gray-600 text-sm mb-1">{{ $recentProducts->first()->title ?? 'Tidak ada produk' }}</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $recentProducts->first()->stock ?? 0 }}</p>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-gray-600 text-sm mb-1">{{ $recentProducts->get(1)->title ?? 'Tidak ada produk' }}</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $recentProducts->get(1)->stock ?? 0 }}</p>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-gray-600 text-sm mb-1">{{ $recentProducts->get(2)->title ?? 'Tidak ada produk' }}</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $recentProducts->get(2)->stock ?? 0 }}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="text-gray-600 text-sm mb-1">{{ $recentProducts->get(3)->title ?? 'Tidak ada produk' }}</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $recentProducts->get(3)->stock ?? 0 }}</p>
                </div>
            </div>

            <!-- Recent Submissions -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b">
                    <h2 class="text-xl font-semibold text-gray-900">Transaksi Terbaru</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <tbody class="divide-y divide-gray-200">
                            @forelse($recentInquiries as $inquiry)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                                <span class="text-green-600 font-semibold">{{ strtoupper(substr($inquiry->name, 0, 2)) }}</span>
                                            </div>
                                            <div>
                                                <div class="font-medium text-gray-900">{{ $inquiry->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $inquiry->product->name ?? 'Produk terhapus' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        @php
                                            $price = $inquiry->product->price ?? 0;
                                            $total = $price * ($inquiry->qty ?? 1);
                                        @endphp
                                        <div class="flex items-center justify-end space-x-4">
                                            <div class="text-right">
                                                <div class="text-gray-900 font-semibold">Rp {{ number_format($total, 0, ',', '.') }}</div>
                                                <div class="text-xs text-gray-500">{{ $inquiry->qty ?? 1 }} x Rp {{ number_format($price, 0, ',', '.') }}</div>
                                            </div>

                                            <a href="{{ route('farmer.inquiries.show', $inquiry) }}" class="inline-flex items-center px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200 text-sm text-gray-700">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Lihat
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-4 text-center text-gray-500">Belum ada pencatatan transaksi</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection