@extends('Client.layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/client-styles/package-list.css') }}">
<div class="package-list-page tnt-container">
    <x-breadcrumbs :items="[
            ['name' => 'Home', 'path' => '/'],
            ['name' => '{{ $regionDetailWithPackage["name"] }}'],
        ]" />
    <h1 class="package-list-title font-playfair text-2xl sm:text-3xl md:text-5xl lg:text-7xl">
        {{ $regionDetailWithPackage['name'] }}
    </h1>
    <p class="package-list-desc">
        {{ $regionDetailWithPackage['description'] }}
    </p>
    <!-- TODO: Update alt attribute for the image -->
    <img src="{{ $regionDetailWithPackage['dashboard_file_url'] }}" alt="{{ $regionDetailWithPackage['name'] }}" class="package-list-cover skeleton" />

    <!-- Package lists -->
    <section class="package-list">
        <h2 class="package-list-subtitle font-playfair">All {{ $regionDetailWithPackage['name'] }}</h2>
        @php
        $packages = $regionDetailWithPackage['packageList'] ?? []; // Get the "region" array
        @endphp
        <div class="package-list-container">
            @foreach ($packages as $package)
            <x-package-card :images="$package->images" title="{{$package->name}}"
                description="{{ $package->short_description }}" expiryDate="2025-05-06"
                price="{{ $package->old_price }}" discountedPrice="{{ $package->price }}"
                discountPercentage="15" bestSeller="{{ $package->best_seller }}"
                popular="{{ $package->popular }}" link="/detail/{{$package->slugURL}}" />
            @endforeach
        </div>
    </section>
    <!-- Package list why choose section -->
    <section class="about-package offset-0 offset-xl-2 col-xl-7 offset-xl-4 col-xxl-5">
        <h2 class="about-package-title text-xl md:text-5xl">Why choose {{ $regionDetailWithPackage['name'] }}</h2>
        <p class="about-package-desc">{{ $regionDetailWithPackage['reason'] }}</p>
    </section>
    <!-- Package list FAQ Section -->
    <!-- Package FAQ` -->
    <section class="package-list-faq">
        @php
        $faqs = collect($regionDetailWithPackage['faqs'])->map(function ($item) {
        return [
        'question' => $item->question,
        'answer' => $item->answer,
        ];})->toArray();
        @endphp

        <div class="offset-0 offset-xl-2 col-xl-7 offset-xl-4 col-xxl-5">
            <x-faq :faqs="$faqs" />
        </div>
    </section>
</div>
<!-- Package list newsletter -->
<section class="package-list-newsletter-container tnt-container">
    <x-news-letter></x-news-letter>
</section>
@endsection
@php
// Set SEO variables
//TODO: Add SEO variables for the package list page based on package that is being displayed
$title = 'Package List - Trail Nepal Treks';
$description = 'Explore our diverse trekking packages in Nepal, including Everest Base Camp, Annapurna Circuit, and Langtang Valley. Join us for an unforgettable adventure!';
$keywords = 'Trekking packages, Nepal trekking, Everest Base Camp, Annapurna Circuit, Langtang Valley, trekking tours, adventure travel, Trail Nepal Treks';
@endphp