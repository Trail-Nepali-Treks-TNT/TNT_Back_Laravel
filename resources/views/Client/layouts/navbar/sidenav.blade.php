<div class="modal fade sidebar-modal tnt-responsive-sidebar" id="sidebarModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none tnt-logo">
                    <img src="assets/images/client/logo.svg" alt="Logo">
                </a>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body side-nav-modal-body">
                <ul class="nav flex-column gap-2 justify-content-center d-flex nav-bottom-links">
                    <li>
                        <a role="button" data-bs-toggle="modal" data-bs-target="#sidebarRegionModal"
                            class="nav-link text-decoration-none d-flex align-items-center justify-content-between gap-1 text-white {{ ($activeClass ?? '') === 'region' ? 'active' : '' }}">
                            Region
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-chevron-down relative top-[1px] ml-1 h-3 w-3 transition duration-200 group-data-[state=open]:rotate-180"
                                aria-hidden="true">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a role="button" data-bs-toggle="modal" data-bs-target="#sidebarServiceModal"
                            class="nav-link text-decoration-none d-flex align-items-center justify-content-between gap-1 text-white {{ ($activeClass ?? '') === 'service' ? 'active' : '' }}">
                            Services <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-chevron-down relative top-[1px] ml-1 h-3 w-3 transition duration-200 group-data-[state=open]:rotate-180"
                                aria-hidden="true">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg></a>
                    </li>
                    <li><a href="/" class="nav-link text-decoration-none text-white">About us</a></li>
                    <li><a href="/" class="nav-link text-decoration-none text-white">Resources</a></li>
                    <li><a href="/" class="nav-link text-decoration-none text-white">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>