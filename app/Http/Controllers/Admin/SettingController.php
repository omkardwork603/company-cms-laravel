<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    /**
     * Show the settings form.
     *
     * Settings is a singleton, so "index" and "edit" are the same
     * screen — there's only ever one record to manage.
     */
    public function index()
    {
        $setting = Setting::current();

        return view('admin.settings.index', compact('setting'));
    }

    /**
     * Update the settings.
     */
    public function update(Request $request)
    {
        $setting = Setting::current();

        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_tagline' => 'nullable|string|max:255',
            'details' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png,ico,svg|max:512',
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',

            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:1000',

            'facebook_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',

            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'google_analytics_id' => 'nullable|string|max:50',

            'footer_text' => 'nullable|string|max:1000',

            'maintenance_mode' => 'nullable|boolean',
        ]);

        $validated['maintenance_mode'] = $request->boolean('maintenance_mode');

        /*
        |--------------------------------------------------------------------------
        | Logo upload
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('logo')) {
            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }

            $validated['logo'] = $request->file('logo')->storeAs(
                'settings',
                'logo-'.Str::uuid().'.'.$request->file('logo')->getClientOriginalExtension(),
                'public'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Favicon upload
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('favicon')) {
            if ($setting->favicon) {
                Storage::disk('public')->delete($setting->favicon);
            }

            $validated['favicon'] = $request->file('favicon')->storeAs(
                'settings',
                'favicon-'.Str::uuid().'.'.$request->file('favicon')->getClientOriginalExtension(),
                'public'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Hero image upload
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('hero_image')) {
            if ($setting->hero_image) {
                Storage::disk('public')->delete($setting->hero_image);
            }

            $validated['hero_image'] = $request->file('hero_image')->storeAs(
                'settings',
                'hero-'.Str::uuid().'.'.$request->file('hero_image')->getClientOriginalExtension(),
                'public'
            );
        }

        $setting->update($validated);

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}
