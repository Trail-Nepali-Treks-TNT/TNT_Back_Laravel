<!-- /**
* Class IncludedExcludedSection

* Props:
* - includes: An array of associative arrays, each containing a 'title' and 'description' of an included item.
* - excludes: An array of associative arrays, each containing a 'title' and 'description' of an excluded item.
* - showIncludeSeeAll: (bool) Whether to show the "See all" link in the include section.
* - showExcludeSeeAll: (bool) Whether to show the "Hide" link in the exclude section.
*
* Example:
* <x-included-excluded-section * :includes="[
 *         ['title' => 'Accommodation in Kathmandu', 'description' => '3 nights in a shared twin bedroom...']
 *     ]" * :excludes="[
 *         ['title' => 'Visa Fees', 'description' => 'Nepal entry visa costs (available on arrival).']
 *     ]" * :show-include-see-all="true" * :show-exclude-see-all="false" * />
*
* @package App\View\Components
*/ -->
<link rel="stylesheet" href="{{ asset('assets/css/client-styles/included-excluded.css') }}">
<div class="included-excluded">
    <div class="section-intro d-flex gap-4 flex-column">
        <h4 class="section-title font-playfair">What’s included and what to bring on this tour</h4>
        <p class="section-description">
            Always be ready for your next adventure in Nepal! Check out our comprehensive list of what's
            included and what essentials you should bring or consider adding to your trip.
        </p>
    </div>

    <div class="section-list includes">
        <div class="list-wrapper d-flex gap-4 flex-column">
            <h5 class="list-title font-playfair">Include</h5>
            <ul class="item-list">
                @foreach ($includes as $item)
                    <li class="include-item">
                        <strong class="item-title">{{ $item['title'] }}</strong>
                        <p class="item-description">{{ $item['description'] }}</p>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>

    <div class="section-list excludes">
        <div class="list-wrapper d-flex gap-4 flex-column">
            <h5 class="list-title font-playfair">Exclude</h5>
            <ul class="item-list">
                @foreach ($excludes as $item)
                    <li class="item exclude-item">
                        <strong class="item-title">{{ $item['title'] }}</strong>
                        <p class="item-description">{{ $item['description'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
