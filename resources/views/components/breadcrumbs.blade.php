<link rel="stylesheet" href="{{ asset('assets/css/client-styles/breadcrumbs.css') }}">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach ($items as $index => $item)
            @if ($loop->last)
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ $item['path'] ?? '#' }}">{{ $item['name'] }}</a>
                </li>
            @else
                <li class="breadcrumb-item">
                    <a href="{{ $item['path'] ?? '#' }}">{{ $item['name'] }}</a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
