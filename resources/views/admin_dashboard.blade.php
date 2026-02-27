@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-8 text-center">Admin Dashboard</h1>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    {{-- Summary Section --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white shadow rounded-lg p-6 text-center">
            <p class="text-gray-500">Total Submitted Researches</p>
            <p class="text-2xl font-bold">{{ $researches->count() }}</p>
        </div>
        <div class="bg-white shadow rounded-lg p-6 text-center">
            <p class="text-gray-500">Total Proponents</p>
            <p class="text-2xl font-bold">{{ $totalProponents ?? 0 }}</p>
        </div>
        <div class="bg-white shadow rounded-lg p-6 text-center">
            <p class="text-gray-500">Total Attachments</p>
            <p class="text-2xl font-bold">{{ $totalAttachments ?? 0 }}</p>
        </div>
    </div>

    {{-- Graphs / Charts Placeholder --}}
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        <h2 class="text-xl font-bold mb-4">Research Submissions Overview (Graph Placeholder)</h2>
        <div class="border border-dashed border-gray-300 rounded-lg h-64 flex items-center justify-center text-gray-400">
            Graphs & Statistics will be displayed here
        </div>
    </div>

    {{-- Button to View Submitted Papers --}}
    <div class="text-center">
        <a href="{{ route('admin.submissions.list') }}" class="bg-indigo-600 text-white px-6 py-3 rounded hover:bg-indigo-700">
            View Submitted Papers
        </a>
    </div>
</div>
@endsection