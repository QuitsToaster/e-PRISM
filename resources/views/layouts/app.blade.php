<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - e-PRISM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Scrollbar styling for smoother UX */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-thumb {
            background-color: rgba(0, 51, 160, 0.5); /* DEPED Blue */
            border-radius: 4px;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans flex min-h-screen">

@php
    $user = auth()->user();
@endphp

{{-- Sidebar for Admin --}}
@if($user && $user->role === 'admin')
<aside class="hidden md:flex md:flex-col w-64 bg-white border-r border-gray-200 p-6 shadow">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-blue-800">e-PRISM Admin</h2>
    </div>

    <nav class="flex flex-col space-y-2 text-sm">
        <a href="{{ route('admin.dashboard') }}" 
           class="px-4 py-2 rounded hover:bg-blue-50 transition
           @if(request()->routeIs('admin.dashboard')) bg-blue-100 font-semibold @endif">
            Dashboard
        </a>

        <a href="{{ route('admin.submissions.list') }}" 
           class="px-4 py-2 rounded hover:bg-blue-50 transition
           @if(request()->routeIs('admin.submissions.list')) bg-blue-100 font-semibold @endif">
            Submitted Researches
        </a>

        <a href="{{ route('profile') }}" class="px-4 py-2 rounded hover:bg-blue-50 transition">
            Profile
        </a>

        <form action="{{ route('logout') }}" method="POST" class="pt-4">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 rounded text-red-600 hover:bg-red-50 transition">
                Logout
            </button>
        </form>
    </nav>
</aside>
@endif

{{-- Mobile Top Navbar --}}
<nav class="md:hidden bg-blue-700 px-6 py-4 flex justify-between items-center text-white shadow">
    <span class="font-bold text-xl tracking-wide">e-PRISM</span>

    <button id="mobile-menu-button" class="focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
</nav>

{{-- Mobile Menu --}}
@if($user && $user->role === 'admin')
<div id="menu-links" class="md:hidden bg-white border-b border-gray-200 shadow hidden">
    <nav class="flex flex-col text-sm">
        <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 hover:bg-blue-50 transition">Dashboard</a>
        <a href="{{ route('admin.submissions.list') }}" class="px-4 py-2 hover:bg-blue-50 transition">Submitted Researches</a>
        <a href="{{ route('profile') }}" class="px-4 py-2 hover:bg-blue-50 transition">Profile</a>
        <form action="{{ route('logout') }}" method="POST" class="px-4 py-2">
            @csrf
            <button type="submit" class="text-red-600 hover:bg-red-50 transition w-full text-left rounded">Logout</button>
        </form>
    </nav>
</div>
@endif

{{-- Main Content --}}
<div class="flex-1 flex flex-col">

    {{-- Top Navbar for non-admin users --}}
    @if(!$user || $user->role !== 'admin')
    <nav class="bg-blue-700 px-6 py-4 text-white flex justify-between items-center shadow">
        <span class="font-bold text-xl tracking-wide">e-PRISM</span>

        @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="bg-white/10 hover:bg-red-500 hover:text-white 
                           px-4 py-2 rounded text-sm font-medium transition duration-200">
                Logout
            </button>
        </form>
        @endauth
    </nav>
    @endif

    {{-- Page Content --}}
    <main class="flex-1 p-6 md:p-10 bg-gray-50 overflow-auto">
        @yield('content')
    </main>
</div>

{{-- Mobile Menu Script --}}
<script>
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('menu-links');
    if(btn){
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    }
</script>

</body>
</html>