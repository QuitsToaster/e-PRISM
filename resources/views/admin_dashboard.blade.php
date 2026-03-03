@extends('layouts.app')

@section('title', 'Admin Dashboard')

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
    .hover-card-effect {
        transition: all 0.3s ease;
    }
    .hover-card-effect:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
    }
    .bg-gradient-header {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(26, 26, 26, 0.1) 100%);
    }
    .bg-gradient-overview {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.05) 0%, rgba(26, 26, 26, 0.05) 100%);
    }
    .border-gradient-overview {
        border: 2px solid transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%) border-box;
    }
    .border-gradient-card {
        border: 2px solid transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%) border-box;
    }
</style>

<!-- Header with colored horizontal area -->
<div class="bg-gradient-header rounded-xl p-6 mb-6 border border-gray-100">
    <div>
        <h1 class="text-2xl font-semibold text-gradient-primary">Dashboard</h1>
        <p class="text-sm text-gray-600 mt-1">Welcome to e-PRISM admin panel</p>
    </div>
</div>

{{-- Success Message --}}
@if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded-lg mb-6 text-sm">
        {{ session('success') }}
    </div>
@endif

{{-- Summary Cards with Hover Effects --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <!-- Card 1 - Researches -->
    <div class="bg-white rounded-xl p-5 hover-card-effect cursor-pointer border-gradient-card">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 bg-gradient-to-r from-[#2563eb]/20 to-[#1a1a1a]/20 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <span class="text-xs font-medium text-gradient-primary">RESEARCHES</span>
        </div>
        <p class="text-2xl font-semibold text-gray-800">{{ $researches->count() }}</p>
        <p class="text-xs text-gradient-primary mt-1">Total submitted</p>
    </div>

    <!-- Card 2 - Proponents -->
    <div class="bg-white rounded-xl p-5 hover-card-effect cursor-pointer border-gradient-card">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 bg-gradient-to-r from-[#2563eb]/20 to-[#1a1a1a]/20 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </div>
            <span class="text-xs font-medium text-gradient-primary">PROPONENTS</span>
        </div>
        <p class="text-2xl font-semibold text-gray-800">{{ $totalProponents ?? 0 }}</p>
        <p class="text-xs text-gradient-primary mt-1">Active users</p>
    </div>

    <!-- Card 3 - Attachments -->
    <div class="bg-white rounded-xl p-5 hover-card-effect cursor-pointer border-gradient-card">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 bg-gradient-to-r from-[#2563eb]/20 to-[#1a1a1a]/20 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                </svg>
            </div>
            <span class="text-xs font-medium text-gradient-primary">ATTACHMENTS</span>
        </div>
        <p class="text-2xl font-semibold text-gray-800">{{ $totalAttachments ?? 0 }}</p>
        <p class="text-xs text-gradient-primary mt-1">Files uploaded</p>
    </div>
</div>

{{-- Chart Section with colored background and gradient border --}}
<div class="bg-gradient-overview rounded-xl p-5 mb-6 border-gradient-overview">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-sm font-medium text-gray-700">
            <span class="bg-gradient-to-r from-[#2563eb] to-[#1a1a1a] bg-clip-text text-transparent font-semibold">Submissions Overview</span>
        </h2>
        <span class="text-xs text-gray-500">Last 30 days</span>
    </div>
    <div class="h-48 flex items-center justify-center bg-white/80 backdrop-blur-sm rounded-lg border border-gray-200">
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