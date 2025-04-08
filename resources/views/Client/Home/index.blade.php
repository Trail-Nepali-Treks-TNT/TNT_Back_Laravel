@extends('Client.layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/client-styles/home.css') }}">

<!-- Book early section -->
<section class="book-early-container tnt-container">
    <div class="row mx-0">
        <div class="col-12 col-lg-6 px-0">
            <h2 class="book-early-title font-playfair">Book early and save big!</h2>
            <p class="book-early-description mb-0">Grab Exclusive Early Bird Deals – Save Up to 30%! Book by January
                15th for
                amazing
                discounts on 2025 adventures.</p>
        </div>
        <div class="col-12 col-lg-6 d-flex align-items-end justify-content-center justify-content-md-end px-0">
            <a href="" class="btn btn-explore">EXPLORE ALL OFFERS</a>
        </div>
    </div>
    <div id="package-target-id"></div>
</section>
<!-- Packages -->
<section class="tnt-container">
    @php
    // Load JSON file directly in the view
    $jsonPath = resource_path('views/Client/data/data.json');
    $jsonData = json_decode(file_get_contents($jsonPath), true);
    $packages = $jsonData['earlyPackage'] ?? []; // Get the "region" array
    @endphp
    <div style="overflow: hidden;">
        <div class="position-relative earlyCardSwiper swiper" id="earlyPackage">
            <div class="swiper-wrapper">
                @foreach($packageList as $package)
                <div class="swiper-slide">
                    <x-package-card :images="$package->images" title="{{$package->name}}"
                        description="{{ $package->short_description }}" expiryDate="2025-05-06"
                        price="{{ $package->price}}" discountedPrice="{{ $package->old_price }}"
                        discountPercentage="15" bestSeller="true"
                        popular="true" link="#" />
                </div>
                @endforeach
            </div>
            <button class="tnt-package-slider-next-btn tnt-slider-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-arrow-right">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </button>
            <button class="tnt-package-slider-prev-btn tnt-slider-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-arrow-left">
                    <path d="m12 19-7-7 7-7"></path>
                    <path d="M19 12H5"></path>
                </svg>
            </button>
        </div>
    </div>
</section>

<!-- Highlighted Hero Package -->
<section class="package-highlight">
    <div class="package-highlight-image">
        <div class="package-highlight-content tnt-container">
            <div class="font-playfair package-highlight-title">
                <h2>MT. EVEREST EXPEDITION (8848.86M) - SOUTH</h2>
            </div>
            <div class="package-highlight-description">
                <p>Mt. Everest Expedition is a lifetime mountaineering experience that allows you to stand on the highest point in the world.</p>
                <a href="#" class="text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path d="M18 8L22 12L18 16"></path>
                        <path d="M2 12H22"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
@include("Client.Home.destination")

<script src="{{ asset('assets/js/client-scripts/home.js') }}"></script>
@endsection

@php
// Set SEO variables
$title = 'Trail Nepal Treks';
$description = 'Discover your gateway to the Himalayas with seamless Nepal adventure planning. From trekking and expert guides to transport and tours, customize and book your unforgettable journey today!';

//Hero section
$isHomePage = true
@endphp
