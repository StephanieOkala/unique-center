<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   

    public function index()
    {
        $services = Service::where('is_active', true)
            ->latest()
            ->get();

        return view('services.index', compact('services'));
    }




    public function create()
    {
        return view('services.create');
    }


    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);

        Service::create($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service added successfully.');
    }


   

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }


    

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);

        $service->update($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }


    

    public function destroy(Service $service)
    {
        $service->update([
            'is_active' => false,
        ]);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service removed successfully.');
    }
}
