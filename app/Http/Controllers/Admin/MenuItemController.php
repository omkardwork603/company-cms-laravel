<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    /**
     * Show create menu item form.
     */
    public function create(Menu $menu)
    {
        $items = $menu->items()
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();

        return view(
            'admin.menus.items.create',
            compact(
                'menu',
                'items'
            )
        );
    }


    /**
     * Store menu item.
     */
    public function store(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'url' => [
                'nullable',
                'string',
                'max:500',
            ],

            'parent_id' => [
                'nullable',
                'integer',
                'exists:menu_items,id',
            ],

            'target' => [
                'required',
                'in:_self,_blank',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Make sure parent belongs to this menu
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['parent_id'])) {

            $parentExists = $menu->items()
                ->where('id', $validated['parent_id'])
                ->exists();

            if (!$parentExists) {
                abort(422, 'Invalid parent menu item.');
            }
        }


        MenuItem::create([
            'menu_id' => $menu->id,
            'parent_id' => $validated['parent_id'] ?? null,
            'title' => $validated['title'],
            'url' => $validated['url'] ?? null,
            'target' => $validated['target'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'status' => $request->boolean('status'),
        ]);


        return redirect()
            ->route('admin.menus.edit', $menu)
            ->with(
                'success',
                'Menu item added successfully.'
            );
    }


    /**
     * Show edit menu item form.
     */
    public function edit(Menu $menu, MenuItem $menuItem)
    {
        $this->checkMenuItem($menu, $menuItem);


        $items = $menu->items()
            ->whereNull('parent_id')
            ->where('id', '!=', $menuItem->id)
            ->orderBy('sort_order')
            ->get();


        return view(
            'admin.menus.items.edit',
            compact(
                'menu',
                'menuItem',
                'items'
            )
        );
    }


    /**
     * Update menu item.
     */
    public function update(
        Request $request,
        Menu $menu,
        MenuItem $menuItem
    ) {
        $this->checkMenuItem($menu, $menuItem);


        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'url' => [
                'nullable',
                'string',
                'max:500',
            ],

            'parent_id' => [
                'nullable',
                'integer',
                'exists:menu_items,id',
            ],

            'target' => [
                'required',
                'in:_self,_blank',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'status' => [
                'nullable',
                'boolean',
            ],
        ]);


        if (
            !empty($validated['parent_id']) &&
            (int) $validated['parent_id'] === $menuItem->id
        ) {
            return back()
                ->withErrors([
                    'parent_id' =>
                        'A menu item cannot be its own parent.',
                ])
                ->withInput();
        }


        if (!empty($validated['parent_id'])) {

            $parentExists = $menu->items()
                ->where('id', $validated['parent_id'])
                ->exists();

            if (!$parentExists) {
                abort(422, 'Invalid parent menu item.');
            }
        }


        $menuItem->update([
            'parent_id' => $validated['parent_id'] ?? null,
            'title' => $validated['title'],
            'url' => $validated['url'] ?? null,
            'target' => $validated['target'],
            'sort_order' => $validated['sort_order'] ?? 0,
            'status' => $request->boolean('status'),
        ]);


        return redirect()
            ->route('admin.menus.edit', $menu)
            ->with(
                'success',
                'Menu item updated successfully.'
            );
    }


    /**
     * Delete menu item.
     */
    public function destroy(
        Menu $menu,
        MenuItem $menuItem
    ) {
        $this->checkMenuItem($menu, $menuItem);


        $menuItem->delete();


        return redirect()
            ->route('admin.menus.edit', $menu)
            ->with(
                'success',
                'Menu item deleted successfully.'
            );
    }


    /**
     * Verify menu item belongs to menu.
     */
    private function checkMenuItem(
        Menu $menu,
        MenuItem $menuItem
    ): void {
        if ($menuItem->menu_id !== $menu->id) {
            abort(404);
        }
    }
}