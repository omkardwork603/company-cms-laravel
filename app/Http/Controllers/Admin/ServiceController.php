<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display all services.
     */
    public function index()
    {
        $services = Service::orderBy('display_order')
            ->latest()
            ->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store service.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'display_order' => 'required|integer|min:0',
            'status' => 'required|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        } else {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        } else {
            unset($validated['image']);
        }

        Service::create($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display service.
     */
    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show edit form.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update service.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',

            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:services,slug,' . $service->id,
            ],

            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'display_order' => 'required|integer|min:0',
            'status' => 'required|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = $request->file('image')->store('services', 'public');
        } else {
            unset($validated['image']);
        }

        $service->update($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Delete service.
     */
    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
