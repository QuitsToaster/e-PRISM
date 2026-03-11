@extends('layouts.app')

@section('title', 'Add User')

@section('content')
<div class="p-6 bg-white rounded-xl shadow-lg max-w-7xl mx-auto px-4 pt-5">
    <h2 class="text-2xl font-bold text-gradient-primary mb-4">Create New User</h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 rounded-lg text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.store.user') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}" 
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2563eb]" required>
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" 
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2563eb]" required>
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" 
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2563eb]" required>
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation" 
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2563eb]" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
            <select name="role" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-[#2563eb]" required>
                <option value="">Select Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role }}" @if(old('role')==$role) selected @endif>{{ ucfirst($role) }}</option>
                @endforeach
            </select>
            @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" 
                class="w-full bg-gradient-primary text-white py-2 rounded-lg hover:opacity-90 transition font-medium shadow-md">
            Create User
        </button>
    </form>
</div>
@endsection