{{-- resources/views/Client/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
<link rel="manifest" href="/site.webmanifest" />

<!-- Dynamic SEO Tags -->
<title>{{ $title ?? config('app.name', 'Trail Nepal Treks') }}</title>
<meta name="description"
    content="{{ $description ?? 'Discover your gateway to the Himalayas with seamless Nepal adventure planning. From trekking and expert guides to transport and tours, customize and book your unforgettable journey today!' }}">

<!-- Open Graph / Facebook Meta Tags -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $title ?? config('app.name', 'Trail Nepal Treks') }}">
<meta property="og:description"
    content="{{ $description ?? 'Discover your gateway to the Himalayas with seamless Nepal adventure planning. From trekking and expert guides to transport and tours, customize and book your unforgettable journey today!' }}">
<meta property="og:image" content="{{ $ogImage ?? asset('images/client/og-default.jpg') }}">

<!-- Twitter Meta Tags -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:title" content="{{ $title ?? config('app.name', 'Trail Nepal Treks') }}">
<meta property="twitter:description"
    content="{{ $description ?? 'Discover your gateway to the Himalayas with seamless Nepal adventure planning. From trekking and expert guides to transport and tours, customize and book your unforgettable journey today!' }}">
<meta property="twitter:image" content="{{ $ogImage ?? asset('images/client/og-default.jpg') }}">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<!-- Scripts and Styles -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="{{ asset('assets/css/client-styles/app.css') }}">

<!-- Toast CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

</head>

<body class="font-sans antialiased">
    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif
    <!-- Navigation -->
    @include('Client.layouts.navbar.nav', ['isHomePage' => $isHomePage ?? false])

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>
    <!-- Footer -->
    <!-- Footer -->
    @include("Client.layouts.footer")

    <button id="scrollToTop" class="scroll-to-top" aria-label="Scroll to top">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-arrow-up size-5 text-white">
            <path d="m5 12 7-7 7 7"></path>
            <path d="M12 19V5"></path>
        </svg>
    </button>
    @include("Client.layouts.navbar.regionnav")
    @include("Client.layouts.navbar.servicenav")
    @include("Client.layouts.navbar.sidenav")
    @include("Client.layouts.navbar.service-sidenav")
    @include("Client.layouts.navbar.region-sidenav")
    <!-- Additional Scripts -->
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/client-scripts/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
</body>

</html>