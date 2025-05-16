<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestCase extends Model
{
    protected $fillable = ['device_id', 'name', 'description'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
}
