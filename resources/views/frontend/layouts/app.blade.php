<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', $settings?->company_name ?? 'Company Website')
    </title>

    @if($settings?->favicon)

        <link
            rel="icon"
            href="{{ asset('storage/' . $settings->favicon) }}"
        >

    @endif

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-white text-gray-900">

    @include('frontend.layouts.header')


    <main>

        @yield('content')

    </main>


    @include('frontend.layouts.footer')

</body>

</html>