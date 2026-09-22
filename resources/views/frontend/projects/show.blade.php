@extends('frontend.layouts.app')

@section('title', $project->title)

@section('content')

<section class="py-20">

    <div class="max-w-6xl mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            {{-- Image --}}
            <div>

                @if($project->featured_image)

                    <img
                        src="{{ Storage::url($project->featured_image) }}"
                        alt="{{ $project->title }}"
                        class="w-full rounded-xl"
                    >

                @else

                    <div class="bg-gray-100 h-96 rounded-xl flex items-center justify-center">
                        No Image
                    </div>

                @endif

            </div>


            {{-- Details --}}
            <div>

                @if($project->category)

                    <p class="text-gray-500">
                        {{ $project->category }}
                    </p>

                @endif


                <h1 class="text-4xl font-bold mt-2">
                    {{ $project->title }}
                </h1>


                @if($project->client_name)

                    <p class="mt-4 text-gray-600">
                        Client:
                        {{ $project->client_name }}
                    </p>

                @endif


                @if($project->short_description)

                    <p class="text-lg text-gray-600 mt-6">
                        {{ $project->short_description }}
                    </p>

                @endif


                <div class="mt-8 text-gray-700 leading-8 whitespace-pre-line">

                    {{ $project->description }}

                </div>


                @if($project->project_url)

                    <div class="mt-8">

                        <a
                            href="{{ $project->project_url }}"
                            target="_blank"
                            class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                        >
                            Visit Project
                        </a>

                    </div>

                @endif


                <div class="mt-8">

                    <a
                        href="{{ route('projects.index') }}"
                        class="text-blue-600"
                    >
                        ← Back to Projects
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection