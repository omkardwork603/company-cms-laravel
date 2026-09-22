<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;

use App\Models\Setting;
use App\Models\Service;
use App\Models\Product;
use App\Models\Project;
use App\Models\Post;

class PageController extends Controller
{
    /**
     * Frontend Home Page
     */
    public function home()
    {
        $page = Page::where('slug', 'home')
            ->where('status', true)
            ->first();

        $settings = Setting::first();

        $services = Service::where('status', true)
            ->latest()
            ->take(6)
            ->get();

        $products = Product::where('status', true)
            ->latest()
            ->take(6)
            ->get();

        $projects = Project::where('status', true)
            ->latest()
            ->take(6)
            ->get();

        $posts = Post::with('category')
            ->where('status', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(6)
            ->get();

        $aboutPage = Page::where('slug', 'about')
            ->where('status', true)
            ->first();

        return view('frontend.layout.home', compact(
            'page',
            'aboutPage',
            'settings',
            'services',
            'products',
            'projects',
            'posts'
        ));
    }

    /**
     * Frontend About Page
     */
    public function about()
    {
        $page = Page::where('slug', 'about')
            ->where('status', true)
            ->first();

        $settings = Setting::first();

        return view(
            'frontend.layout.about',
            compact('page', 'settings')
        );
    }

    /**
     * Display single custom page.
     */
    public function show($slug)
    {
        if ($slug === 'home') {
            return $this->home();
        }
        if ($slug === 'about') {
            return $this->about();
        }

        $page = Page::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $settings = Setting::first();

        return view(
            'frontend.layout.about',
            compact('page', 'settings')
        );
    }
}

