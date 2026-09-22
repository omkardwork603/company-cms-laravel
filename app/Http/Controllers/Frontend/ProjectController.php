<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display active projects.
     */
    public function index()
    {
        $projects = Project::where('status', true)
            ->orderBy('display_order')
            ->get();

        return view(
            'frontend.projects.index',
            compact('projects')
        );
    }

    /**
     * Display single project.
     */
    public function show(Project $project)
    {
        abort_if(!$project->status, 404);

        return view(
            'frontend.projects.show',
            compact('project')
        );
    }
}