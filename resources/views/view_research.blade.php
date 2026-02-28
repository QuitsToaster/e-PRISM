@extends('layouts.app')

@section('title', 'View Research')

@section('content')
<div class="max-w-7xl mx-auto mt-10">

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(isset($research))

        {{-- Download Word Button (optional) --}}
        @if(auth()->user()->role === 'Admin' || auth()->user()->role === 'Research Manager')
            <div class="mb-6 text-center">
                <a href="{{ route('admin.research.download', $research->id) }}"
                   class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Download as Word
                </a>
            </div>
        @endif

        {{-- Render all research details using the shared template --}}
        @include('templates.research_template', ['research' => $research])

    @else
        <p class="text-gray-500 text-center mt-6">Research not found.</p>
    @endif

    {{-- Back Button --}}
    <div class="text-center mt-6">
        <a href="{{ route('my.submissions') }}"
           class="inline-block text-sm text-gray-600 hover:underline">
            ← Back to My Submissions
        </a>
    </div>
</div>
@endsection