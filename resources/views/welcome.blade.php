<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-PRISM · Research Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom gradient for vibrant dark blue to black */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
        }
        .text-gradient-primary {
            background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .border-gradient-primary {
            border: 2px solid transparent;
            background: linear-gradient(white, white) padding-box,
                        linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%) border-box;
        }
    </style>
</head>
<body class="bg-white">

<!-- Navigation with vibrant dark blue to black gradient header -->
<nav class="bg-gradient-primary">
    <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
        <div class="text-xl font-bold text-white">e-PRISM</div>
        <div class="space-x-6 text-sm text-white/90">
            <a href="#" class="hover:text-white">Features</a>
            <a href="#" class="hover:text-white">Feedback</a>
            <a href="#" class="hover:text-white">About</a>
        </div>
    </div>
</nav>

<!-- Main content -->
<div class="max-w-6xl mx-auto px-4 py-16 md:py-24">
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <!-- Left column -->
        <div>
            <!-- Gradient badge -->
            <div class="inline-block px-3 py-1 bg-gradient-to-r from-[#2563eb]/10 to-[#1a1a1a]/10 text-sm font-medium rounded-full mb-6 border border-[#2563eb]/20">
                <span class="bg-gradient-to-r from-[#2563eb] to-[#1a1a1a] bg-clip-text text-transparent">🔬 Research Submission Platform</span>
            </div>
            
            <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                <span class="text-gradient-primary">Streamline</span> your research<br>
                submissions with <br><span class="text-gradient-primary">e-PRISM</span>
            </h1>
            
            <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                Electronic Program for Research Initiative Submission & Management allows 
                proponents to submit research papers section by section, and administrators 
                to review, approve, and manage submissions efficiently.
            </p>
            
            <!-- Buttons with gradient -->
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('signup.form') }}" class="px-6 py-3 bg-gradient-primary text-white rounded-lg hover:opacity-90 transition font-medium text-center shadow-md hover:shadow-lg">
                    Get started
                </a>
                <a href="{{ route('login.form') }}" class="px-6 py-3 border-gradient-primary text-gray-700 rounded-lg hover:bg-gradient-to-r hover:from-[#2563eb]/10 hover:to-[#1a1a1a]/10 transition font-medium text-center">
                    Sign in
                </a>
            </div>

            <!-- SDO Santiago -->
            <div class="mt-8 pt-6 border-t border-gray-100">
                <p class="text-xs text-gray-400 mb-3">SDO SANTIAGO CITY</p>
                <div class="flex gap-6 items-center">
                    <div class="text-sm text-gray-700 font-medium">Schools Division Office</div>
                </div>
            </div>
        </div>
        
        <!-- Right column - visual with vibrant dark blue to black gradient -->
        <div class="hidden md:block bg-gradient-to-br from-[#2563eb]/5 via-white to-[#1a1a1a]/5 p-8 rounded-2xl border border-gray-100 shadow-lg">
            <div class="space-y-4">
                <!-- Review status -->
                <div class="flex items-center gap-3 text-xs mt-2">
                    <div class="w-2 h-2 bg-[#2563eb] rounded-full"></div>
                    <span class="text-gray-500">Digitalizing Research, Empowering Progress.</span>
                </div>
                <!-- Section headers with gradient numbers -->
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-gradient-primary rounded-lg flex items-center justify-center text-white font-medium text-sm">01</div>
                    <div class="flex-1 h-10 bg-white rounded-lg border border-gray-200 px-3 flex items-center text-sm text-gray-600">Introduction & Abstract</div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-gradient-primary rounded-lg flex items-center justify-center text-white font-medium text-sm">02</div>
                    <div class="flex-1 h-10 bg-white rounded-lg border border-gray-200 px-3 flex items-center text-sm text-gray-600">Research Methodology</div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-gradient-primary rounded-lg flex items-center justify-center text-white font-medium text-sm">03</div>
                    <div class="flex-1 h-10 bg-white rounded-lg border border-gray-200 px-3 flex items-center text-sm text-gray-600">Results & Findings</div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-gradient-primary rounded-lg flex items-center justify-center text-white font-medium text-sm">04</div>
                    <div class="flex-1 h-10 bg-white rounded-lg border border-gray-200 px-3 flex items-center text-sm text-gray-600">Discussion & Conclusion</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer with vibrant dark blue to black gradient -->
<footer class="bg-gradient-primary py-6 mt-12">
    <div class="max-w-6xl mx-auto px-4 text-center text-sm text-white">
        © 2026 e-PRISM · Research Management Platform
    </div>
</footer>

</body>
</html>