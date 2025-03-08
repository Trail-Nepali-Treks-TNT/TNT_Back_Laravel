@extends('Client.layouts.app')

@section('content')
    @vite('resources/css/client-styles/home.css')
    <!-- Book early section -->
    <section class="book-early-container tnt-container">
        <div class="row">
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
@endsection

@php
    // Set SEO variables
    $title = 'Trail Nepal Treks';
    $description = 'Discover your gateway to the Himalayas with seamless Nepal adventure planning. From trekking and expert guides to transport and tours, customize and book your unforgettable journey today!';

    //Hero section
    $heroContainerClassName = "home-hero-container"
@endphp