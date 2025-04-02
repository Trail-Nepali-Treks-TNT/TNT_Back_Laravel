@extends('Client.layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/client-styles/detail.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

<div class="tnt-container detail-page">
    <!-- Nav Breadcrumb  -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Services</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="">Trekking Holidays</a>
            </li>
        </ol>
    </nav>
    <h1 class="package-title font-playfair">Everest Base Camp (EBC)</h1>
    <div class="gallery-wrapper" data-count="1">
        <!-- Left Column (1 image) -->
        <div class="left-item">
            <a data-fancybox="gallery" href="https://images.unsplash.com/photo-1604153353314-ab86f059ff4e?q=80&w=2006&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                <img src="https://images.unsplash.com/photo-1604153353314-ab86f059ff4e?q=80&w=2006&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image" />
            </a>
        </div>
        <!-- Right Column (2x2 grid) -->
        <div class="right-grid">
            <div class="grid-item">
                <a data-fancybox="gallery" href="https://images.unsplash.com/photo-1647042035867-d852ad65c12c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                    <img src="https://images.unsplash.com/photo-1647042035867-d852ad65c12c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image" />
                </a>
            </div>

            <div class="grid-item">
                <a data-fancybox="gallery" href="https://images.unsplash.com/photo-1635770719148-ff581d7a92d0?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                    <img src="https://images.unsplash.com/photo-1635770719148-ff581d7a92d0?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image 2" />
                </a>
            </div>

            <div class="grid-item">
                <a data-fancybox="gallery" href="https://images.unsplash.com/photo-1647042035458-6b0436cd1f71?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                    <img src="https://images.unsplash.com/photo-1647042035458-6b0436cd1f71?q=80&w=2073&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image 3" />
                </a>
            </div>

            <div class="grid-item">
                <a data-fancybox="gallery" href="https://images.unsplash.com/photo-1589848409954-0625f617389c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                    <img src="https://images.unsplash.com/photo-1589848409954-0625f617389c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image" />
                </a>
            </div>
        </div>
        <button
            class="view-all-button d-none"
            aria-haspopup="dialog"
            aria-expanded="false"
            aria-controls="hs-custom-backdrop-modal"
            data-hs-overlay="#hs-custom-backdrop-modal"
            type="button" id="showMoreBtn">
            View all (7) pages
        </button>
    </div>

    Lorem ipsum dolor sit amet consectetur adipisicing elit. Error facere a placeat eum, unde, assumenda maiores enim ducimus sequi velit iste hic! Itaque excepturi, aliquam recusandae laboriosam voluptates sunt animi, consequuntur consequatur, quam fugiat illo cum praesentium dolore? Deserunt hic tenetur, vitae at debitis sed voluptatum porro voluptatem eaque doloribus sapiente dolores fuga officia repellat voluptatibus sint nisi exercitationem cumque. Magni velit incidunt illum nam! Dolorum quaerat accusantium dolorem quam voluptates aliquid optio, magnam architecto voluptatibus dolores iusto, a aliquam odio saepe tempore corrupti aut? Dicta hic tenetur odio quam at quisquam aspernatur, doloremque vel voluptate. Aliquid dicta explicabo provident?
</div>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

<script>
    const wrapper = document.querySelector(".gallery-wrapper");
    const count = wrapper.querySelectorAll("img").length;
    wrapper.setAttribute("data-count", Math.min(count, 5));

    const showMoreBtn = document.getElementById("showMoreBtn")
    if (count > 5) showMoreBtn.classList.add("d-block")

    Fancybox.bind('[data-fancybox="gallery"]', {
        //
    });
</script>
@endsection
@php
// Set SEO variables
$title = 'Trail Nepal Treks';
$description = 'Discover your gateway to the Himalayas with seamless Nepal adventure planning. From trekking and expert guides to transport and tours, customize and book your unforgettable journey today!';

//Hero section
//$heroContainerClassName = "detail-hero-container"
@endphp