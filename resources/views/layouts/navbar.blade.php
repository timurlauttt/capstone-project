<nav class="bg-white border-b border-green-500 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Left: Logo -->
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-3">
                    <!-- simple leaf icon using SVG -->
                    {{-- <svg class="h-16 w-16 text-green-600" viewBox="0 0 24 24" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M2 12C2 7.58 5.58 4 10 4c0 0-1 4-1 8s1 8 1 8C5.58 20 2 16.42 2 12z" />
                        <path d="M22 12c0 4.42-3.58 8-8 8 0 0 1-4 1-8s-1-8-1-8c4.42 0 8 3.58 8 8z" opacity="0.9" />
                    </svg> --}}
                    <img src="/images/logo.png" alt="" class="h-16 w-16">
                </a>
            </div>

            <!-- Right: Links & Mobile button -->
            <div class="flex items-center space-x-4">
                <!-- Desktop links (hidden on small screens) -->
                <div class="hidden md:flex md:items-center md:space-x-4">
                    <a href="/"
                        class="px-3 py-2 rounded-md font-medium
       {{ request()->is('/') ? 'bg-[#509b00] text-white' : 'text-gray-600 hover:bg-green-500 hover:text-white' }}">
                        Beranda
                    </a>

                    <a href="/menu"
                        class="px-3 py-2 rounded-md font-medium
       {{ request()->is('menu') ?  'bg-[#509b00] text-white' : 'text-gray-700 hover:bg-green-500 hover:text-white' }}">
                        Bibit
                    </a>

                    <a href="/tentang"
                        class="px-3 py-2 rounded-md font-medium
       {{ request()->is('tentang') ? 'bg-[#509b00] text-white' : 'text-gray-700 hover:bg-green-500 hover:text-white' }}">
                        Tentang
                    </a>
                </div>



                <!-- Mobile menu button (visible on small screens) -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" aria-expanded="false" aria-controls="mobile-menu"
                        class="p-2 rounded-md text-gray-600 hover:text-gray-800 hover:bg-gray-100">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide with JS if needed -->
    <div id="mobile-menu" class="md:hidden hidden border-t">
        <div class="px-4 pt-4 pb-3 space-y-1">
            <a href="/"
                class="block px-3 py-2 rounded-md font-medium
           {{ request()->is('/') ? 'bg-[#509b00] text-white' : 'text-gray-700 hover:bg-green-500 hover:text-white' }}">
                Beranda
            </a>

            <a href="/menu"
                class="block px-3 py-2 rounded-md font-medium
           {{ request()->is('menu') ? 'bg-[#509b00] text-white' : 'text-gray-700 hover:bg-green-500 hover:text-white' }}">
                Bibit
            </a>

            <a href="/tentang"
                class="block px-3 py-2 rounded-md font-medium
           {{ request()->is('tentang') ? 'bg-[#509b00] text-white' : 'text-gray-700 hover:bg-green-500 hover:text-white' }}">
                Tentang
            </a>
        </div>
    </div>


    <script>
        // Simple toggle for mobile menu (no dependency)
        document.addEventListener('DOMContentLoaded', function() {
            var btn = document.getElementById('mobile-menu-button');
            var menu = document.getElementById('mobile-menu');
            if (!btn) return;
            btn.addEventListener('click', function() {
                if (menu.classList.contains('hidden')) {
                    menu.classList.remove('hidden');
                } else {
                    menu.classList.add('hidden');
                }
            });
        });
    </script>
</nav>
