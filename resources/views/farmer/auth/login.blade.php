<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        /* Small tweak to ensure background covers on mobile safari */
        html, body { height: 100%; }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md px-4">
        <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
            <div class="p-6 sm:p-8">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="h-12 w-12 rounded-full bg-green-600 flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" fill="currentColor" />
                            <path d="M8 12 L12 8 L12 16 Z" fill="white" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Admin Panel</h1>
                        <p class="text-sm text-gray-500">Masuk untuk mengelola data</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-lg bg-white text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" />
                        @error('email')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" name="password" type="password" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-lg bg-white text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" />
                        @error('password')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>
<!-- 
                    <div class="flex items-center justify-between text-sm">
                        <label class="inline-flex items-center gap-2">
                            <input type="checkbox" name="remember" class="h-4 w-4 text-green-600 border-gray-300 rounded" />
                            <span class="text-gray-600">Ingat saya</span>
                        </label>
                        <a href="#" class="text-green-600 hover:underline">Lupa password?</a>
                    </div> -->

                    <div>
                        <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold shadow"> 
                            <span>Masuk</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
