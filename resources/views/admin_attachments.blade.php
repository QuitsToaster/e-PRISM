@extends('layouts.app')

@section('title', 'All Attachments')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-sm border">
    <h1 class="text-xl font-semibold mb-4 text-gradient-primary">All Attachments</h1>

    <table class="w-full text-sm">
        <thead>
            <tr class="border-b">
                <th class="text-left py-2">File Name</th>
                <th class="text-left py-2">Research Title</th>
                <th class="text-left py-2">Uploaded At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attachments as $file)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2">{{ $file->filename }}</td>
                <td class="py-2">{{ $file->research->title ?? '-' }}</td>
                <td class="py-2">{{ $file->created_at->format('M d, Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection