<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TestCase;


class Device extends Model
{
    protected $fillable = ['name', 'model_number', 'description'];
    public function testCases()
{
    return $this->hasMany(TestCase::class);
}

}

