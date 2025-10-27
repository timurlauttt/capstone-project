<aside id="sidebar" class="fixed left-0 top-16 h-[calc(100vh-4rem)] w-64 bg-white px-4 py-6 transform -translate-x-full md:translate-x-0 transition-transform z-30 overflow-y-auto">
    <nav class="space-y-2">
        <a href="{{ route('farmer.dashboard') }}"
            class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('farmer.dashboard') ? 'bg-green-100 text-green-700' : 'text-gray-700 hover:bg-gray-100' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            <span>Dasbor</span>
        </a>

        <a href="{{ route('farmer.products.index') }}"
            class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('farmer.products.*') ? 'bg-green-100 text-green-700' : 'text-gray-700 hover:bg-gray-100' }}">
            <span class="flex-shrink-0 text-xl">🌱</span>
            <span>Bibit</span>
        </a>

        <a href="{{ route('farmer.inquiries.index') }}"
            class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('farmer.inquiries.*') ? 'bg-green-100 text-green-700' : 'text-gray-700 hover:bg-gray-100' }}">
            <span class="flex-shrink-0 text-xl">🧾</span>
            <span>Transaksi</span>
        </a>
    </nav>
</aside>