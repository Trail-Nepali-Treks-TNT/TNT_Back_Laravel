@php
    function word_count($text)
    {
        return str_word_count(strip_tags($text));
    }
    $title = $title ?? 'Tour itinerary';
    $maxLength = 50;
@endphp


<link rel="stylesheet" href="{{ asset('assets/css/client-styles/itinerary.css') }}">

<div class="itinerary">
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
</script>

<style>
    .hidden {
        display: none;
    }
</style>
