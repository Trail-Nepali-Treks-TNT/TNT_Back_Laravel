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
                <a data-fancybox="gallery"
                    href="https://images.unsplash.com/photo-1604153353314-ab86f059ff4e?q=80&w=2006&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                    <img src="https://images.unsplash.com/photo-1604153353314-ab86f059ff4e?q=80&w=2006&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Image" />
                </a>
            </div>
            <!-- Right Column (2x2 grid) -->
            <div class="right-grid">
                <div class="grid-item">
                    <a data-fancybox="gallery"
                        href="https://images.unsplash.com/photo-1647042035867-d852ad65c12c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                        <img src="https://images.unsplash.com/photo-1647042035867-d852ad65c12c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Image" />
                    </a>
                </div>

                <div class="grid-item">
                    <a data-fancybox="gallery"
                        href="https://images.unsplash.com/photo-1635770719148-ff581d7a92d0?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                        <img src="https://images.unsplash.com/photo-1635770719148-ff581d7a92d0?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Image 2" />
                    </a>
                </div>

                <div class="grid-item">
                    <a data-fancybox="gallery"
                        href="https://images.unsplash.com/photo-1647042035458-6b0436cd1f71?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                        <img src="https://images.unsplash.com/photo-1647042035458-6b0436cd1f71?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Image 3" />
                    </a>
                </div>

                <div class="grid-item">
                    <a data-fancybox="gallery"
                        href="https://images.unsplash.com/photo-1589848409954-0625f617389c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                        <img src="https://images.unsplash.com/photo-1589848409954-0625f617389c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Image" />
                    </a>
                </div>
            </div>
            <button class="view-all-button d-none" aria-haspopup="dialog" aria-expanded="false"
                aria-controls="hs-custom-backdrop-modal" data-hs-overlay="#hs-custom-backdrop-modal" type="button"
                id="showMoreBtn">
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
                <div class="package-info">
                    <div class="package-info-box d-flex gap-2 align-items-start">
                        <div class="package-info-box-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </div>
                        <div class="package-info-box-text d-flex gap-1 flex-column">
                            <strong>Group size</strong>
                            <span>Max 12 pax</span>
                        </div>
                    </div>
                    <div class="package-info-box d-flex gap-2 align-items-start">
                        <div class="package-info-box-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>

                        </div>
                        <div class="package-info-box-text d-flex gap-1 flex-column">
                            <strong>Difficulty</strong>
                            <span>Moderate to fairly challenging</span>
                        </div>
                    </div>
                    <div class="package-info-box d-flex gap-2 align-items-start">
                        <div class="package-info-box-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                        </div>
                        <div class="package-info-box-text d-flex gap-1 flex-column">
                            <strong>Duration</strong>
                            <span>12-15 days</span>
                        </div>
                    </div>
                    <div class="package-info-box d-flex gap-2 align-items-start">
                        <div class="package-info-box-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="25" viewBox="0 0 17 25" fill="none">
                                <path
                                    d="M2.78372 24.3632L6.21628 7.00502C6.32791 6.46548 6.57907 6.06083 6.96977 5.79107C7.36047 5.5213 7.76977 5.38642 8.19768 5.38642C8.62558 5.38642 9.02093 5.47944 9.38372 5.66548C9.74651 5.85153 10.0395 6.1306 10.2628 6.50269L11.3791 8.28874C11.714 8.82828 12.1465 9.31665 12.6767 9.75386C13.207 10.1911 13.8163 10.512 14.5047 10.7166V8.73525H16.1791V24.3632H14.5047V13.0329C13.6116 12.8283 12.7837 12.5027 12.0209 12.0562C11.2581 11.6097 10.5977 11.0608 10.0395 10.4097L9.36977 13.7585L11.714 15.9911V24.3632H9.4814V17.6655L7.13721 15.4329L5.12791 24.3632H2.78372ZM3.25814 13.3399L0.886047 12.8934C0.588372 12.8376 0.355814 12.6841 0.188372 12.4329C0.0209302 12.1818 -0.0348837 11.898 0.0209302 11.5818L0.85814 7.20037C0.969768 6.60502 1.28605 6.13525 1.80698 5.79107C2.32791 5.44688 2.88605 5.3306 3.4814 5.44223L4.76512 5.69339L3.25814 13.3399ZM10.0395 4.82828C9.42558 4.82828 8.9 4.60967 8.46279 4.17246C8.02558 3.73525 7.80698 3.20967 7.80698 2.59572C7.80698 1.98176 8.02558 1.45618 8.46279 1.01897C8.9 0.581764 9.42558 0.363159 10.0395 0.363159C10.6535 0.363159 11.1791 0.581764 11.6163 1.01897C12.0535 1.45618 12.2721 1.98176 12.2721 2.59572C12.2721 3.20967 12.0535 3.73525 11.6163 4.17246C11.1791 4.60967 10.6535 4.82828 10.0395 4.82828Z"
                                    fill="#f8006c" />
                            </svg>
                        </div>
                        <div class="package-info-box-text d-flex gap-1 flex-column">
                            <strong>Walking per day</strong>
                            <span>5-6 hours
                            </span>
                        </div>
                    </div>
                    <div class="package-info-box d-flex gap-2 align-items-start">
                        <div class="package-info-box-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>

                        </div>
                        <div class="package-info-box-text d-flex gap-1 flex-column">
                            <strong>Starting point</strong>
                            <span>Lukla</span>
                        </div>
                    </div>
                    <div class="package-info-box d-flex gap-2 align-items-start">
                        <div class="package-info-box-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="18" viewBox="0 0 25 18" fill="none">
                                <path
                                    d="M0.893555 17.1632V9.96316C0.893555 9.42316 1.00355 8.93316 1.22355 8.49316C1.44355 8.05316 1.73355 7.66316 2.09355 7.32316V3.96316C2.09355 2.96316 2.44355 2.11316 3.14355 1.41316C3.84355 0.713159 4.69355 0.363159 5.69355 0.363159H10.4936C10.9536 0.363159 11.3836 0.448159 11.7836 0.618159C12.1836 0.788159 12.5536 1.02316 12.8936 1.32316C13.2336 1.02316 13.6036 0.788159 14.0036 0.618159C14.4036 0.448159 14.8336 0.363159 15.2936 0.363159H20.0936C21.0936 0.363159 21.9436 0.713159 22.6436 1.41316C23.3436 2.11316 23.6936 2.96316 23.6936 3.96316V7.32316C24.0536 7.66316 24.3436 8.05316 24.5636 8.49316C24.7836 8.93316 24.8936 9.42316 24.8936 9.96316V17.1632H22.4936V14.7632H3.29355V17.1632H0.893555ZM14.0936 6.36316H21.2936V3.96316C21.2936 3.62316 21.1786 3.33816 20.9486 3.10816C20.7186 2.87816 20.4336 2.76316 20.0936 2.76316H15.2936C14.9536 2.76316 14.6686 2.87816 14.4386 3.10816C14.2086 3.33816 14.0936 3.62316 14.0936 3.96316V6.36316ZM4.49355 6.36316H11.6936V3.96316C11.6936 3.62316 11.5786 3.33816 11.3486 3.10816C11.1186 2.87816 10.8336 2.76316 10.4936 2.76316H5.69355C5.35355 2.76316 5.06855 2.87816 4.83855 3.10816C4.60855 3.33816 4.49355 3.62316 4.49355 3.96316V6.36316ZM3.29355 12.3632H22.4936V9.96316C22.4936 9.62316 22.3786 9.33816 22.1486 9.10816C21.9186 8.87816 21.6336 8.76316 21.2936 8.76316H4.49355C4.15355 8.76316 3.86855 8.87816 3.63855 9.10816C3.40855 9.33816 3.29355 9.62316 3.29355 9.96316V12.3632Z"
                                    fill="#f8006c" stroke-width="1" />
                            </svg>
                        </div>
                        <div class="package-info-box-text d-flex gap-1 flex-column">
                            <strong>Accomodation</strong>
                            <span>Tea House + Lodge
                                3 star (Kathmandu)</span>
                        </div>
                    </div>
                    <div class="package-info-box d-flex gap-2 align-items-start">
                        <div class="package-info-box-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>

                        </div>
                        <div class="package-info-box-text d-flex gap-1 flex-column">
                            <strong>Avaibility</strong>
                            <span>Autumn/Spring</span>
                        </div>
                    </div>
                    <div class="package-info-box d-flex gap-2 align-items-start">
                        <div class="package-info-box-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="16" viewBox="0 0 25 16" fill="none">
                                <path
                                    d="M3.34678 15.3387C2.68678 15.3387 2.12178 15.1037 1.65178 14.6337C1.18178 14.1637 0.946777 13.5987 0.946777 12.9387V3.33872C0.946777 2.67872 1.18178 2.11372 1.65178 1.64372C2.12178 1.17372 2.68678 0.938721 3.34678 0.938721H22.5468C23.2068 0.938721 23.7718 1.17372 24.2418 1.64372C24.7118 2.11372 24.9468 2.67872 24.9468 3.33872V12.9387C24.9468 13.5987 24.7118 14.1637 24.2418 14.6337C23.7718 15.1037 23.2068 15.3387 22.5468 15.3387H3.34678ZM3.34678 12.9387H22.5468V3.33872H18.9468V8.13872H16.5468V3.33872H14.1468V8.13872H11.7468V3.33872H9.34678V8.13872H6.94678V3.33872H3.34678V12.9387Z"
                                    fill="#f8006c" />
                            </svg>
                        </div>
                        <div class="package-info-box-text d-flex gap-1 flex-column">
                            <strong>Total distance</strong>
                            <span>130-140 kilometers
                                (80-87 miles)</span>
                        </div>
                    </div>
                    <div class="package-info-box d-flex gap-2 align-items-start">
                        <div class="package-info-box-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                                <path
                                    d="M2.94336 21.9387L9.39336 12.9387H14.4434L21.8934 4.23875V21.9387H2.94336ZM4.69336 16.1137L3.09336 14.9637L7.39336 8.93875H12.4434L17.1434 3.46375L18.6434 4.76375L13.3434 10.9387H8.39336L4.69336 16.1137ZM6.84336 19.9387H19.8934V9.63874L15.3434 14.9387H10.3934L6.84336 19.9387Z"
                                    fill="#f8006c" />
                            </svg>
                        </div>
                        <div class="package-info-box-text d-flex gap-1 flex-column">
                            <strong>Max Elevation
                            </strong>
                            <span>5,644m / 18,519ft</span>
                        </div>
                    </div>
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
                            <li class="d-flex gap-1 align-items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                Flexible Cancellation</li>
                            <li class="d-flex gap-1 align-items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                No Booking Fees</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tour Itinerary -->
    @php
        $description = 'Annapurna Circuit Trek & Tilicho Lake';
        $itinerary = [
            [
                'number' => 'Day 1: Arrival in Kathmandu (1,400m)',
                'activity' => "Arrive in Nepal’s bustling capital, Kathmandu. Spend the day exploring historic sites like Swayambhunath and Durbar Square. Prepare for the trek with a briefing and gear check. ",
            ],
            [
                'number' => 'Day 2: Drive to Besisahar and then to Chame (2,710m)',
                'activity' => "A scenic drive from Kathmandu to Besisahar, followed by a jeep ride to Chame. Enjoy the lush valleys, terraced fields, and distant views of the Annapurna range.",
            ],
            [
                'number' => 'Day 3: Trek to Pisang (3,300m)',
                'activity' => "Start the trek with a gradual climb through pine forests, crossing suspension bridges over roaring rivers. Reach Pisang, offering breathtaking views of Annapurna II and IV.",
            ],
            [
                'number' => 'Day 4: Trek to Manang (3,540m)',
                'activity' => "Follow the trail along the Marsyangdi River, passing villages like Ghyaru and Ngawal. Enjoy panoramic mountain views and acclimatize at the culturally rich village of Manang.",
            ],
            [
                'number' => 'Day 5: Acclimatization in Manang',
                'activity' => "A rest day to adapt to the altitude. Explore the town, visit the Gangapurna Lake, or hike to a nearby ridge for amazing vistas.",
            ],
            [
                'number' => 'Day 6: Trek to Siri Kharka (4,060m)',
                'activity' => "Leave the main Annapurna Circuit trail and head toward Tilicho Lake. Ascend through rugged terrain and witness spectacular landscapes.",
            ],
            [
                'number' => 'Day 7: Trek to Tilicho Base Camp (4,200m)',
                'activity' => "A short yet challenging trek along steep trails and narrow ridges. Arrive at Tilicho Base Camp, surrounded by towering peaks.",
            ],
            [
                'number' => 'Day 8: Visit Tilicho Lake (5,416m) and return to Siri Kharka',
                'activity' => "Hike to Tilicho Lake, one of the world’s highest lakes, reflecting the majestic Annapurna range. Descend back to Siri Kharka after soaking in the stunning views.",
            ],
            [
                'number' => 'Day 9: Trek to Yak Kharka (4,050m)',
                'activity' => "Reconnect with the Annapurna Circuit trail and head to Yak Kharka. Walk through alpine meadows and watch for grazing yaks.",
            ],
            [
                'number' => 'Day 10: Trek to Thorong Phedi (4,525m)',
                'activity' => "A gradual ascent to Thorong Phedi, the last stop before the Thorong La Pass. Rest and prepare for the challenging pass crossing.",
            ],
            [
                'number' => 'Day 11: Cross Thorong La Pass (5,416m) and descend to Muktinath (3,800m)',
                'activity' => "The most strenuous yet rewarding day. Cross Thorong La Pass for breathtaking views. Descend to Muktinath, a sacred pilgrimage site for Hindus and Buddhists.",
            ],
            [
                'number' => 'Day 12: Trek to Jomsom (2,720m)',
                'activity' => "Trek downhill to Jomsom through Kagbeni, a charming village with Tibetan influences. Enjoy the windy trails of the Kali Gandaki valley.",
            ],
            [
                'number' => 'Day 13: Fly to Pokhara (827m)',
                'activity' => "Take a short flight to Pokhara, Nepal’s adventure capital. Relax by Phewa Lake or explore the city’s vibrant cafés and markets.",
            ],
            [
                'number' => 'Day 14: Drive back to Kathmandu',
                'activity' => "Return to Kathmandu via a scenic drive. Spend the evening shopping for souvenirs or reflecting on your trek’s unforgettable memories.",
            ],
            [
                'number' => 'Day 15: Departure',
                'activity' => "Your journey concludes. Depart from Kathmandu with incredible experiences and cherished memories of the Annapurna Circuit and Tilicho Lake.",
            ],
        ];

    @endphp
    <div class="tnt-container package-itinerary">
        <x-tour-itinerary :description="$description" :itinerary="$itinerary" />
    </div>

    <!-- Package include/exclude -->
    @include("Client.Detail.package-include")
    <!-- Package FAQ` -->
    <div class="package-faq tnt-container d-flex align-items-center flex-column">
        @php
            $faqList = [
                [
                    'question' => 'What is the best time to trek in the Annapurna Region?',
                    'answer' => 'The best time to trek in the Annapurna Region is during spring (March to May) and autumn (September to November). These seasons offer clear skies, stable weather, and breathtaking views of the mountains, along with blooming rhododendrons in spring.',
                ],
                [
                    'question' => 'How difficult are treks in the Annapurna Region?',
                    'answer' => 'Trek difficulty varies. Short treks like Ghorepani Poon Hill are moderate, while Annapurna Circuit and Base Camp treks are more challenging due to longer durations and high altitude.',
                ],
                [
                    'question' => 'Do I need permits for trekking in the Annapurna Region?',
                    'answer' => 'Yes, you need an Annapurna Conservation Area Permit (ACAP) and a Trekkers’ Information Management System (TIMS) card. Solo trekkers may have additional restrictions.',
                ],
                [
                    'question' => 'What is the average cost of trekking in the Annapurna Region?',
                    'answer' => 'Costs vary but range from $25–$50 per day, depending on accommodation, food, and guide/porter services. A full trek can cost $300–$1,500.',
                ],
                [
                    'question' => 'How long do treks in the Annapurna Region take?',
                    'answer' => 'It depends on the route. Short treks (like Poon Hill) take 3–5 days, Annapurna Base Camp takes 7–12 days, and the Annapurna Circuit takes 12–21 days.',
                ],
                [
                    'question' => 'Is altitude sickness a concern in the Annapurna Region?',
                    'answer' => 'Yes, especially above 3,000m (Annapurna Base Camp, Thorong La Pass). Proper acclimatization and hydration are essential to prevent AMS.',
                ],
                [
                    'question' => 'What should I pack for trekking in this region?',
                    'answer' => 'Essentials include layered clothing, sturdy boots, sleeping bag, trekking poles, rain gear, first aid kit, water purification tablets, and snacks.',
                ],
                [
                    'question' => 'Are guides and porters necessary for trekking in the Annapurna Region?',
                    'answer' => 'Not mandatory, but highly recommended, especially for beginners. Some areas now require at least a guide for solo trekkers.',
                ],
                [
                    'question' => 'Can beginners trek in the Annapurna Region?',
                    'answer' => 'Yes, beginner-friendly treks include Ghorepani Poon Hill and Mardi Himal. Longer treks require good fitness and preparation.',
                ],
                [
                    'question' => 'Is Wi-Fi or mobile network available on the trekking trails?',
                    'answer' => 'Available in most villages but patchy and slow. Wi-Fi may cost extra. Ncell and NTC networks work in some areas, but coverage is inconsistent.',
                ],
            ];

        @endphp

        <div class="package-faq-container d-flex align-items-center flex-column">
            <x-faq :faqs="$faqList" />
        </div>
    </div>
    <div class="detail-newsletter-container tnt-container">
        <x-news-letter></x-news-letter>
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
