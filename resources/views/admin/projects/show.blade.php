@extends('admin.layouts.app')

@section('title', 'View Project')

@section('page-title', 'View Project')

@section('content')

<div class="max-w-5xl">

    <div class="bg-white rounded-lg shadow p-8">

        <h1 class="text-3xl font-bold text-gray-800">
            {{ $project->title }}
        </h1>

        {{-- Featured Image --}}
        @if($project->featured_image)
            <div class="mt-6">
                <img
                    src="{{ Storage::url($project->featured_image) }}"
                    alt="{{ $project->title }}"
                    class="w-full max-w-lg rounded-lg border object-cover"
                >
            </div>
        @endif


        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

            <div>

                <strong>
                    Client:
                </strong>

                <p class="text-gray-600 mt-1">
                    {{ $project->client_name ?? '—' }}
                </p>

            </div>


            <div>

                <strong>
                    Category:
                </strong>

                <p class="text-gray-600 mt-1">
                    {{ $project->category ?? '—' }}
                </p>

            </div>


            <div>

                <strong>
                    Display Order:
                </strong>

                <p class="text-gray-600 mt-1">
                    {{ $project->display_order }}
                </p>

            </div>


            <div>

                <strong>
                    Status:
                </strong>

                <p class="mt-1">

                    @if($project->status)

                        <span class="text-green-600">
                            Active
                        </span>

                    @else

                        <span class="text-gray-500">
                            Draft
                        </span>

                    @endif

                </p>

            </div>

        </div>


        @if($project->project_url)

            <div class="mt-6">

                <strong>
                    Project URL:
                </strong>

                <p class="mt-1">

                    <a
                        href="{{ $project->project_url }}"
                        target="_blank"
                        class="text-blue-600"
                    >
                        {{ $project->project_url }}
                    </a>

                </p>

            </div>

        @endif


        <div class="mt-8">

            <h2 class="text-xl font-bold mb-3">
                Short Description
            </h2>

            <p class="text-gray-600">
                {{ $project->short_description }}
            </p>

        </div>


        <div class="mt-8">

            <h2 class="text-xl font-bold mb-3">
                Description
            </h2>

            <div class="text-gray-600 whitespace-pre-line">
                {{ $project->description }}
            </div>

        </div>


        <div class="mt-8 flex gap-3">

            <a
                href="{{ route('admin.projects.edit', $project) }}"
                class="bg-gray-900 text-white px-6 py-3 rounded-lg"
            >
                Edit Project
            </a>

            <a
                href="{{ route('admin.projects.index') }}"
                class="bg-gray-200 px-6 py-3 rounded-lg"
            >
                Back
            </a>

        </div>

    </div>

</div>

@endsection