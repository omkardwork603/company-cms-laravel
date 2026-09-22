@extends('frontend.layouts.app')

@section('title', $post->title)

@section('content')

<article class="py-16">

    <div class="max-w-4xl mx-auto px-6">


        {{-- Category --}}
        @if($post->category)

            <a
                href="{{ route('blog.index', ['category' => $post->category->slug]) }}"
                class="text-blue-600"
            >
                {{ $post->category->name }}
            </a>

        @endif


        {{-- Title --}}
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mt-4">

            {{ $post->title }}

        </h1>


        {{-- Meta --}}
        <div class="flex flex-wrap gap-5 text-gray-500 mt-5">

            <span>
                By {{ $post->author ?? 'Admin' }}
            </span>

            @if($post->published_at)

                <span>
                    {{ $post->published_at->format('F d, Y') }}
                </span>

            @endif

        </div>


        {{-- Featured Image --}}
        @if($post->featured_image)

            <div class="mt-10">

                <img
                    src="{{ Storage::url($post->featured_image) }}"
                    alt="{{ $post->title }}"
                    class="w-full rounded-xl"
                >

            </div>

        @endif


        {{-- Excerpt --}}
        @if($post->excerpt)

            <div class="mt-10 text-xl text-gray-600">

                {{ $post->excerpt }}

            </div>

        @endif


        {{-- Content --}}
        <div class="mt-10 prose prose-lg max-w-none">

            {!! nl2br(e($post->content)) !!}

        </div>


        {{-- Back --}}
        <div class="mt-12">

            <a
                href="{{ route('blog.index') }}"
                class="text-blue-600"
            >
                ← Back to Blog
            </a>

        </div>

    </div>

</article>


{{-- Related Posts --}}
@if($relatedPosts->count())

<section class="py-16 bg-gray-50">

    <div class="max-w-7xl mx-auto px-6">

        <h2 class="text-3xl font-bold mb-8">
            Related Posts
        </h2>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            @foreach($relatedPosts as $related)

                <article class="bg-white border rounded-xl overflow-hidden">

                    @if($related->featured_image)

                        <img
                            src="{{ asset('storage/' . $related->featured_image) }}"
                            alt="{{ $related->title }}"
                            class="w-full h-48 object-cover"
                        >

                    @endif


                    <div class="p-6">

                        <h3 class="text-xl font-bold">

                            <a
                                href="{{ route('blog.show', $related) }}"
                            >
                                {{ $related->title }}
                            </a>

                        </h3>


                        @if($related->excerpt)

                            <p class="text-gray-600 mt-3">
                                {{ $related->excerpt }}
                            </p>

                        @endif


                        <a
                            href="{{ route('blog.show', $related) }}"
                            class="inline-block mt-4 text-blue-600"
                        >
                            Read More →
                        </a>

                    </div>

                </article>

            @endforeach

        </div>

    </div>

</section>

@endif

@endsection