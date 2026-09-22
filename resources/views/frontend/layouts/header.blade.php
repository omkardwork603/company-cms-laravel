<header class="border-b bg-white" style="position: sticky; top: 0px;">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between h-20">


            {{-- LOGO --}}

            <a
                href="{{ url('/') }}"
                class="flex items-center"
            >

                @if($settings?->logo)

                    <img
                        src="{{ asset('storage/' . $settings->logo) }}"
                        alt="{{ $settings?->site_name }}"
                        class="h-12 w-auto"
                    >

                @else

                    <span class="text-xl font-bold">
                        {{ $settings?->site_name ?? 'Company' }}
                    </span>

                @endif

            </a>


            {{-- NAVIGATION --}}

            <nav>

                <ul class="flex items-center gap-8">

                    @if(isset($headerMenu) && $headerMenu->items && $headerMenu->items->count() > 0)

                        @foreach($headerMenu->items as $item)

                            <li>

                                <a
                                    href="{{ str_starts_with($item->url, 'http') || str_starts_with($item->url, '/') ? $item->url : url($item->url) }}"
                                    @if(!empty($item->target)) target="{{ $item->target }}" @endif
                                    class="text-gray-700 hover:text-black font-medium transition"
                                >
                                    {{ $item->title }}
                                </a>

                            </li>

                        @endforeach

                    @elseif(isset($menus) && $menus->count() > 0 && $menus->first()->items->count() > 0)

                        @foreach($menus->first()->items as $item)

                            <li>

                                <a
                                    href="{{ str_starts_with($item->url, 'http') || str_starts_with($item->url, '/') ? $item->url : url($item->url) }}"
                                    @if(!empty($item->target)) target="{{ $item->target }}" @endif
                                    class="text-gray-700 hover:text-black font-medium transition"
                                >
                                    {{ $item->title }}
                                </a>

                            </li>

                        @endforeach

                    @else

                        <li><a href="{{ route('home') }}" class="text-gray-700 hover:text-black font-medium">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-700 hover:text-black font-medium">About</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-700 hover:text-black font-medium">Services</a></li>
                        <li><a href="{{ route('products') }}" class="text-gray-700 hover:text-black font-medium">Products</a></li>
                        <li><a href="{{ route('projects') }}" class="text-gray-700 hover:text-black font-medium">Projects</a></li>
                        <li><a href="{{ route('blog') }}" class="text-gray-700 hover:text-black font-medium">Blog</a></li>

                    @endif

                </ul>

            </nav>


            {{-- CONTACT BUTTON --}}

            <a
                href="{{ route('contact') }}"
                class="bg-gray-900 text-white px-5 py-3 rounded-lg"
            >
                Contact Us
            </a>

        </div>

    </div>

</header>