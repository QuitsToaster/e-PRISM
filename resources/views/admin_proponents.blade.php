@extends('layouts.app')

@section('title', 'All Proponents')

@section('content')
<div class="bg-white p-6 rounded-xl shadow-sm border">
    <h1 class="text-xl font-semibold mb-4 text-gradient-primary">All Proponents</h1>

    <table class="w-full text-sm">
        <thead>
            <tr class="border-b">
                <th class="text-left py-2">Name</th>
                <th class="text-left py-2">Position</th>
                <th class="text-left py-2">School</th>
                <th class="text-left py-2">Research Title</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proponents as $proponent)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2">{{ $proponent->name }}</td>
                <td class="py-2">{{ $proponent->position }}</td>
                <td class="py-2">{{ $proponent->research->school ?? '-' }}</td>
                <td class="py-2">{{ $proponent->research->title ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection