@extends('farmer.layouts.app')

@section('title', 'Manajemen Bibit')

@section('content')
    <div class="bg-gray-100 min-h-screen p-6">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="mb-6 flex justify-between items-start">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Manajemen Bibit</h1>
                    <p class="text-gray-600 mt-1">Kelola data bibit tanaman</p>
                </div>
            </div>

            <!-- Table Component -->
            <x-table :headers="['No', 'Produk', 'Harga', 'Stok', 'Status', 'Aksi']" searchPlaceholder="Cari nama bibit"
                addButtonText="Tambah Bibit" :addButtonUrl="route('farmer.products.create')" :showFilters="true" :filters="[
            [
                'label' => 'Semua Kategori',
                'options' => [
                    ['value' => 'pohon', 'label' => 'Pohon'],
                    ['value' => 'tanaman-hias', 'label' => 'Tanaman Hias'],
                    ['value' => 'buah', 'label' => 'Buah'],
                ]
            ],
            [
                'label' => 'Semua Status',
                'options' => [
                    ['value' => 'active', 'label' => 'Aktif'],
                    ['value' => 'inactive', 'label' => 'Nonaktif'],
                    ['value' => 'out-of-stock', 'label' => 'Habis'],
                ]
            ]
        ]">
                @forelse($products as $index => $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $products->firstItem() + $index }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                @if($product->images->first())
                                    <div class="w-12 h-12 rounded-lg overflow-hidden flex-shrink-0">
                                        <img class="w-full h-full object-cover" src="{{ asset($product->images->first()->path) }}"
                                            alt="{{ $product->title }}">
                                    </div>
                                @else
                                    <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                                <div>
                                    <p class="font-medium text-gray-900">{{ $product->title }}</p>
                                    <p class="text-sm text-gray-500">{{ Str::limit($product->description, 40) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm font-semibold text-gray-900">Rp
                                {{ number_format($product->price ?? 0, 0, ',', '.') }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">{{ $product->stock }} unit</p>
                        </td>
                        <td class="px-6 py-4">
                            @if($product->status === 'active')
                                <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                    {{ ucfirst($product->status) }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <!-- Toggle Visibility Button -->
                                <form action="{{ route('farmer.products.toggle-visibility', $product) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="p-2 {{ $product->is_visible ? 'bg-green-100 hover:bg-green-200' : 'bg-gray-100 hover:bg-gray-200' }} rounded-full transition"
                                        title="{{ $product->is_visible ? 'Sembunyikan' : 'Tampilkan' }}">
                                        @if($product->is_visible)
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                            </svg>
                                        @endif
                                    </button>
                                </form>
                                <!-- Edit Button -->
                                <a href="{{ route('farmer.products.edit', $product) }}"
                                    class="p-2 bg-cyan-100 hover:bg-cyan-200 rounded-full transition" title="Edit">
                                    <svg class="w-5 h-5 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <!-- Delete Button -->
                                <form action="{{ route('farmer.products.destroy', $product) }}" method="POST"
                                    class="inline-block" id="delete-form-{{ $product->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $product->id }}, '{{ $product->title }}')"
                                        class="p-2 bg-red-100 hover:bg-red-200 rounded-full transition" title="Hapus">
                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <p class="text-gray-500 mb-4">Belum ada bibit yang ditambahkan</p>
                                <a href="{{ route('farmer.products.create') }}"
                                    class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Tambah Bibit Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </x-table>

            @if($products->hasPages())
                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
        function confirmDelete(productId, productName) {
            Swal.fire({
                position: 'center',
                title: 'Hapus Bibit?',
                text: `Apakah Anda yakin ingin menghapus "${productName}"? Data ini tidak dapat dikembalikan!`,
                icon: 'warning',
                iconColor: '#f59e0b',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'rounded-xl',
                    title: 'text-2xl font-semibold',
                    content: 'text-gray-600',
                    confirmButton: 'px-6 py-2 rounded-md',
                    cancelButton: 'px-6 py-2 rounded-md'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + productId).submit();
                }
            });
        }
    </script>
@endsection