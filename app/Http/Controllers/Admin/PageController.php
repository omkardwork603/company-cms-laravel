<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(10);

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'nullable|max:255|unique:pages,slug',
            'content' => 'nullable',
            'status' => 'required|boolean',
        ]);

        $validated['slug'] =
            $validated['slug'] ?: Str::slug($validated['title']);

        Page::create($validated);

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page created successfully.');
    }

    public function show(Page $page)
    {
        return view('admin.pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function editAbout()
    {
        $page = Page::firstOrCreate(
            ['slug' => 'about'],
            [
                'title' => 'About Us',
                'content' => '<p>Welcome to our company. Information about our team and history will be updated soon.</p>',
                'status' => 1,
            ]
        );

        return view('admin.pages.edit', compact('page'));
    }


    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:pages,slug,' . $page->id,
            'content' => 'nullable',
            'status' => 'required|boolean',
        ]);

        $page->update($validated);

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page deleted successfully.');
    }
}