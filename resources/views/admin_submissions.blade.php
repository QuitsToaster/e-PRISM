@extends('layouts.app')

@section('title', 'Submitted Researches')

@section('content')
<div class="max-w-7xl mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6 text-center">Submitted Researches</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($researches->count())
        {{-- Table listing all submitted researches --}}
        <div class="bg-white shadow rounded-lg overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2 text-left">#</th>
                        <th class="border px-4 py-2 text-left">Submitted By (User ID)</th>
                        <th class="border px-4 py-2 text-left">Title</th>
                        <th class="border px-4 py-2 text-left">School</th>
                        <th class="border px-4 py-2 text-left">Type</th>
                        <th class="border px-4 py-2 text-left">Classification</th>
                        <th class="border px-4 py-2 text-left">Submitted At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($researches as $index => $research)
                        <tr class="hover:bg-gray-50 cursor-pointer"
                            onclick="window.location='{{ route('admin.submissions.show', $research->id) }}'">
                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $research->user_id }}</td>
                            <td class="border px-4 py-2 text-blue-600 underline">{{ $research->title }}</td>
                            <td class="border px-4 py-2">{{ $research->school }}</td>
                            <td class="border px-4 py-2">{{ ucfirst($research->research_type) }}</td>
                            <td class="border px-4 py-2">{{ ucfirst($research->classification) }}</td>
                            <td class="border px-4 py-2">{{ $research->created_at->format('F d, Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-500 text-center mt-6">No submitted researches found.</p>
    @endif
</div>
@endsection