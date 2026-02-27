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
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Title</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Type</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Last Updated</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php $drafts = $researches->where('status', 'draft'); @endphp
                    @forelse($drafts as $draft)
                        <tr>
                            <td class="py-4 px-6">{{ $draft->title }}</td>
                            <td class="py-4 px-6">{{ ucfirst($draft->research_type) }} ({{ ucfirst($draft->classification) }})</td>
                            <td class="py-4 px-6">{{ $draft->updated_at->format('Y-m-d') }}</td>
                            <td class="py-4 px-6">
                                <a href="{{ route('submit.paper', ['id' => $draft->id]) }}" class="text-indigo-600 hover:underline mr-3">Edit</a>
                                <form method="POST" action="{{ route('research.delete', $draft->id) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-4 px-6 text-center text-gray-400">No drafts yet.</td>
                        </tr>
                    @endforelse
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
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Title</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Type</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Status</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Submitted On</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php $submitted = $researches->where('status', 'submitted'); @endphp
                    @forelse($submitted as $s)
                        <tr>
                            <td class="py-4 px-6">{{ $s->title }}</td>
                            <td class="py-4 px-6">{{ ucfirst($s->research_type) }} ({{ ucfirst($s->classification) }})</td>
                            <td class="py-4 px-6">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Submitted</span>
                            </td>
                            <td class="py-4 px-6">{{ $s->created_at->format('Y-m-d') }}</td>
                            <td class="py-4 px-6">
                                <a href="{{ route('research.show', $s->id) }}" class="text-gray-600 hover:underline">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-4 px-6 text-center text-gray-400">No submissions yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection