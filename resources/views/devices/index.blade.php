<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white leading-tight">
            Devices
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($devices->count())
            <div class="space-y-6">
                @foreach ($devices as $device)
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                        <!-- Device Header -->
                        <div class="flex justify-between items-center px-6 py-4 border-b dark:border-gray-700">
                            <div>
                                <p class="font-bold text-lg text-gray-800 dark:text-white">{{ $device->name }}</p>
                                <div class="text-sm text-gray-500 mt-1">
                                    <div class="flex">
                                        <span class="font-medium w-28">Model #:</span>
                                        <span>{{ $device->model_number }}</span>
                                    </div>
                                    <div class="flex mt-1">
                                        <span class="font-medium w-28">Description:</span>
                                        <span>{{ $device->description }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="space-x-3">
                                <a href="{{ route('devices.edit', $device) }}" class="text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('devices.destroy', $device) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this device?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                                <a href="{{ route('devices.test-cases.create', $device) }}" class="text-green-600 hover:underline">Add Test</a>
                            </div>
                        </div>

                        <!-- Rest of the code remains the same -->
                        <div class="px-6 py-4">
                            <p class="font-semibold text-gray-700 dark:text-gray-200 mb-2">Test Cases:</p>

                            @if ($device->testCases->count())
                                <table class="w-full text-sm divide-y divide-gray-300 dark:divide-gray-600 border rounded">
                                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                                        <tr>
                                            <th class="text-left px-4 py-2">Name</th>
                                            <th class="text-left px-4 py-2">Status</th>
                                            <th class="text-left px-4 py-2">Notes</th>
                                            <th class="text-left px-4 py-2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($device->testCases as $testCase)
                                            <tr>
                                                <td class="px-4 py-2 text-gray-800 dark:text-white">{{ $testCase->name }}</td>
                                                <td class="px-4 py-2">
                                                    <span class="inline-block px-2 py-1 text-xs font-semibold rounded
                                                        @if($testCase->status == 'pass') bg-green-100 text-green-800
                                                        @elseif($testCase->status == 'fail') bg-red-100 text-red-800
                                                        @else bg-yellow-100 text-yellow-800
                                                        @endif">
                                                        {{ ucfirst($testCase->status) }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $testCase->notes ?? '—' }}</td>
                                                <td class="px-4 py-2 space-x-2">
                                                    <a href="{{ route('devices.test-cases.edit', [$device, $testCase]) }}" class="text-blue-500 hover:underline text-sm">Edit</a>
                                                    <form action="{{ route('devices.test-cases.destroy', [$device, $testCase]) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this test case?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:underline text-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-gray-500 italic">No test cases yet.</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No devices found.</p>
        @endif
    </div>
</x-app-layout>