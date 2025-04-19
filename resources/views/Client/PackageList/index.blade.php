@extends('Client.layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/client-styles/package-list.css') }}">
    <div class="package-list-page tnt-container">
        <x-breadcrumbs :items="[
            ['name' => 'Home', 'path' => '/'],
            ['name' => 'Package List Name'],
        ]" />
        <h1 class="package-list-title font-playfair text-2xl sm:text-3xl md:text-5xl lg:text-7xl">Annapurna Region</h1>
        <p class="package-list-desc">The Annapurna region in Nepal offers stunning landscapes, from lush forests to
            towering
            peaks
            like Annapurna I (8,091m). With iconic treks such as the Annapurna Circuit and Base Camp, it
            combines breathtaking views with rich cultural experiences, making it a top destination for
            adventurers.</p>
        <!-- TODO: Update alt attribute for the image -->
        <img src="https://images.unsplash.com/photo-1620697488876-90f10485e692?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Annapurna Region" class="package-list-cover" />

        <!-- Package lists -->
        <section class="package-list">
            <h2 class="package-list-subtitle font-playfair">All Annapurna Region</h2>
            @php
                // Load JSON file directly in the view
                $jsonPath = resource_path('views/Client/data/data.json');
                $jsonData = json_decode(file_get_contents($jsonPath), true);
                $packages = $jsonData['earlyPackage'] ?? []; // Get the "region" array
            @endphp
            <div class="package-list-container">
                @foreach ($packages as $index => $package)
                    <x-package-card :images="$package['images']" title="{{$package['packageName']}}"
                        description="{{ $package['shortDescription'] }}" expiryDate="{{ $package['expiryDate'] }}"
                        price="{{ $package['price'] }}" discountedPrice="{{ $package['discountedPricePerPerson'] }}"
                        discountPercentage="15" bestSeller="{{ $package['isBestSeller'] }}" popular="{{ $package['isPopular']}}"
                        link="{{ $package['link'] }}" />
                @endforeach
            </div>
        </section>
        <section class="about-package offset-0 offset-xl-2 col-xl-7 offset-xl-4 col-xxl-5">
            <h2 class="about-package-title text-xl md:text-5xl">Why choose Annapurna Region</h2>
            <p class="about-package-desc">The Annapurna Region is a top trekking destination in Nepal, known for its
                stunning landscapes
                and rich cultural experiences. From lush forests to glaciers, it offers diverse scenery
                alongside the warm hospitality of local communities.</p>
            <p class="about-package-desc">With well-maintained trails and varied accommodations, the region is accessible to
                trekkers of
                all levels. Its proximity to Pokhara and unique highlights like hot springs and panoramic
                viewpoints make it unforgettable.</p>
        </section>
    </div>
@endsection
@php
    // Set SEO variables
    //TODO: Add SEO variables for the package list page based on package that is being displayed
    $title = 'Package List - Trail Nepal Treks';
    $description = 'Explore our diverse trekking packages in Nepal, including Everest Base Camp, Annapurna Circuit, and Langtang Valley. Join us for an unforgettable adventure!';
    $keywords = 'Trekking packages, Nepal trekking, Everest Base Camp, Annapurna Circuit, Langtang Valley, trekking tours, adventure travel, Trail Nepal Treks';

@endphp
