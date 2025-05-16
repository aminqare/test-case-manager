@extends('layouts.dashboard')

@section('title', 'All Devices')

@section('content')
    @foreach ($devices as $device)
        <div class="bg-white shadow rounded p-4 mb-5">
            <h2 class="text-lg font-bold text-gray-700">{{ $device->name }} <span class="text-sm text-gray-500">({{ $device->model_number }})</span></h2>
            <p class="text-sm text-gray-600">{{ $device->description }}</p>

            @if ($device->testCases->count())
                <div class="mt-3">
                    <h4 class="text-sm font-semibold text-gray-600">🧪 Test Cases:</h4>
                    <ul class="list-disc list-inside text-sm text-gray-800">
                        @foreach ($device->testCases as $tc)
                            <li><span class="font-medium">{{ $tc->name }}</span> – {{ $tc->description }}</li>
                        @endforeach
                        @livewire('device-test-case-list', ['device' => $device], key('list-' . $device->id))

                        @livewire('add-test-case', ['device' => $device], key($device->id))
                </ul>
                    
                </div>
            @else
                <p class="text-sm italic text-gray-400 mt-2">No test cases yet.</p>
            @endif
            
        </div>
    @endforeach
@endsection