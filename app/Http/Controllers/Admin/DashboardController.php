<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Service;
use App\Models\Product;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'pages'    => Page::count(),
            'services' => Service::count(),
            'products' => Product::count(),
            'projects' => Project::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}