<link rel="stylesheet" href="{{ asset('assets/css/client-styles/destination.css') }}">

<section class="destination tnt-container">
    <div class="destination-filter-container">
        <div class="destination-filter-section">
            <h3 class="destination-filter-title font-playfair mb-0">Himalayan Destinations to be</h3>
            <div class="filters">
                <button class="btn-days">3 days or less</button>
                <button class="btn-days">4 - 8 days</button>
                <button class="btn-days">9 -15 days</button>
                <button class="btn-days">16 days or more</button>
            </div>
        </div>
        <p class="destination-filter-text mb-0">
            Let us handle the planning! Choose from our expertly designed programs for a stress-free, perfectly tailored journey.
        </p>
    </div>
    <div class="destination-collection">
        @foreach(collect($regionPackageItems)->chunk(3) as $index => $regionPackageRow)
        <div>
            <div class="{{ $index % 2 === 0 ? 'destination-flex-container' : 'destination-flex-container-reverse' }}">
                @if ($index % 2 === 0)
                {{-- Regular Layout: Two on Left, One on Right --}}
                <div class="destination-column">
                    @foreach($regionPackageRow->take(2) as $regionPackage)
                    <a href="#" class="destination-card">
                        <img alt="{{ $regionPackage->region_name }}" src="{{ $regionPackage->dashboard_file_path }}">
                        <div class="destination-overlay"></div>
                        <div class="destination-text-container">
                            <h2>{{ $regionPackage->region_name }}</h2>
                            <p>{{ $regionPackage->package_count }} tours</p>
                        </div>
                    </a>
                    @endforeach
                </div>
                @if ($regionPackageRow->count() === 3)
                <a href="#" class="destination-half-width">
                    <div class="destination-card">
                        <img alt="{{ $regionPackageRow[2]->region_name }}" src="{{ $regionPackageRow[2]->dashboard_file_path }}">
                        <div class="destination-overlay"></div>
                        <div class="destination-text-container">
                            <h2>{{ $regionPackageRow[2]->region_name }}</h2>
                            <p>{{ $regionPackageRow[2]->package_count }} tours</p>
                        </div>
                    </div>
                </a>
                @endif
                @else

                {{-- Reverse Layout: One on Left, Two on Right --}}

                @if ($regionPackageRow->count() === 3)
                <a href="#" class="destination-half-width">
                    <div class="destination-card">
                        <img alt="{{ $regionPackageRow[0]->region_name }}" src="{{ $regionPackageRow[0]->dashboard_file_path }}">
                        <div class="destination-overlay"></div>
                        <div class="destination-text-container">
                            <h2>{{ $regionPackageRow[0]->region_name }}</h2>
                            <p>{{ $regionPackageRow[0]->package_count }} tours</p>
                        </div>
                    </div>
                </a>
                @endif
                <div class="destination-column">
                    @foreach($regionPackageRow->skip(1)->take(2) as $regionPackage)
                    <a href="#" class="destination-card">
                        <img alt="{{ $regionPackage->region_name }}" src="{{ $regionPackage->dashboard_file_path }}">
                        <div class="destination-overlay"></div>
                        <div class="destination-text-container">
                            <h2>{{ $regionPackage->region_name }}</h2>
                            <p>{{ $regionPackage->package_count }} tours</p>
                        </div>
                    </a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <x-news-letter></x-news-letter>
</section>