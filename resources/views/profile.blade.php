@extends('layouts.app')

@section('title', 'Profile')

@section('content')
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
    .border-gradient-card {
        border: 2px solid transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%) border-box;
    }
    .hover-card-effect {
        transition: all 0.3s ease;
    }
    .hover-card-effect:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
    }
    .bg-gradient-header {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(26, 26, 26, 0.1) 100%);
    }
    .border-gradient-separator {
        border: 0;
        height: 1px;
        background: linear-gradient(90deg, #2563eb 0%, #1a1a1a 100%);
    }
</style>

<!-- Add top padding to account for fixed navbar -->
<div class="pt-15 max-w-3xl mx-auto px-4">
    <!-- Header with colored horizontal area matching dashboard pattern -->
    <div class="bg-gradient-header rounded-xl p-6 mb-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <div class="bg-gradient-primary rounded-full"></div>
                    <h1 class="text-2xl font-semibold text-gradient-primary">My Profile</h1>
                </div>
                <p class="text-sm text-gray-600 ml-3">Update your personal information, email, and password</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="text-xs text-gray-500">Account</p>
                    <p class="text-xs font-medium text-gradient-primary">{{ auth()->user()->email }}</p>
                </div>
                <div class="w-9 h-9 bg-gradient-primary rounded-lg flex items-center justify-center shadow-sm">
                    <span class="text-white text-sm font-semibold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Success Alert matching dashboard --}}
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-600 px-5 py-3.5 rounded-xl mb-6 text-sm flex items-center gap-2">
        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        {{ session('success') }}
    </div>
    @endif

    <!-- Profile Form - Single Card with Gradient Border and Hover Effect -->
    <div class="border-gradient-card rounded-xl bg-white p-6 shadow-sm hover-card-effect">
        <form id="profile-form" action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Personal Information Section -->
            <div class="mb-6 pb-6 relative">
                <div class="absolute bottom-0 left-0 right-0 h-px border-gradient-separator"></div>
                <h2 class="text-sm font-semibold text-[#2563eb] mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Personal Information
                </h2>
                <div class="space-y-4">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ auth()->user()->name }}"
                               class="w-full border border-gray-300 bg-white p-3 rounded-lg focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition">
                    </div>
                </div>
            </div>

            <!-- Contact Information Section -->
            <div class="mb-6 pb-6 relative">
                <div class="absolute bottom-0 left-0 right-0 h-px border-gradient-separator"></div>
                <h2 class="text-sm font-semibold text-[#1a1a1a] mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Contact Information
                </h2>
                <div class="space-y-4">
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ auth()->user()->email }}"
                               class="w-full border border-gray-300 bg-white p-3 rounded-lg focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition">
                    </div>
                </div>
            </div>

            <!-- Security Section -->
            <div class="mb-6">
                <h2 class="text-sm font-semibold text-gradient-primary mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    Security
                </h2>
                <div class="space-y-4">
                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter new password (leave blank to keep current)"
                               class="w-full border border-gray-300 bg-white p-3 rounded-lg focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition">
                        <p class="text-xs text-gray-400 mt-1">Minimum 8 characters</p>
                    </div>

                    <!-- Password Confirmation -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm new password"
                               class="w-full border border-gray-300 bg-white p-3 rounded-lg focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition">
                    </div>
                </div>
            </div>

            <!-- Action Buttons - INSIDE the form (only once) -->
            <div class="flex items-center gap-4 pt-4 mt-2 border-t border-gray-200">
                <button type="submit" class="bg-gradient-primary text-white px-6 py-3 rounded-lg hover:opacity-90 transition font-medium shadow-sm">
                    Update Profile
                </button>
                <a href="{{ route('dashboard') }}" class="px-6 py-3 border-2 border-[#2563eb] text-[#2563eb] rounded-lg hover:bg-[#2563eb] hover:text-white transition font-medium">
                    Cancel
                </a>
            </div>
        </form>
    </div>

    <!-- Member since footer matching dashboard style -->
    <div class="mt-6 text-center text-xs text-gray-400">
        Member since: {{ auth()->user()->created_at->format('F j, Y') }}
    </div>
</div>
@endsection