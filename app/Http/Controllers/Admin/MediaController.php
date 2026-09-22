<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    /**
     * Display media library.
     */
    public function index()
    {
        $media = Media::latest()->paginate(24);

        return view(
            'admin.media.index',
            compact('media')
        );
    }


    /**
     * Show upload form.
     */
    public function create()
    {
        return view('admin.media.create');
    }


    /**
     * Upload media.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'file' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,webp,gif,pdf',
                'max:5120',
            ],

            'alt_text' => [
                'nullable',
                'string',
                'max:255',
            ],
        ]);


        $file = $request->file('file');


        /*
        |--------------------------------------------------------------------------
        | Generate unique filename
        |--------------------------------------------------------------------------
        */

        $filename = Str::uuid()
            .'.'
            .$file->getClientOriginalExtension();


        /*
        |--------------------------------------------------------------------------
        | Store file
        |--------------------------------------------------------------------------
        */

        $path = $file->storeAs(
            'media',
            $filename,
            'public'
        );


        /*
        |--------------------------------------------------------------------------
        | Save database record
        |--------------------------------------------------------------------------
        */

        Media::create([
            'name' => pathinfo(
                $file->getClientOriginalName(),
                PATHINFO_FILENAME
            ),

            'file_name' => $filename,

            'file_path' => $path,

            'mime_type' => $file->getMimeType(),

            'file_size' => $file->getSize(),

            'alt_text' => $validated['alt_text'] ?? null,
        ]);


        return redirect()
            ->route('admin.media.index')
            ->with(
                'success',
                'Media uploaded successfully.'
            );
    }


    /**
     * Delete media.
     */
    public function destroy(Media $media)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete physical file
        |--------------------------------------------------------------------------
        */

        if (
            $media->file_path &&
            Storage::disk('public')->exists($media->file_path)
        ) {
            Storage::disk('public')
                ->delete($media->file_path);
        }


        /*
        |--------------------------------------------------------------------------
        | Delete database record
        |--------------------------------------------------------------------------
        */

        $media->delete();


        return redirect()
            ->route('admin.media.index')
            ->with(
                'success',
                'Media deleted successfully.'
            );
    }
}