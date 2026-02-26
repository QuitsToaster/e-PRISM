<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-PRISM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex flex-col items-center justify-center text-center px-4">
    <h1 class="text-5xl font-bold mb-6 text-indigo-600">Welcome to e-PRISM</h1>
    <p class="text-lg mb-8 max-w-xl">
        e-PRISM (Electronic Program for Research Initiative Submission & Management)
        allows proponents to submit research papers section by section, and
        administrators to review, approve, and manage submissions efficiently.
    </p>

    <div class="space-x-4">
        <a href="{{ route('signup.form') }}" class="px-6 py-3 bg-indigo-600 text-white rounded hover:bg-indigo-500 transition">
            Sign Up
        </a>
        <a href="{{ route('login.form') }}" class="px-6 py-3 bg-gray-800 text-white rounded hover:bg-gray-700 transition">
            Login
        </a>
    </div>
</div>

</body>
</html>