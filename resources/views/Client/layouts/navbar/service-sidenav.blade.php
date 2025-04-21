<div class="modal fade sidebar-modal tnt-responsive-sidebar" id="sidebarServiceModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content sidenav-modal-content">
            <div class="modal-header d-flex align-items-center ">
                <h3 class="text-white fs-6 mb-0">Services</h3>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body side-nav-modal-body service-side-nav-modal-body">
                @php
                $groupedNavigation = collect($navigationItems)->groupBy('category');
                $loopIndex = 0;
                @endphp
                <div class="accordion" id="servicesAccordion">
                    @foreach($groupedNavigation as $category => $regions)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $loopIndex }}">
                            <button class="accordion-button {{ $loopIndex === 0 ? '' : 'collapsed' }}" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $loopIndex }}"
                                aria-expanded="{{ $loopIndex === 0 ? 'true' : 'false' }}"
                                aria-controls="collapse{{ $loopIndex }}">
                                {{ $category }}
                            </button>
                        </h2>
                        <div id="collapse{{ $loopIndex }}" class="accordion-collapse collapse "
                            aria-labelledby="heading{{ $loopIndex }}" data-bs-parent="#servicesAccordion">
                            <div class="accordion-body">
                                <ul class="list-group">
                                    @foreach($regions as $region)
                                    <li class="list-group-item">
                                        <a class="text-white text-decoration-none" href="/service-region/{{ $region->slugURL }}"
                                            class="text-decoration-none"> {{ $region->region_name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @php $loopIndex++; @endphp

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>