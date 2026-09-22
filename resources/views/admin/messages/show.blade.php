@extends('admin.layouts.app')

@section('title', 'View Message')

@section('page-title', 'View Message')

@section('content')

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">


        {{-- Header --}}

        <div class="flex justify-between items-start mb-8">

            <div>

                <h1 class="text-2xl font-bold">
                    {{ $message->subject ?? 'Contact Message' }}
                </h1>

                <p class="text-gray-500 mt-2">
                    Received {{ $message->created_at->format('d M Y, h:i A') }}
                </p>

            </div>


            @if($message->status === 'read')

                <span class="text-green-600">
                    Read
                </span>

            @else

                <span class="text-red-600">
                    Unread
                </span>

            @endif

        </div>


        {{-- Sender Information --}}

        <div class="border-b pb-6 mb-6">

            <h2 class="font-semibold text-lg mb-4">
                Sender Information
            </h2>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <div>

                    <p class="text-sm text-gray-500">
                        Name
                    </p>

                    <p class="font-medium">
                        {{ $message->name }}
                    </p>

                </div>


                <div>

                    <p class="text-sm text-gray-500">
                        Email
                    </p>

                    <p class="font-medium">
                        {{ $message->email }}
                    </p>

                </div>


                <div>

                    <p class="text-sm text-gray-500">
                        Phone
                    </p>

                    <p class="font-medium">
                        {{ $message->phone ?? '—' }}
                    </p>

                </div>


                <div>

                    <p class="text-sm text-gray-500">
                        Subject
                    </p>

                    <p class="font-medium">
                        {{ $message->subject ?? '—' }}
                    </p>

                </div>

            </div>

        </div>


        {{-- Message --}}

        <div>

            <h2 class="font-semibold text-lg mb-4">
                Message
            </h2>

            <div class="bg-gray-50 rounded-lg p-6 whitespace-pre-line">

                {{ $message->message }}

            </div>

        </div>


        {{-- Actions --}}

        <div class="flex justify-between items-center mt-8">


            <a
                href="{{ route('admin.messages.index') }}"
                class="text-gray-600"
            >
                ← Back to Messages
            </a>


            <div class="flex gap-3">

                @if($message->status === 'read')

                    <form
                        action="{{ route('admin.messages.unread', $message) }}"
                        method="POST"
                    >

                        @csrf

                        @method('PATCH')

                        <button
                            class="bg-gray-200 px-5 py-3 rounded-lg"
                        >
                            Mark Unread
                        </button>

                    </form>

                @endif


                <form
                    action="{{ route('admin.messages.destroy', $message) }}"
                    method="POST"
                    onsubmit="return confirm('Delete this message?')"
                >

                    @csrf

                    @method('DELETE')

                    <button
                        class="bg-red-600 text-white px-5 py-3 rounded-lg"
                    >
                        Delete
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection