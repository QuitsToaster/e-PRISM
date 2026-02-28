@extends('layouts.app')

@section('title', 'Submitted Researches')

@section('content')
<div class="max-w-6xl mx-auto">

    {{-- Header --}}
    <div class="mb-10 text-center">
        <h1 class="text-2xl font-semibold text-gray-800">
            Submitted Researches
        </h1>
        <p class="text-sm text-gray-500 mt-1">
            Review all submitted research papers
        </p>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-5 py-3 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table Card --}}
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

        @if($researches->count())
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50 border-b text-xs uppercase text-gray-600">
                        <tr>
                            <th class="px-6 py-4 text-left">#</th>
                            <th class="px-6 py-4 text-left">User</th>
                            <th class="px-6 py-4 text-left">Title</th>
                            <th class="px-6 py-4 text-left">School</th>
                            <th class="px-6 py-4 text-left">Type</th>
                            <th class="px-6 py-4 text-left">Classification</th>
                            <th class="px-6 py-4 text-left">Submitted</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @foreach($researches as $index => $research)
                        <tr onclick="window.location='{{ route('admin.submissions.show', $research->id) }}'"
                            class="hover:bg-gray-50 cursor-pointer">

                            <td class="px-6 py-4 text-gray-500">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $research->user->name }}</td>
                            <td class="px-6 py-4 font-medium text-indigo-600">
                                {{ $research->title }}
                            </td>
                            <td class="px-6 py-4">{{ $research->school }}</td>
                            <td class="px-6 py-4">{{ ucfirst($research->research_type) }}</td>
                            <td class="px-6 py-4">{{ ucfirst($research->classification) }}</td>
                            <td class="px-6 py-4 text-gray-500">
                                {{ $research->created_at->format('M d, Y · h:i A') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-10 text-center text-gray-500">
                No submitted researches found.
            </div>
        @endif
    </div>

</div>
@endsection