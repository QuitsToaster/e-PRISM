<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - e-PRISM</title>
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
    </style>
</head>
<body class="bg-gradient-to-br from-red-50 to-blue-50 flex items-center justify-center min-h-screen p-4">

    <!-- Back to home link with red to blue gradient -->
    <div class="absolute top-6 left-6">
        <a href="/" class="text-sm bg-gradient-primary text-white px-4 py-2 rounded-lg shadow-md hover:opacity-90 transition flex items-center gap-1 font-medium">
            <span class="text-lg">←</span> Back to e-PRISM
        </a>
    </div>

    <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-md border border-gray-100">
        <!-- Logo with gradient -->
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-primary rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                <span class="text-white text-2xl font-bold">eP</span>
            </div>
            <h2 class="text-2xl font-bold">
                <span class="bg-gradient-to-r from-red-600 to-blue-600 bg-clip-text text-transparent">
                    Create an account
                </span>
            </h2>
            <p class="text-sm text-gray-500 mt-1">Join e-PRISM research platform</p>
        </div>

        <form action="{{ route('signup') }}" method="POST">
            @csrf
            
            <!-- Name field -->
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700">Full name</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition" 
                    placeholder="John Doe"
                    required>
                @error('name') 
                    <div class="mt-1 text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email field -->
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700">Email address</label>
                <input type="email" name="email" value="{{ old('email') }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition" 
                    placeholder="you@example.com"
                    required>
                @error('email') 
                    <div class="mt-1 text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password field -->
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition" 
                    placeholder="••••••••"
                    required>
                @error('password') 
                    <div class="mt-1 text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password field -->
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-700">Confirm password</label>
                <input type="password" name="password_confirmation" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition" 
                    placeholder="••••••••"
                    required>
            </div>

            <!-- Terms and conditions -->
            <div class="mb-6">
                <div class="flex items-start">
                    <input type="checkbox" id="terms" class="mt-1 w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" required>
                    <label for="terms" class="ml-2 text-sm text-gray-600">
                        I agree to the 
                        <a href="#" class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-blue-600 hover:opacity-80">Terms of Service</a> 
                        and 
                        <a href="#" class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-blue-600 hover:opacity-80">Privacy Policy</a>
                    </label>
                </div>
            </div>

            <!-- Sign Up button with gradient -->
            <button type="submit" class="w-full bg-gradient-primary text-white py-3 rounded-lg hover:opacity-90 transition font-medium shadow-md hover:shadow-lg">
                Create account
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

        <!-- Login link -->
        <p class="text-center text-sm text-gray-600">
            Already have an account? 
            <a href="{{ route('login.form') }}" class="font-medium text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-blue-600 hover:opacity-80">
                Sign in
            </a>
        </p>

        <!-- Footer note -->
        <p class="text-center text-xs text-gray-400 mt-6">
            © e-PRISM · Research Management Platform
        </p>
    </div>

</body>
</html>