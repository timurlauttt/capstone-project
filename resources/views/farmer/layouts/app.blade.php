<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Farmer Panel')</title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100">
    @include('farmer.layouts.navbar')
    <!-- Mobile backdrop for off-canvas sidebar -->
    <div id="sidebar-backdrop" class="fixed inset-0 bg-black bg-opacity-40 z-20 md:hidden hidden"></div>

    <div class="flex min-h-screen">
    @include('farmer.layouts.sidebar')

    <main class="flex-1 p-6 md:p-8 md:ml-64">
        {{-- flash messages are shown with SweetAlert modal (centered) below; remove the small top-right toast --}}
            @yield('content')
        </main>
    </div>

    <script>
        // Sidebar toggle for mobile
        document.addEventListener('DOMContentLoaded', function () {
            var btn = document.getElementById('sidebar-toggle');
            var sidebar = document.getElementById('sidebar');
            var backdrop = document.getElementById('sidebar-backdrop');
            if (btn && sidebar) {
                btn.addEventListener('click', function () {
                    sidebar.classList.toggle('-translate-x-full');
                    if (backdrop) backdrop.classList.toggle('hidden');
                });
            }
            if (backdrop) {
                backdrop.addEventListener('click', function () {
                    // close sidebar when clicking backdrop
                    if (!sidebar.classList.contains('-translate-x-full')) {
                        sidebar.classList.add('-translate-x-full');
                    }
                    backdrop.classList.add('hidden');
                });
            }

            // Delete confirm (delegate) — open a centered SweetAlert modal for any form with .confirm-delete
            document.body.addEventListener('submit', function (e) {
                var form = e.target;
                if (form.matches('.confirm-delete')) {
                    e.preventDefault();
                    Swal.fire({
                        position: 'center',
                        title: 'Hapus?',
                        text: 'Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#16a34a',
                        cancelButtonColor: '#dc2626',
                        confirmButtonText: 'Ya, Hapus',
                        cancelButtonText: 'Batal'
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                }
            });

            // Image preview handlers (inputs with class image-input)
            document.querySelectorAll('input.image-input[type=file]').forEach(function (input) {
                input.addEventListener('change', function (ev) {
                    var previewTarget = document.getElementById(input.dataset.previewTarget);
                    if (!previewTarget) return;
                    previewTarget.innerHTML = '';
                    Array.from(input.files).forEach(function (file) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'h-24 w-24 object-cover rounded mr-2 inline-block';
                            previewTarget.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    });
                });
            });
        });
    </script>
        {{-- SweetAlert flash notifications (success / error) --}}
        @if(session('success') || session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                @if(session('success'))
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    iconColor: '#16a34a',
                    title: 'Sukses',
                    text: {!! json_encode(session('success')) !!},
                    confirmButtonColor: '#16a34a',
                    customClass: {
                        popup: 'rounded-xl',
                        title: 'text-2xl font-semibold',
                        content: 'text-gray-600',
                        confirmButton: 'px-6 py-2 rounded-md'
                    }
                });
                @endif

                @if(session('error'))
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    iconColor: '#dc2626',
                    title: 'Error',
                    text: {!! json_encode(session('error')) !!},
                    confirmButtonColor: '#dc2626',
                    customClass: {
                        popup: 'rounded-xl',
                        title: 'text-2xl font-semibold',
                        content: 'text-gray-600',
                        confirmButton: 'px-6 py-2 rounded-md'
                    }
                });
                @endif
            });
        </script>
        @endif
</body>

</html>
