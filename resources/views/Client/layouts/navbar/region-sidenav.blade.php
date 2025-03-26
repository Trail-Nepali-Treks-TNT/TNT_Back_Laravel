<div class="modal fade sidebar-modal tnt-responsive-sidebar" id="sidebarRegionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content sidenav-modal-content">
            <div class="modal-header d-flex align-items-center ">
                <h3 class="text-white fs-6 mb-0">Region</h3>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body side-nav-modal-body region-side-nav-modal-body">
                
                @foreach ($navigationItems as $nav)
                <a href="/" class="text-decoration-none sidebar-region-card">
                    <img class="region-img" alt="{{ $nav->region_name }}" src="{{ $nav->dashboard_file_path }}" />
                    <span class="font-playfair text-white text-decoration-none region-card-title">
                        {{ $nav->region_name }}
                    </span>
                </a>
                @endforeach
                
            </div>
        </div>
    </div>
</div>