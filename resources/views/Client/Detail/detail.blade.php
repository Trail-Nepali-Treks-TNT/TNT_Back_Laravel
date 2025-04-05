@extends('Client.layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/client-styles/detail.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

<div class="tnt-container detail-page">
    <!-- Nav Breadcrumb  -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Services</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="">Trekking Holidays</a>
            </li>
        </ol>
    </nav>
    <h1 class="package-title font-playfair">Everest Base Camp (EBC)</h1>
    <div class="gallery-wrapper" data-count="1">
        <!-- Left Column (1 image) -->
        <div class="left-item">
            <a data-fancybox="gallery" href="https://images.unsplash.com/photo-1604153353314-ab86f059ff4e?q=80&w=2006&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                <img src="https://images.unsplash.com/photo-1604153353314-ab86f059ff4e?q=80&w=2006&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image" />
            </a>
        </div>
        <!-- Right Column (2x2 grid) -->
        <div class="right-grid">
            <div class="grid-item">
                <a data-fancybox="gallery" href="https://images.unsplash.com/photo-1647042035867-d852ad65c12c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                    <img src="https://images.unsplash.com/photo-1647042035867-d852ad65c12c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image" />
                </a>
            </div>

            <div class="grid-item">
                <a data-fancybox="gallery" href="https://images.unsplash.com/photo-1635770719148-ff581d7a92d0?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                    <img src="https://images.unsplash.com/photo-1635770719148-ff581d7a92d0?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image 2" />
                </a>
            </div>

            <div class="grid-item">
                <a data-fancybox="gallery" href="https://images.unsplash.com/photo-1647042035458-6b0436cd1f71?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                    <img src="https://images.unsplash.com/photo-1647042035458-6b0436cd1f71?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image 3" />
                </a>
            </div>

            <div class="grid-item">
                <a data-fancybox="gallery" href="https://images.unsplash.com/photo-1589848409954-0625f617389c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                    <img src="https://images.unsplash.com/photo-1589848409954-0625f617389c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image" />
                </a>
            </div>
        </div>
        <button
            class="view-all-button d-none"
            aria-haspopup="dialog"
            aria-expanded="false"
            aria-controls="hs-custom-backdrop-modal"
            data-hs-overlay="#hs-custom-backdrop-modal"
            type="button" id="showMoreBtn">
            View all (7) pages
        </button>
    </div>
    <div class="package-intro ">
        <div class="package-into-desc-container">
            <p class="font-playfair package-highlight">"Embark on a thrilling Everest Base Camp trek, a moderate to
                challenging adventure through the high Himalayas, featuring Sherpa culture, cozy tea house
                stays, and breathtaking views.</p>
            <div class="package-description">
                <p>
                    The <strong>Everest Base Camp Trek</strong> is one of the most iconic and rewarding journeys
                    in the world, taking you deep into the heart of the high Himalayas. This trek offers a
                    unique blend of natural beauty, cultural richness, and physical challenge, making it a dream
                    destination for adventurers and nature enthusiasts alike.
                </p>

                <h5>What to Expect</h5>
                <ul>
                    <li>
                        <strong>Scenic Beauty</strong>: Trek through lush valleys, glacial rivers, and rugged
                        trails while enjoying breathtaking views of some of the world’s highest peaks, including
                        <strong>Mount Everest</strong>, <strong>Lhotse</strong>, <strong>Nuptse</strong>, and
                        <strong>Ama Dablam</strong>.
                    </li>
                    <li>
                        <strong>Sherpa Culture</strong>: Immerse yourself in the rich traditions of the Sherpa
                        people, who have called the Khumbu region home for centuries. Visit ancient monasteries,
                        prayer-flag-adorned villages, and learn about Tibetan Buddhism.
                    </li>
                    <li>
                        <strong>Tea House Experience</strong>: Stay in cozy tea houses and lodges along the
                        trail, where you’ll enjoy warm hospitality, hearty meals, and a chance to connect with
                        fellow trekkers from around the world.
                    </li>
                    <li>
                        <strong>Physical Challenge</strong>: This trek is graded as <strong>moderate to fairly
                            challenging</strong>, requiring a good level of fitness. You’ll walk 6-8 hours daily
                        on rocky terrain and high-altitude trails, but the effort is rewarded with unforgettable
                        experiences.
                    </li>
                </ul>

                <h5>Why Choose This Trek?</h5>
                <ul>
                    <li>
                        <strong>Accessible Adventure</strong>: No prior trekking experience is required, making
                        it suitable for first-time trekkers with a passion for adventure.
                    </li>
                    <li>
                        <strong>Cultural Immersion</strong>: Witness vibrant Sherpa festivals like
                        <strong>Losar</strong> (Tibetan New Year) and <strong>Mani Rimdu</strong>, and explore
                        historic monasteries such as <strong>Tengboche</strong>.
                    </li>
                    <li>
                        <strong>Eco-Friendly Travel</strong>: The trek promotes responsible tourism, with a
                        focus on minimizing environmental impact and supporting local communities.
                    </li>
                </ul>

                <h5>Best Time to Go</h5>
                <p>
                    The ideal seasons for the Everest Base Camp Trek are:
                </p>
                <ul>
                    <li>
                        <strong>Spring (March to May)</strong>: Clear skies, blooming rhododendrons, and
                        moderate temperatures.
                    </li>
                    <li>
                        <strong>Autumn (September to November)</strong>: Stable weather, excellent visibility,
                        and vibrant landscapes.
                    </li>
                </ul>

                <h5>Who Can Do This Trek?</h5>
                <ul>
                    <li>
                        <strong>Fitness Level</strong>: You should be moderately fit, enjoy walking, and be
                        prepared for high-altitude conditions. Regular exercise before the trek is recommended.
                    </li>
                    <li>
                        <strong>Age</strong>: There’s no age limit—adventurers of all ages can undertake this
                        journey with proper preparation and determination.
                    </li>
                </ul>

                <h5>A Journey of a Lifetime</h5>
                <p>
                    The Everest Base Camp Trek is more than just a physical challenge—it’s a journey that tests
                    your limits, rewards your spirit, and leaves you with memories to last a lifetime. From the
                    bustling streets of <strong>Kathmandu</strong> to the serene beauty of the Himalayas, every
                    step of this adventure is filled with wonder and discovery.
                </p>
                <button class="readmore">Read more</button>
            </div>
        </div>
        <div class="package-intor-booknow-container relative">
            <div class="sticky-top">
                <div class="package-price">
                    <div class="package-actual-price">
                        <span class="text-decoration-line-through">$1060</span>
                        <span class="package-saved">Save 15%</span>
                    </div>
                    <div class="package-current-price">
                        From $1,200.00
                        <span>/person</span>
                    </div>
                </div>
                <div class="book-package">
                    <button class="book-package-btn">Book Now</button>
                    <ul class="book-package-terms">
                        <li class="d-flex gap-1 align-items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            Flexible Cancellation</li>
                        <li class="d-flex gap-1 align-items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            No Booking Fees</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

<script>
    const wrapper = document.querySelector(".gallery-wrapper");
    const count = wrapper.querySelectorAll("img").length;
    wrapper.setAttribute("data-count", Math.min(count, 5));

    const showMoreBtn = document.getElementById("showMoreBtn")
    if (count > 5) showMoreBtn.classList.add("d-block")

    Fancybox.bind('[data-fancybox="gallery"]', {
        //
    });
</script>
@endsection
@php
// Set SEO variables
$title = 'Trail Nepal Treks';
$description = 'Discover your gateway to the Himalayas with seamless Nepal adventure planning. From trekking and expert guides to transport and tours, customize and book your unforgettable journey today!';

//Hero section
//$heroContainerClassName = "detail-hero-container"
@endphp
