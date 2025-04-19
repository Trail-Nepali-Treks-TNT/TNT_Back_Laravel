<link rel="stylesheet" href="{{ asset('assets/css/client-styles/breadcrumbs.css') }}">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach ($items as $index => $item)
                @php
                    $isLast = $loop->last;
                    $hasPath = isset($item['path']) && !empty($item['path']);
                @endphp

                <li class="breadcrumb-item {{ $isLast ? 'active' : '' }}" {{ $isLast ? 'aria-current=page' : '' }}>
                    @if ($hasPath)
                        <a href="{{ $item['path'] }}">{{ $item['name'] }}</a>
                    @else
                        <span>
                            {{ $item['name'] }}
                        </span>
                    @endif
                </li>
        @endforeach
    </ol>
</nav>
