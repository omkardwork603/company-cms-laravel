<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display products.
     */
    public function index()
    {
        $products = Product::with('category')
            ->orderBy('display_order')
            ->latest()
            ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store product.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_code' => 'required|string|max:100|unique:products,product_code',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'display_order' => 'required|integer|min:0',
            'status' => 'required|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        } else {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        } else {
            unset($validated['image']);
        }

        Product::create($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display product.
     */
    public function show(Product $product)
    {
        $product->load('category');

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show edit form.
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view(
            'admin.products.edit',
            compact('product', 'categories')
        );
    }

    /**
     * Update product.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_code' => [
                'required',
                'string',
                'max:100',
                'unique:products,product_code,' . $product->id,
            ],

            'name' => 'required|string|max:255',

            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:products,slug,' . $product->id,
            ],

            'category_id' => 'nullable|exists:categories,id',
            'price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'display_order' => 'required|integer|min:0',
            'status' => 'required|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        } else {
            unset($validated['image']);
        }

        $product->update($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Delete product.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}