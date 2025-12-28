<style>
    .nav-link {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .nav-link:active {
        transform: scale(0.95);
    }
    .scroll-smooth {
        scroll-behavior: smooth;
    }
</style>
<nav class="bg-white border-b border-green-500 shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Left: Logo -->
            <div class="flex items-center">
                <a href="/" class="flex items-center space-x-2">
                    <img src="/images/logo1.png" alt="" class="h-16 w-16">
                    <span class="text-xl font-semibold text-gray-800">Roflereo Iterum</span>
                </a>
            </div>

            <!-- Right: Links & Mobile button -->
            <div class="flex items-center space-x-4">
                <!-- Desktop links (hidden on small screens) -->
                <div class="hidden md:flex md:items-center md:space-x-4">
                    <a href="/" id="nav-home"
                        class="nav-link px-3 py-2 rounded-md font-medium transition-colors duration-200 {{ request()->is('/') ? 'bg-[#509b00] text-white' : 'text-gray-600 hover:bg-green-500 hover:text-white' }}">
                        Beranda
                    </a>

                    <a href="#produkSection" id="nav-produkSection"
                        class="nav-link px-3 py-2 rounded-md font-medium text-gray-700 hover:bg-green-500 hover:text-white transition-colors duration-200">
                        Bibit
                    </a>

                    <a href="#tentangSection" id="nav-tentangSection"
                        class="nav-link px-3 py-2 rounded-md font-medium text-gray-700 hover:bg-green-500 hover:text-white transition-colors duration-200">
                        Tentang
                    </a>

                    <a href="#faqSection" id="nav-faqSection"
                        class="nav-link px-3 py-2 rounded-md font-medium text-gray-700 hover:bg-green-500 hover:text-white transition-colors duration-200">
                        FAQ
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

    <!-- Mobile menu -->
    <div id="mobile-menu" class="md:hidden hidden border-t">
        <div class="px-4 pt-4 pb-3 space-y-1">
            <a href="/" id="mobile-nav-home"
                class="nav-link block px-3 py-2 rounded-md font-medium {{ request()->is('/') ? 'bg-[#509b00] text-white' : 'text-gray-700 hover:bg-green-500 hover:text-white' }}">
                Beranda
            </a>

            <a href="#produkSection" id="mobile-nav-produkSection"
                class="nav-link block px-3 py-2 rounded-md font-medium text-gray-700 hover:bg-green-500 hover:text-white">
                Bibit
            </a>

            <a href="#tentangSection" id="mobile-nav-tentangSection"
                class="nav-link block px-3 py-2 rounded-md font-medium text-gray-700 hover:bg-green-500 hover:text-white">
                Tentang
            </a>

            <a href="#faqSection" id="mobile-nav-faqSection"
                class="nav-link block px-3 py-2 rounded-md font-medium text-gray-700 hover:bg-green-500 hover:text-white">
                FAQ
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            var btn = document.getElementById('mobile-menu-button');
            var menu = document.getElementById('mobile-menu');
            if (btn && menu) {
                btn.addEventListener('click', function() {
                    menu.classList.toggle('hidden');
                });
            }

            // ScrollSpy Logic
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link');

            function updateActiveLink() {
                let currentSectionId = 'home';
                const scrollPosition = window.scrollY + 100; // Offset for navbar height

                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.offsetHeight;
                    if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                        currentSectionId = section.getAttribute('id');
                    }
                });

                // If at the very top, set to home
                if (window.scrollY < 100) {
                    currentSectionId = 'home';
                }

                navLinks.forEach(link => {
                    link.classList.remove('bg-[#509b00]', 'text-white');
                    link.classList.add('text-gray-700', 'text-gray-600');

                    const href = link.getAttribute('href');
                    if (
                        (currentSectionId === 'home' && (href === '/' || href === '#')) ||
                        (href === '#' + currentSectionId)
                    ) {
                        link.classList.add('bg-[#509b00]', 'text-white');
                        link.classList.remove('text-gray-700', 'text-gray-600');
                    }
                });
            }

            window.addEventListener('scroll', updateActiveLink);
            updateActiveLink(); // Initial check

            // Smooth scroll for anchor links
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    if (href.startsWith('#')) {
                        e.preventDefault();
                        const targetId = href.substring(1);
                        const targetElement = document.getElementById(targetId);
                        if (targetElement) {
                            window.scrollTo({
                                top: targetElement.offsetTop - 64, // Adjust for sticky navbar height
                                behavior: 'smooth'
                            });
                            // Close mobile menu if open
                            if (menu) menu.classList.add('hidden');
                        }
                    }
                });
            });
        });
    </script>
</nav>
