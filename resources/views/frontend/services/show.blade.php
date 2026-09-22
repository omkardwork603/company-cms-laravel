@extends('frontend.layouts.app')

@section('title', $service->title)

@section('content')

<section class="py-20">

    <div class="max-w-5xl mx-auto px-6">

        <h1 class="text-4xl font-bold">
            {{ $service->title }}
        </h1>

        @if($service->image)

            <div class="mt-8">
                <img
                    src="{{ Storage::url($service->image) }}"
                    alt="{{ $service->title }}"
                    class="w-full max-w-2xl rounded-xl object-cover"
                >
            </div>

        @endif

        @if($service->short_description)

            <p class="text-xl text-gray-500 mt-4">
                {{ $service->short_description }}
            </p>

        @endif


        <div class="mt-10 text-gray-700 leading-8 whitespace-pre-line">

            {{ $service->description }}

        </div>


        <div class="mt-10">

            <a
                href="{{ route('services.index') }}"
                class="text-blue-600"
            >
                ← Back to Services
            </a>

        </div>

    </div>

</section>

@endsection
