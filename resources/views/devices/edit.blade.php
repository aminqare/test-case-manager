<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white leading-tight">
            Edit Device
        </h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('devices.update', $device) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block font-medium">Device Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $device->name) }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="model_number" class="block font-medium">Model Number</label>
                <input type="text" name="model_number" id="model_number" value="{{ old('model_number', $device->model_number) }}" class="w-full border rounded p-2" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block font-medium">Description</label>
                <textarea name="description" id="description" class="w-full border rounded p-2" rows="4">{{ old('description', $device->description) }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Update Device
            </button>
            <a href="{{ route('devices.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
        </form>
    </div>
</x-app-layout>
