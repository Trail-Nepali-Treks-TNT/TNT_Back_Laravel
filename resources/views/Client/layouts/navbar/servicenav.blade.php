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
                        // Load JSON file directly in the view
                        $jsonPath = resource_path('views/Client/data/data.json');
                        $jsonData = json_decode(file_get_contents($jsonPath), true);
                        $services = $jsonData['services'] ?? []; // Get the "region" array
                    @endphp
                    @foreach ($services as $service)
                        <div class="service-category">
                            <h5>{{ $service['category'] }}</h5>
                            <ul>
                                @foreach ($service['items'] as $item)
                                    <li>
                                        <a href="{{ url($item['link']) }}"
                                            class="text-white text-decoration-none">{{ $item['name'] }}</a>
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