<div>
    @if (session()->has('message'))
        <div class="text-green-600">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="submit">
        <div>
            <label>Name</label>
            <input type="text" wire:model="name">
        </div>

        <div>
            <label>Description</label>
            <textarea wire:model="description"></textarea>
        </div>

        <div>
            <label>Status</label>
            <select wire:model="status">
                <option value="">-- Select Status --</option>
                <option value="pending">Pending</option>
                <option value="passed">Passed</option>
                <option value="failed">Failed</option>
            </select>
        </div>

        <button type="submit">Add</button>
    </form>
</div>