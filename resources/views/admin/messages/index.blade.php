@extends('admin.layouts.app')

@section('title', 'Messages')

@section('page-title', 'Messages')

@section('content')

<div>

    <div class="mb-6">

        <h1 class="text-2xl font-bold">
            Contact Messages
        </h1>

        <p class="text-gray-500">
            Manage messages received from the website.
        </p>

    </div>


    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif


    <div class="bg-white rounded-lg shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-50">

                <tr>

                    <th class="text-left p-4">
                        Name
                    </th>

                    <th class="text-left p-4">
                        Email
                    </th>

                    <th class="text-left p-4">
                        Subject
                    </th>

                    <th class="text-left p-4">
                        Status
                    </th>

                    <th class="text-left p-4">
                        Date
                    </th>

                    <th class="text-right p-4">
                        Action
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($messages as $message)

                    <tr class="border-t">

                        <td class="p-4 font-medium">
                            {{ $message->name }}
                        </td>

                        <td class="p-4">
                            {{ $message->email }}
                        </td>

                        <td class="p-4">
                            {{ $message->subject ?? '—' }}
                        </td>

                        <td class="p-4">

                            @if($message->status === 'unread')

                                <span class="text-red-600 font-medium">
                                    Unread
                                </span>

                            @else

                                <span class="text-green-600">
                                    Read
                                </span>

                            @endif

                        </td>

                        <td class="p-4 text-gray-500">

                            {{ $message->created_at->format('d M Y') }}

                        </td>

                        <td class="p-4">

                            <div class="flex justify-end gap-4">

                                <a
                                    href="{{ route('admin.messages.show', $message) }}"
                                    class="text-blue-600"
                                >
                                    View
                                </a>


                                <form
                                    action="{{ route('admin.messages.destroy', $message) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this message?')"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button class="text-red-600">
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="p-8 text-center text-gray-500"
                        >
                            No messages found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <div class="mt-6">

        {{ $messages->links() }}

    </div>

</div>

@endsection