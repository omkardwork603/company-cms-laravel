@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('page-title', 'Edit Product')

@section('content')

<div class="max-w-4xl">

    <div class="bg-white rounded-lg shadow p-8">

        <form
            action="{{ route('admin.products.update', $product) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            {{-- Product Code --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Product Code
                </label>

                <input
                    type="text"
                    name="product_code"
                    value="{{ old('product_code', $product->product_code) }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                @error('product_code')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Name --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Product Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $product->name) }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                @error('name')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Slug --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Slug
                </label>

                <input
                    type="text"
                    name="slug"
                    value="{{ old('slug', $product->slug) }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

            </div>


            {{-- Category --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Category
                </label>

                <select
                    name="category_id"
                    class="w-full border rounded-lg px-4 py-3"
                >

                    <option value="">
                        Select Category
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Price --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Price
                </label>

                <input
                    type="number"
                    name="price"
                    value="{{ old('price', $product->price) }}"
                    step="0.01"
                    min="0"
                    placeholder="0.00"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            {{-- Image --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Image
                </label>

                @if($product->image)
                    <div class="mb-3">
                        <img
                            src="{{ Storage::url($product->image) }}"
                            alt="{{ $product->name }}"
                            class="w-40 h-40 object-cover rounded-lg border"
                        >
                        <p class="text-gray-500 text-sm mt-1">
                            Current image. Upload a new one to replace it.
                        </p>
                    </div>
                @endif

                <input
                    type="file"
                    name="image"
                    accept="image/*"
                    class="w-full border rounded-lg px-4 py-3"
                >

                <p class="text-gray-500 text-sm mt-1">
                    Accepted formats: JPG, PNG, GIF, WEBP (max 2MB).
                </p>

                @error('image')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Short Description --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Short Description
                </label>

                <textarea
                    name="short_description"
                    rows="4"
                    class="w-full border rounded-lg px-4 py-3"
                >{{ old('short_description', $product->short_description) }}</textarea>

            </div>


            {{-- Description --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="10"
                    class="w-full border rounded-lg px-4 py-3"
                >{{ old('description', $product->description) }}</textarea>

            </div>


            {{-- Display Order --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Display Order
                </label>

                <input
                    type="number"
                    name="display_order"
                    value="{{ old('display_order', $product->display_order) }}"
                    min="0"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>


            {{-- Status --}}
            <div class="mb-6">

                <label class="block font-medium mb-2">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full border rounded-lg px-4 py-3"
                >

                    <option value="1"
                        {{ old('status', $product->status) ? 'selected' : '' }}>
                        Active
                    </option>

                    <option value="0"
                        {{ !old('status', $product->status) ? 'selected' : '' }}>
                        Draft
                    </option>

                </select>

            </div>


            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-gray-900 text-white px-6 py-3 rounded-lg"
                >
                    Update Product
                </button>

                <a
                    href="{{ route('admin.products.index') }}"
                    class="bg-gray-200 px-6 py-3 rounded-lg"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection