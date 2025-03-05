@vite('resources/css/client-styles/nav.css')

@if(isset($navclass))
    <div class="{{ $navclass }}">
@else
    <div class="navigation-wrapper">
@endif
        @include("Client.layouts.navbar.topnavbar")
    </div>
