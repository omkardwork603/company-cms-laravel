<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display active products.
     */
    public function index()
    {
        $products = Product::with('category')
            ->where('status', true)
            ->orderBy('display_order')
            ->get();

        return view(
            'frontend.products.index',
            compact('products')
        );
    }

    /**
     * Display single product.
     */
    public function show(Product $product)
    {
        abort_if(!$product->status, 404);

        $product->load('category');

        return view(
            'frontend.products.show',
            compact('product')
        );
    }
}