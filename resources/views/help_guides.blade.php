@extends('layouts.app')

@section('title', 'Help & Guides')

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
</style>

<div class="max-w-5xl mx-auto mt-8 px-4">
    <!-- Header matching dashboard pattern -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <div class="w-1.5 h-7 bg-gradient-primary rounded-full"></div>
                <h1 class="text-2xl font-semibold text-gray-800">Help & Guides</h1>
            </div>
            <p class="text-sm text-gray-500 ml-3">Learn how to submit your research paper, check requirements, and follow submission guidelines</p>
        </div>
        <div class="w-9 h-9 bg-gradient-primary rounded-lg flex items-center justify-center shadow-sm">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
            </svg>
        </div>
    </div>

    <!-- Guides List with Colored Cards -->
    <div class="grid md:grid-cols-2 gap-5">

        <!-- Guide Card 1 - Red Theme -->
        <div class="bg-red-50 rounded-xl border border-red-200 p-6 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-red-200 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h2 class="font-bold text-lg text-gray-800 mb-1">How to Submit Your Paper</h2>
                    <p class="text-sm text-gray-600">
                        Step-by-step instructions on submitting your research paper section by section. Start with Chapter 1 → Part 1.
                    </p>
                    <a href="#" class="inline-flex items-center gap-1 text-xs text-red-600 font-medium mt-3 hover:text-red-700">
                        Learn more
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Guide Card 2 - Blue Theme -->
        <div class="bg-blue-50 rounded-xl border border-blue-200 p-6 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-blue-200 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h2 class="font-bold text-lg text-gray-800 mb-1">Drafts & Submissions</h2>
                    <p class="text-sm text-gray-600">
                        Learn the difference between drafts and submitted sections, and how to manage them in your dashboard.
                    </p>
                    <a href="#" class="inline-flex items-center gap-1 text-xs text-blue-600 font-medium mt-3 hover:text-blue-700">
                        Learn more
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Guide Card 3 - Purple Theme (Red+Blue mix) -->
        <div class="bg-purple-50 rounded-xl border border-purple-200 p-6 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-purple-200 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.913 0 5.63.835 7.879 2.804M12 15a5 5 0 100-10 5 5 0 000 10z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h2 class="font-bold text-lg text-gray-800 mb-1">Profile Management</h2>
                    <p class="text-sm text-gray-600">
                        Instructions on updating your profile information, email, and password securely.
                    </p>
                    <a href="#" class="inline-flex items-center gap-1 text-xs text-purple-600 font-medium mt-3 hover:text-purple-700">
                        Learn more
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Guide Card 4 - Green Theme -->
        <div class="bg-green-50 rounded-xl border border-green-200 p-6 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-green-200 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h2 class="font-bold text-lg text-gray-800 mb-1">FAQs</h2>
                    <p class="text-sm text-gray-600">
                        Frequently Asked Questions about e-PRISM, submission rules, and troubleshooting common issues.
                    </p>
                    <a href="#" class="inline-flex items-center gap-1 text-xs text-green-600 font-medium mt-3 hover:text-green-700">
                        Learn more
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Additional Help Section -->
    <div class="mt-8 bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-1.5 h-6 bg-gradient-primary rounded-full"></div>
            <h3 class="font-semibold text-gray-700">Need more help?</h3>
        </div>
        <p class="text-sm text-gray-600 mb-4">
            Can't find what you're looking for? Contact our support team for assistance.
        </p>
        <a href="#" class="inline-flex items-center gap-2 bg-gradient-primary text-white px-4 py-2 rounded-lg text-sm font-medium shadow-sm hover:opacity-90 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            Contact Support
        </a>
    </div>
</div>
@endsection