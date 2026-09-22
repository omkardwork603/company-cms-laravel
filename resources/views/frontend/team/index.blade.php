{{-- @extends('frontend.layouts.app') --}}

@section('title', 'Our Team')

@section('content')

<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">

            <h1 class="text-4xl font-bold">
                Our Team
            </h1>

            <p class="text-gray-500 mt-4">
                Meet the people behind our company.
            </p>

        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">

            @forelse($teamMembers as $member)

                <div class="bg-white border rounded-xl overflow-hidden">

                    {{-- Image --}}
                    @if($member->profile_image)

                        <img
                            src="{{ asset('storage/' . $member->profile_image) }}"
                            alt="{{ $member->name }}"
                            class="w-full h-64 object-cover"
                        >

                    @else

                        <div class="w-full h-64 bg-gray-100 flex items-center justify-center">
                            No Image
                        </div>

                    @endif


                    <div class="p-5 text-center">

                        <h2 class="text-xl font-bold">
                            {{ $member->name }}
                        </h2>


                        @if($member->designation)

                            <p class="text-gray-500 mt-2">
                                {{ $member->designation }}
                            </p>

                        @endif


                        @if($member->department)

                            <p class="text-sm text-gray-400 mt-1">
                                {{ $member->department }}
                            </p>

                        @endif


                        <a
                            href="{{ route('team.show', $member) }}"
                            class="inline-block mt-5 text-blue-600"
                        >
                            View Profile →
                        </a>

                    </div>

                </div>

            @empty

                <div class="col-span-full text-center text-gray-500">
                    No team members available.
                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection