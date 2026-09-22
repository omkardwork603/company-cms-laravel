@extends('frontend.layouts.app')

@section('title', $settings?->company_name ?? 'Home')

@section('content')

{{-- =========================================================
     HERO SECTION
========================================================= --}}

<section class="bg-gray-50">

    <div class="max-w-7xl mx-auto px-6 py-24">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            {{-- Hero Content --}}
            <div>

                <span class="inline-block mb-5 text-sm font-semibold uppercase tracking-wider text-gray-500">
                    Welcome to {{ $settings?->site_name ?? $settings?->company_name ?? 'Our Company' }}
                </span>

                <h1 class="text-4xl md:text-6xl font-bold leading-tight">
                    {{ $settings?->site_tagline ?? $settings?->tagline ?? 'Building Better Solutions for Your Business' }}
                </h1>

                <p class="mt-6 text-lg text-gray-600 max-w-xl">
                    {{ $settings?->details ?? 'We provide innovative solutions designed to help businesses grow, improve performance and achieve long-term success.' }}
                </p>

                <div class="mt-8 flex flex-wrap gap-4">

                    <a
                        href="{{ route('services.index') }}"
                        class="px-6 py-3 bg-gray-900 text-white rounded-lg font-semibold hover:bg-gray-700 transition"
                    >
                        Our Services
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="px-6 py-3 border border-gray-300 rounded-lg font-semibold hover:bg-gray-100 transition"
                    >
                        Contact Us
                    </a>

                </div>

            </div>


            {{-- Hero Image --}}
            <div>

                @if(!empty($settings?->hero_image))

                    <img
                        src="{{ asset('storage/' . $settings->hero_image) }}"
                        alt="{{ $settings?->company_name ?? 'Company' }}"
                        class="w-full aspect-video object-cover rounded-2xl"
                    >

                @else

                    <div class="aspect-video bg-gray-200 rounded-2xl flex items-center justify-center">
                        <span class="text-gray-500">
                            Company Image
                        </span>
                    </div>

                @endif

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     COMPANY DETAILS SECTION
========================================================= --}}

@if(!empty($settings?->details))
<section class="py-16 bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-6">

        <div class="max-w-4xl mx-auto text-center">

            <span class="text-sm font-semibold uppercase tracking-wider text-blue-600">
                Company Details
            </span>

            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2 mb-6">
                About {{ $settings?->site_name ?? 'Our Company' }}
            </h2>

            {{-- <div class="text-lg text-gray-600 leading-relaxed space-y-4 text-justify md:text-center">
                {!! nl2br(e($settings->details)) !!}
            </div> --}}

        </div>

    </div>

</section>
@endif


{{-- =========================================================
     ABOUT SECTION
========================================================= --}}

<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            {{-- About Image --}}
            <div>

                @if(!empty($aboutPage?->featured_image))

                    <img
                        src="{{ asset('storage/' . $aboutPage->featured_image) }}"
                        alt="{{ $aboutPage->title ?? 'About Us' }}"
                        class="w-auto aspect-square object-cover rounded-2xl shadow-md"
                    >

                @elseif(!empty($settings?->hero_image))

                    <img
                        src="{{ asset('storage/' . $settings->hero_image) }}"
                        alt="About Us"
                        class="w-full h-96 aspect-square object-cover rounded-2xl shadow-md"
                    >

                @else

                    <div class="aspect-square bg-gray-100 rounded-2xl flex items-center justify-center">

                        <span class="text-gray-400 font-medium">
                            About Us Image
                        </span>

                    </div>

                @endif

            </div>


            {{-- About Content --}}
            <div>

                <span class="text-sm font-semibold uppercase tracking-wider text-blue-600">
                    About Us
                </span>

                <h2 class="text-3xl md:text-4xl font-bold mt-3 text-gray-900">
                    {{ $aboutPage?->title ?? 'We help businesses move forward' }}
                </h2>

                <div class="mt-5 text-gray-600 leading-relaxed space-y-4 prose max-w-none">
                    @if(!empty($aboutPage?->content))
                        {!! Str::limit(strip_tags($aboutPage->content), 300) !!}
                    @elseif(!empty($settings?->details))
                        <p>{{ $settings->details }}</p>
                    @else
                        <p>
                            We combine technology, creativity and business
                            knowledge to create reliable solutions for our
                            customers.
                        </p>
                    @endif
                </div>

                <a
                    href="{{ route('about') }}"
                    class="inline-flex items-center gap-2 mt-7 px-5 py-2.5 rounded-lg bg-gray-900 text-white font-semibold text-sm hover:bg-gray-800 transition"
                >
                    <span>Read More</span>
                    <span>→</span>
                </a>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     SERVICES SECTION
========================================================= --}}

<section class="py-20 bg-gray-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center max-w-2xl mx-auto mb-12">

            <span class="text-sm font-semibold uppercase text-gray-500">
                What We Do
            </span>

            <h2 class="text-3xl md:text-4xl font-bold mt-3">
                Our Services
            </h2>

            <p class="mt-4 text-gray-600">
                Professional services designed for modern businesses.
            </p>

        </div>


        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($services as $service)

                <article class="bg-white border rounded-xl overflow-hidden hover:shadow-lg transition">

                    {{-- Service Image --}}
                    @if($service->image)

                        <img
                            src="{{ Storage::url($service->image) }}"
                            alt="{{ $service->title }}"
                            class="w-full h-48 object-cover"
                        >

                    @else

                        <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                            <span class="text-gray-400">
                                No Image
                            </span>
                        </div>

                    @endif


                    <div class="p-6">

                        <h3 class="text-xl font-bold">
                            {{ $service->title }}
                        </h3>

                        <p class="mt-3 text-gray-600">
                            {{ Str::limit(strip_tags($service->description ?? ''), 120) }}
                        </p>

                        <a
                            href="{{ route('services.show', $service->slug) }}"
                            class="inline-block mt-5 font-semibold hover:underline"
                        >
                            Learn More →
                        </a>

                    </div>

                </article>

            @empty

                <div class="col-span-full text-center py-10">

                    <p class="text-gray-500">
                        No services available.
                    </p>

                </div>

            @endforelse

        </div>


        <div class="text-center mt-10">

            <a
                href="{{ route('services.index') }}"
                class="font-semibold hover:underline"
            >
                View All Services →
            </a>

        </div>

    </div>

</section>


{{-- =========================================================
     PRODUCTS SECTION
========================================================= --}}

<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-end justify-between mb-10">

            <div>

                <span class="text-sm font-semibold uppercase text-gray-500">
                    Our Products
                </span>

                <h2 class="text-3xl font-bold mt-2">
                    Featured Products
                </h2>

            </div>


            <a
                href="{{ route('products.index') }}"
                class="font-semibold hidden md:block hover:underline"
            >
                View All →
            </a>

        </div>


        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($products as $product)

                <article class="border rounded-xl overflow-hidden hover:shadow-lg transition">

                    {{-- Product Image --}}
                    @if($product->image)

                        <img
                            src="{{ Storage::url($product->image) }}"
                            alt="{{ $product->name }}"
                            class="w-full h-56 object-cover"
                        >

                    @else

                        <div class="w-full h-56 bg-gray-100 flex items-center justify-center">
                            <span class="text-gray-400">
                                No Image
                            </span>
                        </div>

                    @endif


                    <div class="p-6">

                        <h3 class="text-xl font-bold">
                            {{ $product->name }}
                        </h3>

                        <p class="mt-3 text-gray-600">
                            {{ Str::limit(strip_tags($product->description ?? ''), 100) }}
                        </p>

                    </div>

                </article>

            @empty

                <div class="col-span-full text-center py-10">

                    <p class="text-gray-500">
                        No products available.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>


{{-- =========================================================
     PROJECTS SECTION
========================================================= --}}

