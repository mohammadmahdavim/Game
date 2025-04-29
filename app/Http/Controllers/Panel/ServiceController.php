<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('panel.service.index', compact('services'));
    }

    public function create()
    {
        return view('panel.service.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'little_description' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
        ]);

        Service::create($validated);

        return redirect()->route('panel.services.index')->with('success', 'Service created!');
    }

    public function show(Service $service)
    {
        return view('panel.service.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('panel.service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'little_description' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $service->update($validated);

        return redirect()->route('panel.services.index')->with('success', 'Service updated!');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('panel.services.index')->with('success', 'Service deleted!');
    }
}

