<link rel="stylesheet" href="{{ asset('assets/css/client-styles/faq.css') }}">
<div class="faqs-container">
    <h3 class="faqs-title font-playfair">FAQs:</h3>
    <div class="accordion accordion-flush mb-5" id="accordionPanelsFAQs">
        @foreach($faqs as $index => $faq)
                @php
                    $id = 'faqs-' . ($index + 1);
                    $isFirst = $index === 0;
                @endphp
                <div class="accordion-item">
                    <h2 class="accordion-header font-playfair" id="heading{{ $id }}">
                        <button class="accordion-button {{ $isFirst ? '' : 'collapsed' }}" type="button"
                            data-bs-toggle="collapse" data-bs-target="#{{ $id }}"
                            aria-expanded="{{ $isFirst ? 'true' : 'false' }}" aria-controls="{{ $id }}">
                            <span class="numbering">{{ str_pad($index + 1, 3, '0', STR_PAD_LEFT) }} </span>
                            {{ $faq->question }}
                        </button>
                    </h2>
                    <div id="{{ $id }}" class="accordion-collapse collapse {{ $isFirst ? 'show' : '' }}">
                        <div class="accordion-body">
                            {{ $faq->answer }}
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
</div>
