@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #ef4444 0%, #3b82f6 100%);
    }
    .text-gradient-primary {
        background: linear-gradient(135deg, #ef4444 0%, #3b82f6 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .bg-gradient-header {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(59, 130, 246, 0.1) 100%);
    }
    .border-gradient-card {
        border: 2px solid transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #ef4444 0%, #3b82f6 100%) border-box;
    }
</style>

<div class="max-w-7xl mx-auto mt-8 px-4">
    <!-- Welcome Header - Gradient area matching admin side -->
    <div class="bg-gradient-header rounded-xl p-6 mb-8 border border-gray-100">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-primary rounded-xl flex items-center justify-center shadow-md">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-semibold text-gradient-primary">Welcome, {{ auth()->user()->name }}!</h1>
                <p class="text-sm text-gray-600 mt-1">
                    This is your e-PRISM dashboard. Submit your research papers section by section, track progress, and receive feedback from the admin.
                </p>
            </div>
        </div>
    </div>

    <!-- Header with gradient bar -->
    <div class="mb-6">
        <div class="flex items-center gap-2 mb-1">
            <div class="bg-gradient-primary rounded-full"></div>
            <h2 class="text-xl font-semibold text-gray-800">Quick Actions</h2>
        </div>
        <p class="text-sm text-gray-500 ml-3">Manage your research submissions</p>
    </div>

    <!-- Dashboard Cards -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">

        <!-- Card 1: Submit Research Section - Red Theme -->
        <a href="{{ route('submit.paper') ?? '#' }}" 
           class="bg-red-50 rounded-xl border border-red-200 p-6 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-red-200 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg text-gray-800">Submit Section</h3>
            </div>
            <p class="text-sm text-gray-600 mb-3">
                Submit your research paper section by section. Start with Chapter 1 → Part 1: Introduction.
            </p>
            <span class="inline-flex items-center text-xs text-red-600 font-medium">
                Start now
                <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </span>
        </a>

        <!-- Card 2: My Submissions - Blue Theme -->
        <a href="{{ route('my.submissions') ?? '#' }}" 
           class="bg-blue-50 rounded-xl border border-blue-200 p-6 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-blue-200 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg text-gray-800">My Submissions</h3>
            </div>
            <p class="text-sm text-gray-600 mb-3">
                Track all your submitted sections, see approval status, and view feedback from the admin.
            </p>
            <span class="inline-flex items-center text-xs text-blue-600 font-medium">
                View status
                <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </span>
        </a>

        <!-- Card 3: Profile - Purple Theme (Red+Blue mix) -->
        <a href="{{ route('profile') }}" 
           class="bg-purple-50 rounded-xl border border-purple-200 p-6 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-purple-200 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.913 0 5.63.835 7.879 2.804M12 15a5 5 0 100-10 5 5 0 000 10z" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg text-gray-800">Profile</h3>
            </div>
            <p class="text-sm text-gray-600 mb-3">
                Update your profile information, email, and password.
            </p>
            <span class="inline-flex items-center text-xs text-purple-600 font-medium">
                Update info
                <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </span>
        </a>

        <!-- Card 4: Help & Guides - Green Theme -->
        <a href="{{ route('help.guides') }}" 
           class="bg-green-50 rounded-xl border border-green-200 p-6 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 bg-green-200 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8s-9-3.582-9-8 4.03-8 9-8 9 3.582 9 8z" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg text-gray-800">Help & Guides</h3>
            </div>
            <p class="text-sm text-gray-600 mb-3">
                Learn how to submit your research paper, check requirements, and read submission guides.
            </p>
            <span class="inline-flex items-center text-xs text-green-600 font-medium">
                Learn more
                <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </span>
        </a>

    </div>

    <!-- Recent Activity Section with Gradient Border -->
    <div class="border-gradient-card rounded-xl bg-white p-6 shadow-sm mt-6">
        <div class="flex items-center gap-0 mb-4">
            <div class="bg-gradient-primary rounded-full"></div>
            <h3 class="font-semibold text-gray-700">Recent Activity</h3>
        </div>
        <div class="space-y-3">
            <div class="flex items-center gap-3 text-sm text-gray-600">
                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                <span>No recent submissions</span>
            </div>
        </div>
    </div>
</div>
@endsection