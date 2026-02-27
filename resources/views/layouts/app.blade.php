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
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-indigo-600">Admin Panel</h2>
        </div>
        <nav class="flex flex-col space-y-3">
            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}"
               class="hover:bg-indigo-100 rounded px-3 py-2 
               @if(request()->routeIs('admin.dashboard')) bg-indigo-50 font-semibold @endif">
                Dashboard
            </a>

            {{-- Submitted Researches --}}
            <a href="{{ route('admin.submissions.list') }}"
               class="hover:bg-indigo-100 rounded px-3 py-2 
               @if(request()->routeIs('admin.submissions.list')) bg-indigo-50 font-semibold @endif">
                Submitted Researches
            </a>

            {{-- Profile --}}
            <a href="{{ route('profile') }}" class="hover:bg-indigo-100 rounded px-3 py-2">
                Profile
            </a>

            {{-- Logout --}}
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="hover:bg-red-100 rounded px-3 py-2 w-full text-left text-red-600">
                    Logout
                </button>
            </form>
        </nav>
    </aside>
@endif

    <div class="flex-1 flex flex-col">
        {{-- Top Navbar for non-admin users only --}}
        @if(!$user || $user->role !== 'admin')
            <nav class="bg-indigo-600 p-4 text-white flex flex-col md:flex-row items-center justify-between">
                <div class="flex items-center justify-between w-full md:w-auto">
                    <span class="font-bold text-xl">e-PRISM</span>
                    <button class="md:hidden text-white focus:outline-none" id="mobile-menu-button">
                        &#9776; <!-- hamburger icon -->
                    </button>
                </div>

                <!-- Menu Links -->
                <ul class="hidden md:flex space-x-6 mt-4 md:mt-0" id="menu-links">
                    <li>
                        <a href="{{ route('dashboard') }}" class="hover:underline @if(request()->routeIs('dashboard')) underline @endif">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('submit.paper') ?? '#' }}" class="hover:underline">Submit Paper</a>
                    </li>
                    <li>
                        <a href="{{ route('my.submissions') ?? '#' }}" class="hover:underline">My Submissions</a>
                    </li>
                    <li>
                        <a href="{{ route('profile') }}" class="hover:underline">Profile</a>
                    </li>
                    <li>
                        <a href="{{ route('help.guides') }}" class="hover:underline">Help</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="hover:underline">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        @endif

        <!-- Main Content -->
        <main class="p-8 @if($user && $user->role === 'admin') md:ml-64 @endif">
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