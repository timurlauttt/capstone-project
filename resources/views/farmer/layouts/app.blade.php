<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Farmer Panel')</title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100">
    @include('farmer.layouts.navbar')

    <div class="flex min-h-screen">
        @include('farmer.layouts.sidebar')

        <main class="flex-1 p-6 md:p-8">
            @include('partials.flash')
            @yield('content')
        </main>
    </div>

    <script>
        // Sidebar toggle for mobile
        document.addEventListener('DOMContentLoaded', function () {
            var btn = document.getElementById('sidebar-toggle');
            var sidebar = document.getElementById('sidebar');
            if (btn && sidebar) {
                btn.addEventListener('click', function () {
                    sidebar.classList.toggle('-translate-x-full');
                });
            }

            // Auto-hide flash
            var flash = document.querySelector('.flash-message');
            if (flash) setTimeout(function () { flash.classList.add('opacity-0'); }, 4000);

            // Delete confirm (delegate)
            document.body.addEventListener('submit', function (e) {
                var form = e.target;
                if (form.matches('.confirm-delete')) {
                    if (!confirm('Are you sure you want to delete this item?')) {
                        e.preventDefault();
                    }
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
</body>

</html>
