@extends('layouts.app')

@section('title', 'Help & Guides')

@section('content')
<div class="max-w-5xl mx-auto mt-10">

    <!-- Page Header -->
    <div class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white rounded-lg p-8 shadow-lg mb-10">
        <h1 class="text-3xl md:text-4xl font-extrabold mb-2">Help & Guides</h1>
        <p class="text-lg md:text-xl text-purple-100">
            Learn how to submit your research paper, check requirements, and follow submission guidelines.
        </p>
    </div>

    <!-- Guides List -->
    <div class="grid md:grid-cols-2 gap-6">

        <!-- Guide Card 1 -->
        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 hover:scale-105 border-l-4 border-purple-500">
            <h2 class="font-bold text-xl mb-2">How to Submit Your Paper</h2>
            <p class="text-gray-600 text-sm">
                Step-by-step instructions on submitting your research paper section by section. Start with Chapter 1 → Part 1.
            </p>
        </div>

        <!-- Guide Card 2 -->
        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 hover:scale-105 border-l-4 border-purple-500">
            <h2 class="font-bold text-xl mb-2">Drafts & Submissions</h2>
            <p class="text-gray-600 text-sm">
                Learn the difference between drafts and submitted sections, and how to manage them in your dashboard.
            </p>
        </div>

        <!-- Guide Card 3 -->
        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 hover:scale-105 border-l-4 border-purple-500">
            <h2 class="font-bold text-xl mb-2">Profile Management</h2>
            <p class="text-gray-600 text-sm">
                Instructions on updating your profile information, email, and password securely.
            </p>
        </div>

        <!-- Guide Card 4 -->
        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 hover:scale-105 border-l-4 border-purple-500">
            <h2 class="font-bold text-xl mb-2">FAQs</h2>
            <p class="text-gray-600 text-sm">
                Frequently Asked Questions about e-PRISM, submission rules, and troubleshooting common issues.
            </p>
        </div>

    </div>
</div>
@endsection