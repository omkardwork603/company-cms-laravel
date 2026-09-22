{{-- @extends('frontend.layouts.app') --}}

@section('title', $teamMember->name)

@section('content')

<section class="py-20">

    <div class="max-w-5xl mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            {{-- Image --}}
            <div>

                @if($teamMember->profile_image)

                    <img
                        src="{{ asset('storage/' . $teamMember->profile_image) }}"
                        alt="{{ $teamMember->name }}"
                        class="w-full rounded-xl"
                    >

                @else

                    <div class="h-80 bg-gray-100 rounded-xl flex items-center justify-center">
                        No Image
                    </div>

                @endif

            </div>


            {{-- Details --}}
            <div class="md:col-span-2">

                <h1 class="text-4xl font-bold">
                    {{ $teamMember->name }}
                </h1>


                @if($teamMember->designation)

                    <p class="text-xl text-gray-500 mt-3">
                        {{ $teamMember->designation }}
                    </p>

                @endif


                @if($teamMember->department)

                    <p class="text-gray-500 mt-2">
                        {{ $teamMember->department }}
                    </p>

                @endif


                @if($teamMember->bio)

                    <div class="mt-8 text-gray-700 leading-8 whitespace-pre-line">

                        {{ $teamMember->bio }}

                    </div>

                @endif


                {{-- Contact --}}
                <div class="mt-8 space-y-3">

                    @if($teamMember->email)

                        <p>
                            <strong>Email:</strong>
                            {{ $teamMember->email }}
                        </p>

                    @endif


                    @if($teamMember->phone)

                        <p>
                            <strong>Phone:</strong>
                            {{ $teamMember->phone }}
                        </p>

                    @endif

                </div>


                {{-- Social --}}
                <div class="flex gap-5 mt-8">

                    @if($teamMember->linkedin_url)

                        <a
                            href="{{ $teamMember->linkedin_url }}"
                            target="_blank"
                            class="text-blue-600"
                        >
                            LinkedIn
                        </a>

                    @endif


                    @if($teamMember->twitter_url)

                        <a
                            href="{{ $teamMember->twitter_url }}"
                            target="_blank"
                            class="text-blue-600"
                        >
                            Twitter / X
                        </a>

                    @endif


                    @if($teamMember->facebook_url)

                        <a
                            href="{{ $teamMember->facebook_url }}"
                            target="_blank"
                            class="text-blue-600"
                        >
                            Facebook
                        </a>

                    @endif

                </div>


                <div class="mt-10">

                    <a
                        href="{{ route('team.index') }}"
                        class="text-blue-600"
                    >
                        ← Back to Team
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection