@extends('layouts.app')

@section('title', 'View Research')

@section('content')
<style>
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
    .bg-gradient-card {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.05) 0%, rgba(26, 26, 26, 0.05) 100%);
    }
    .border-gradient-card {
        border: 2px solid transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%) border-box;
    }
    .border-gradient-separator {
        border: 0;
        height: 1px;
        background: linear-gradient(90deg, #2563eb 0%, #1a1a1a 100%);
    }
</style>

<div class="max-w-7xl mx-auto px-4 pt-20">

    {{-- HEADER --}}
    <div class="bg-gradient-header rounded-xl p-6 mb-6 border border-gray-100">
        <h1 class="text-2xl font-semibold text-gradient-primary">
            {{ $research->title }} Submission 
        </h1>
        <p class="text-sm text-gray-600 mt-1">
            View your research and admin feedback
        </p>
    </div>

    @if(isset($research))

    <div class="border-gradient-card rounded-xl bg-gradient-card p-6 shadow-sm mb-6">

        {{-- RESEARCH INFO --}}
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-3">
                {{ $research->title }}
            </h2>

            <div class="grid md:grid-cols-3 gap-4 text-sm">
                <div>School: <strong>{{ $research->school }}</strong></div>
                <div>Type: <strong>{{ ucfirst($research->research_type) }}</strong></div>
                <div>Classification: <strong>{{ ucfirst($research->classification) }}</strong></div>
            </div>
        </div>

        <div class="border-gradient-separator mb-6"></div>

        {{-- CHAPTERS --}}
        @foreach($research->chapters as $chapter)

        <div class="mb-8">

            <h2 class="text-lg font-semibold text-gradient-primary mb-3">
                Chapter {{ $chapter->chapter_number }} – {{ $chapter->title }}
            </h2>

            {{-- CONTENT --}}
            @if($chapter->content)
            <div class="bg-white p-4 rounded-lg border border-gray-200 mb-4 text-sm text-gray-700">
                {!! nl2br(e($chapter->content)) !!}
            </div>
            @endif

            {{-- CHAPTER STATUS + FEEDBACK --}}
            <div class="bg-white border border-gray-200 rounded-lg p-4 mb-4">

                @php
                    $statusColor = match($chapter->review_status) {
                        'Approved' => 'text-green-600',
                        'Needs Revision' => 'text-red-600',
                        default => 'text-yellow-600'
                    };
                @endphp

                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-semibold text-gray-600">
                        Chapter Review Status:
                    </span>
                    <span class="text-sm font-bold {{ $statusColor }}">
                        {{ $chapter->review_status ?? 'Pending' }}
                    </span>
                </div>

                @if($chapter->admin_feedback)
                <div class="mt-2 bg-gray-50 border border-gray-200 p-3 rounded text-sm text-gray-700">
                    <strong>Admin Feedback:</strong><br>
                    {{ $chapter->admin_feedback }}
                </div>
                @endif

            </div>

            {{-- TABLES --}}
            @foreach($chapter->tables as $table)

            <div class="overflow-x-auto mb-4">
                <table class="min-w-full border border-gray-200 rounded-lg text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            @foreach($table->headers as $header)
                                <th class="border px-3 py-2 text-left">{{ $header }}</th>
                            @endforeach
                            @if($table->has_total)
                                <th class="border px-3 py-2">Total</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php $grandTotal = 0; @endphp
                        @foreach($table->rows as $row)
                        <tr>
                            @foreach($row->cells as $cell)
                                <td class="border px-3 py-2">{{ $cell }}</td>
                            @endforeach
                            @if($table->has_total)
                                <td class="border px-3 py-2 font-semibold">
                                    {{ number_format($row->row_total ?? 0, 2) }}
                                </td>
                                @php $grandTotal += $row->row_total ?? 0; @endphp
                            @endif
                        </tr>
                        @endforeach
                    </tbody>

                    @if($table->has_total)
                    <tfoot>
                        <tr class="font-bold bg-gray-100">
                            <td colspan="{{ count($table->headers) }}"
                                class="border px-3 py-2 text-right">
                                Grand Total:
                            </td>
                            <td class="border px-3 py-2">
                                {{ number_format($grandTotal, 2) }}
                            </td>
                        </tr>
                    </tfoot>
                    @endif
                </table>
            </div>

            {{-- TABLE REVIEW DISPLAY --}}
            <div class="bg-white border border-gray-200 rounded-lg p-4 mb-6">

                @php
                    $statusColor = match($table->review_status) {
                        'Approved' => 'text-green-600',
                        'Needs Revision' => 'text-red-600',
                        default => 'text-yellow-600'
                    };
                @endphp

                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-semibold text-gray-600">
                        Table Review Status:
                    </span>
                    <span class="text-sm font-bold {{ $statusColor }}">
                        {{ $table->review_status ?? 'Pending' }}
                    </span>
                </div>

                @if($table->admin_feedback)
                <div class="mt-2 bg-gray-50 border border-gray-200 p-3 rounded text-sm text-gray-700">
                    <strong>Admin Feedback:</strong><br>
                    {{ $table->admin_feedback }}
                </div>
                @endif

            </div>

            @endforeach

        </div>

        @if(!$loop->last)
            <div class="border-gradient-separator mb-6"></div>
        @endif

        @endforeach

        {{-- ATTACHMENTS --}}
        <h2 class="text-lg font-semibold text-gradient-primary mb-4">
            Attachments
        </h2>

        @foreach($research->attachments as $attachment)

        <div class="bg-white border border-gray-200 rounded-lg p-4 mb-4">

            <a href="{{ asset('storage/'.$attachment->filepath) }}"
               target="_blank"
               class="text-blue-600 font-medium text-sm">
                {{ $attachment->filename }}
            </a>

            @php
                $statusColor = match($attachment->review_status) {
                    'Approved' => 'text-green-600',
                    'Needs Revision' => 'text-red-600',
                    default => 'text-yellow-600'
                };
            @endphp

            <div class="flex justify-between items-center mt-3 text-sm">
                <span class="font-semibold text-gray-600">
                    Attachment Status:
                </span>
                <span class="font-bold {{ $statusColor }}">
                    {{ $attachment->review_status ?? 'Pending' }}
                </span>
            </div>

            @if($attachment->admin_feedback)
            <div class="mt-2 bg-gray-50 border border-gray-200 p-3 rounded text-sm text-gray-700">
                <strong>Admin Feedback:</strong><br>
                {{ $attachment->admin_feedback }}
            </div>
            @endif

        </div>

        @endforeach

    </div>

    @else
        <div class="text-center text-gray-400">
            Research not found.
        </div>
    @endif

</div>
@endsection