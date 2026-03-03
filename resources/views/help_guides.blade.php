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
            <p class="text-sm text-gray-500 ml-3">
                Learn how to submit your research paper, check requirements, and follow submission guidelines
            </p>
        </div>
        <div class="w-9 h-9 bg-gradient-primary rounded-lg flex items-center justify-center shadow-sm">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
            </svg>
        </div>
    </div>

    <!-- Guides List with Colored Cards -->
    <div class="grid md:grid-cols-2 gap-5">

        <!-- Guide Card 1 -->
        <div class="bg-red-50 rounded-xl border border-red-200 p-6 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 bg-red-200 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-lg text-gray-800 mb-1">How to Submit Your Paper</h2>
                    <p class="text-sm text-gray-600">
                        Step-by-step instructions on submitting your research paper section by section.
                    </p>
                </div>
            </div>
        </div>

        <!-- Guide Card 2 -->
        <div class="bg-blue-50 rounded-xl border border-blue-200 p-6 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1">
            <h2 class="font-bold text-lg text-gray-800 mb-1">Drafts & Submissions</h2>
            <p class="text-sm text-gray-600">
                Learn the difference between drafts and submitted sections.
            </p>
        </div>

        <!-- Guide Card 3 -->
        <div class="bg-purple-50 rounded-xl border border-purple-200 p-6 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1">
            <h2 class="font-bold text-lg text-gray-800 mb-1">Profile Management</h2>
            <p class="text-sm text-gray-600">
                Update your profile information securely.
            </p>
        </div>

        <!-- Guide Card 4 -->
        <div class="bg-green-50 rounded-xl border border-green-200 p-6 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-1">
            <h2 class="font-bold text-lg text-gray-800 mb-1">FAQs</h2>
            <p class="text-sm text-gray-600">
                Frequently Asked Questions about the system.
            </p>
        </div>

    </div>

    <!-- Additional Help Section -->
    <div class="mt-8 bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
        <h3 class="font-semibold text-gray-700 mb-2">Need more help?</h3>
        <p class="text-sm text-gray-600 mb-4">
            Can't find what you're looking for? Contact our support team.
        </p>
        <a href="#" class="bg-gradient-primary text-white px-4 py-2 rounded-lg text-sm font-medium shadow-sm">
            Contact Support
        </a>
    </div>

    <!-- SYSTEM DEVELOPERS SECTION START -->
    <div class="mt-10">
        <div class="flex items-center gap-2 mb-6">
            <div class="w-1.5 h-7 bg-gradient-primary rounded-full"></div>
            <h2 class="text-xl font-semibold text-gray-800">System Developers</h2>
        </div>

        <div class="grid md:grid-cols-2 gap-6">

            <!-- Developer 1 -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm text-center hover:shadow-md transition">
                <img src="{{ asset('images/developer1.jpg') }}" 
                     alt="Developer 1"
                     class="w-24 h-24 mx-auto rounded-full object-cover border-4 border-red-200 mb-4">

                <h3 class="font-semibold text-gray-800 text-lg">Bryan Lloyd T. Tan</h3>
                <p class="inline-block bg-blue-600 text-white text-sm px-4 py-1 rounded-full mb-1">Backend Developer</p>
                <p class="text-sm text-gray-600">bryanlloydtan@gmail.com</p>
                <p class="text-sm text-gray-600">0976-650-5469</p>
            </div>

            <!-- Developer 2 -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm text-center hover:shadow-md transition">
                <img src="{{ asset('images/developer2.jpg') }}" 
                     alt="Developer 2"
                     class="w-24 h-24 mx-auto rounded-full object-cover border-4 border-blue-200 mb-4">

                <h3 class="font-semibold text-gray-800 text-lg">Timothy John M. Lardizabal</h3>
                <p class="inline-block bg-blue-600 text-white text-sm px-4 py-1 rounded-full mb-1">UI/UX Developer</p>
                <p class="text-sm text-gray-600">timxlardizabal@gmail.com</p>
                <p class="text-sm text-gray-600">0926-610-7475</p>
            </div>

        </div>
    </div>
    <!-- SYSTEM DEVELOPERS SECTION END -->

</div>
@endsection