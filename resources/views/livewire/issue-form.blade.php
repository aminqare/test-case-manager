<div class="bg-white p-4 rounded shadow-md max-w-xl mx-auto mt-8">
    <h2 class="text-lg font-bold mb-4 text-gray-700">🪲 Create Issue</h2>

    @if (session()->has('message'))
        <div class="text-green-600 text-sm mb-3">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save" class="space-y-3">
        <div>
            <label class="block text-sm text-gray-600 mb-1">Select Test Case:</label>
            <select wire:model="test_case_id" class="w-full border rounded px-2 py-1 text-sm">
                <option value="">-- Choose --</option>
                @foreach($testCases as $tc)
                    <option value="{{ $tc->id }}">{{ $tc->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm text-gray-600 mb-1">Assign to User:</label>
            <select wire:model="assigned_to" class="w-full border rounded px-2 py-1 text-sm">
                <option value="">-- Unassigned --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm text-gray-600 mb-1">Description:</label>
            <textarea wire:model="description" class="w-full border rounded px-2 py-1 text-sm"></textarea>
        </div>

        <div>
            <label class="block text-sm text-gray-600 mb-1">Due Date:</label>
            <input type="date" wire:model="due_date" class="w-full border rounded px-2 py-1 text-sm" />
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded text-sm hover:bg-blue-700">
            + Create Issue
        </button>
    </form>
</div>
