@extends('frontend.layouts.app')

@section('title', 'Projects')

@section('content')

<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">

            <h1 class="text-4xl font-bold">
                Our Projects
            </h1>

            <p class="text-gray-500 mt-4">
                Explore our latest projects and work.
            </p>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            @forelse($projects as $project)

                <div class="border rounded-xl overflow-hidden">

                    @if($project->featured_image)

                        <img
                            src="{{ Storage::url($project->featured_image) }}"
                            alt="{{ $project->title }}"
                            class="w-full h-56 object-cover"
                        >

                    @else

                        <div class="w-full h-56 bg-gray-100 flex items-center justify-center">
                            No Image
                        </div>

                    @endif


                    <div class="p-6">

                        @if($project->category)

                            <p class="text-sm text-gray-500">
                                {{ $project->category }}
                            </p>

                        @endif


                        <h2 class="text-xl font-bold mt-2">
                            {{ $project->title }}
                        </h2>


                        @if($project->client_name)

                            <p class="text-sm text-gray-500 mt-2">
                                Client: {{ $project->client_name }}
                            </p>

                        @endif


                        <p class="text-gray-600 mt-4">
                            {{ $project->short_description }}
                        </p>


                        <a
                            href="{{ route('projects.show', $project) }}"
                            class="inline-block mt-5 text-blue-600"
                        >
                            View Project →
                        </a>

                    </div>

                </div>

            @empty

                <div class="col-span-full text-center text-gray-500">
                    No projects available.
                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection