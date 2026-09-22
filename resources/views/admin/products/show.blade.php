@extends('admin.layouts.app')

@section('title', 'View Product')

@section('page-title', 'View Product')

@section('content')

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <h1 class="text-3xl font-bold">
            {{ $product->name }}
        </h1>

        {{-- Image --}}
        @if($product->image)
            <div class="mt-6">
                <img
                    src="{{ Storage::url($product->image) }}"
                    alt="{{ $product->name }}"
                    class="w-full max-w-lg rounded-lg border object-cover"
                >
            </div>
        @endif


        <div class="mt-6">

            <strong>Category:</strong>

            {{ $product->category?->name ?? '—' }}

        </div>


        <div class="mt-4">

            <strong>Price:</strong>

            {{ $product->price !== null
                ? '₹' . number_format($product->price, 2)
                : '—'
            }}

        </div>


        <div class="mt-4">

            <strong>Status:</strong>

            @if($product->status)

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
                {{ $product->short_description }}
            </p>

        </div>


        <div class="mt-8">

            <h2 class="text-xl font-bold mb-3">
                Description
            </h2>

            <div class="text-gray-600 whitespace-pre-line">
                {{ $product->description }}
            </div>

        </div>


        <div class="mt-8 flex gap-3">

            <a
                href="{{ route('admin.products.edit', $product) }}"
                class="bg-gray-900 text-white px-6 py-3 rounded-lg"
            >
                Edit Product
            </a>

            <a
                href="{{ route('admin.products.index') }}"
                class="bg-gray-200 px-6 py-3 rounded-lg"
            >
                Back
            </a>

        </div>

    </div>

</div>

@endsection