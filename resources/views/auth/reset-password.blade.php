<!DOCTYPE html>
<html>
<head>
    <title>Reset Password - e-PRISM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

<div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-md">

    <h2 class="text-xl font-bold mb-6 text-center">Set New Password</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="mb-4">
            <input type="email" name="email"
                class="w-full px-4 py-3 border rounded-lg"
                placeholder="Email" required>
        </div>

        <div class="mb-4">
            <input type="password" name="password"
                class="w-full px-4 py-3 border rounded-lg"
                placeholder="New Password" required>
        </div>

        <div class="mb-6">
            <input type="password" name="password_confirmation"
                class="w-full px-4 py-3 border rounded-lg"
                placeholder="Confirm Password" required>
        </div>

        <button type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-lg">
            Reset Password
        </button>
    </form>

</div>

</body>
</html>