<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display blog posts.
     */
    public function index(Request $request)
    {
        $categories = Category::where('status', true)
            ->orderBy('name')
            ->get();

        $query = Post::with('category')
            ->where('status', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Category Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {

            $query->whereHas('category', function ($q) use ($request) {

                $q->where('slug', $request->category)
                    ->where('status', true);

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Posts
        |--------------------------------------------------------------------------
        */

        $posts = $query
            ->latest('published_at')
            ->paginate(9)
            ->withQueryString();


        return view(
            'frontend.blog.index',
            compact(
                'posts',
                'categories'
            )
        );
    }


    /**
     * Display single blog post.
     */
    public function show(Post $post)
    {
        /*
        |--------------------------------------------------------------------------
        | Only published posts can be viewed publicly
        |--------------------------------------------------------------------------
        */

        if (
            !$post->status ||
            !$post->published_at ||
            $post->published_at->isFuture()
        ) {
            abort(404);
        }


        $post->load('category');


        /*
        |--------------------------------------------------------------------------
        | Related Posts
        |--------------------------------------------------------------------------
        */

        $relatedPosts = Post::where('status', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(3)
            ->get();


        return view(
            'frontend.blog.show',
            compact(
                'post',
                'relatedPosts'
            )
        );
    }
}