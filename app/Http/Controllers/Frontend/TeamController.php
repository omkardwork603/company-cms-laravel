<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;

class TeamController extends Controller
{
    /**
     * Display active team members.
     */
    public function index()
    {
        $teamMembers = TeamMember::where('status', true)
            ->orderBy('display_order')
            ->get();

        return view(
            'frontend.team.index',
            compact('teamMembers')
        );
    }

    /**
     * Display single team member.
     */
    public function show(TeamMember $teamMember)
    {
        abort_if(!$teamMember->status, 404);

        return view(
            'frontend.team.show',
            compact('teamMember')
        );
    }
}