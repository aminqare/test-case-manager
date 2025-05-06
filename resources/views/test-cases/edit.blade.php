<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Edit Test Case for {{ $device->name }}</h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('devices.test-cases.update', [$device, $testCase]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium">Test Name</label>
                <input name="name" value="{{ old('name', $testCase->name) }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Status</label>
                <select name="status" class="w-full border rounded p-2">
                    @foreach (['pending', 'pass', 'fail'] as $status)
                        <option value="{{ $status }}" @selected(old('status', $testCase->status) == $status)>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Notes</label>
                <textarea name="notes" class="w-full border rounded p-2" rows="4">{{ old('notes', $testCase->notes) }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Update Test Case
            </button>
        </form>
    </div>
</x-app-layout>
