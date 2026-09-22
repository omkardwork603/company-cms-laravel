<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display posts.
     */
    public function index()
    {
        $posts = Post::with('category')
            ->latest('published_at')
            ->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store post.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'category_id' => 'nullable|exists:categories,id',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'author' => 'nullable|string|max:255',
            'status' => 'required|boolean',
            'published_at' => 'nullable|date',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        } else {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        } else {
            unset($validated['featured_image']);
        }

        Post::create($validated);

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display post.
     */
    public function show(Post $post)
    {
        $post->load('category');

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show edit form.
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update post.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:posts,slug,' . $post->id,
            ],
            'category_id' => 'nullable|exists:categories,id',
            'excerpt' => 'nullable|string',
            'content' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'author' => 'nullable|string|max:255',
            'status' => 'required|boolean',
            'published_at' => 'nullable|date',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);

        if ($request->hasFile('featured_image')) {
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        } else {
            unset($validated['featured_image']);
        }

        $post->update($validated);

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Delete post.
     */
    public function destroy(Post $post)
    {
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post deleted successfully.');
    }
}
