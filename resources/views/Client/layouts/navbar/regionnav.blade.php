<div class="modal modal-nav fade" id="regionTopNavModal" tabindex="-1" aria-labelledby="regionTopNavModalLabel"
    aria-hidden="true">
    <div class="modal-dialog nav-modal">
        <div class="modal-content nav-modal-content">
            @include("Client.layouts.navbar.topnavbar", ['topnavclass' => "hidden-top-navbar"])
            @include("Client.layouts.navbar.navheader", ['activeClass' => "region"])
            <div class="container-fluid tnt-container py-3 d-flex gap-4 region-container">
                <div class="nav-modal-title d-flex gap-1 flex-column">
                    <h3 class="font-playfair mb-0">Region</h3>
                    <a class="text-decoration-none text-white d-flex align-items-center gap-1" href="/">
                        See all popular Regions
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-move-right">
                            <path d="M18 8L22 12L18 16" />
                            <path d="M2 12H22" />
                        </svg>
                    </a>
                </div>
                <div class="region-card-container">
                    <div class="swiper region-nav-swiper">
                        <div class="swiper-wrapper">
                            @php
                                // Load JSON file directly in the view
                                $jsonPath = resource_path('views/Client/data/data.json');
                                $jsonData = json_decode(file_get_contents($jsonPath), true);
                                $regions = $jsonData['region'] ?? []; // Get the "region" array
                            @endphp

                            @foreach($regions as $region)
                                <div class="swiper-slide">
                                    <a href="/" class="text-decoration-none region-card">
                                        <img class="region-img" alt="{{ $region['name'] }}" src="{{ $region['img'] }}" />
                                        <span class="font-playfair text-white text-decoration-none region-card-title">
                                            {{ $region['name'] }}
                                        </span>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        <!-- Swiper Buttons -->
                        <button class="tnt-slider-btn tnt-region-slider-next-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-arrow-right">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </button>

                        <button class="tnt-slider-btn tnt-region-slider-prev-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-arrow-left">
                                <path d="m12 19-7-7 7-7"></path>
                                <path d="M19 12H5"></path>
                            </svg>
                        </button>
                    </div>

                </div>
            </div>