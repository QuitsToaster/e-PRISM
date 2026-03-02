@extends('layouts.app')

@section('title', 'Submitted Researches')

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
    .bg-gradient-header {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(59, 130, 246, 0.1) 100%);
    }
    .border-gradient-table {
        border: 2px solid transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #ef4444 0%, #3b82f6 100%) border-box;
    }
    .table-container {
        border-radius: 0.75rem;
        overflow: hidden;
    }
</style>

<div class="bg-gradient-header rounded-xl p-6 mb-6 border border-gray-100">
    <div class="flex items-center justify-between">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <div class="bg-gradient-primary rounded-full"></div>
                <h1 class="text-2xl font-semibold text-gradient-primary">Submitted Researches</h1>
            </div>
            <p class="text-sm text-gray-500 ml-3">
                Review all submitted research papers
            </p>
        </div>
        <div class="flex items-center gap-3">
            <div class="text-right">
                <p class="text-xs text-gray-500">Total researches</p>
                <p class="text-xs font-medium text-gradient-primary">{{ $researches->count() }} submissions</p>
            </div>
            <div class="w-9 h-9 bg-gradient-primary rounded-lg flex items-center justify-center shadow-sm">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

{{-- Success Alert matching dashboard --}}
@if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-600 px-5 py-3.5 rounded-xl mb-6 text-sm flex items-center gap-2">
        <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        {{ session('success') }}
    </div>
@endif

{{-- Table Card with Gradient Border --}}
<div class="border-gradient-table rounded-xl bg-white shadow-sm overflow-hidden">
    @if($researches->count())
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">School</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Classification</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submitted</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @foreach($researches as $index => $research)
                    <tr onclick="window.location='{{ route('admin.submissions.show', $research->id) }}'"
                        class="hover:bg-gradient-to-r hover:from-red-50 hover:to-blue-50 cursor-pointer transition">
                        <td class="px-6 py-4 text-gray-500">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-7 h-7 bg-gradient-primary rounded-full flex items-center justify-center">
                                    <span class="text-white text-xs">{{ substr($research->user->name, 0, 1) }}</span>
                                </div>
                                <span class="text-sm text-gray-700">{{ $research->user->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-medium text-gradient-primary">
                            {{ $research->title }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $research->school }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                {{ ucfirst($research->research_type) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ ucfirst($research->classification) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs text-gray-400">
                            {{ $research->created_at->format('M d, Y · h:i A') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="p-12 text-center">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <p class="text-sm text-gray-400">No submitted researches found.</p>
        </div>
    @endif
</div>

{{-- Pagination if needed --}}
@if(method_exists($researches, 'links'))
    <div class="mt-6">
        {{ $researches->links() }}
    </div>
@endif
@endsection