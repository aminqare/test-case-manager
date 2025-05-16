<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Issue;
use App\Models\TestCase;
use App\Models\User;

class IssueForm extends Component
{
    public $test_case_id;
    public $assigned_to;
    public $description;
    public $due_date;

    public function save()
    {
        $this->validate([
            'test_case_id' => 'required|exists:test_cases,id',
            'assigned_to' => 'nullable|exists:users,id',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        Issue::create([
            'test_case_id' => $this->test_case_id,
            'assigned_to' => $this->assigned_to,
            'description' => $this->description,
            'due_date' => $this->due_date,
            'status' => 'assigned',
        ]);

        session()->flash('message', 'Issue created!');
        $this->reset(['test_case_id', 'assigned_to', 'description', 'due_date']);
    }

    public function render()
    {
        return view('livewire.issue-form', [
            'testCases' => TestCase::all(),
            'users' => User::all(),
        ]);
    }
}

