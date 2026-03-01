@extends('layouts.app')

@section('title', 'Profile')

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
</style>

<div class="max-w-3xl mx-auto mt-10 px-4">
    <!-- Header matching dashboard pattern -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <div class="w-1.5 h-7 bg-gradient-primary rounded-full"></div>
                <h1 class="text-2xl font-semibold text-gray-800">My Profile</h1>
            </div>
            <p class="text-sm text-gray-500 ml-3">Update your personal information, email, and password</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="text-right">
                <p class="text-xs text-gray-400">Account</p>
                <p class="text-xs font-medium text-gradient-primary">{{ auth()->user()->email }}</p>
            </div>
            <div class="w-9 h-9 bg-gradient-primary rounded-lg flex items-center justify-center shadow-sm">
                <span class="text-white text-sm font-semibold">{{ substr(auth()->user()->name, 0, 1) }}</span>
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

    <!-- Profile Form - Colored Cards -->
    <div class="space-y-4">
        <!-- Personal Information Card - Red Theme -->
        <div class="bg-red-50 rounded-xl border border-red-200 p-6 shadow-sm">
            <h2 class="text-sm font-semibold text-red-800 mb-4 flex items-center gap-2">
                <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Personal Information
            </h2>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-red-700 mb-2">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ auth()->user()->name }}"
                               class="w-full border border-red-200 bg-white p-3 rounded-lg focus:border-red-500 focus:ring-2 focus:ring-red-200 transition">
                    </div>
                </div>
            </form>
        </div>

        <!-- Contact Information Card - Blue Theme -->
        <div class="bg-blue-50 rounded-xl border border-blue-200 p-6 shadow-sm">
            <h2 class="text-sm font-semibold text-blue-800 mb-4 flex items-center gap-2">
                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Contact Information
            </h2>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-blue-700 mb-2">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ auth()->user()->email }}"
                               class="w-full border border-blue-200 bg-white p-3 rounded-lg focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
                    </div>
                </div>
            </form>
        </div>

        <!-- Security Card - Purple Theme (Red+Blue mix) -->
        <div class="bg-purple-50 rounded-xl border border-purple-200 p-6 shadow-sm">
            <h2 class="text-sm font-semibold text-purple-800 mb-4 flex items-center gap-2">
                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
                Security
            </h2>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-purple-700 mb-2">New Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter new password (leave blank to keep current)"
                               class="w-full border border-purple-200 bg-white p-3 rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition">
                        <p class="text-xs text-purple-400 mt-1">Minimum 8 characters</p>
                    </div>

                    <!-- Password Confirmation -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-purple-700 mb-2">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm new password"
                               class="w-full border border-purple-200 bg-white p-3 rounded-lg focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition">
                    </div>
                </div>
            </form>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center gap-4 pt-2">
            <button type="submit" form="profile-form" class="bg-gradient-primary text-white px-6 py-3 rounded-lg hover:opacity-90 transition font-medium shadow-sm">
                Update Profile
            </button>
            <a href="{{ route('dashboard') }}" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium">
                Cancel
            </a>
        </div>
    </div>

    <!-- Member since footer matching dashboard style -->
    <div class="mt-6 text-center text-xs text-gray-400">
        Member since: {{ auth()->user()->created_at->format('F j, Y') }}
    </div>
</div>
@endsection