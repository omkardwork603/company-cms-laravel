@extends('frontend.layouts.app')

@section('title', 'Services')

@section('content')

<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <h1 class="text-4xl font-bold mb-12">
            Our Services
        </h1>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            @forelse($services as $service)

                <article class="border rounded-xl p-6">

                    @if($service->image)

                        <img
                            src="{{ Storage::url($service->image) }}"
                            alt="{{ $service->title }}"
                            class="w-full h-48 object-cover rounded-lg mb-5"
                        >

                    @endif


                    <h2 class="text-xl font-bold mb-3">

                        {{ $service->title }}

                    </h2>


                    <p class="text-gray-600 mb-5">

                        {{ Str::limit($service->description, 120) }}

                    </p>


                    <a
                        href="{{ route('services.show', $service->slug) }}"
                        class="font-semibold"
                    >
                        Read More →
                    </a>

                </article>

            @empty

                <p>No services available.</p>

            @endforelse

        </div>

    </div>

</section>

@endsection