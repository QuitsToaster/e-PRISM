@extends('layouts.app')

@section('title', 'My Submissions')

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
    .bg-gradient-header {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(26, 26, 26, 0.1) 100%);
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
    /* Scrollable container styles */
    .scrollable-container {
        max-height: 400px;
        overflow-y: auto;
        padding-right: 4px;
    }
    .scrollable-container::-webkit-scrollbar {
        width: 6px;
    }
    .scrollable-container::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    .scrollable-container::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #2563eb, #1a1a1a);
        border-radius: 10px;
    }
    .scrollable-container::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #3b82f6, #2d2d2d);
    }
</style>

<!-- Add top padding to account for fixed navbar -->
<div class="max-w-7xl mx-auto px-4 pt-20">
    {{-- Header with colored horizontal area matching dashboard pattern --}}
    <div class="bg-gradient-header rounded-xl p-6 mb-8 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gradient-primary">My Submissions</h1>
                <p class="text-sm text-gray-600 mt-1">Manage your research drafts and submitted papers</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="text-xs text-gray-500">Total</p>
                    <p class="text-xs font-medium text-gradient-primary">{{ $researches->count() }} researches</p>
                </div>
                <div class="w-9 h-9 bg-gradient-primary rounded-lg flex items-center justify-center shadow-sm">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- ===================== DRAFTS ===================== --}}
    <div class="mb-8">
        <div class="flex items-center gap-2 mb-4">
            <svg class="w-5 h-5 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            <h2 class="text-lg font-semibold text-gradient-primary">Drafts</h2>
            @php $draftsCount = $researches->where('status', 'draft')->count(); @endphp
            @if($draftsCount > 5)
                <span class="text-xs text-gray-400 ml-2">({{ $draftsCount }} items - scroll to see more)</span>
            @endif
        </div>

        @php $drafts = $researches->where('status', 'draft'); @endphp

        @if($drafts->count() > 0)
            <div class="{{ $drafts->count() > 5 ? 'scrollable-container' : '' }} pr-1">
                @foreach($drafts as $draft)
                    <div class="border-gradient-card rounded-xl bg-white p-5 mb-3 shadow-sm hover-card-effect">
                        <div class="flex justify-between items-center">
                            {{-- Left --}}
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="w-2 h-2 bg-gradient-primary rounded-full"></span>
                                    <h3 class="font-medium text-gray-800">{{ $draft->title }}</h3>
                                </div>
                                <p class="text-xs text-gradient-primary ml-4">
                                    {{ ucfirst($draft->research_type) }} · {{ ucfirst($draft->classification) }} ·
                                    Last updated {{ $draft->updated_at->format('M d, Y') }}
                                </p>
                            </div>

                            {{-- Right --}}
                            <div class="flex items-center gap-3 text-sm ml-4">
                                <a href="{{ route('submit.paper', ['id' => $draft->id]) }}"
                                   class="inline-flex items-center gap-1 text-gradient-primary hover:opacity-80 font-medium">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </a>

                                <form method="POST" action="{{ route('research.delete', $draft->id) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center gap-1 text-red-500 hover:text-red-600 font-medium"
                                            onclick="return confirm('Delete this draft?')">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="border-gradient-card rounded-xl bg-white p-8 text-center">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                <p class="text-sm text-gray-400">No drafts available.</p>
            </div>
        @endif
    </div>

    {{-- ===================== SUBMITTED ===================== --}}
    <div>
        <div class="flex items-center gap-2 mb-4">
            <svg class="w-5 h-5 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h2 class="text-lg font-semibold text-gradient-primary">Submitted</h2>
            @php $submittedCount = $researches->where('status', 'submitted')->count(); @endphp
            @if($submittedCount > 5)
                <span class="text-xs text-gray-400 ml-2">({{ $submittedCount }} items - scroll to see more)</span>
            @endif
        </div>

        @php $submitted = $researches->where('status', 'submitted'); @endphp

        @if($submitted->count() > 0)
            <div class="{{ $submitted->count() > 5 ? 'scrollable-container' : '' }} pr-1">
                @foreach($submitted as $s)
                    <div class="border-gradient-card rounded-xl bg-white p-5 mb-3 shadow-sm hover-card-effect">
                        <div class="flex justify-between items-center">
                            {{-- Left --}}
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="w-2 h-2 bg-gradient-primary rounded-full"></span>
                                    <h3 class="font-medium text-gray-800">{{ $s->title }}</h3>
                                </div>
                                <p class="text-xs text-gradient-primary ml-4">
                                    {{ ucfirst($s->research_type) }} · {{ ucfirst($s->classification) }} ·
                                    Submitted {{ $s->created_at->format('M d, Y') }}
                                </p>
                            </div>

                            {{-- Right --}}
                            <a href="{{ route('research.show', $s->id) }}"
                               class="inline-flex items-center gap-1 text-gradient-primary hover:opacity-80 font-medium text-sm ml-4">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                View
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="border-gradient-card rounded-xl bg-white p-8 text-center">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="text-sm text-gray-400">No submissions yet.</p>
            </div>
        @endif
    </div>
</div>
@endsection