<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - e-PRISM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex min-h-screen">

@php
    $user = auth()->user();
@endphp

{{-- Sidebar for Admin --}}
@if($user && $user->role === 'admin')
<aside class="hidden md:flex md:flex-col w-64 bg-white border-r border-gray-200 p-6">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-indigo-600">Admin Panel</h2>
    </div>

    <nav class="flex flex-col space-y-2 text-sm">
        <a href="{{ route('admin.dashboard') }}"
           class="px-4 py-2 rounded hover:bg-indigo-100
           @if(request()->routeIs('admin.dashboard')) bg-indigo-50 font-semibold @endif">
            Dashboard
        </a>

        <a href="{{ route('admin.submissions.list') }}"
           class="px-4 py-2 rounded hover:bg-indigo-100
           @if(request()->routeIs('admin.submissions.list')) bg-indigo-50 font-semibold @endif">
            Submitted Researches
        </a>

        <a href="{{ route('profile') }}"
           class="px-4 py-2 rounded hover:bg-indigo-100">
            Profile
        </a>

        <form action="{{ route('logout') }}" method="POST" class="pt-4">
            @csrf
            <button type="submit"
                    class="w-full text-left px-4 py-2 rounded text-red-600 hover:bg-red-100">
                Logout
            </button>
        </form>
    </nav>
</aside>
@endif

{{-- Main Content Wrapper --}}
<div class="flex-1 flex flex-col">

    {{-- Top Navbar (non-admin only) --}}
    @if(!$user || $user->role !== 'admin')
        <nav class="bg-indigo-600 p-4 text-white flex justify-between items-center">
            <span class="font-bold text-xl">e-PRISM</span>
        </nav>
    @endif

    {{-- ✅ MAIN CONTENT (NO ml-64 HERE) --}}
    <main class="flex-1 p-10">
        @yield('content')
    </main>

</div>

    <!-- Mobile Menu Script -->
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