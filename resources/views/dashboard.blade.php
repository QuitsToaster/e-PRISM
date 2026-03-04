@extends('layouts.app')

@section('title', 'Dashboard')

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
    .border-gradient-stat {
        border: 1px solid transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%) border-box;
    }
    .border-gradient-button {
        border: 2px solid transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%) border-box;
    }
    /* Scrollable activity list */
    .activity-scroll {
        max-height: 300px;
        overflow-y: auto;
        padding-right: 4px;
    }
    .activity-scroll::-webkit-scrollbar {
        width: 6px;
    }
    .activity-scroll::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    .activity-scroll::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #2563eb, #1a1a1a);
        border-radius: 10px;
    }
    .activity-scroll::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #3b82f6, #2d2d2d);
    }
</style>

<!-- Add proper top padding to account for fixed navbar (increased from pt-4 to pt-24) -->
<div class="max-w-7xl mx-auto px-4 pt-20">
    <!-- Header with colored horizontal area - matching admin -->
    <div class="bg-gradient-header rounded-xl p-6 mb-6 border border-gray-100">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-gradient-primary rounded-xl flex items-center justify-center shadow-md flex-shrink-0">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-semibold text-gradient-primary">Welcome, {{ auth()->user()->name }}!</h1>
                <p class="text-sm text-gray-600 mt-1">Submit your research papers section by section, track progress, and receive feedback</p>
            </div>
        </div>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded-lg mb-6 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Quick Stats Section with gradient background - matching admin style --}}
    <div class="bg-gradient-overview rounded-xl p-5 mb-6 border-gradient-overview">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-sm font-medium text-gray-700">
                <span class="bg-gradient-to-r from-[#2563eb] to-[#1a1a1a] bg-clip-text text-transparent font-semibold">Your Submission Stats</span>
            </h2>
            <span class="text-xs text-gray-500">Current progress</span>
        </div>
        
       <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">

    {{-- TOTAL SUBMISSIONS --}}
    <a href="{{ route('my.submissions') }}"
       class="bg-white/80 backdrop-blur-sm rounded-lg p-4 border-gradient-stat hover-card-effect block">

        <div class="text-xs text-gray-500 mb-1">Total Submissions</div>
        <div class="text-2xl font-semibold text-gray-800">{{ $totalSubmissions }}</div>
        <div class="text-xs text-gradient-primary mt-1">View submitted papers</div>
    </a>


    {{-- TOTAL DRAFTS --}}
    <a href="{{ route('my.submissions') }}"
       class="bg-white/80 backdrop-blur-sm rounded-lg p-4 border-gradient-stat hover-card-effect block">

        <div class="text-xs text-gray-500 mb-1">Total Drafts</div>
        <div class="text-2xl font-semibold text-gray-800">{{ $totalDrafts }}</div>
        <div class="text-xs text-[#2563eb] mt-1">View saved drafts</div>
    </a>


    {{-- APPROVED --}}
    <a href="{{ route('my.submissions') }}"
       class="bg-white/80 backdrop-blur-sm rounded-lg p-4 border-gradient-stat hover-card-effect block">

        <div class="text-xs text-gray-500 mb-1">Approved Sections</div>
        <div class="text-2xl font-semibold text-gray-800">{{ $approvedSections }}</div>
        <div class="text-xs text-green-500 mt-1">Approved by admin</div>
    </a>


    {{-- PENDING --}}
    <a href="{{ route('my.submissions') }}"
       class="bg-white/80 backdrop-blur-sm rounded-lg p-4 border-gradient-stat hover-card-effect block">

        <div class="text-xs text-gray-500 mb-1">Pending Review</div>
        <div class="text-2xl font-semibold text-gray-800">{{ $pendingReviews }}</div>
        <div class="text-xs text-yellow-500 mt-1">Waiting for admin</div>
    </a>


    {{-- RETURNED --}}
    <a href="{{ route('my.submissions') }}"
       class="bg-white/80 backdrop-blur-sm rounded-lg p-4 border-gradient-stat hover-card-effect block">

        <div class="text-xs text-gray-500 mb-1">Returned Sections</div>
        <div class="text-2xl font-semibold text-gray-800">{{ $returnedSections }}</div>
        <div class="text-xs text-orange-500 mt-1">Needs revision</div>
    </a>

</div>
    </div>

    {{-- Recent Activity Section with gradient border and scrollbar --}}
    <div class="bg-white rounded-xl p-5 border-gradient-overview mb-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-sm font-medium text-gray-700">
                <span class="bg-gradient-to-r from-[#2563eb] to-[#1a1a1a] bg-clip-text text-transparent font-semibold">Recent Activity</span>
            </h2>
            <span class="text-xs text-gray-500">Last updates</span>
        </div>
        
        <div class="activity-scroll">
            @forelse($recentActivities ?? [] as $activity)
                <div class="flex items-center gap-3 text-sm text-gray-600 p-3 hover:bg-gray-50 rounded-lg transition mb-2 border-b border-gray-100 last:border-0">
                    @if($activity->type == 'submitted')
                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                    @elseif($activity->type == 'draft')
                        <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                    @elseif($activity->type == 'returned')
                        <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                    @elseif($activity->type == 'approved')
                        <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                    @else
                        <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
                    @endif
                    <span class="flex-1">{{ $activity->description }}</span>
                    <span class="text-xs text-gray-400">{{ $activity->created_at->diffForHumans() }}</span>
                </div>
            @empty
                <div class="flex items-center gap-3 text-sm text-gray-600 p-3 bg-gray-50 rounded-lg">
                    <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
                    <span>No recent activity yet</span>
                </div>
            @endforelse
        </div>
        
        {{-- View All Activities Button with Gradient Background --}}
        <div class="text-center mt-4 pt-2">
            <a href="{{ route('my.submissions') }}" 
            class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-medium rounded-lg text-white bg-gradient-primary hover:opacity-90 transition-all duration-200 shadow-sm">
                View All Activities
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection