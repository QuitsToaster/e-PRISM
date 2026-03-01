<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - e-PRISM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom gradient for red to blue */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #ef4444 0%, #3b82f6 100%);
        }
        .border-gradient-primary {
            border: 2px solid transparent;
            background: linear-gradient(white, white) padding-box,
                        linear-gradient(135deg, #ef4444 0%, #3b82f6 100%) border-box;
        }
        .focus-ring-gradient:focus {
            outline: none;
            ring: 2px solid transparent;
            ring-offset: 2px;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-red-50 to-blue-50 flex items-center justify-center min-h-screen">

    <!-- Back to home link with red to blue gradient -->
    <div class="absolute top-6 left-6">
        <a href="/" class="text-sm bg-gradient-primary text-white px-4 py-2 rounded-lg shadow-md hover:opacity-90 transition flex items-center gap-1 font-medium">
            <span class="text-lg">←</span> Back to e-PRISM
        </a>
    </div>

    <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-md border border-gray-100">
        <!-- Logo with gradient -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-primary rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                <span class="text-white text-2xl font-bold">eP</span>
            </div>
            <h2 class="text-2xl font-bold">
                <span class="bg-gradient-to-r from-red-600 to-blue-600 bg-clip-text text-transparent">
                    Welcome back
                </span>
            </h2>
            <p class="text-sm text-gray-500 mt-1">Sign in to your e-PRISM account</p>
        </div>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <!-- Email field -->
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-700">Email address</label>
                <input type="email" name="email" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition" 
                    placeholder="you@example.com"
                    required>
            </div>
            
            <!-- Password field -->
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition" 
                    placeholder="••••••••"
                    required>
            </div>

            <!-- Remember me & Forgot password -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                </div>
                <a href="#" class="text-sm text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-blue-600 hover:opacity-80">
                    Forgot password?
                </a>
            </div>

            <!-- Error message -->
            @error('email') 
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg">
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                </div>
            @enderror

            <!-- Login button with gradient -->
            <button type="submit" class="w-full bg-gradient-primary text-white py-3 rounded-lg hover:opacity-90 transition font-medium shadow-md hover:shadow-lg">
                Sign in
            </button>
        </form>

        <!-- Divider -->
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-3 bg-white text-gray-400">or</span>
            </div>
        </div>

        <!-- Sign up link -->
        <p class="text-center text-sm text-gray-600">
            New to e-PRISM? 
            <a href="{{ route('signup.form') }}" class="font-medium text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-blue-600 hover:opacity-80">
                Create an account
            </a>
        </p>

        <!-- Footer note -->
        <p class="text-center text-xs text-gray-400 mt-6">
            © e-PRISM · Research Management Platform
        </p>
    </div>

</body>
</html>