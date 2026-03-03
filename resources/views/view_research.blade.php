@extends('layouts.app')

@section('title', 'View Research')

@section('content')
<style>
    /* Custom gradient for vibrant dark blue to black */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
    }
    .text-gradient-primary {
        background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .bg-gradient-header {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(26, 26, 26, 0.1) 100%);
    }
    .border-gradient-card {
        border: 2px solid transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%) border-box;
    }
    .hover-card-effect {
        transition: all 0.3s ease;
    }
    .hover-card-effect:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
    }
    th, td {
        position: relative;
    }
    th:not(:last-child)::after, td:not(:last-child)::after {
        content: '';
        position: absolute;
        right: 0;
        top: 25%;
        height: 50%;
        width: 1px;
        background: linear-gradient(180deg, #2563eb 0%, #1a1a1a 100%);
    }
</style>

<!-- Add top padding to account for fixed navbar -->
<div class="pt-20 max-w-6xl mx-auto px-4">

    {{-- Header with colored gradient area --}}
    <div class="bg-gradient-header rounded-xl p-6 mb-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <div class="bg-gradient-primary rounded-full"></div>
                    <h1 class="text-2xl font-semibold text-gradient-primary">View Research</h1>
                </div>
                <p class="text-sm text-gray-600 ml-3">Detailed view of your research submission</p>
            </div>
            <div class="w-9 h-9 bg-gradient-primary rounded-lg flex items-center justify-center shadow-sm">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
            </div>
        </div>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-600 px-5 py-3.5 rounded-xl mb-6 text-sm flex items-center gap-2">
            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    @if(isset($research))

        {{-- RESEARCH HEADER - White card with gradient border --}}
        <div class="border-gradient-card rounded-xl bg-white p-6 mb-6 shadow-sm hover-card-effect">
            <div class="flex-1">
                <h2 class="text-xl font-bold text-gray-800 mb-3">{{ $research->title }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="text-xs text-gray-600">School: <span class="font-medium text-gray-800">{{ $research->school }}</span></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <span class="text-xs text-gray-600">Type: <span class="font-medium text-gray-800">{{ ucfirst($research->research_type) }}</span></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l5 5a2 2 0 01.586 1.414V19a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"></path>
                        </svg>
                        <span class="text-xs text-gray-600">Classification: <span class="font-medium text-gray-800">{{ ucfirst($research->classification) }}</span></span>
                    </div>
                </div>
            </div>
        </div>

        {{-- PROPONENTS - White card with gradient border --}}
        <div class="border-gradient-card rounded-xl bg-white p-6 mb-6 shadow-sm hover-card-effect">
            <h2 class="text-lg font-semibold text-gradient-primary mb-4 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                Proponents
            </h2>
            <div class="grid md:grid-cols-3 gap-4">
                @foreach($research->proponents ?? [] as $proponent)
                    <div class="bg-gray-50 rounded-lg border border-gray-200 p-4 text-center">
                        @if($proponent->photo)
                            <img src="{{ asset('storage/'.$proponent->photo) }}"
                                 class="w-20 h-20 rounded-full mx-auto mb-3 object-cover border-2 border-gradient-primary">
                        @else
                            <div class="w-20 h-20 rounded-full mx-auto mb-3 bg-gradient-primary flex items-center justify-center">
                                <span class="text-white text-xl font-bold">{{ substr($proponent->name, 0, 1) }}</span>
                            </div>
                        @endif
                        <p class="font-semibold text-gray-800">{{ $proponent->name }}</p>
                        <p class="text-xs text-gradient-primary">{{ $proponent->position }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- CHAPTERS - White cards with gradient borders --}}
        @foreach($research->chapters ?? [] as $chapter)
            <div class="border-gradient-card rounded-xl bg-white p-6 mb-6 shadow-sm hover-card-effect">
                <h2 class="text-lg font-semibold text-gradient-primary mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Chapter {{ $chapter->chapter_number }} – {{ $chapter->title }}
                </h2>

                {{-- TEXT CONTENT --}}
                @if($chapter->content)
                    <div class="bg-gray-50 rounded-lg p-4 mb-4 text-gray-700 text-sm leading-relaxed border border-gray-200">
                        {!! nl2br(e($chapter->content)) !!}
                    </div>
                @endif

                {{-- TABLES with gradient accents --}}
                @foreach($chapter->tables ?? [] as $table)
                    <div class="overflow-x-auto mb-4">
                        <table class="min-w-full border border-gray-200 rounded-lg">
                            <thead class="bg-gradient-to-r from-[#2563eb]/10 to-[#1a1a1a]/10">
                                <tr>
                                    @foreach($table->headers ?? [] as $header)
                                        <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gradient-primary">{{ $header }}</th>
                                    @endforeach
                                    @if($table->has_total)
                                        <th class="border border-gray-200 px-4 py-2 text-sm font-medium text-gradient-primary">Total</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @php $grandTotal = 0; @endphp

                                @foreach($table->rows ?? [] as $row)
                                    <tr class="hover:bg-gradient-to-r hover:from-[#2563eb]/5 hover:to-[#1a1a1a]/5">
                                        @foreach($row->cells ?? [] as $cell)
                                            <td class="border border-gray-200 px-4 py-2 text-sm text-gray-600">{{ $cell }}</td>
                                        @endforeach

                                        @if($table->has_total)
                                            <td class="border border-gray-200 px-4 py-2 text-sm font-semibold text-gray-800">
                                                {{ number_format($row->row_total ?? 0, 2) }}
                                            </td>
                                            @php $grandTotal += $row->row_total ?? 0; @endphp
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>

                            @if($table->has_total)
                                <tfoot>
                                    <tr class="bg-gradient-to-r from-[#2563eb]/10 to-[#1a1a1a]/10 font-bold">
                                        <td colspan="{{ count($table->headers ?? []) }}"
                                            class="border border-gray-200 px-4 py-2 text-right text-sm text-gradient-primary">
                                            Grand Total:
                                        </td>
                                        <td class="border border-gray-200 px-4 py-2 text-sm font-bold text-gradient-primary">
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

        {{-- ATTACHMENTS - White card with gradient border --}}
        <div class="border-gradient-card rounded-xl bg-white p-6 mb-6 shadow-sm hover-card-effect">
            <h2 class="text-lg font-semibold text-gradient-primary mb-4 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                </svg>
                Attachments
            </h2>
            <ul class="space-y-2">
                @foreach($research->attachments ?? [] as $attachment)
                    <li>
                        <a href="{{ asset('storage/'.$attachment->filepath) }}"
                           target="_blank"
                           class="flex items-center gap-2 text-sm text-gray-700 hover:text-gradient-primary p-2 bg-gray-50 rounded-lg border border-gray-200 transition">
                            <svg class="w-4 h-4 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            {{ $attachment->filename ?? 'Unnamed File' }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

    @else
        <div class="border-gradient-card rounded-xl bg-white p-12 text-center">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <p class="text-gray-400">Research not found.</p>
        </div>
    @endif
</div>
@endsection