<nav>

    <ul class="flex items-center gap-6">

        @if($headerMenu)

            @foreach($headerMenu->items as $item)

                <li class="relative">

                    <a
                        href="{{ $item->url ?: '#' }}"
                        target="{{ $item->target }}"
                        class="text-gray-700 hover:text-black"
                    >
                        {{ $item->title }}
                    </a>


                    @if($item->children->count())

                        <ul class="absolute hidden bg-white shadow-lg rounded-lg p-3 w-56">

                            @foreach($item->children as $child)

                                <li>

                                    <a
                                        href="{{ $child->url ?: '#' }}"
                                        target="{{ $child->target }}"
                                        class="block px-3 py-2 hover:bg-gray-100 rounded"
                                    >
                                        {{ $child->title }}
                                    </a>

                                </li>

                            @endforeach

                        </ul>

                    @endif

                </li>

            @endforeach

        @endif

    </ul>

</nav>