@if ($device->testCases->count())
    <ul class="list-disc list-inside text-sm text-gray-800 mt-2">
        @foreach ($device->testCases as $tc)
            <li><strong>{{ $tc->name }}</strong> – {{ $tc->description }}</li>
        @endforeach
    </ul>
@else
    <p class="text-sm italic text-gray-400 mt-2">No test cases yet.</p>
@endif