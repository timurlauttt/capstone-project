<aside class="w-64 bg-white border-r min-h-screen px-4 py-6">
    <div class="mb-6">
        <a href="{{ route('farmer.dashboard') }}" class="flex items-center space-x-3">
            <svg class="h-8 w-8 text-green-600" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M2 12C2 7.58 5.58 4 10 4c0 0-1 4-1 8s1 8 1 8C5.58 20 2 16.42 2 12z"/><path d="M22 12c0 4.42-3.58 8-8 8 0 0 1-4 1-8s-1-8-1-8c4.42 0 8 3.58 8 8z" opacity="0.9"/></svg>
            <span class="font-semibold">Farmer Panel</span>
        </a>
    </div>

    <nav class="space-y-2">
        <a href="{{ route('farmer.dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Dashboard</a>
        <a href="{{ route('farmer.products.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Products</a>
        @unless(request()->routeIs('farmer.products.index'))
            <a href="{{ route('farmer.products.create') }}" class="block px-3 py-2 rounded hover:bg-gray-100">Add Product</a>
        @endunless
        <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Inquiries</a>
        <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Settings</a>
    </nav>
</aside>
