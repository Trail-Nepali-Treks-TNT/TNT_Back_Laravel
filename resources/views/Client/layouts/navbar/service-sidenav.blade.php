<div class="modal fade sidebar-modal tnt-responsive-sidebar" id="sidebarServiceModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content sidenav-modal-content">
            <div class="modal-header d-flex align-items-center ">
                <h3 class="text-white fs-6 mb-0">Services</h3>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body side-nav-modal-body service-side-nav-modal-body">
                @php
                    // Load JSON file directly in the view
                    $jsonPath = resource_path('views/Client/data/data.json');
                    $jsonData = json_decode(file_get_contents($jsonPath), true);
                    $services = $jsonData['services'] ?? []; // Get the "region" array
                @endphp
                <div class="accordion" id="servicesAccordion">
                    @foreach ($services as $index => $service)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $index }}">
                                    {{ $service['category'] }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse "
                                aria-labelledby="heading{{ $index }}" data-bs-parent="#servicesAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        @foreach ($service['items'] as $item)
                                            <li class="list-group-item">
                                                <a class="text-white text-decoration-none" href="{{ $item['link'] }}"
                                                    class="text-decoration-none">{{ $item['name'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>