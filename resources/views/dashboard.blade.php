@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-6xl mx-auto mt-10">

    <!-- Welcome Header -->
    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-lg p-8 shadow-lg mb-10">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-2">Welcome, {{ auth()->user()->name }}!</h1>
        <p class="text-lg md:text-xl text-indigo-100">
            This is your e-PRISM dashboard. Start submitting your research papers section by section, track progress, and receive feedback from the admin.
        </p>
    </div>

    <!-- Dashboard Cards -->
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1: Submit Section -->
        <a href="{{ route('submit.paper') ?? '#' }}" class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 hover:scale-105 border-l-4 border-indigo-500">
            <div class="flex items-center mb-4">
                <div class="bg-indigo-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <h2 class="ml-4 font-bold text-lg md:text-xl">Submit Research Section</h2>
            </div>
            <p class="text-gray-600 text-sm md:text-base">
                Submit your research paper section by section. Start with Chapter 1 → Part 1: Introduction.
            </p>
        </a>

        <!-- Card 2: My Submissions -->
        <a href="{{ route('my.submissions') ?? '#' }}" class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 hover:scale-105 border-l-4 border-green-500">
            <div class="flex items-center mb-4">
                <div class="bg-green-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h2 class="ml-4 font-bold text-lg md:text-xl">My Submissions</h2>
            </div>
            <p class="text-gray-600 text-sm md:text-base">
                Track all your submitted sections, see approval status, and view feedback from the admin.
            </p>
        </a>

        <!-- Card 3: Profile -->
<a href="{{ route('profile') }}" class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 hover:scale-105 border-l-4 border-yellow-500">
    <div class="flex items-center mb-4">
        <div class="bg-yellow-100 p-3 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.913 0 5.63.835 7.879 2.804M12 15a5 5 0 100-10 5 5 0 000 10z" />
            </svg>
        </div>
        <h2 class="ml-4 font-bold text-lg md:text-xl">Profile</h2>
    </div>
    <p class="text-gray-600 text-sm md:text-base">
        Update your profile information, email, and password.
    </p>
</a>

        <!-- Card 4: Help & Guides -->
<a href="{{ route('help.guides') }}" class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 hover:scale-105 border-l-4 border-purple-500">
    <div class="flex items-center mb-4">
        <div class="bg-purple-100 p-3 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8s-9-3.582-9-8 4.03-8 9-8 9 3.582 9 8z" />
            </svg>
        </div>
        <h2 class="ml-4 font-bold text-lg md:text-xl">Help & Guides</h2>
    </div>
    <p class="text-gray-600 text-sm md:text-base">
        Learn how to submit your research paper, check requirements, and read submission guides.
    </p>
</a>
    </div>
</div>
@endsection