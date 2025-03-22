<link rel="stylesheet" href="{{ asset('assets/css/client-styles/nav.css') }}">

@if(isset($navclass))
<div class="{{ $navclass }}">
    <div class="hero-overlay">
        <div class="hero-overlay-bg"></div>
    </div>
    @else
    <div class="navigation-wrapper">
        @endif
        @include("Client.layouts.navbar.topnavbar")
        @include("Client.layouts.navbar.navheader")
        <div class="alert alert-offer w-100 text-center rounded-0" role="alert">
            EARLY BIRD OFFER - Book now &amp; save up to 20%
        </div>
        <div class="hero-section">
            <div
                class="d-flex flex-column justify-content-between justify-content-sm-around flex-nowrap align-items-center flex-fill hero-section-container">
                <h1 class="font-playfair hero-section-title">YOUR GATEWAY<br>TO THE HIMALAYAS</h1>
                <p class="herodetail hero-section-detail">Plan your Nepal adventure effortlessly with trekking, guides,
                    transport, and tours all in one place. Customize, book, and enjoy an unforgettable journey.</p>

                <div class="search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-search absolute left-3 h-4 w-4 text-[#B6004D]">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <input class="search-input" placeholder="Search for experiences" type="search">
                    <button class="search-btn">
                        SEARCH
                    </button>
                </div>
                <div class="discover-button">
                    <a href="#earlyPackage" class="d-flex flex-column gap-1 align-items-center justify-content-center">
                        <div class="text-white text-decoration-underline mb-2 discover-button-text">Discover more</div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-circle-arrow-down text-white">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 8v8" />
                            <path d="m8 12 4 4 4-4" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>