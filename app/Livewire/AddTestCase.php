<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TestCase;

class AddTestCase extends Component
{
    public $device;
    public $title;
    public $description;

    public function mount($device)
    {
        $this->device = $device;
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|min:3',
            'description' => 'nullable|string',
        ]);

        $this->device->testCases()->create([
            'name' => $this->title,
            'description' => $this->description,
        ]);
        $this->dispatch('test-case-added');
        $this->reset(['title', 'description']);
        session()->flash('message', 'Test case added!');
    }

    public function render()
    {
        return view('livewire.add-test-case');
    }
}
