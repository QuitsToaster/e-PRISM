<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - e-PRISM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-gradient-primary {
            background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
        }
        .border-gradient-primary {
            border: 2px solid transparent;
            background: linear-gradient(white, white) padding-box,
                        linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%) border-box;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#2563eb]/10 to-[#1a1a1a]/10 flex items-center justify-center min-h-screen p-4">

    <!-- Back -->
    <div class="absolute top-6 left-6">
        <a href="/" class="text-sm bg-transparent text-[#2563eb] px-4 py-1 rounded-lg border-2 border-[#2563eb] hover:bg-[#2563eb] hover:text-white transition flex items-center gap-1 font-medium">
            <span class="text-lg">←</span> Back
        </a>
    </div>

    <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-md border border-gray-100">
        
        <!-- Logo -->
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-primary rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                <span class="text-white text-2xl font-bold">eP</span>
            </div>
            <h2 class="text-2xl font-bold">
                <span class="bg-gradient-to-r from-[#2563eb] to-[#1a1a1a] bg-clip-text text-transparent">
                    Create an account
                </span>
            </h2>
            <p class="text-sm text-gray-500 mt-1">Join e-PRISM research platform</p>
        </div>

        <form action="{{ route('signup') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700">Full name</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition" 
                    placeholder="John Doe" required>
                @error('name') 
                    <div class="mt-1 text-[#2563eb] text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700">Email address</label>
                <input type="email" name="email" value="{{ old('email') }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition" 
                    placeholder="you@example.com" required>
                @error('email') 
                    <div class="mt-1 text-[#2563eb] text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition" 
                    placeholder="••••••••" required>
                @error('password') 
                    <div class="mt-1 text-[#2563eb] text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-700">Confirm password</label>
                <input type="password" name="password_confirmation" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition" 
                    placeholder="••••••••" required>
            </div>

            <!-- Terms -->
            <div class="mb-6">
                <div class="flex items-start">
                    <input type="checkbox" id="terms" class="mt-1 w-4 h-4 text-[#2563eb] border-gray-300 rounded focus:ring-[#2563eb]" required>
                    <label for="terms" class="ml-2 text-sm text-gray-600">
                        I agree to the 
                        <button type="button" onclick="openModal('termsModal')" class="text-[#2563eb] hover:underline">Terms of Service</button> 
                        and 
                        <button type="button" onclick="openModal('privacyModal')" class="text-[#2563eb] hover:underline">Privacy Policy</button>
                    </label>
                </div>
            </div>

            <button type="submit" class="w-full bg-gradient-primary text-white py-3 rounded-lg hover:opacity-90 transition font-medium shadow-md hover:shadow-lg">
                Create account
            </button>
        </form>

        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-3 bg-white text-gray-400">or</span>
            </div>
        </div>

        <p class="text-center text-sm text-gray-600">
            Already have an account? 
            <a href="{{ route('login.form') }}" class="font-medium text-[#2563eb] hover:underline">
                Log in
            </a>
        </p>

        <p class="text-center text-xs text-gray-400 mt-6">
            © 2026 e-PRISM · Research Management Platform
        </p>
    </div>

    <!-- Terms Modal -->
    <div id="termsModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center p-4">
        <div class="bg-white max-w-lg w-full rounded-xl shadow-xl p-6 relative">
            <h3 class="text-xl font-bold mb-4">Terms of Service</h3>
            <div class="text-sm text-gray-600 max-h-64 overflow-y-auto space-y-2">
                <p>By creating an account in e-PRISM, you agree to use the platform for academic and research purposes only.</p>
                <p>You are responsible for the accuracy of the information submitted.</p>
                <p>Any misuse of the system may result in account suspension.</p>
            </div>
            <button onclick="closeModal('termsModal')" class="mt-4 bg-[#2563eb] text-white px-4 py-2 rounded-lg hover:opacity-90">
                Close
            </button>
        </div>
    </div>

    <!-- Privacy Modal -->
    <div id="privacyModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center p-4">
        <div class="bg-white max-w-lg w-full rounded-xl shadow-xl p-6 relative">
            <h3 class="text-xl font-bold mb-4">Privacy Policy</h3>
            <div class="text-sm text-gray-600 max-h-64 overflow-y-auto space-y-2">
                <p>Your personal information is securely stored and will not be shared with third parties.</p>
                <p>We use your data only for research management and academic record purposes.</p>
                <p>Passwords are encrypted and protected.</p>
            </div>
            <button onclick="closeModal('privacyModal')" class="mt-4 bg-[#2563eb] text-white px-4 py-2 rounded-lg hover:opacity-90">
                Close
            </button>
        </div>
    </div>

    <!-- Modal Script -->
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
            document.getElementById(id).classList.add('flex');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
            document.getElementById(id).classList.remove('flex');
        }
    </script>

</body>
</html>