@extends('frontend.layouts.app')

@section('title', $page?->title ?? 'About Us')

@section('content')

<section class="py-20">

    <div class="max-w-5xl mx-auto px-6">

        <h1 class="text-4xl font-bold mb-8">
            {{ $page?->title ?? 'About Us' }}
        </h1>


        @if($page?->featured_image)

            <img
                src="{{ asset('storage/' . $page->featured_image) }}"
                alt="{{ $page->title }}"
                class="w-full rounded-xl mb-10"
            >

        @endif


        <div class="prose max-w-none">

            @if(!empty($page?->content))
                {!! $page->content !!}
            @elseif(!empty($settings?->details))
                <p class="text-lg text-gray-700 leading-relaxed">
                    {{ $settings->details }}
                </p>
            @else
                <p class="text-lg text-gray-600 leading-relaxed">
                    Welcome to {{ $settings?->site_name ?? $settings?->company_name ?? 'Our Company' }}.
                    {{ $settings?->site_tagline ?? 'Building Better Solutions for Your Business' }}. We provide innovative solutions designed to help businesses grow, improve performance and achieve long-term success.
                </p>
            @endif

        </div>

    </div>

</section>

@endsection