@extends('frontend.layouts.app')

@section('title', 'Blog')

@section('content')

<section class="py-16">

    <div class="max-w-7xl mx-auto px-6">


        {{-- Header --}}
        <div class="text-center mb-12">

            <h1 class="text-4xl font-bold text-gray-900">
                Our Blog
            </h1>

            <p class="text-gray-500 mt-3">
                Latest news, insights and articles from our company.
            </p>

        </div>


        {{-- Search + Category --}}
        <div class="bg-gray-50 rounded-xl p-6 mb-10">

            <form
                action="{{ route('blog.index') }}"
                method="GET"
                class="grid grid-cols-1 md:grid-cols-3 gap-4"
            >

                {{-- Search --}}
                <div class="md:col-span-2">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search blog posts..."
                        class="w-full border rounded-lg px-4 py-3"
                    >

                </div>


                {{-- Category --}}
                <div>

                    <select
                        name="category"
                        class="w-full border rounded-lg px-4 py-3"
                        onchange="this.form.submit()"
                    >

                        <option value="">
                            All Categories
                        </option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->slug }}"
                                {{ request('category') === $category->slug ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Search Button --}}
                <div>

                    <button
                        type="submit"
                        class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                    >
                        Search
                    </button>

                </div>

            </form>

        </div>


        {{-- Active Filters --}}
        @if(request('search') || request('category'))

            <div class="mb-8">

                <p class="text-gray-600">

                    Showing results

                    @if(request('search'))
                        for <strong>"{{ request('search') }}"</strong>
                    @endif

                    @if(request('category'))
                        in <strong>{{ request('category') }}</strong>
                    @endif

                </p>

                <a
                    href="{{ route('blog.index') }}"
                    class="text-blue-600 text-sm"
                >
                    Clear filters
                </a>

            </div>

        @endif


        {{-- Posts --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($posts as $post)

                <article class="bg-white border rounded-xl overflow-hidden">


                    {{-- Featured Image --}}
                    @if($post->featured_image)

                        <img
                            src="{{ Storage::url($post->featured_image) }}"
                            alt="{{ $post->title }}"
                            class="w-full h-56 object-cover"
                        >

                    @else

                        <div class="w-full h-56 bg-gray-100 flex items-center justify-center">

                            <span class="text-gray-400">
                                No Image
                            </span>

                        </div>

                    @endif


                    {{-- Content --}}
                    <div class="p-6">


                        {{-- Category --}}
                        @if($post->category)

                            <a
                                href="{{ route('blog.index', ['category' => $post->category->slug]) }}"
                                class="text-sm text-blue-600"
                            >
                                {{ $post->category->name }}
                            </a>

                        @endif


                        {{-- Title --}}
                        <h2 class="text-xl font-bold mt-3">

                            <a
                                href="{{ route('blog.show', $post) }}"
                                class="hover:underline"
                            >
                                {{ $post->title }}
                            </a>

                        </h2>


                        {{-- Excerpt --}}
                        @if($post->excerpt)

                            <p class="text-gray-600 mt-3 line-clamp-3">
                                {{ $post->excerpt }}
                            </p>

                        @endif


                        {{-- Meta --}}
                        <div class="flex justify-between items-center mt-6 text-sm text-gray-500">

                            <span>
                                {{ $post->author ?? 'Admin' }}
                            </span>

                            @if($post->published_at)
                                <span>
                                    {{ $post->published_at->format('M d, Y') }}
                                </span>
                            @endif

                        </div>


                        {{-- Read More --}}
                        <a
                            href="{{ route('blog.show', $post) }}"
                            class="inline-block mt-5 font-medium text-gray-900"
                        >
                            Read More →
                        </a>

                    </div>

                </article>

            @empty

                <div class="col-span-full text-center py-16">

                    <h2 class="text-xl font-semibold">
                        No blog posts found.
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Try another search or category.
                    </p>

                </div>

            @endforelse

        </div>


        {{-- Pagination --}}
        @if($posts->hasPages())

            <div class="mt-12">

                {{ $posts->links() }}

            </div>

        @endif

    </div>

</section>

@endsection