<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - e-PRISM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Login</h2>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" class="w-full px-3 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Password</label>
                <input type="password" name="password" class="w-full px-3 py-2 border rounded" required>
            </div>
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-500 transition">Login</button>
        </form>

        <p class="mt-4 text-center text-sm">Don't have an account? <a href="{{ route('signup.form') }}" class="text-indigo-600">Sign Up</a></p>
    </div>
</body>
</html>