@extends('layouts.app')

@section('title', 'Help & Guides')

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
</style>

<!-- Add top padding to account for fixed navbar -->
<div class="pt-20 max-w-5xl mx-auto px-4">

    <!-- Header with colored gradient area -->
    <div class="bg-gradient-header rounded-xl p-6 mb-8 border border-gray-100">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-primary rounded-xl flex items-center justify-center shadow-md">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-semibold text-gradient-primary">Help & Guides</h1>
                <p class="text-sm text-gray-600 mt-1">
                    Learn how to submit your research paper, check requirements, and follow submission guidelines
                </p>
            </div>
        </div>
    </div>

    <!-- Guides List with Gradient Cards -->
    <div class="grid md:grid-cols-2 gap-5 mb-8">
        <!-- Guide Card 1 - Submit Paper -->
        <div class="border-gradient-card rounded-xl bg-white p-6 shadow-sm hover-card-effect">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-gradient-to-r from-[#2563eb]/20 to-[#1a1a1a]/20 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-lg text-gradient-primary mb-1">How to Submit Your Paper</h2>
                    <p class="text-sm text-gray-600">
                        Step-by-step instructions on submitting your research paper section by section, including document requirements and formatting guidelines.
                    </p>
                </div>
            </div>
        </div>

        <!-- Guide Card 2 - Drafts & Submissions -->
        <div class="border-gradient-card rounded-xl bg-white p-6 shadow-sm hover-card-effect">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-gradient-to-r from-[#2563eb]/20 to-[#1a1a1a]/20 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-lg text-gradient-primary mb-1">Drafts & Submissions</h2>
                    <p class="text-sm text-gray-600">
                        Learn the difference between drafts and submitted sections, how to save your work, and when to finalize your submission.
                    </p>
                </div>
            </div>
        </div>

        <!-- Guide Card 3 - Profile Management -->
        <div class="border-gradient-card rounded-xl bg-white p-6 shadow-sm hover-card-effect">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-gradient-to-r from-[#2563eb]/20 to-[#1a1a1a]/20 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-lg text-gradient-primary mb-1">Profile Management</h2>
                    <p class="text-sm text-gray-600">
                        Update your profile information securely, change your password, and manage your account settings.
                    </p>
                </div>
            </div>
        </div>

        <!-- Guide Card 4 - FAQs -->
        <div class="border-gradient-card rounded-xl bg-white p-6 shadow-sm hover-card-effect">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-gradient-to-r from-[#2563eb]/20 to-[#1a1a1a]/20 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-lg text-gradient-primary mb-1">FAQs</h2>
                    <p class="text-sm text-gray-600">
                        Frequently Asked Questions about the system, submission process, technical requirements, and troubleshooting.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Help Section -->
    <div class="border-gradient-card rounded-xl bg-white p-6 shadow-sm mb-8">
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-gradient-to-r from-[#2563eb]/20 to-[#1a1a1a]/20 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div class="flex-1">
                <h3 class="font-semibold text-gradient-primary text-lg mb-2">Need more help?</h3>
                <p class="text-sm text-gray-600 mb-4">
                    Can't find what you're looking for? Contact our support team for personalized assistance.
                </p>
                <a href="#" class="inline-flex items-center gap-2 bg-gradient-primary text-white px-5 py-2.5 rounded-lg text-sm font-medium shadow-sm hover:opacity-90 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Contact Support
                </a>
            </div>
        </div>
    </div>

    <!-- SYSTEM DEVELOPERS SECTION -->
    <div class="mt-10">
        <div class="flex items-center gap-2 mb-6">
            <div class="bg-gradient-primary rounded-full"></div>
            <h2 class="text-xl font-semibold text-gradient-primary">System Developers</h2>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Developer 1 -->
            <div class="border-gradient-card rounded-xl bg-white p-6 shadow-sm hover-card-effect text-center">
                
                    <img src="{{ asset('images/developer1.jpg') }}" 
                     alt="Developer 1"
                     class="w-24 h-24 mx-auto rounded-full object-cover border-4 bg-gradient-to-r from-[#2563eb]/20 to-[#1a1a1a]/20 border-[#2563eb]/30 mb-4">
               
                <h3 class="font-bold text-gray-800 text-xl mb-1">Bryan Lloyd T. Tan</h3>
                <span class="inline-block bg-gradient-primary text-white text-xs px-3 py-1 rounded-full mb-2">Backend Developer</span>
                <p class="text-sm text-gray-600 flex items-center justify-center gap-1">
                    <svg class="w-4 h-4 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    bryanlloydtan@gmail.com
                </p>
                <p class="text-sm text-gray-600 flex items-center justify-center gap-1">
                    <svg class="w-4 h-4 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    0976-650-5469
                </p>
            </div>

            <!-- Developer 2 -->
            <div class="border-gradient-card rounded-xl bg-white p-6 shadow-sm hover-card-effect text-center">
                    <img src="{{ asset('images/developer2.jpg') }}" 
                     alt="Developer 1"
                     class="w-24 h-24 mx-auto rounded-full object-cover border-4 bg-gradient-to-r from-[#2563eb]/20 to-[#1a1a1a]/20 border-[#2563eb]/30 mb-4">
                <h3 class="font-bold text-gray-800 text-xl mb-1">Timothy John M. Lardizabal</h3>
                <span class="inline-block bg-gradient-primary text-white text-xs px-3 py-1 rounded-full mb-2">UI/UX Developer</span>
                <p class="text-sm text-gray-600 flex items-center justify-center gap-1">
                    <svg class="w-4 h-4 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    timxlardizabal@gmail.com
                </p>
                <p class="text-sm text-gray-600 flex items-center justify-center gap-1">
                    <svg class="w-4 h-4 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    0926-610-7475
                </p>
            </div>
        </div>
    </div>
</div>
@endsection