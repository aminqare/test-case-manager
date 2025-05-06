<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\TestCase;
use Illuminate\Http\Request;

class DeviceTestCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create(Device $device)
{
    return view('test-cases.create', compact('device'));
}

public function store(Request $request, Device $device)
{
    $request->validate([
        'name' => 'required',
        'status' => 'required|in:pass,fail,pending',
        'notes' => 'nullable',
    ]);

    $device->testCases()->create([
        'name' => $request->name,
        'status' => $request->status,
        'notes' => $request->notes,
    ]);

    return redirect()->route('devices.index')->with('success', 'Test case added.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device, TestCase $testCase)
    {
        return view('test-cases.edit', compact('device', 'testCase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Device $device, TestCase $testCase)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|in:pass,fail,pending',
            'notes' => 'nullable',
        ]);
    
        $testCase->update($request->only('name', 'status', 'notes'));
    
        return redirect()->route('devices.index')->with('success', 'Test case updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device, TestCase $testCase)
    {
        $testCase->delete();
    
        return redirect()->route('devices.index')->with('success', 'Test case deleted.');
    }
}
