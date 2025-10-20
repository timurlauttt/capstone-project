<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Login</title>
</head>

<body>
    <div class="max-w-md mx-auto mt-16">
        <h2 class="text-2xl font-semibold mb-6">Farmer Login</h2>
        <form method="POST" action="{{ route('farmer.login.post') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm">Password</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <button class="bg-green-600 text-white px-4 py-2 rounded">Login</button>
            </div>
        </form>
    </div>

</body>

</html>
