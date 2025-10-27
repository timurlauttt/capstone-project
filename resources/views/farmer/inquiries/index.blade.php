@extends('farmer.layouts.app')
@section('title', 'Manajemen Transaksi')
@section('content')
<div class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-6 flex justify-between items-start">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Manajemen Transaksi</h1>
                <p class="text-gray-600 mt-1">Kelola transaksi dan inquiry pelanggan</p>
            </div>
        </div>

        
        <!-- Table Component -->
        <x-table 
            :headers="['No', 'Produk', 'Pelanggan', 'Kontak', 'Jumlah', 'Status', 'Aksi']"
            searchPlaceholder="Cari nama pelanggan atau produk"
            addButtonText="Tambah Transaksi"
            :addButtonUrl="route('farmer.inquiries.create')"
            :showFilters="true"
            :filters="[
                [
                    'label' => 'Semua Status',
                    'options' => [
                        ['value' => 'paid', 'label' => 'Paid'],
                        ['value' => 'unpaid', 'label' => 'Unpaid'],
                        ['value' => 'partial', 'label' => 'Partial'],
                    ]
                ]
            ]"
        >
            @forelse($inquiries as $index => $inq)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-900">{{ $inquiries->firstItem() + $index }}</td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        @if($inq->product && $inq->product->images->count() > 0)
                        <img src="{{ asset($inq->product->images->first()->path) }}" 
                             alt="{{ $inq->product->title }}" 
                             class="w-12 h-12 rounded-lg object-cover flex-shrink-0">
                        @else
                        <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        @endif
                        <div>
                            <p class="font-medium text-gray-900">{{ $inq->product?->title ?? '-' }}</p>
                            <p class="text-sm text-gray-500">ID: #{{ $inq->id }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">{{ $inq->name }}</p>
                            <p class="text-sm text-gray-500">{{ $inq->email }}</p>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div>
                        <p class="text-sm text-gray-900">{{ $inq->phone }}</p>
                        <p class="text-xs text-gray-500">{{ $inq->created_at->format('d M Y') }}</p>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <span class="text-sm font-semibold text-gray-900">{{ $inq->qty }} unit</span>
                </td>
                <td class="px-6 py-4">
                    @if($inq->status === 'new')
                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                        Baru
                    </span>
                    @elseif($inq->status === 'open')
                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                        Terbuka
                    </span>
                    @elseif($inq->status === 'closed')
                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        Selesai
                    </span>
                    @else
                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                        {{ ucfirst($inq->status) }}
                    </span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-2">
                        <!-- Edit Button -->
                        <a href="{{ route('farmer.inquiries.edit', $inq) }}" 
                           class="p-2 bg-cyan-100 hover:bg-cyan-200 rounded-full transition" 
                           title="Edit">
                            <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>
                        <!-- Delete Button (form) -->
                        <form action="{{ route('farmer.inquiries.destroy', $inq) }}" method="POST" class="inline-block confirm-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 bg-red-100 hover:bg-red-200 rounded-full transition" title="Hapus">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-6 py-8 text-center">
                    <div class="flex flex-col items-center justify-center">
                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                        </svg>
                        <p class="text-gray-500 text-lg">Belum ada transaksi</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </x-table>

        <!-- Pagination -->
        @if($inquiries->hasPages())
        <div class="mt-6">
            {{ $inquiries->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
