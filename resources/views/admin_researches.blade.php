@extends('layouts.app')

@section('title', 'All Researches')

@section('content')
<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
    }
    .text-gradient-primary {
        background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .hover-row {
        transition: all 0.25s ease;
    }
    .hover-row:hover {
        background-color: #f9fafb;
        transform: scale(1.01);
    }
</style>

<div class="bg-white p-6 rounded-xl shadow-sm border">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl font-semibold text-gradient-primary">
            All Submitted Researches
        </h1>
        <span class="text-sm text-gray-500">
            Total: {{ $researches->count() }}
        </span>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b text-gray-600">
                    <th class="text-left py-3">Title</th>
                    <th class="text-left py-3">School</th>
                    <th class="text-left py-3">Submitted By</th>
                    <th class="text-left py-3">Submitted At</th>
                </tr>
            </thead>

            <tbody>
                @forelse($researches as $research)
                <tr onclick="window.location='{{ route('admin.submissions.show', $research->id) }}'"
                    class="border-b cursor-pointer hover-row">

                    <td class="py-3 font-medium text-gray-800">
                        {{ $research->title }}
                    </td>

                    <td class="py-3 text-gray-600">
                        {{ $research->school }}
                    </td>

                    <td class="py-3 text-gray-600">
                        {{ $research->user->name ?? 'N/A' }}
                    </td>

                    <td class="py-3 text-gray-500">
                        {{ $research->created_at->format('M d, Y') }}
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-6 text-center text-gray-400">
                        No submitted researches found.
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>
@endsection