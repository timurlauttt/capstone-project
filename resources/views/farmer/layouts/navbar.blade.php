<nav class="bg-white sticky top-0 z-30">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Left: Admin Logo and Name -->
            <div class="flex items-center space-x-3">
                <!-- Mobile sidebar toggle -->
                <button id="sidebar-toggle" class="md:hidden p-2 rounded hover:bg-gray-100" aria-label="Toggle sidebar">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <svg class="h-12 w-12 text-green-600" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10" fill="currentColor" />
                    <path d="M8 12 L12 8 L12 16 Z" fill="white" />
                    <path d="M16 12 L12 8 L12 16 Z" fill="white" opacity="0.7" />
                </svg>
                <span class="font-bold text-xl">Admin</span>
            </div>

            <!-- Right: Profile icon and refresh button -->
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-3 ">
                    <a href="{{ route('profile') }}">
                        <span class="sr-only">Profil</span>
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>

                <button onclick="handleLogout(event)" class="p-2 rounded-full hover:bg-gray-100" title="Logout"
                    aria-label="Logout">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                    </svg>
                </button>

                <script>
                    function handleLogout(event) {
                        event.preventDefault();
                        Swal.fire({
                            position: 'center',
                            title: 'Logout',
                            text: 'Apakah Anda yakin ingin keluar?',
                            icon: 'warning',
                            iconColor: '#f59e0b',
                            showCancelButton: true,
                            confirmButtonColor: '#16a34a',
                            cancelButtonColor: '#dc2626',
                            confirmButtonText: 'Ya, Logout',
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
                                document.getElementById('logout-form').submit();
                            }
                        });
                    }
                </script>
            </div>
        </div>
    </div>
</nav>