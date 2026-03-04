<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - e-PRISM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom gradient for vibrant dark blue to black */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
        }
        .border-gradient-primary {
            border: 2px solid transparent;
            background: linear-gradient(white, white) padding-box,
                        linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%) border-box;
        }
        .focus-ring-gradient:focus {
            outline: none;
            ring: 2px solid transparent;
            ring-offset: 2px;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#2563eb]/10 to-[#1a1a1a]/10 flex items-center justify-center min-h-screen">

    <!-- Back to home link with only border -->
    <div class="absolute top-6 left-6">
        <a href="/" class="text-sm bg-transparent text-[#2563eb] px-4 py-1 rounded-lg border-2 border-[#2563eb] hover:bg-[#2563eb] hover:text-white transition flex items-center gap-1 font-medium">
            <span class="text-lg">←</span> Back
        </a>
    </div>

    <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-md border border-gray-100">
        <!-- Logo with gradient -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-primary rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                <span class="text-white text-2xl font-bold">eP</span>
            </div>
            <h2 class="text-2xl font-bold">
                <span class="bg-gradient-to-r from-[#2563eb] to-[#1a1a1a] bg-clip-text text-transparent">
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
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition" 
                    placeholder="you@example.com"
                    required>
            </div>
            
            <!-- Password field -->
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition" 
                    placeholder="••••••••"
                    required>
            </div>

            <!-- Remember me & Forgot password -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="w-4 h-4 text-[#2563eb] border-gray-300 rounded focus:ring-[#2563eb]">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                </div>
                <!-- OPEN MODAL -->
            <button type="button" onclick="openModal()"
                class="text-sm text-blue-600 hover:underline">
                Forgot password?
            </button>
            </div>

            <!-- Error message -->
            @error('email') 
                <div class="mb-4 p-3 bg-[#2563eb]/10 border border-[#2563eb]/20 rounded-lg">
                    <span class="text-[#2563eb] text-sm">{{ $message }}</span>
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
            <a href="{{ route('signup.form') }}" class="font-medium text-transparent bg-clip-text bg-gradient-to-r from-[#2563eb] to-[#1a1a1a] hover:opacity-80">
                Create an account
            </a>
        </p>

        <!-- Forgot Password Modal -->
<div id="forgotModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center">
    <div class="bg-white p-6 rounded-xl w-full max-w-md">
        <h3 class="text-lg font-bold mb-4">Reset Password</h3>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <input type="email" name="email"
                class="w-full px-4 py-3 border rounded-lg mb-4"
                placeholder="Enter your email" required>

            <button type="submit"
                class="w-full bg-gradient-primary text-white py-3 rounded-lg hover:opacity-90 transition font-medium shadow-md hover:shadow-lg">
                Send Reset Link
            </button>
        </form>

        <button onclick="closeModal()"
            class="mt-3 text-sm text-gray-500 hover:underline">
            Cancel
        </button>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('forgotModal').classList.remove('hidden');
    document.getElementById('forgotModal').classList.add('flex');
}

function closeModal() {
    document.getElementById('forgotModal').classList.add('hidden');
}
</script>

        <!-- Footer note -->
        <p class="text-center text-xs text-gray-400 mt-6">
            © 2026 e-PRISM · Research Management Platform
        </p>
    </div>

</body>
</html>