@extends('layouts.app')

@section('title', 'My Submissions')

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

<div class="max-w-4xl mx-auto mt-8 px-4">
    {{-- Header with gradient bar --}}
    <div class="mb-6 flex items-center justify-between">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <div class="w-1.5 h-7 bg-gradient-primary rounded-full"></div>
                <h1 class="text-2xl font-semibold text-gray-800">My Submissions</h1>
            </div>
            <p class="text-sm text-gray-500 ml-3">Manage your research drafts and submitted papers</p>
        </div>
        <div class="w-9 h-9 bg-gradient-primary rounded-lg flex items-center justify-center shadow-sm">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
        </div>
    </div>

    {{-- ===================== DRAFTS ===================== --}}
    <div class="mb-8">
        <div class="flex items-center gap-2 mb-4">
            <div class="w-1.5 h-6 bg-gradient-primary rounded-full"></div>
            <h2 class="text-lg font-semibold text-gray-700">Drafts</h2>
        </div>

        @php $drafts = $researches->where('status', 'draft'); @endphp

        @forelse($drafts as $draft)
            <div class="bg-orange-50 rounded-xl border border-orange-200 p-5 mb-3 shadow-sm hover:shadow-md transition">
                <div class="flex justify-between items-center">
                    {{-- Left --}}
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                            <h3 class="font-medium text-gray-800">{{ $draft->title }}</h3>
                        </div>
                        <p class="text-xs text-orange-600 ml-4">
                            {{ ucfirst($draft->research_type) }} · {{ ucfirst($draft->classification) }} ·
                            Last updated {{ $draft->updated_at->format('M d, Y') }}
                        </p>
                    </div>

                    {{-- Right --}}
                    <div class="flex items-center gap-3 text-sm ml-4">
                        <a href="{{ route('submit.paper', ['id' => $draft->id]) }}"
                           class="inline-flex items-center gap-1 text-orange-600 hover:text-orange-700 font-medium">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </a>

                        <form method="POST" action="{{ route('research.delete', $draft->id) }}">
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
        @empty
            <div class="bg-gray-50 rounded-xl border border-gray-200 p-8 text-center">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <p class="text-sm text-gray-400">No drafts available.</p>
            </div>
        @endforelse
    </div>

    {{-- ===================== SUBMITTED ===================== --}}
    <div>
        <div class="flex items-center gap-2 mb-4">
            <div class="w-1.5 h-6 bg-gradient-primary rounded-full"></div>
            <h2 class="text-lg font-semibold text-gray-700">Submitted</h2>
        </div>

        @php $submitted = $researches->where('status', 'submitted'); @endphp

        @forelse($submitted as $s)
            <div class="bg-green-50 rounded-xl border border-green-200 p-5 mb-3 shadow-sm hover:shadow-md transition">
                <div class="flex justify-between items-center">
                    {{-- Left --}}
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                            <h3 class="font-medium text-gray-800">{{ $s->title }}</h3>
                        </div>
                        <p class="text-xs text-green-600 ml-4">
                            {{ ucfirst($s->research_type) }} · {{ ucfirst($s->classification) }} ·
                            Submitted {{ $s->created_at->format('M d, Y') }}
                        </p>
                    </div>

                    {{-- Right --}}
                    <a href="{{ route('research.show', $s->id) }}"
                       class="inline-flex items-center gap-1 text-green-600 hover:text-green-700 font-medium text-sm ml-4">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        View
                    </a>
                </div>
            </div>
        @empty
            <div class="bg-gray-50 rounded-xl border border-gray-200 p-8 text-center">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <p class="text-sm text-gray-400">No submissions yet.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection