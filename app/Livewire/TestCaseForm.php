<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TestCase;

class TestCaseForm extends Component
{
    public $name;
    public $description;
    public $status;
    public $device_id;

    public function mount($device_id)
    {
        $this->device_id = $device_id;
    }

    protected $rules = [
        'name' => 'required|min:3',
        'status' => 'required|in:pending,passed,failed',
        'device_id' => 'required|exists:devices,id',
    ];

    public function submit()
    {
        $this->validate();

        TestCase::create([
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'device_id' => $this->device_id,
        ]);

        $this->reset(['name', 'description', 'status']);
        session()->flash('message', 'Test case created!');
    }

    public function render()
    {
        return view('livewire.test-case-form');
    }
}


