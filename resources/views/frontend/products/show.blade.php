@extends('frontend.layouts.app')

@section('title', $product->name)

@section('content')

<section class="py-20">

    <div class="max-w-6xl mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            {{-- Image --}}
            <div>

                @if($product->image)

                    <img
                        src="{{ Storage::url($product->image) }}"
                        alt="{{ $product->name }}"
                        class="w-full rounded-xl"
                    >

                @else

                    <div class="bg-gray-100 h-96 flex items-center justify-center rounded-xl">
                        No Image
                    </div>

                @endif

            </div>


            {{-- Details --}}
            <div>

                <p class="text-gray-500">
                    {{ $product->product_code }}
                </p>


                <h1 class="text-4xl font-bold mt-2">
                    {{ $product->name }}
                </h1>


                @if($product->category)

                    <p class="text-gray-500 mt-4">
                        Category:
                        {{ $product->category->name }}
                    </p>

                @endif


                @if($product->price !== null)

                    <p class="text-2xl font-bold mt-6">
                        ₹{{ number_format($product->price, 2) }}
                    </p>

                @endif


                @if($product->short_description)

                    <p class="text-lg text-gray-600 mt-6">
                        {{ $product->short_description }}
                    </p>

                @endif


                <div class="mt-8 text-gray-700 leading-8 whitespace-pre-line">

                    {{ $product->description }}

                </div>


                <div class="mt-8">

                    <a
                        href="{{ route('products.index') }}"
                        class="text-blue-600"
                    >
                        ← Back to Products
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection