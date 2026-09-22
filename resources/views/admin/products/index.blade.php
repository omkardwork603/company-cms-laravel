@extends('admin.layouts.app')

@section('title', 'Products')

@section('page-title', 'Products')

@section('content')

<div>

    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Products
            </h1>

            <p class="text-gray-500 mt-1">
                Manage your company products.
            </p>
        </div>

        <a
            href="{{ route('admin.products.create') }}"
            class="bg-gray-900 text-white px-5 py-3 rounded-lg"
        >
            + Add Product
        </a>

    </div>


    @if(session('success'))

        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>

    @endif


    <div class="bg-white rounded-lg shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-50 border-b">

                <tr>

                    <th class="text-left px-6 py-4">
                        #
                    </th>

                    <th class="text-left px-6 py-4">
                        Code
                    </th>

                    <th class="text-left px-6 py-4">
                        Product
                    </th>

                    <th class="text-left px-6 py-4">
                        Image
                    </th>

                    <th class="text-left px-6 py-4">
                        Category
                    </th>

                    <th class="text-left px-6 py-4">
                        Price
                    </th>

                    <th class="text-left px-6 py-4">
                        Status
                    </th>

                    <th class="text-right px-6 py-4">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($products as $product)

                    <tr class="border-b">

                        <td class="px-6 py-4">
                            {{ $product->id }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $product->product_code }}
                        </td>

                        <td class="px-6 py-4 font-medium">
                            {{ $product->name }}
                        </td>

                        <td class="px-6 py-4">
                            @if($product->image)
                                <img
                                    src="{{ Storage::url($product->image) }}"
                                    alt="{{ $product->name }}"
                                    class="w-12 h-12 object-cover rounded-lg border"
                                >
                            @else
                                <span class="text-gray-400 text-sm">No image</span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            {{ $product->category?->name ?? '—' }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $product->price !== null ? '₹' . number_format($product->price, 2) : '—' }}
                        </td>

                        <td class="px-6 py-4">

                            @if($product->status)

                                <span class="px-3 py-1 text-sm bg-green-100 text-green-700 rounded-full">
                                    Active
                                </span>

                            @else

                                <span class="px-3 py-1 text-sm bg-gray-100 text-gray-600 rounded-full">
                                    Draft
                                </span>

                            @endif

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-end gap-3">

                                {{-- <a
                                    href="{{ $product->frontend_url }}"
                                    target="_blank"
                                    class="text-emerald-600 hover:underline"
                                >
                                    //
                                </a> --}}

                                <a
                                    href="{{ route('admin.products.show', $product) }}"
                                    class="text-blue-600"
                                >
                                    View
                                </a>

                                <a
                                    href="{{ route('admin.products.edit', $product) }}"
                                    class="text-indigo-600"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.products.destroy', $product) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this product?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="text-red-600"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="8"
                            class="px-6 py-10 text-center text-gray-500"
                        >
                            No products found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <div class="mt-6">
        {{ $products->links() }}
    </div>

</div>

@endsection