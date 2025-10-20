@if(session('success'))
    <div class="mb-4 text-green-700">{{ session('success') }}</div>
@endif
<table class="w-full border">
    <thead>
        <tr class="bg-gray-50">
            <th class="p-2">Title</th>
            <th class="p-2">Stock</th>
            <th class="p-2">Price</th>
            <th class="p-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $p)
        <tr>
            <td class="p-2 flex items-center">
                @if($p->images->first())
                    <img src="{{ asset($p->images->first()->path) }}" class="h-12 w-12 object-cover rounded mr-3">
                @endif
                <span>{{ $p->title }}</span>
            </td>
            <td class="p-2">{{ $p->stock }}</td>
            <td class="p-2">{{ $p->price }}</td>
            <td class="p-2">
                <a href="{{ route('farmer.products.edit',$p) }}" class="text-blue-600">Edit</a>
                <form action="{{ route('farmer.products.destroy',$p) }}" method="POST" class="inline-block ml-2 confirm-delete">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="4" class="p-4">No products yet</td></tr>
        @endforelse
    </tbody>
</table>

{{ $products->links() }}
