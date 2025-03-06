@vite('resources/css/client-styles/nav.css')

@if(isset($navclass))
    <div class="{{ $navclass }}">
@else
    <div class="navigation-wrapper">
@endif
        @include("Client.layouts.navbar.topnavbar")
        <div class="container-fluid tnt-container nav-bottom  py-3">
            <header class="w-100 d-flex align-items-center justify-content-between gap-2">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none ">
                    <img src="assets/images/client/logo.svg" alt="Logo">
                </a>
                <ul class="nav flex-row gap-2 justify-content-center d-none d-md-flex nav-bottom-links">
                    <li>
                        <a data-bs-toggle="modal" href="#region"
                            class="nav-link text-decoration-none flex align-items-center gap-1 text-white">
                            Region
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-chevron-down relative top-[1px] ml-1 h-3 w-3 transition duration-200 group-data-[state=open]:rotate-180"
                                aria-hidden="true">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg></a>
                    </li>
                    <li>
                        <a data-bs-toggle="modal" href="#services"
                            class="nav-link text-decoration-none flex align-items-center gap-1 text-white">
                            Services <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-chevron-down relative top-[1px] ml-1 h-3 w-3 transition duration-200 group-data-[state=open]:rotate-180"
                                aria-hidden="true">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg></a>
                    </li>
                    <li><a href="#" class="nav-link text-decoration-none text-white">About us</a></li>
                    <li><a href="#" class="nav-link text-decoration-none text-white">Resources</a></li>
                    <li><a href="#" class="nav-link text-decoration-none text-white">Contact</a></li>
                </ul>
                <div class="position-relative d-none d-md-flex align-items-center nav-bottom-search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="position-absolute start-0 ms-3 text-secondary" style="height: 1rem; width: 1rem;">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <input class="form-control rounded-pill ps-5 text-dark text-base" type="search"
                        placeholder="Search">
                </div>
                <button
                    class="nav-bottom-hamburger position-relative  align-items-center justify-content-center border-0 bg-transparent text-white rounded-md p-2 transition d-inline-flex d-md-none"
                    type="button" id="open-drawer">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-menu" style="width: 2rem; height: 2rem;">
                        <line x1="4" x2="20" y1="12" y2="12"></line>
                        <line x1="4" x2="20" y1="6" y2="6"></line>
                        <line x1="4" x2="20" y1="18" y2="18"></line>
                    </svg>

                    <span class="visually-hidden">Toggle menu</span>
                </button>
            </header>
        </div>
        <div class="alert alert-offer w-100 text-center rounded-0" role="alert">
            EARLY BIRD OFFER - Book now &amp; save up to 20%
        </div>
    </div>