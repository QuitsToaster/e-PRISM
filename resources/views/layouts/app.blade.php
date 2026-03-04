<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <!-- Favicon for all devices -->
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.png') }}">
<link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <title>@yield('title') - e-PRISM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom gradient for vibrant dark blue to black */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
        }
        .bg-gradient-sidebar {
            background: linear-gradient(180deg, #2563eb 0%, #1a1a1a 100%);
        }
        .text-gradient-primary {
            background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .hover-gradient:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
            color: white;
        }
        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #2563eb, #1a1a1a);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #3b82f6, #2d2d2d);
        }
    </style>
</head>

<body class="bg-gray-50 font-sans flex min-h-screen">

@php
    $user = auth()->user();
@endphp

{{-- Sidebar for Admin - Vibrant Dark Blue to Black Gradient --}}
@if($user && $user->role === 'admin')
<aside class="hidden md:flex md:flex-col w-64 bg-gradient-sidebar fixed left-0 top-0 h-full shadow-2xl">
    <!-- Logo Area -->
    <div class="p-6 border-b border-white/20">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center backdrop-blur-sm">
                <span class="text-white text-lg font-bold">eP</span>
            </div>
            <div class="flex items-center gap-3">
    <!-- Place your logo image here -->
    <!-- <img src="{{ asset('logo.png') }}" alt="e-PRISM Logo" class="w-10 h-10 rounded-lg" /> -->

    <div>
        <span class="text-white font-bold block">e-PRISM</span>
        <span class="text-white/60 text-xs">Admin Portal</span>
    </div>
</div>
        </div>
    </div>

    <!-- Admin Profile -->
    <div class="p-5 border-b border-white/20">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <p class="text-white text-sm font-medium">{{ $user->name ?? 'Admin' }}</p>
                <p class="text-white/60 text-xs">Administrator</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 p-4">
        <p class="text-white/40 text-xs uppercase tracking-wider mb-3 px-3">Main Menu</p>
        <div class="space-y-1">
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition
               @if(request()->routeIs('admin.dashboard')) 
                   text-white bg-white/20 
               @else 
                   text-white/70 hover:text-white hover:bg-white/10 
               @endif">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.submissions.list') }}" 
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition
               @if(request()->routeIs('admin.submissions.list')) 
                   text-white bg-white/20 
               @else 
                   text-white/70 hover:text-white hover:bg-white/10 
               @endif">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span>Submitted Researches</span>
            </a>

            <a href="{{ route('profile') }}" 
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm text-white/70 hover:text-white hover:bg-white/10 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span>Profile</span>
            </a>
        </div>
    </nav>

    <!-- Logout Button at Bottom - Pure Red -->
    <div class="p-4 border-t border-white/20">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" 
                    class="flex items-center gap-3 w-full px-3 py-2.5 rounded-lg text-sm bg-red-600 hover:bg-red-700 text-white transition shadow-md">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>

<!-- Mobile Top Navbar - Vibrant Dark Blue to Black Gradient -->
<nav class="md:hidden bg-gradient-primary px-6 py-4 flex justify-between items-center text-white shadow-lg">
    <span class="font-bold text-xl tracking-wide">e-PRISM</span>

    <button id="mobile-menu-button" class="focus:outline-none p-2 hover:bg-white/10 rounded-lg transition">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
</nav>

<!-- Mobile Menu - Vibrant Dark Blue to Black Gradient -->
<div id="menu-links" class="md:hidden bg-gradient-sidebar text-white shadow-lg hidden">
    <nav class="flex flex-col py-2">
        <a href="{{ route('admin.dashboard') }}" 
           class="px-6 py-3 hover:bg-white/10 transition
           @if(request()->routeIs('admin.dashboard')) bg-white/20 @endif">
            Dashboard
        </a>
        <a href="{{ route('admin.submissions.list') }}" 
           class="px-6 py-3 hover:bg-white/10 transition
           @if(request()->routeIs('admin.submissions.list')) bg-white/20 @endif">
            Submitted Researches
        </a>
        <a href="{{ route('profile') }}" class="px-6 py-3 hover:bg-white/10 transition">
            Profile
        </a>
        <div class="px-6 py-3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow-md">
                    Logout
                </button>
            </form>
        </div>
    </nav>
</div>

{{-- ==================== REGULAR USER NAVIGATION ==================== --}}
@elseif($user && $user->role !== 'admin')

