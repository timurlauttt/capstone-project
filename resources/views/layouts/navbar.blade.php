<nav class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Left: Logo -->
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-3">
                    <!-- simple leaf icon using SVG -->
                    <svg class="h-8 w-8 text-green-600" viewBox="0 0 24 24" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M2 12C2 7.58 5.58 4 10 4c0 0-1 4-1 8s1 8 1 8C5.58 20 2 16.42 2 12z" />
                        <path d="M22 12c0 4.42-3.58 8-8 8 0 0 1-4 1-8s-1-8-1-8c4.42 0 8 3.58 8 8z" opacity="0.9" />
                    </svg>
                    <span class="text-xl font-semibold text-gray-800">Plamty'x</span>
                </a>
            </div>

            <!-- Center: Nav links -->
            <div class="hidden md:flex md:space-x-10">
                <a href="#" class="text-gray-600 hover:text-gray-900">Plants</a>
                <a href="#" class="text-gray-600 hover:text-gray-900">For offices</a>
                <a href="#" class="text-gray-600 hover:text-gray-900">Plants care</a>
                <a href="#" class="text-gray-600 hover:text-gray-900">About</a>
            </div>

            <!-- Right: Icons -->
            <div class="flex items-center space-x-4">
                <button type="button" class="p-2 rounded-full text-gray-500 hover:text-gray-700 hover:bg-gray-100">
                    <!-- search icon -->
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"></path>
                    </svg>
                </button>

                <a href="#" class="p-2 rounded-full text-gray-500 hover:text-gray-700 hover:bg-gray-100">
                    <!-- profile icon -->
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.81.643 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                        </path>
                    </svg>
                </a>

                <a href="#" class="p-2 rounded-full text-gray-500 hover:text-gray-700 hover:bg-gray-100">
                    <!-- cart icon -->
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 5h12"></path>
                    </svg>
                </a>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button"
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
            <a href="#" class="block text-gray-700 px-2 py-1">Plants</a>
            <a href="#" class="block text-gray-700 px-2 py-1">For offices</a>
            <a href="#" class="block text-gray-700 px-2 py-1">Plants care</a>
            <a href="#" class="block text-gray-700 px-2 py-1">About</a>
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
