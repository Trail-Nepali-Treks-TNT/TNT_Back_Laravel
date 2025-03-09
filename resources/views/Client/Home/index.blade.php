@extends('Client.layouts.app')

@section('content')
    @vite('resources/css/client-styles/home.css')
    <!-- Book early section -->
    <section class="book-early-container tnt-container">
        <div class="row mx-0">
            <div class="col-12 col-lg-6 px-0">
                <h2 class="font-playfair book-early-title">Book early and save big!</h2>
                <p class="book-early-description mb-0">Grab Exclusive Early Bird Deals – Save Up to 30%! Book by January
                    15th for
                    amazing
                    discounts on 2025 adventures.</p>
            </div>
            <div class="col-12 col-lg-6 d-flex align-items-end justify-content-center justify-content-md-end px-0">
                <a href="" class="btn btn-explore">EXPLORE ALL OFFERS</a>
            </div>
        </div>
    </section>
    <!-- Packages -->
    <section class="tnt-container" style="margin-bottom: 20px;">
        @php
            // Load JSON file directly in the view
            $jsonPath = resource_path('views/Client/data/data.json');
            $jsonData = json_decode(file_get_contents($jsonPath), true);
            $packages = $jsonData['earlyPackage'] ?? []; // Get the "region" array
        @endphp
        @foreach ($packages as $index => $package)
            <div>
                <x-package-card :images="$package['images']" title="{{$package['packageName']}}"
                    description="{{ $package['shortDescription'] }}" expiryDate="{{ $package['expiryDate'] }}"
                    price="{{ $package['price'] }}" discountedPrice="{{ $package['discountedPricePerPerson'] }}"
                    discountPercentage="15" bestSeller="{{ $package['isBestSeller'] }}" popular="{{ $package['isPopular']}}" />
            </div>
        @endforeach
    </section>
@endsection

@php
    // Set SEO variables
    $title = 'Trail Nepal Treks';
    $description = 'Discover your gateway to the Himalayas with seamless Nepal adventure planning. From trekking and expert guides to transport and tours, customize and book your unforgettable journey today!';

    //Hero section
    $heroContainerClassName = "home-hero-container"
@endphp