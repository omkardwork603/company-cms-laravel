<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Product;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
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

        $team = TeamMember::where('status', true)
            ->latest()
            ->take(6)
            ->get();

        $posts = Post::where('status', true)
            ->latest()
            ->take(3)
            ->get();

        return view(
            'frontend.layout.home',
            compact(
                'services',
                'products',
                'projects',
                'team',
                'posts'
            )
        );
    }
}