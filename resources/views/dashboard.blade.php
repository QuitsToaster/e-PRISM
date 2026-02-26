@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">
    <h1 class="text-3xl font-bold mb-4 text-indigo-600">Welcome, {{ auth()->user()->name }}!</h1>
    <p class="mb-6 text-gray-700">
        This is your e-PRISM dashboard. You can submit your research papers section by section, track status, and view feedback from the admin.
    </p>

    <div class="grid md:grid-cols-2 gap-6">
        <!-- Card 1: Submit Section -->
        <a href="{{ route('submit.paper') ?? '#' }}" class="block p-6 bg-indigo-50 border-l-4 border-indigo-600 rounded hover:shadow-md transition">
            <h2 class="font-bold text-xl mb-2">Submit Research Section</h2>
            <p class="text-gray-600 text-sm">
                Submit your research paper section by section. Start with Chapter 1 → Part 1: Introduction.
            </p>
        </a>

        <!-- Card 2: View My Submissions -->
        <a href="{{ route('my.submissions') ?? '#' }}" class="block p-6 bg-green-50 border-l-4 border-green-600 rounded hover:shadow-md transition">
            <h2 class="font-bold text-xl mb-2">My Submissions</h2>
            <p class="text-gray-600 text-sm">
                Track your submitted sections, see approval status, and view feedback from the admin.
            </p>
        </a>

        <!-- Card 3: Profile -->
        <a href="#" class="block p-6 bg-yellow-50 border-l-4 border-yellow-500 rounded hover:shadow-md transition">
            <h2 class="font-bold text-xl mb-2">Profile</h2>
            <p class="text-gray-600 text-sm">
                Update your profile information, email, and password.
            </p>
        </a>

        <!-- Card 4: Help / Guides -->
        <a href="#" class="block p-6 bg-purple-50 border-l-4 border-purple-600 rounded hover:shadow-md transition">
            <h2 class="font-bold text-xl mb-2">Help & Guides</h2>
            <p class="text-gray-600 text-sm">
                Learn how to submit your research paper, check requirements, and read submission guides.
            </p>
        </a>
    </div>
</div>
@endsection