<div class="mt-4">
    @if (session()->has('message'))
        <div class="text-green-600 text-sm mb-2">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save" class="space-y-2">
        <input type="text" wire:model="title" placeholder="Test Case Title"
               class="w-full border rounded px-3 py-1 text-sm" />

        <textarea wire:model="description" placeholder="Description (optional)"
                  class="w-full border rounded px-3 py-1 text-sm"></textarea>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-1 text-sm rounded hover:bg-blue-700">
            + Add Test Case
        </button>
    </form>
</div>