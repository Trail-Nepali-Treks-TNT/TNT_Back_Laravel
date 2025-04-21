<div class="modal modal-nav fade" id="serviceTopNavModal" tabindex="-1" aria-labelledby="serviceTopNavModalLabel"
    aria-hidden="true">
    <div class="modal-dialog nav-modal">
        <div class="modal-content nav-modal-content">
            @include("Client.layouts.navbar.topnavbar", ['topnavclass' => "hidden-top-navbar"])
            @include("Client.layouts.navbar.navheader", ['activeClass' => "service"])
            <div class="container-fluid tnt-container py-3 d-flex gap-4">
                <div class="nav-modal-title d-flex gap-1 flex-column">
                    <h3 class="font-playfair mb-0">Services</h3>
                    <a class="text-decoration-none text-white d-flex align-items-center gap-1" href="/">
                        See all services
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-move-right">
                            <path d="M18 8L22 12L18 16" />
                            <path d="M2 12H22" />
                        </svg>
                    </a>
                </div>
                <div class="nav-servicelist">
                    @php
                    $groupedNavigation = collect($navigationItems)->groupBy('category');
                    $loopIndex = 0;
                    @endphp
                    @foreach($groupedNavigation as $category => $regions)
                    <div class="service-category">
                        <h5> {{ $category }}
                        </h5>
                        <ul>
                            @foreach($regions as $region)
                            <li>
                                <a href="/service-region/{{ $region->slugURL }}"
                                    class="text-white text-decoration-none">{{ $region->region_name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>