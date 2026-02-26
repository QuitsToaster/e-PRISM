<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - e-PRISM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-indigo-600">Sign Up</h2>

        <form action="{{ route('signup') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-medium">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full px-3 py-2 border rounded" required>
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full px-3 py-2 border rounded" required>
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Password</label>
                <input type="password" name="password" class="w-full px-3 py-2 border rounded" required>
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full px-3 py-2 border rounded" required>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-500 transition">Sign Up</button>
        </form>

        <p class="mt-4 text-center text-sm">Already have an account? <a href="{{ route('login.form') }}" class="text-indigo-600">Login</a></p>
    </div>
</body>
</html>