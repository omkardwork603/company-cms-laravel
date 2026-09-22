<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display all team members.
     */
    public function index()
    {
        $teamMembers = TeamMember::orderBy('display_order')
            ->latest()
            ->paginate(10);

        return view(
            'admin.team.index',
            compact('teamMembers')
        );
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store team member.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'slug' => 'nullable|string|max:255|unique:team_members,slug',

            'designation' => 'nullable|string|max:255',

            'department' => 'nullable|string|max:255',

            'email' => 'nullable|email|max:255',

            'phone' => 'nullable|string|max:50',

            'bio' => 'nullable|string',

            'profile_image' => 'nullable|string|max:255',

            'linkedin_url' => 'nullable|url|max:255',

            'twitter_url' => 'nullable|url|max:255',

            'facebook_url' => 'nullable|url|max:255',

            'display_order' => 'required|integer|min:0',

            'status' => 'required|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        } else {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        TeamMember::create($validated);

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Team member created successfully.');
    }

    /**
     * Display team member.
     */
    public function show(TeamMember $team)
    {
        return view(
            'admin.team.show',
            compact('team')
        );
    }

    /**
     * Show edit form.
     */
    public function edit(TeamMember $team)
    {
        return view(
            'admin.team.edit',
            compact('team')
        );
    }

    /**
     * Update team member.
     */
    public function update(Request $request, TeamMember $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:team_members,slug,' . $team->id,
            ],

            'designation' => 'nullable|string|max:255',

            'department' => 'nullable|string|max:255',

            'email' => 'nullable|email|max:255',

            'phone' => 'nullable|string|max:50',

            'bio' => 'nullable|string',

            'profile_image' => 'nullable|string|max:255',

            'linkedin_url' => 'nullable|url|max:255',

            'twitter_url' => 'nullable|url|max:255',

            'facebook_url' => 'nullable|url|max:255',

            'display_order' => 'required|integer|min:0',

            'status' => 'required|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        } else {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        $team->update($validated);

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Team member updated successfully.');
    }

    /**
     * Delete team member.
     */
    public function destroy(TeamMember $team)
    {
        $team->delete();

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Team member deleted successfully.');
    }
}