@extends('layouts.app')

@section('title', 'My Submissions')

@section('content')
<div class="max-w-6xl mx-auto mt-10">

    <!-- Page Header -->
    <div class="bg-gradient-to-r from-green-500 to-teal-600 text-white rounded-lg p-8 shadow-lg mb-10">
        <h1 class="text-3xl md:text-4xl font-extrabold mb-2">My Submissions</h1>
        <p class="text-lg md:text-xl text-green-100">
            View all your research paper sections. Drafts are saved separately and submitted sections are shown below.
        </p>
    </div>

    <!-- Drafts Section -->
    <div class="mb-10">
        <h2 class="text-2xl font-bold mb-4 text-gray-700">Drafts</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Chapter</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Part</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Title</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Last Updated</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <!-- Example Draft Row -->
                    <tr>
                        <td class="py-4 px-6">Chapter 1</td>
                        <td class="py-4 px-6">Part 1: Introduction</td>
                        <td class="py-4 px-6">Sample Paper Title</td>
                        <td class="py-4 px-6">2026-02-26</td>
                        <td class="py-4 px-6">
                            <a href="{{ route('submit.paper') }}" class="text-indigo-600 hover:underline mr-3">Edit</a>
                            <a href="#" class="text-red-600 hover:underline">Delete</a>
                        </td>
                    </tr>
                    <!-- Repeat rows dynamically from database -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Submitted Sections -->
    <div>
        <h2 class="text-2xl font-bold mb-4 text-gray-700">Submitted Sections</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Chapter</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Part</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Title</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Status</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Submitted On</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <!-- Example Submitted Row -->
                    <tr>
                        <td class="py-4 px-6">Chapter 1</td>
                        <td class="py-4 px-6">Part 2: Background</td>
                        <td class="py-4 px-6">Sample Paper Title</td>
                        <td class="py-4 px-6">
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Submitted</span>
                        </td>
                        <td class="py-4 px-6">2026-02-25</td>
                        <td class="py-4 px-6">
                            <a href="#" class="text-gray-600 hover:underline mr-3">View</a>
                        </td>
                    </tr>
                    <!-- Repeat rows dynamically from database -->
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection