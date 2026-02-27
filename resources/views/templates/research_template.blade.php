{{-- Research Paper Template --}}
<div class="bg-white p-10 border border-gray-200 shadow-lg rounded-lg max-w-4xl mx-auto">
    {{-- Title --}}
    <h1 class="text-4xl font-bold text-center mb-6">{{ $research->title }}</h1>

    {{-- Meta Info --}}
    <div class="text-gray-600 text-center mb-6">
        <p>School: {{ $research->school }} @if($research->school_id) (ID: {{ $research->school_id }}) @endif</p>
        <p>Type: {{ ucfirst($research->research_type) }} | Classification: {{ ucfirst($research->classification) }}</p>
        <p>Submitted by User ID: {{ $research->user_id }}</p>
        <p>Submitted at: {{ $research->created_at->format('F d, Y H:i') }}</p>
    </div>

    <hr class="my-6">

    {{-- Proponents --}}
    <div class="mb-6">
        <h2 class="text-2xl font-semibold mb-2">Proponents</h2>
        <ul class="list-disc list-inside space-y-2">
            @foreach($research->proponents as $p)
                <li class="flex items-center space-x-4">
                    <p class="font-medium">{{ $p->name }} ({{ $p->position }})</p>
                    @if($p->photo)
                        <img src="{{ asset('storage/' . $p->photo) }}" alt="photo" class="w-16 h-16 object-cover rounded border">
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Chapters --}}
    <div class="mb-6">
        <h2 class="text-2xl font-semibold mb-2">Chapters</h2>
        @if($research->chapters && is_array($research->chapters))
            @foreach($research->chapters as $i => $chapter)
                <div class="mb-4">
                    <p class="font-bold">Chapter {{ $i + 1 }}:</p>
                    @if(isset($chapter['main']))
                        <p class="ml-4">{{ $chapter['main'] }}</p>
                    @endif
                    @if(isset($chapter['subs']))
                        <ul class="ml-6 list-decimal list-inside">
                            @foreach($chapter['subs'] as $sub)
                                <li>{{ $sub }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
        @else
            <p class="text-gray-500">No chapters submitted.</p>
        @endif
    </div>

    {{-- Attachments --}}
    <div class="mb-6">
        <h2 class="text-2xl font-semibold mb-2">Attachments</h2>
        @if($research->attachments->count())
            <ul class="list-disc list-inside">
                @foreach($research->attachments as $a)
                    <li>
                        <a href="{{ asset('storage/' . $a->filename) }}" target="_blank" class="text-blue-600 underline">
                            {{ basename($a->filename) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No attachments.</p>
        @endif
    </div>

    {{-- Feedback --}}
    <div class="mb-6">
        <h2 class="text-2xl font-semibold mb-2">Admin Feedback</h2>
        <form method="POST" action="{{ route('admin.feedback', $research->id) }}">
            @csrf
            <textarea name="feedback" rows="4" class="w-full border p-3 rounded mb-2">{{ $research->feedback }}</textarea>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Save Feedback</button>
        </form>
    </div>
</div>