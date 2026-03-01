@extends('layouts.app')

@section('title', 'View Research')

@section('content')
<div class="max-w-6xl mx-auto mt-10">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(isset($research))

        {{-- HEADER --}}
        <div class="bg-white shadow rounded-xl p-8 mb-8">
            <h1 class="text-2xl font-bold mb-2">{{ $research->title }}</h1>
            <p class="text-gray-600">School: {{ $research->school }}</p>
            <p class="text-gray-600">Type: {{ ucfirst($research->research_type) }}</p>
            <p class="text-gray-600">Classification: {{ ucfirst($research->classification) }}</p>
        </div>

        {{-- PROPONENTS --}}
        <div class="bg-white shadow rounded-xl p-8 mb-8">
            <h2 class="text-xl font-bold mb-4">Proponents</h2>

            <div class="grid md:grid-cols-3 gap-6">
                @foreach($research->proponents ?? [] as $proponent)
                    <div class="border rounded-lg p-4 text-center">
                        @if($proponent->photo)
                            <img src="{{ asset('storage/'.$proponent->photo) }}"
                                 class="w-24 h-24 rounded-full mx-auto mb-3 object-cover">
                        @endif
                        <p class="font-semibold">{{ $proponent->name }}</p>
                        <p class="text-sm text-gray-500">{{ $proponent->position }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- CHAPTERS --}}
        @foreach($research->chapters ?? [] as $chapter)
            <div class="bg-white shadow rounded-xl p-8 mb-8">
                <h2 class="text-xl font-bold mb-4">
                    Chapter {{ $chapter->chapter_number }} – {{ $chapter->title }}
                </h2>

                {{-- TEXT CONTENT --}}
                @if($chapter->content)
                    <div class="prose max-w-none mb-6">
                        {!! nl2br(e($chapter->content)) !!}
                    </div>
                @endif

                {{-- TABLES --}}
                @foreach($chapter->tables ?? [] as $table)
                    <div class="overflow-x-auto mb-6">
                        <table class="min-w-full border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    @foreach($table->headers ?? [] as $header)
                                        <th class="border px-4 py-2 text-left">{{ $header }}</th>
                                    @endforeach
                                    @if($table->has_total)
                                        <th class="border px-4 py-2">Total</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php $grandTotal = 0; @endphp

                                @foreach($table->rows ?? [] as $row)
                                    <tr>
                                        @foreach($row->cells ?? [] as $cell)
                                            <td class="border px-4 py-2">{{ $cell }}</td>
                                        @endforeach

                                        @if($table->has_total)
                                            <td class="border px-4 py-2 font-semibold">
                                                {{ number_format($row->row_total ?? 0, 2) }}
                                            </td>
                                            @php $grandTotal += $row->row_total ?? 0; @endphp
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>

                            @if($table->has_total)
                                <tfoot>
                                    <tr class="bg-gray-100 font-bold">
                                        <td colspan="{{ count($table->headers ?? []) }}"
                                            class="border px-4 py-2 text-right">
                                            Grand Total:
                                        </td>
                                        <td class="border px-4 py-2">
                                            {{ number_format($grandTotal, 2) }}
                                        </td>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                @endforeach
            </div>
        @endforeach

        {{-- ATTACHMENTS --}}
        <div class="bg-white shadow rounded-xl p-8 mb-8">
            <h2 class="text-xl font-bold mb-4">Attachments</h2>

            <ul class="space-y-2">
                @foreach($research->attachments ?? [] as $attachment)
                    <li>
                        <a href="{{ asset('storage/'.$attachment->filepath) }}"
                           target="_blank"
                           class="text-indigo-600 hover:underline">
                            📄 {{ $attachment->filename ?? 'Unnamed File' }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

    @else
        <p class="text-gray-500 text-center mt-6">Research not found.</p>
    @endif

    {{-- BACK BUTTON --}}
    <div class="text-center mt-6">
        <a href="{{ route('my.submissions') }}"
           class="inline-block text-sm text-gray-600 hover:underline">
            ← Back to My Submissions
        </a>
    </div>

</div>
@endsection