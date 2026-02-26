<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - e-PRISM</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Top Navbar -->
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

    <!-- Main Content -->
    <main class="p-8">
        @yield('content')
    </main>

    <!-- Mobile Menu Script -->
    <script>
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('menu-links');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

</body>
</html>