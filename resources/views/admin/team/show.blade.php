@extends('admin.layouts.app')

@section('title', 'View Team Member')

@section('page-title', 'View Team Member')

@section('content')

<div class="max-w-5xl">

    <div class="bg-white rounded-lg shadow p-8">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- Image --}}
            <div>

                @if($team->profile_image)

                    <img
                        src="{{ asset('storage/' . $team->profile_image) }}"
                        alt="{{ $team->name }}"
                        class="w-full rounded-xl"
                    >

                @else

                    <div class="h-64 bg-gray-100 rounded-xl flex items-center justify-center">
                        No Image
                    </div>

                @endif

            </div>


            {{-- Details --}}
            <div class="md:col-span-2">

                <h1 class="text-3xl font-bold text-gray-800">
                    {{ $team->name }}
                </h1>


                @if($team->designation)

                    <p class="text-lg text-gray-500 mt-2">
                        {{ $team->designation }}
                    </p>

                @endif


                @if($team->department)

                    <p class="text-gray-500 mt-2">
                        {{ $team->department }}
                    </p>

                @endif


                <div class="mt-6">

                    <strong>
                        Email:
                    </strong>

                    <p class="text-gray-600">
                        {{ $team->email ?? '—' }}
                    </p>

                </div>


                <div class="mt-4">

                    <strong>
                        Phone:
                    </strong>

                    <p class="text-gray-600">
                        {{ $team->phone ?? '—' }}
                    </p>

                </div>


                <div class="mt-4">

                    <strong>
                        Status:
                    </strong>

                    @if($team->status)

                        <span class="text-green-600">
                            Active
                        </span>

                    @else

                        <span class="text-gray-500">
                            Draft
                        </span>

                    @endif

                </div>

            </div>

        </div>


        {{-- Bio --}}
        <div class="mt-10">

            <h2 class="text-xl font-bold mb-3">
                Biography
            </h2>

            <div class="text-gray-600 whitespace-pre-line">
                {{ $team->bio }}
            </div>

        </div>


        {{-- Social Links --}}
        <div class="mt-8">

            <h2 class="text-xl font-bold mb-4">
                Social Links
            </h2>

            <div class="flex gap-4">

                @if($team->linkedin_url)

                    <a
                        href="{{ $team->linkedin_url }}"
                        target="_blank"
                        class="text-blue-600"
                    >
                        LinkedIn
                    </a>

                @endif


                @if($team->twitter_url)

                    <a
                        href="{{ $team->twitter_url }}"
                        target="_blank"
                        class="text-blue-600"
                    >
                        Twitter / X
                    </a>

                @endif


                @if($team->facebook_url)

                    <a
                        href="{{ $team->facebook_url }}"
                        target="_blank"
                        class="text-blue-600"
                    >
                        Facebook
                    </a>

                @endif

            </div>

        </div>


        {{-- Buttons --}}
        <div class="mt-10 flex gap-3">

            <a
                href="{{ route('admin.team.edit', $team) }}"
                class="bg-gray-900 text-white px-6 py-3 rounded-lg"
            >
                Edit Team Member
            </a>

            <a
                href="{{ route('admin.team.index') }}"
                class="bg-gray-200 px-6 py-3 rounded-lg"
            >
                Back
            </a>

        </div>

    </div>

</div>

@endsection