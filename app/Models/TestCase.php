<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestCase extends Model
{
    public function device()
{
    return $this->belongsTo(Device::class);
}
protected $fillable = ['name', 'status', 'notes'];


}
