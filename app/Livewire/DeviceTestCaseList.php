<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Device;

class DeviceTestCaseList extends Component
{
    public $device;

    protected $listeners = [
        'test-case-added' => '$refresh',
    ];

    public function mount($device)
    {
        $this->device = $device;
    }

    public function render()
    {
        return view('livewire.device-test-case-list');
    }
}

