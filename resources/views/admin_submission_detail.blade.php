@extends('layouts.app')

@section('title', 'Research Submission Detail')

@section('content')
<div class="max-w-7xl mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6 text-center">Research Submission Detail</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(isset($research))
        {{-- Download Word Template Button --}}
        <div class="mb-6 text-center">
            <a href="{{ route('admin.research.download', $research->id) }}"
               class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Download as Word
            </a>
        </div>

        {{-- Render the research template Blade --}}
        @include('templates.research_template', ['research' => $research])
    @else
        <p class="text-gray-500 text-center mt-6">Research not found.</p>
    @endif
</div>
@endsection