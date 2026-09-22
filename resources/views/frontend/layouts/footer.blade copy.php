<footer class="bg-gray-900 text-white mt-20">

    <div class="max-w-7xl mx-auto px-6 py-12">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">


            {{-- COMPANY --}}

            <div>

                <h2 class="text-2xl font-bold mb-4">

                    {{ $settings?->site_name ?? 'Company' }}

                </h2>


                <p class="text-gray-300">

                    {{ $settings?->site_tagline }}

                </p>

            </div>


            {{-- QUICK LINKS --}}

            <div>

                <h3 class="text-lg font-semibold mb-4">
                    Quick Links
                </h3>

                <ul class="space-y-2">

                    @if(isset($footerMenu) && $footerMenu->items && $footerMenu->items->count() > 0)

                        @foreach($footerMenu->items as $item)

                            <li>
                                <a
                                    href="{{ str_starts_with($item->url, 'http') || str_starts_with($item->url, '/') ? $item->url : url($item->url) }}"
                                    @if(!empty($item->target)) target="{{ $item->target }}" @endif
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
                                    @if(!empty($item->target)) target="{{ $item->target }}" @endif
                                    class="text-gray-300 hover:text-white transition"
                                >
                                    {{ $item->title }}
                                </a>
                            </li>

                        @endforeach

                    @else

                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white">About</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-white">Services</a></li>
                        <li><a href="{{ route('products') }}" class="text-gray-300 hover:text-white">Products</a></li>
                        <li><a href="{{ route('projects') }}" class="text-gray-300 hover:text-white">Projects</a></li>
                        <li><a href="{{ route('blog') }}" class="text-gray-300 hover:text-white">Blog</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white">Contact</a></li>

                    @endif

                </ul>

            </div>


            {{-- CONTACT --}}

            <div>

                <h3 class="text-lg font-semibold mb-4">
                    Contact
                </h3>


                @if($settings?->contact_email)

                    <p class="mb-2">

                        Email:
                        {{ $settings->contact_email }}

                    </p>

                @endif


                @if($settings?->contact_phone)

                    <p class="mb-2">

                        Phone:
                        {{ $settings->contact_phone }}

                    </p>

                @endif


                @if($settings?->address)

                    <p class="mb-2">

                        {{ $settings->address }}

                    </p>

                @endif

            </div>


         

        </div>


        <div class="border-t border-gray-700 mt-10 pt-6">

            <p class="text-gray-400">

                {{ $settings?->footer_text }}

            </p>

        </div>

    </div>
   {{-- NEWSLETTER & SOCIAL --}}
{{-- 
            <div>

                NEWSLETTER
                <div class="mb-8">

                    <h3 class="text-lg font-semibold mb-3">
                        Newsletter
                    </h3>

                    <p class="text-gray-300 text-sm mb-4">
                        Subscribe to our newsletter to receive the latest updates and news.
                    </p>

                    <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Thank you for subscribing to our newsletter!');" class="space-y-2">
                        <div class="flex flex-col sm:flex-row gap-2">
                            <input
                                type="email"
                                name="email"
                                placeholder="Enter your email"
                                required
                                class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-sm text-white placeholder-gray-400 focus:outline-none focus:border-blue-500 transition"
                            >
                            <button
                                type="submit"
                                class="px-4 py-2.5 bg-blue-600 hover:bg-blue-500 text-white font-medium text-sm rounded-lg transition whitespace-nowrap"
                            >
                                Subscribe
                            </button>
                        </div>
                    </form>

                </div>


                SOCIAL

               <h3 class="text-lg font-semibold mb-4">
                    Follow Us
                </h3>


                <div class="flex flex-wrap gap-4">


                    @if($settings?->facebook_url)

                        <a
                            href="{{ $settings->facebook_url }}"
                            target="_blank"
                            class="text-gray-300 hover:text-white transition"
                        >
                            Facebook
                        </a>

                    @endif


                    @if($settings?->instagram_url)

                        <a
                            href="{{ $settings->instagram_url }}"
                            target="_blank"
                            class="text-gray-300 hover:text-white transition"
                        >
                            Instagram
                        </a>

                    @endif


                    @if($settings?->linkedin_url)

                        <a
                            href="{{ $settings->linkedin_url }}"
                            target="_blank"
                            class="text-gray-300 hover:text-white transition"
                        >
                            LinkedIn
                        </a>

                    @endif


                    @if($settings?->twitter_url)

                        <a
                            href="{{ $settings->twitter_url }}"
                            target="_blank"
                            class="text-gray-300 hover:text-white transition"
                        >
                            Twitter / X
                        </a>

                    @endif

                </div> 

            </div> --}}
</footer>