<section class="py-20 bg-gray-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">

            <span class="text-sm font-semibold uppercase text-gray-500">
                Our Work
            </span>

            <h2 class="text-3xl md:text-4xl font-bold mt-2">
                Recent Projects
            </h2>

        </div>


        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($projects as $project)

                <article class="bg-white rounded-xl overflow-hidden border hover:shadow-lg transition">

                    {{-- Project Image --}}
                    @if($project->featured_image)

                        <img
                            src="{{ Storage::url($project->featured_image) }}"
                            alt="{{ $project->title }}"
                            class="w-full h-56 object-cover"
                        >

                    @else

                        <div class="w-full h-56 bg-gray-100 flex items-center justify-center">
                            <span class="text-gray-400">
                                No Image
                            </span>
                        </div>

                    @endif


                    <div class="p-6">

                        <h3 class="text-xl font-bold">
                            {{ $project->title }}
                        </h3>

                        <p class="mt-3 text-gray-600">
                            {{ Str::limit(strip_tags($project->description ?? ''), 100) }}
                        </p>

                    </div>

                </article>

            @empty

                <div class="col-span-full text-center py-10">

                    <p class="text-gray-500">
                        No projects available.
                    </p>

                </div>

            @endforelse

        </div>


        <div class="text-center mt-10">

            <a
                href="{{ route('projects.index') }}"
                class="font-semibold hover:underline"
            >
                View All Projects →
            </a>

        </div>

    </div>

</section>


{{-- =========================================================
     BLOG SECTION
========================================================= --}}

<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-end justify-between mb-10">

            <div>

                <span class="text-sm font-semibold uppercase text-gray-500">
                    Latest Articles
                </span>

                <h2 class="text-3xl md:text-4xl font-bold mt-2">
                    From Our Blog
                </h2>

            </div>


            <a
                href="{{ route('blog.index') }}"
                class="font-semibold hidden md:block hover:underline"
            >
                View All →
            </a>

        </div>


        @if(isset($posts) && $posts->count())

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($posts as $post)

                    <article class="border rounded-xl overflow-hidden hover:shadow-lg transition">

                        @if($post->featured_image)

                            <img
                                src="{{ asset('storage/' . $post->featured_image) }}"
                                alt="{{ $post->title }}"
                                class="w-full h-52 object-cover"
                            >

                        @else

                            <div class="w-full h-52 bg-gray-100 flex items-center justify-center">
                                <span class="text-gray-400">
                                    No Image
                                </span>
                            </div>

                        @endif


                        <div class="p-6">

                            @if($post->category)

                                <span class="text-sm text-gray-500">
                                    {{ $post->category->name }}
                                </span>

                            @endif

                            <h3 class="text-xl font-bold mt-2">
                                {{ $post->title }}
                            </h3>

                            <p class="mt-3 text-gray-600">
                                {{ Str::limit(strip_tags($post->excerpt ?? $post->content ?? ''), 120) }}
                            </p>

                            <a
                                href="{{ route('blog.show', $post->slug) }}"
                                class="inline-block mt-5 font-semibold hover:underline"
                            >
                                Read More →
                            </a>

                        </div>

                    </article>

                @endforeach

            </div>

        @else

            <div class="text-center py-10">

                <p class="text-gray-500">
                    No blog posts available.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- =========================================================
     CALL TO ACTION
========================================================= --}}

<section class="py-20">

    <div class="max-w-5xl mx-auto px-6">

        <div class="bg-gray-900 text-white rounded-2xl p-10 md:p-16 text-center">

            <h2 class="text-3xl md:text-4xl font-bold">
                Ready to work with us?
            </h2>

            <p class="mt-4 text-gray-300 max-w-2xl mx-auto">
                Let's discuss how we can help your business
                achieve its goals.
            </p>

            <a
                href="{{ route('contact') }}"
                class="inline-block mt-8 px-7 py-3 bg-white text-gray-900 rounded-lg font-semibold hover:bg-gray-100 transition"
            >
                Contact Us
            </a>

        </div>

    </div>

</section>

@endsection
