@extends('layouts.app')

@section('title', 'Admin Dashboard')

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

<!-- Header -->
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gradient-primary">Dashboard</h1>
    <p class="text-sm text-gray-500">Welcome to e-PRISM admin panel</p>
</div>

{{-- Success Message --}}
@if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded-lg mb-6 text-sm">
        {{ session('success') }}
    </div>
@endif

{{-- Summary Cards --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <!-- Card 1 -->
    <div class="bg-red-50 rounded-xl border border-red-200 p-5">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 bg-red-200 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <span class="text-xs font-medium text-red-600">RESEARCHES</span>
        </div>
        <p class="text-2xl font-semibold text-gray-800">{{ $researches->count() }}</p>
        <p class="text-xs text-red-500 mt-1">Total submitted</p>
    </div>

    <!-- Card 2 -->
    <div class="bg-blue-50 rounded-xl border border-blue-200 p-5">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 bg-blue-200 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
            <span class="text-xs font-medium text-blue-600">PROPONENTS</span>
        </div>
        <p class="text-2xl font-semibold text-gray-800">{{ $totalProponents ?? 0 }}</p>
        <p class="text-xs text-blue-500 mt-1">Active users</p>
    </div>

    <!-- Card 3 -->
    <div class="bg-purple-50 rounded-xl border border-purple-200 p-5">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 bg-purple-200 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                </svg>
            </div>
            <span class="text-xs font-medium text-purple-600">ATTACHMENTS</span>
        </div>
        <p class="text-2xl font-semibold text-gray-800">{{ $totalAttachments ?? 0 }}</p>
        <p class="text-xs text-purple-500 mt-1">Files uploaded</p>
    </div>
</div>

{{-- Chart Section --}}
<div class="bg-white rounded-xl border border-gray-200 p-5 mb-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-sm font-medium text-gray-700">Submissions Overview</h2>
        <span class="text-xs text-gray-400">Last 30 days</span>
    </div>
    <div class="h-48 flex items-center justify-center bg-gradient-to-r from-red-50 to-blue-50 rounded-lg border border-dashed border-gray-200">
        <p class="text-sm text-gray-400">Chart area</p>
    </div>
</div>

{{-- View Button --}}
<div class="text-center">
    <a href="{{ route('admin.submissions.list') }}" class="inline-flex items-center gap-2 bg-gradient-primary text-white px-6 py-3 rounded-lg text-sm font-medium shadow-sm hover:opacity-90 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
        View Submissions
    </a>
</div>
@endsection