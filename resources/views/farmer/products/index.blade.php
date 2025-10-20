@extends('farmer.layouts.app')

@section('title', 'My Products')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 clas s="text-2xl font-bold">My Products</h1>
        <a href="{{ route('farmer.products.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">Add Product</a>
    </div>

    @include('partials.flash')

    @if($products->count())
        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full divide-y">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @foreach($products as $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    @if($product->images->first())
                                        <div class="flex-shrink-0 h-16 w-16">
                                            <img class="h-16 w-16 rounded object-cover" src="{{ asset($product->images->first()->path) }}" alt="{{ $product->title }}">
                                        </div>
                                    @else
                                        <div class="flex-shrink-0 h-16 w-16 bg-gray-100 rounded flex items-center justify-center text-gray-400">No</div>
                                    @endif
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $product->title }}</div>
                                        <div class="text-xs text-gray-500">{{ Str::limit($product->description, 80) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->price ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $product->stock }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                @if($product->status === 'active')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">{{ ucfirst($product->status) }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('farmer.products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                                <form action="{{ route('farmer.products.destroy', $product) }}" method="POST" class="inline-block confirm-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
    @else
        <div class="bg-white rounded shadow p-6 text-center">
            <p class="text-gray-700">You haven't added any products yet.</p>
            <a href="{{ route('farmer.products.create') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Add your first product</a>
        </div>
    @endif

@endsection
