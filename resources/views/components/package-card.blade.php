
@props([
    'images' => [],
    'title',
    'description',
    'expiryDate',
    'price',
    'discountedPrice' => null,
    'discountPercentage' => null,
    'bestSeller' => false,
    'popular' => false,
    'link' => ''
])
@php
    $currentDate = \Carbon\Carbon::now();
    $expiry = \Carbon\Carbon::parse($expiryDate);
    $duration = $currentDate->diffInDays($expiry);
@endphp

@vite('resources/css/client-styles/package-card.css')
<div class="package-card shadow-sm rounded" data-aos="fade-up">
    <div class="package-card-img-container position-relative">
        <div class="package-card-badge-container">
            @if($bestSeller)
                <div class="package-card-badge best-seller">Best Seller</div>
            @endif
            @if($popular)
                <div class="package-card-badge popular">Popular</div>
            @endif
        </div>

        <div class="package-card-swiper-container swiper">
            <div class="swiper-wrapper position-relative">
                @foreach($images as $image)
                        <img src="{{ $image }}" class="cover swiper-slide" alt="Package image">
                @endforeach
            </div>
             <button class="tnt-slider-btn tnt-card-img-slider-next-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-arrow-right">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </button>

                        <button class="tnt-slider-btn tnt-card-img-slider-prev-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-arrow-left">
                                <path d="m12 19-7-7 7-7"></path>
                                <path d="M19 12H5"></path>
                            </svg>
                        </button>
        </div>
    </div>
    <div class="package-card-detail">
        <div class="package-card-duration d-flex align-items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
            </svg>
            {{ intval($duration) }} days
        </div>
        <a href="{{ $link }}" class="text-decoration-none">
            <div class="package-card-title font-playfair">{{ $title }}</div>
        </a>
        <div class="package-card-description">{{ $description }}</div>
    </div>
    <div class="package-card-price d-flex flex-column gap-1">
        <div class="actual-price d-flex align-items-end gap-2">
            ${{ number_format($price, 2) }}

            @if($discountedPrice && $price > 0)
                            @php
    $calculatedDiscount = round((($price - $discountedPrice) / $price) * 100);
                            @endphp
                                <span class="discount-percentage">Save {{ $calculatedDiscount }}%</span>
            @endif
        </div>
        @if($discountedPrice)
            <div class="current-price d-flex align-items-center gap-1">
                From ${{ number_format($discountedPrice, 2) }}
                <span>/person</span>
            </div>
        @endif
    </div>
</div>
@vite('resources/js/client/package-card.js')


