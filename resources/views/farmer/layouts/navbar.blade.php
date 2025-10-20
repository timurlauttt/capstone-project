<nav class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('farmer.dashboard') }}" class="flex items-center space-x-3">
                    <svg class="h-8 w-8 text-green-600" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M2 12C2 7.58 5.58 4 10 4c0 0-1 4-1 8s1 8 1 8C5.58 20 2 16.42 2 12z"/><path d="M22 12c0 4.42-3.58 8-8 8 0 0 1-4 1-8s-1-8-1-8c4.42 0 8 3.58 8 8z" opacity="0.9"/></svg>
                    <span class="font-semibold text-lg">Farmer Panel</span>
                </a>
            </div>

            <div class="flex items-center space-x-4">
                <a href="{{ route('farmer.products.index') }}" class="text-gray-600 hover:text-gray-900">Products</a>
                <form method="POST" action="{{ route('farmer.logout') }}">
                    @csrf
                    <button class="text-sm text-red-600">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
