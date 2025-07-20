@php
    function word_count($text)
    {
        return str_word_count(strip_tags($text));
    }
    $title = $title ?? 'Tour Itinerary';
    $maxLength = 50;
@endphp

<!-- Leaflet & Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<link rel="stylesheet" href="{{ asset('assets/css/client-styles/itinerary.css') }}">
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<!-- Optional: Leaflet pin icon (default) -->
<style>
    #map {
        height: 80dvh;
        width: 100%;
    }

    .leaflet-popup-content {
        font-size: 14px;
        font-weight: 500;
    }

    .itinerary-scrollable {
        max-height: 80dvh;
        overflow-y: auto;
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .itinerary-scrollable::-webkit-scrollbar {
        display: none;
    }

    .itinerary-readmore {
        border: none;
        background: none;
        color: #0d6efd;
        cursor: pointer;
        padding: 0;
    }

    .itinerary-day:hover {
        background: #f8f9fa;
        cursor: pointer;
    }

    .highlighted {
        border-left: 4px solid #B6004D;
        background-color: #f1fdf4;
    }
</style>



<div class="">
    <div class="row">
        <div class="mb-4 col-md-6 itinerary-map">
            <div id="map"></div>
        </div>

        <div class="py-4 col-md-6 itinerary-scrollable">
            <div>
                <h3 class="gap-2 font-playfair itinerary-title d-flex flex-column">Tour itinerary
                    <small>{{ $description }}</small>
                </h3>
            </div>
            @foreach ($itinerary as $index => $day)
                @php
                    $wordCount = word_count($day['activity']);
                    $isLong = $wordCount > $maxLength;
                    $fullText = nl2br(e($day['activity']));
                    $previewText = nl2br(e(implode(' ', array_slice(explode(' ', strip_tags($day['activity'])), 0, $maxLength))) . '...');
                @endphp

                <div class="mb-3 bg-transparent card itinerary-day" data-index="{{ $index }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $day['number'] }}</h5>
                        <p class="card-text">
                            @if ($isLong)
                                <span class="activity-preview" id="preview-{{ $index }}">{!! $previewText !!}</span>
                                <span class="hidden activity-full" id="full-{{ $index }}">{!! $fullText !!}</span>
                                <button class="itinerary-readmore" onclick="toggleReadMore({{ $index }})">Read more</button>
                            @else
                                {!! $fullText !!}
                            @endif
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    const itineraryData = @json($itinerary);

    const map = L.map('map', {
        scrollWheelZoom: false,
        zoomControl: true
    });

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Get all lat/lngs
    const coords = itineraryData.map(d => [parseFloat(d.latitude), parseFloat(d.longitude)]);

    // Full route (gray)
    const fullRoute = L.polyline(coords, {
        color: '#717475',
        weight: 2
    }).addTo(map);

    // Fit map to show full path initially
    map.fitBounds(fullRoute.getBounds(), {
        padding: [30, 30] // Optional: padding around path
    });

    // Active segment (pink)
    const activeRoute = L.polyline([], {
        color: '#B6004D',
        weight: 2
    }).addTo(map);

    // Utility to load custom SVG pin icons
    function createSvgIcon(path, size = [32, 32]) {
        return L.icon({
            iconUrl: path,
            iconSize: size,
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });
    }

    const inactiveIcon = createSvgIcon('{{ asset('assets/images/client/icon/inactive-location-pin.svg') }}');
    const activeIcon = createSvgIcon('{{ asset('assets/images/client/icon/active-location-pin.svg') }}');

    // Create location pin markers
    const markers = itineraryData.map((day, index) => {
        const marker = L.marker([day.latitude, day.longitude], {
            icon: inactiveIcon
        }).addTo(map);
        return marker;
    });

    // Highlight active marker and draw visited route
    function goToIndex(index) {
        const marker = markers[index];

        // Do not zoom or fly; just pan
        map.panTo(marker.getLatLng());

        // Set active/inactive pin icons
        markers.forEach((m, i) => {
            m.setIcon(i === index ? activeIcon : inactiveIcon);
        });

        // Update route progress
        const segment = itineraryData.slice(0, index + 1).map(d => [parseFloat(d.latitude), parseFloat(d.longitude)]);
        activeRoute.setLatLngs(segment);

        // Highlight card
        document.querySelectorAll('.itinerary-day').forEach((el, i) => {
            el.classList.toggle('highlighted', i === index);
        });
    }

    // Scroll observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const index = parseInt(entry.target.getAttribute('data-index'));
            if (entry.isIntersecting) goToIndex(index);
        });
    }, { threshold: 0.6 });

    // Observe and bind click handlers to each day
    document.querySelectorAll('.itinerary-day').forEach((el, index) => {
        observer.observe(el);
        el.addEventListener('click', () => goToIndex(index));
    });
    goToIndex(0);
</script>