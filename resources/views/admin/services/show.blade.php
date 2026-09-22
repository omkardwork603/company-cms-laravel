@extends('admin.layouts.app')

@section('title', 'View Service')

@section('page-title', 'View Service')

@section('content')

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <h1 class="text-3xl font-bold text-gray-800">
            {{ $service->title }}
        </h1>

       
        {{-- Image --}}
        @if($service->image)
            <div class="mt-6">
                <img
                    src="{{ Storage::url($service->image) }}"
                    alt="{{ $service->title }}"
                    class="w-full max-w-lg rounded-lg border object-cover"
                >
            </div>
        @endif


        <div class="mt-6">

            <strong>
                Icon:
            </strong>

            {{ $service->icon ?: 'No icon' }}

        </div>


        <div class="mt-4">

            <strong>
                Display Order:
            </strong>

            {{ $service->display_order }}

        </div>


        <div class="mt-4">

            <strong>
                Status:
            </strong>

            @if($service->status)

                <span class="text-green-600">
                    Active
                </span>

            @else

                <span class="text-gray-500">
                    Draft
                </span>

            @endif

        </div>


        <div class="mt-8">

            <h2 class="text-xl font-bold mb-3">
                Short Description
            </h2>

            <p class="text-gray-600">
                {{ $service->short_description }}
            </p>

        </div>


        <div class="mt-8">

            <h2 class="text-xl font-bold mb-3">
                Description
            </h2>

            <div class="text-gray-600 whitespace-pre-line">
                {{ $service->description }}
            </div>

        </div>


        <div class="mt-8 flex gap-3">

            <a
                href="{{ route('admin.services.edit', $service) }}"
                class="bg-gray-900 text-white px-6 py-3 rounded-lg"
            >
                Edit Service
            </a>

            <a
                href="{{ route('admin.services.index') }}"
                class="bg-gray-200 px-6 py-3 rounded-lg"
            >
                Back
            </a>

        </div>

    </div>

</div>

@endsection
