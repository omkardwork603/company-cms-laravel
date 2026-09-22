@extends('admin.layouts.app')

@section('title', 'View Page')

@section('page-title', 'View Page')

@section('content')

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <div class="mb-6">

            <h1 class="text-3xl font-bold text-gray-800">
                {{ $page->title }}
            </h1>

            

        </div>


        <div class="mb-6">

            <span class="font-semibold">
                Status:
            </span>

            @if($page->status)

                <span class="text-green-600">
                    Active
                </span>

            @else

                <span class="text-gray-500">
                    Draft
                </span>

            @endif

        </div>


        <div class="border-t pt-6">

            <h2 class="font-semibold text-lg mb-3">
                Content
            </h2>

            <div class="prose max-w-none whitespace-pre-line">

                {{ $page->content }}

            </div>

        </div>


        <div class="mt-8">

            <a
                href="{{ route('admin.pages.edit', $page) }}"
                class="bg-gray-900 text-white px-6 py-3 rounded-lg"
            >
                Edit Page
            </a>

            <a
                href="{{ route('admin.pages.index') }}"
                class="ml-3 bg-gray-200 px-6 py-3 rounded-lg"
            >
                Back
            </a>

        </div>

    </div>

</div>

@endsection