<footer class="bg-gray-900 text-white mt-20">

    <div class="max-w-7xl mx-auto px-6 py-12">

        {{-- FOOTER COLUMNS --}}
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10">

            {{-- COMPANY --}}
            <div class="md:col-span-5">

                <h2 class="text-2xl font-bold mb-4">
                    {{ $settings?->site_name ?? 'Company' }}
                </h2>

                @if($settings?->details)
                    <p class="text-gray-300 leading-relaxed" style="text-align: justify">
                        {{ $settings->details }}
                    </p>
                @endif

            </div>


            {{-- QUICK LINKS --}}
            <div class="md:col-span-3 ml-[60px]">

                <h3 class="text-lg font-semibold mb-4">
                    Quick Links
                </h3>

                <ul class="space-y-2">

                    @if(isset($footerMenu) && $footerMenu->items && $footerMenu->items->count() > 0)

                        @foreach($footerMenu->items as $item)

                            <li>
                                <a
                                    href="{{ str_starts_with($item->url, 'http') || str_starts_with($item->url, '/') ? $item->url : url($item->url) }}"
                                    @if(!empty($item->target))
                                        target="{{ $item->target }}"
                                    @endif
                                    class="text-gray-300 hover:text-white transition"
                                >
                                    {{ $item->title }}
                                </a>
                            </li>

                        @endforeach

                    @elseif(isset($headerMenu) && $headerMenu->items && $headerMenu->items->count() > 0)

                        @foreach($headerMenu->items as $item)

                            <li>
                                <a
                                    href="{{ str_starts_with($item->url, 'http') || str_starts_with($item->url, '/') ? $item->url : url($item->url) }}"
                                    @if(!empty($item->target))
                                        target="{{ $item->target }}"
                                    @endif
                                    class="text-gray-300 hover:text-white transition"
                                >
                                    {{ $item->title }}
                                </a>
                            </li>

                        @endforeach

                    @else

                        <li>
                            <a href="{{ route('home') }}"
                               class="text-gray-300 hover:text-white transition">
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('about') }}"
                               class="text-gray-300 hover:text-white transition">
                                About
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('services') }}"
                               class="text-gray-300 hover:text-white transition">
                                Services
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('products') }}"
                               class="text-gray-300 hover:text-white transition">
                                Products
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('projects') }}"
                               class="text-gray-300 hover:text-white transition">
                                Projects
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('blog') }}"
                               class="text-gray-300 hover:text-white transition">
                                Blog
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('contact') }}"
                               class="text-gray-300 hover:text-white transition">
                                Contact
                            </a>
                        </li>

                    @endif

                </ul>

            </div>


            {{-- CONTACT --}}
            <div class="md:col-span-4">

                <h3 class="text-lg font-semibold mb-4">
                    Contact
                </h3>

                @if($settings?->contact_email)
                    <p class="text-gray-300 mb-2">
                        <span class="font-medium text-white">Email:</span>
                        {{ $settings->contact_email }}
                    </p>
                @endif

                @if($settings?->contact_phone)
                    <p class="text-gray-300 mb-2">
                        <span class="font-medium text-white">Phone:</span>
                        {{ $settings->contact_phone }}
                    </p>
                @endif

                @if($settings?->address)
                    <p class="text-gray-300 leading-relaxed">
                        {{ $settings->address }}
                    </p>
                @endif

            </div>

        </div>


        {{-- COPYRIGHT --}}
        <div class="border-t border-gray-700 mt-10 pt-6">

            <p class="text-gray-400 text-center">
                {{ $settings?->footer_text }}
            </p>

        </div>

    </div>

</footer>