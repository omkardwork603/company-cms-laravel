<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display menus.
     */
    public function index()
    {
        $menus = Menu::withCount('items')
            ->latest()
            ->get();

        return view(
            'admin.menus.index',
            compact('menus')
        );
    }


    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin.menus.create');
    }


    /**
     * Store menu.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'location' => [
                'required',
                'string',
                'max:100',
                'unique:menus,location',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ]);


        Menu::create([
            'name' => $validated['name'],
            'location' => $validated['location'],
            'status' => $request->boolean('status'),
        ]);


        return redirect()
            ->route('admin.menus.index')
            ->with(
                'success',
                'Menu created successfully.'
            );
    }


    /**
     * Show edit form.
     */
    public function edit(Menu $menu)
    {
        $menu->load([
            'items' => function ($query) {
                $query->orderBy('sort_order');
            }
        ]);

        return view(
            'admin.menus.edit',
            compact('menu')
        );
    }


    /**
     * Update menu.
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'location' => [
                'required',
                'string',
                'max:100',
                'unique:menus,location,' . $menu->id,
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ]);


        $menu->update([
            'name' => $validated['name'],
            'location' => $validated['location'],
            'status' => $request->boolean('status'),
        ]);


        return redirect()
            ->route('admin.menus.index')
            ->with(
                'success',
                'Menu updated successfully.'
            );
    }


    /**
     * Delete menu.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()
            ->route('admin.menus.index')
            ->with(
                'success',
                'Menu deleted successfully.'
            );
    }
}