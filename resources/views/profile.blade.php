@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="max-w-3xl mx-auto mt-10">

    <!-- Page Header -->
    <div class="bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg p-8 shadow-lg mb-10">
        <h1 class="text-3xl md:text-4xl font-extrabold mb-2">My Profile</h1>
        <p class="text-lg md:text-xl text-yellow-100">
            Update your personal information, email, and password.
        </p>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
    </div>
@endif

    <!-- Profile Form -->
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-2">Full Name</label>
                <input type="text" name="name" id="name" value="{{ auth()->user()->name }}"
                       class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                <input type="email" name="email" id="email" value="{{ auth()->user()->email }}"
                       class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-gray-700 font-semibold mb-2">New Password</label>
                <input type="password" name="password" id="password" placeholder="Enter new password (leave blank to keep current)"
                       class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
            </div>

            <!-- Password Confirmation -->
            <div>
                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm new password"
                       class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
            </div>

            <!-- Buttons -->
            <div class="flex space-x-4">
                <button type="submit" class="bg-yellow-500 text-white px-6 py-3 rounded-lg hover:bg-yellow-600 transition font-semibold">
                    Update Profile
                </button>
                <a href="{{ route('dashboard') }}" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition font-semibold">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</div>
@endsection