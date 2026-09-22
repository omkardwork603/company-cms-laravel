@extends('frontend.layouts.app')

@section('title', 'Products')

@section('content')

<section class="py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">

            <h1 class="text-4xl font-bold">
                Our Products
            </h1>

            <p class="text-gray-500 mt-4">
                Explore our products.
            </p>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            @forelse($products as $product)

                <div class="border rounded-xl overflow-hidden">

                    @if($product->image)

                        <img
                            src="{{ Storage::url($product->image) }}"
                            alt="{{ $product->name }}"
                            class="w-full h-56 object-cover"
                        >

                    @endif


                    <div class="p-6">

                        <p class="text-sm text-gray-500">
                            {{ $product->product_code }}
                        </p>


                        <h2 class="text-xl font-bold mt-2">
                            {{ $product->name }}
                        </h2>


                        @if($product->category)

                            <p class="text-sm text-gray-500 mt-2">
                                {{ $product->category->name }}
                            </p>

                        @endif


                        @if($product->price !== null)

                            <p class="font-semibold mt-4">
                                ₹{{ number_format($product->price, 2) }}
                            </p>

                        @endif


                        <p class="text-gray-600 mt-3">
                            {{ $product->short_description }}
                        </p>


                        <a
                            href="{{ route('products.show', $product) }}"
                            class="inline-block mt-5 text-blue-600"
                        >
                            View Product →
                        </a>

                    </div>

                </div>

            @empty

                <div class="col-span-full text-center text-gray-500">
                    No products available.
                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection