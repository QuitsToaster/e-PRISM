@extends('layouts.app')

@section('title', 'My Submissions')

@section('content')
<div class="max-w-4xl mx-auto">

    {{-- Page Header --}}
    <div class="mb-10">
        <h1 class="text-3xl font-semibold text-gray-800">My Submissions</h1>
        <p class="text-gray-500 mt-1">
            Manage your research drafts and submitted papers.
        </p>
    </div>

    {{-- ===================== DRAFTS ===================== --}}
    <div class="mb-12">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Drafts</h2>

        @php $drafts = $researches->where('status', 'draft'); @endphp

        @forelse($drafts as $draft)
            <div class="flex justify-between items-center py-4 border-b">

                {{-- Left --}}
                <div>
                    <h3 class="font-medium text-gray-800">
                        {{ $draft->title }}
                    </h3>
                    <p class="text-sm text-gray-500">
                        {{ ucfirst($draft->research_type) }} · {{ ucfirst($draft->classification) }} ·
                        Last updated {{ $draft->updated_at->format('M d, Y') }}
                    </p>
                </div>

                {{-- Right --}}
                <div class="flex items-center gap-4 text-sm">
                    <a href="{{ route('submit.paper', ['id' => $draft->id]) }}"
                       class="text-indigo-600 hover:underline">
                        Edit
                    </a>

                    <form method="POST" action="{{ route('research.delete', $draft->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-red-500 hover:underline"
                                onclick="return confirm('Delete this draft?')">
                            Delete
                        </button>
                    </form>
                </div>

            </div>
        @empty
            <p class="text-sm text-gray-400">No drafts available.</p>
        @endforelse
    </div>

    {{-- ===================== SUBMITTED ===================== --}}
    <div>
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Submitted</h2>

        @php $submitted = $researches->where('status', 'submitted'); @endphp

        @forelse($submitted as $s)
            <div class="flex justify-between items-center py-4 border-b">

                {{-- Left --}}
                <div>
                    <h3 class="font-medium text-gray-800">
                        {{ $s->title }}
                    </h3>
                    <p class="text-sm text-gray-500">
                        {{ ucfirst($s->research_type) }} · {{ ucfirst($s->classification) }} ·
                        Submitted {{ $s->created_at->format('M d, Y') }}
                    </p>
                </div>

                {{-- Right --}}
                <a href="{{ route('research.show', $s->id) }}"
                   class="text-sm text-gray-600 hover:text-indigo-600 hover:underline">
                    View
                </a>

            </div>
        @empty
            <p class="text-sm text-gray-400">No submissions yet.</p>
        @endforelse
    </div>

</div>
@endsection