{{-- Top Navbar for Regular Users with Navigation Links - Vibrant Dark Blue to Black Gradient --}}
<nav class="bg-gradient-primary px-6 py-4 text-white shadow-lg fixed top-0 left-0 right-0 z-10">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="flex items-center gap-8">
            <span class="font-bold text-xl tracking-wide">e-PRISM</span>
            
            {{-- Navigation Links for Regular Users --}}
            <div class="hidden md:flex items-center gap-4">
                <a href="{{ route('dashboard') }}" 
                   class="px-3 py-2 rounded-lg text-sm font-medium transition
                   @if(request()->routeIs('dashboard')) bg-white/20 @else hover:bg-white/10 @endif">
                    Dashboard
                </a>
                
                <a href="{{ route('submit.paper') }}" 
                   class="px-3 py-2 rounded-lg text-sm font-medium transition
                   @if(request()->routeIs('submit.paper')) bg-white/20 @else hover:bg-white/10 @endif">
                    Submit Research
                </a>
                
                <a href="{{ route('my.submissions') }}" 
                   class="px-3 py-2 rounded-lg text-sm font-medium transition
                   @if(request()->routeIs('my.submissions')) bg-white/20 @else hover:bg-white/10 @endif">
                    My Submissions
                </a>
                
                <a href="{{ route('profile') }}" 
                   class="px-3 py-2 rounded-lg text-sm font-medium transition
                   @if(request()->routeIs('profile')) bg-white/20 @else hover:bg-white/10 @endif">
                    Profile
                </a>
                
                <a href="{{ route('help.guides') }}" 
                   class="px-3 py-2 rounded-lg text-sm font-medium transition
                   @if(request()->routeIs('help.guides')) bg-white/20 @else hover:bg-white/10 @endif">
                    Help & Guides
                </a>
            </div>
        </div>

        {{-- User Info and Logout - Pure Red --}}
        <div class="flex items-center gap-4">
            <div class="hidden md:block text-right">
                <p class="text-xs text-white/80">{{ auth()->user()->email }}</p>
                <p class="text-xs text-white/60">{{ ucfirst(auth()->user()->role) }}</p>
            </div>
            
            <form action="{{ route('logout') }}" method="POST" class="hidden md:block">
                @csrf
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg text-sm font-medium transition shadow-md text-white">
                    Logout
                </button>
            </form>

            {{-- Mobile Menu Button --}}
            <button id="mobile-menu-button" class="md:hidden focus:outline-none p-2 hover:bg-white/10 rounded-lg transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu for Regular Users - Vibrant Dark Blue to Black Gradient -->
<div id="menu-links" class="md:hidden bg-gradient-primary text-white shadow-lg hidden">
    <nav class="flex flex-col py-2">
        <a href="{{ route('dashboard') }}" 
           class="px-6 py-3 hover:bg-white/10 transition
           @if(request()->routeIs('dashboard')) bg-white/20 @endif">
            Dashboard
        </a>
        <a href="{{ route('submit.paper') }}" 
           class="px-6 py-3 hover:bg-white/10 transition
           @if(request()->routeIs('submit.paper')) bg-white/20 @endif">
            Submit Research
        </a>
        <a href="{{ route('my.submissions') }}" 
           class="px-6 py-3 hover:bg-white/10 transition
           @if(request()->routeIs('my.submissions')) bg-white/20 @endif">
            My Submissions
        </a>
        <a href="{{ route('profile') }}" 
           class="px-6 py-3 hover:bg-white/10 transition
           @if(request()->routeIs('profile')) bg-white/20 @endif">
            Profile
        </a>
        <a href="{{ route('help.guides') }}" 
           class="px-6 py-3 hover:bg-white/10 transition
           @if(request()->routeIs('help.guides')) bg-white/20 @endif">
            Help & Guides
        </a>
        <div class="px-6 py-3 border-t border-white/20 mt-2">
            <div class="mb-3 text-sm text-white/80">
                {{ auth()->user()->email }}
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow-md">
                    Logout
                </button>
            </form>
        </div>
    </nav>
</div>

<!-- Spacer for fixed navbar -->
<div class="h-16"></div>
@endif

{{-- Main Content - Adjust for admin sidebar --}}
@if($user && $user->role === 'admin')
    <main class="flex-1 ml-0 md:ml-64 p-6 md:p-8 bg-gray-50 min-h-screen">
        @yield('content')
    </main>
@else
    <main class="flex-1 p-6 md:p-8 bg-gray-50">
        @yield('content')
    </main>
@endif

{{-- Mobile Menu Script --}}
<script>
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('menu-links');
    if(btn){
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    }
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        if (menu && !menu.classList.contains('hidden')) {
            if (!btn.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
            }
        }
    });
</script>

</body>
</html>