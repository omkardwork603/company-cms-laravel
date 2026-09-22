<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display all projects.
     */
    public function index()
    {
        $projects = Project::orderBy('display_order')
            ->latest()
            ->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store project.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug',
            'client_name' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'project_url' => 'nullable|url|max:255',
            'display_order' => 'required|integer|min:0',
            'status' => 'required|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        } else {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('projects', 'public');
        } else {
            unset($validated['featured_image']);
        }

        Project::create($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display project.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show edit form.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update project.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',

            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:projects,slug,' . $project->id,
            ],

            'client_name' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'project_url' => 'nullable|url|max:255',
            'display_order' => 'required|integer|min:0',
            'status' => 'required|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);

        if ($request->hasFile('featured_image')) {
            // Delete old image if it exists
            if ($project->featured_image) {
                Storage::disk('public')->delete($project->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('projects', 'public');
        } else {
            unset($validated['featured_image']);
        }

        $project->update($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Delete project.
     */
    public function destroy(Project $project)
    {
        if ($project->featured_image) {
            Storage::disk('public')->delete($project->featured_image);
        }

        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}