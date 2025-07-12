@php
    function word_count($text)
    {
        return str_word_count(strip_tags($text));
    }
    $title = $title ?? 'Tour itinerary';
    $maxLength = 50;
@endphp


<link rel="stylesheet" href="{{ asset('assets/css/client-styles/itinerary.css') }}">
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

 
<div class="itinerary">
    <div id="map" style="width: 100%; max-width: 600px; height: 600px; flex: 1 1 60%;"></div>
    <div class="itinerary-container">
        <h4 class="font-playfair itinerary-title d-flex flex-column gap-2">
            {{ $title }}
            <small>{{ $description }}</small>
        </h4>

        @foreach ($itinerary as $index => $day)
                <div class="itinerary-day d-flex flex-column gap-2">
                    <div class="itinerary-number">
                        {{ $day['number'] }}
                    </div>
                    <div class="itinerary-activity">
                        @php
                            $wordCount = word_count($day['activity']);
                            $isLong = $wordCount > $maxLength;
                            $fullText = nl2br(e($day['activity']));
                            $previewText = nl2br(e(implode(' ', array_slice(explode(' ', strip_tags($day['activity'])), 0, $maxLength))) . '...');
                        @endphp

                        <div>
                            @if ($isLong)
                                {{-- Preview Text --}}
                                <span class="activity-preview" id="preview-{{ $index }}">
                                    {!! $previewText !!}
                                </span>

                                {{-- Full Text --}}
                                <span class="activity-full hidden" id="full-{{ $index }}">
                                    {!! $fullText !!}
                                </span>

                                <button type="button" class="itinerary-readmore" onclick="toggleReadMore({{ $index }})">
                                    Read more
                                </button>
                            @else
                                {!! $fullText !!}
                            @endif
                        </div>

                    </div>
                </div>
        @endforeach
    </div>
</div>
<script>
     // Array of latitude and longitude pairs


    function toggleReadMore(index) {
        const preview = document.getElementById(`preview-${index}`);
        const full = document.getElementById(`full-${index}`);
        const button = event.target;

        if (full.classList.contains('hidden')) {
            preview.classList.add('hidden');
            full.classList.remove('hidden');
            button.textContent = 'Show less';
        } else {
            preview.classList.remove('hidden');
            full.classList.add('hidden');
            button.textContent = 'Read more';
        }
    }
    debugger;
     const redIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
    shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
  });
const coordinates = [
  { name: "Nayapul", lat: 28.2636, lng: 83.6876 },
  { name: "Tikhedhunga", lat: 28.2893, lng: 83.7107 },
  { name: "Ghorepani", lat: 28.4005, lng: 83.6915 },
  { name: "Tadapani", lat: 28.4315, lng: 83.7621 },
  { name: "Chhomrong", lat: 28.5054, lng: 83.8203 },
  { name: "Dovan", lat: 28.5237, lng: 83.8497 },
  { name: "Deurali", lat: 28.5354, lng: 83.8737 },
  { name: "Machapuchare Base Camp", lat: 28.5386, lng: 83.8840 },
  { name: "Annapurna Base Camp", lat: 28.5368, lng: 83.8799 }
];
     // Initialize map centered at first coordinate
  const map = L.map('map').setView(coordinates[0], 13);
    // Add OpenStreetMap tile layer
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(map);

  
coordinates.forEach((point, index) => {
  L.marker([point.lat, point.lng], { icon: redIcon }).addTo(map)
    .bindPopup(`${index + 1}. ${point.name}`);
});

//    // Add markers for each coordinate
//   coordinates.forEach((coord, index) => {
//     L.marker(coord).addTo(map)
//       .bindPopup(`Point ${index + 1}`)
//       .openPopup();
//   });

//    // Add markers for each coordinate
//   coordinates.forEach((coord, index) => {
//     L.marker(coord).addTo(map)
//       .bindPopup(`Point ${index + 1}`)
//       .openPopup();
//   });
 // Draw a polyline connecting all points
 // Draw a line connecting all coordinates
const polyline = L.polyline(coordinates, {
  color: 'blue',       // Line color
  weight: 4,           // Line thickness
  opacity: 0.7,        // Line transparency
  smoothFactor: 1
}).addTo(map);

  // Zoom the map to fit the polyline
  map.fitBounds(polyline.getBounds());

    // var map = new ol.Map({
    //         layers: [
    //             new ol.layer.Tile({
    //                 source: new ol.source.OSM(),
    //                 className: 'ol_bw'
    //             },
    //             ),
    //         ],
    //         view: new ol.View({
    //             center: ol.proj.fromLonLat([84.021507, 28.2900006]),
    //             zoom: 12,
    //         }),
    //         target: 'map',
    //     });
</script>

<style>
    .hidden {
        display: none;
    }
</style>
