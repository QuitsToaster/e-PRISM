@extends('layouts.app')

@section('title', 'Research Submission Detail')

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
    .hover-card-effect {
        transition: all 0.3s ease;
    }
    .hover-card-effect:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
    }
    /* Add top padding to account for fixed navbar */
    .content-container {
        padding-top: 0rem;
    }
</style>

<div class="content-container max-w-7xl mx-auto px-4">
    <!-- Header with gradient background -->
    <div class="bg-gradient-header rounded-xl p-6 mb-6 border border-gray-100">
        <div class="flex items-center justify-between">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <div class="bg-gradient-primary rounded-full"></div>
                    <h1 class="text-2xl font-semibold text-gradient-primary">Research Submission Detail</h1>
                </div>
                <p class="text-sm text-gray-600 ml-3">View complete research information</p>
            </div>
            @if(isset($research))
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.research.download', $research->id) }}"
                   class="inline-flex items-center gap-2 bg-gradient-primary text-white px-5 py-2.5 rounded-lg text-sm font-medium shadow-sm hover:opacity-90 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Download as Word
                </a>
            </div>
            @endif
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-600 px-5 py-3.5 rounded-xl mb-6 text-sm flex items-center gap-2">
            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    @if(isset($research))
        {{-- SINGLE CARD with Gradient Border --}}
        <div class="border-gradient-card rounded-xl bg-gradient-card p-6 shadow-sm hover-card-effect mb-6">
            
            {{-- RESEARCH HEADER --}}
            <div class="mb-6">
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

            {{-- Gradient Separator --}}
            <div class="border-gradient-separator mb-6"></div>

            {{-- PROPONENTS --}}
            <div class="mb-6">
                <h2 class="text-lg font-semibold text-gradient-primary mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    Proponents
                </h2>
                <div class="grid md:grid-cols-3 gap-4">
                    @foreach($research->proponents ?? [] as $proponent)
                        <div class="bg-white rounded-lg border border-gray-200 p-4 text-center">
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

            {{-- Gradient Separator --}}
            <div class="border-gradient-separator mb-6"></div>

            {{-- CHAPTERS --}}
            @foreach($research->chapters ?? [] as $index => $chapter)
                <div class="{{ !$loop->last ? 'mb-6' : '' }}">
                    <h2 class="text-lg font-semibold text-gradient-primary mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        Chapter {{ $chapter->chapter_number }}
                    </h2>

                    {{-- TEXT CONTENT --}}
                    @if($chapter->content)
                        <div class="bg-white rounded-lg p-4 mb-4 text-gray-700 text-sm leading-relaxed border border-gray-200">
                            {!! nl2br(e($chapter->content)) !!}
                        </div>

                        {{-- ============================= --}}
{{-- ADMIN REVIEW SECTION --}}
{{-- ============================= --}}
<div class="bg-white rounded-lg border border-gray-200 p-4 mt-4">

    <form method="POST" action="{{ route('admin.chapter.review', $chapter->id) }}">
        @csrf

        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-semibold text-gradient-primary">
                Chapter Review
            </h3>

            {{-- STATUS BADGE --}}
            @php
                $statusColor = match($chapter->review_status) {
                    'Approved' => 'bg-green-100 text-green-700',
                    'Needs Revision' => 'bg-red-100 text-red-700',
                    default => 'bg-yellow-100 text-yellow-700'
                };
            @endphp

            <span class="px-3 py-1 text-xs rounded-full {{ $statusColor }}">
                {{ $chapter->review_status ?? 'Pending' }}
            </span>
        </div>

        {{-- STATUS DROPDOWN --}}
        <div class="mb-3">
            <label class="block text-xs font-medium text-gray-600 mb-1">
                Review Status
            </label>
            <select name="review_status"
                class="w-full border border-gray-300 rounded-lg text-sm px-3 py-2 focus:ring-2 focus:ring-blue-500">

                <option value="Pending" {{ $chapter->review_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Approved" {{ $chapter->review_status == 'Approved' ? 'selected' : '' }}>Approved</option>
                <option value="Needs Revision" {{ $chapter->review_status == 'Needs Revision' ? 'selected' : '' }}>Needs Revision</option>
            </select>
        </div>

        {{-- FEEDBACK TEXTAREA --}}
        <div class="mb-3">
            <label class="block text-xs font-medium text-gray-600 mb-1">
                Admin Feedback
            </label>
            <textarea name="admin_feedback"
                rows="3"
                class="w-full border border-gray-300 rounded-lg text-sm px-3 py-2 focus:ring-2 focus:ring-blue-500"
                placeholder="Write feedback for this chapter...">{{ $chapter->admin_feedback }}</textarea>
        </div>

        <div class="text-right">
            <button type="submit"
                class="bg-gradient-primary text-white px-4 py-2 rounded-lg text-xs font-medium hover:opacity-90 transition">
                Save Review
            </button>
        </div>

    </form>
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
                            {{-- ============================= --}}
{{-- TABLE REVIEW SECTION --}}
{{-- ============================= --}}
<div class="bg-white rounded-lg border border-gray-200 p-4 mt-4">

    <form method="POST" action="{{ route('admin.table.review', $table->id) }}">
        @csrf

        @php
            $statusColor = match($table->review_status) {
                'Approved' => 'bg-green-100 text-green-700',
                'Needs Revision' => 'bg-red-100 text-red-700',
                default => 'bg-yellow-100 text-yellow-700'
            };
        @endphp

        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-semibold text-gradient-primary">
                Table Review
            </h3>

            <span class="px-3 py-1 text-xs rounded-full {{ $statusColor }}">
                {{ $table->review_status ?? 'Pending' }}
            </span>
        </div>

        <div class="mb-3">
            <select name="review_status"
                class="w-full border border-gray-300 rounded-lg text-sm px-3 py-2">

                <option value="Pending" {{ $table->review_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Approved" {{ $table->review_status == 'Approved' ? 'selected' : '' }}>Approved</option>
                <option value="Needs Revision" {{ $table->review_status == 'Needs Revision' ? 'selected' : '' }}>Needs Revision</option>
            </select>
        </div>

        <div class="mb-3">
            <textarea name="admin_feedback"
                rows="3"
                class="w-full border border-gray-300 rounded-lg text-sm px-3 py-2"
                placeholder="Write feedback for this table...">{{ $table->admin_feedback }}</textarea>
        </div>

        <div class="text-right">
            <button type="submit"
                class="bg-gradient-primary text-white px-4 py-2 rounded-lg text-xs font-medium">
                Save Table Review
            </button>
        </div>

    </form>
</div>
                        </div>
                    @endforeach
                </div>

                {{-- Gradient Separator between chapters (if not last) --}}
                @if(!$loop->last)
                    <div class="border-gradient-separator my-6"></div>
                @endif
            @endforeach

            {{-- Gradient Separator before Attachments (if there are chapters) --}}
            @if(count($research->chapters ?? []) > 0)
                <div class="border-gradient-separator my-6"></div>
            @endif

            {{-- ATTACHMENTS --}}
            <div class="mt-4">
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
                               class="flex items-center gap-2 text-sm text-gray-700 hover:text-gradient-primary p-2 bg-white rounded-lg border border-gray-200 transition">
                                <svg class="w-4 h-4 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                {{ $attachment->filename ?? 'Unnamed File' }}
                            </a>
                            {{-- ============================= --}}
{{-- ATTACHMENT REVIEW SECTION --}}
{{-- ============================= --}}
<div class="bg-white rounded-lg border border-gray-200 p-4 mt-2">

    <form method="POST" action="{{ route('admin.attachment.review', $attachment->id) }}">
        @csrf

        @php
            $statusColor = match($attachment->review_status) {
                'Approved' => 'bg-green-100 text-green-700',
                'Needs Revision' => 'bg-red-100 text-red-700',
                default => 'bg-yellow-100 text-yellow-700'
            };
        @endphp

        <div class="flex items-center justify-between mb-3">
            <span class="text-xs font-semibold text-gradient-primary">
                Attachment Review
            </span>

            <span class="px-3 py-1 text-xs rounded-full {{ $statusColor }}">
                {{ $attachment->review_status ?? 'Pending' }}
            </span>
        </div>

        <div class="mb-3">
            <select name="review_status"
                class="w-full border border-gray-300 rounded-lg text-sm px-3 py-2">

                <option value="Pending" {{ $attachment->review_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Approved" {{ $attachment->review_status == 'Approved' ? 'selected' : '' }}>Approved</option>
                <option value="Needs Revision" {{ $attachment->review_status == 'Needs Revision' ? 'selected' : '' }}>Needs Revision</option>
            </select>
        </div>

        <div class="mb-3">
            <textarea name="admin_feedback"
                rows="2"
                class="w-full border border-gray-300 rounded-lg text-sm px-3 py-2"
                placeholder="Write feedback for this attachment...">{{ $attachment->admin_feedback }}</textarea>
        </div>

        <div class="text-right">
            <button type="submit"
                class="bg-gradient-primary text-white px-3 py-1 rounded-lg text-xs">
                Save
            </button>
        </div>

    </form>
</div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Back Button with Gradient -->
        <div class="text-center mt-6">
            <a href="{{ route('admin.submissions.list') }}" 
               class="inline-flex items-center px-6 py-3 bg-gradient-primary text-white rounded-lg text-sm font-medium shadow-sm hover:opacity-90 transition">
                Back to Submissions
            </a>
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