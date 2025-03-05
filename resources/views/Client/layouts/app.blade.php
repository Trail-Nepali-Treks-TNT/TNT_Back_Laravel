{{-- resources/views/Client/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    @vite(['resources/css/client-styles/app.css', 'resources/js/app.js'])

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
    @include('Client.layouts.navbar.nav', ['navclass' => $heroContainerClassName])

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>
    <!-- Footer -->
    <!-- Footer -->
    @include("Client.layouts.footer")
    <!-- Additional Scripts -->
    @stack('scripts')
</body>

</html>