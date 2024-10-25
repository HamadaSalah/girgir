<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = auth()->user()->services()->latest()->get();

        return view('provider-panel.services.index', compact('services'));
    }

    public function create()
    {
        return view('provider-panel.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'cost' => 'required|numeric',
            'file' => 'required|file|mimes:jpg,jpeg,png',
        ]);

        $provider = auth('provider')->user();

        $service = $provider->services()->create($request->only(['name', 'description', 'cost']));

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads/services', 'public');
            $service->files()->create(['path' => $path, 'name' => basename($path)]);
        }

        return redirect()->route('provider-panel.services.index')->with('success', 'Service created successfully.');
    }

    public function show($service)
    {
        $service = auth()->user()->services()->findOrFail($service);

        return view('provider-panel.services.show', compact('service'));
    }

    public function edit($service)
    {
        $service = auth()->user()->services()->findOrFail($service);

        return view('provider-panel.services.edit', compact('service'));
    }

    public function update(Request $request, $service)
    {
        $service = auth()->user()->services()->findOrFail($service);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'cost' => 'required|numeric',
            'file' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);

        $service->update($request->only(['name', 'description', 'cost']));

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads/services', 'public');
            $service->files()->create(['path' => $path, 'name' => basename($path)]);
        }

        return redirect()->route('provider-panel.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($service)
    {
        $service = auth()->user()->services()->findOrFail($service);

        $service->delete();

        return redirect()->route('provider-panel.services.index')->with('success', 'Service deleted successfully.');
    }

}
