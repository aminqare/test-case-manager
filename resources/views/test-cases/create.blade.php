<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">
            Add Test Case to {{ $device->name }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('devices.test-cases.store', $device) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-medium">Test Name</label>
                <input name="name" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Status</label>
                <select name="status" class="w-full border rounded p-2" required>
                    <option value="pending">Pending</option>
                    <option value="pass">Pass</option>
                    <option value="fail">Fail</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Notes</label>
                <textarea name="notes" class="w-full border rounded p-2" rows="4"></textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Save Test Case
            </button>
        </form>
    </div>
</x-app-layout>
