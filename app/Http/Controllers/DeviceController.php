<?php

namespace App\Http\Controllers;
use App\Http\Controllers\DeviceController;
use Illuminate\Http\Request;
use App\Models\Device;



class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $devices = \App\Models\Device::with('testCases')->get();
    return view('devices.index', compact('devices'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'model_number' => 'required',
            'description' => 'nullable',
        ]);
    
        \App\Models\Device::create([
            'name' => $request->name,
            'model_number' => $request->model_number,
            'description' => $request->description,
        ]);
    
        return redirect()->route('devices.index')->with('success', 'Device added.');
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
    public function edit(Device $device) {
        return view('devices.edit', compact('device'));
    }
    
    public function update(Request $request, Device $device) {
        $device->update($request->validate([
            'name' => 'required',
            'model_number' => 'required',
            'description' => 'nullable',
        ]));
    
        return redirect()->route('devices.index')->with('success', 'Device updated.');
    }
    
    public function destroy(Device $device) {
        $device->delete();
    
        return redirect()->route('devices.index')->with('success', 'Device deleted.');
    }
}
