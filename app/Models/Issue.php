<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ['test_case_id', 'assigned_to', 'status', 'description', 'due_date'];

    public function testCase()
    {
        return $this->belongsTo(TestCase::class);
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
