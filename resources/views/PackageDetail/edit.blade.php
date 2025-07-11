@extends('Layout._Layout')

@section('main-content')
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0">Package</h3>
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('PackageDetail.index') }}">Package</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="javascript:void(0)">Edit</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="container-fluid" id="dataListContainer">
        <div class="row">
            <div class="col-lg-12">
                <input type="hidden" id="packageDetailId" value="{{ $packageDetail->id }}">
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" href="#content" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Content
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-itinerary-tab" data-bs-toggle="pill" href="#itinerarySection" role="tab" aria-controls="pills-itinerary" aria-selected="false">
                            Itinerary
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-inclusion-tab" data-bs-toggle="pill" href="#inclusionSection" role="tab" aria-controls="pills-inclusion" aria-selected="false">
                            Inclusion
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-image-tab" data-bs-toggle="pill" href="#packageImageSection" role="tab" aria-controls="pills-image" aria-selected="false">
                            Image
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-package-faq-tab" data-bs-toggle="pill" href="#faqSection" role="tab" aria-controls="pills-package-faq" aria-selected="false">
                            FAQs
                        </a>
                    </li>
                </ul>
                <div class="tab-content tabcontent-border mt-3" id="pills-tabContent">

                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card card-body card-body--alternate mb-0">
                            <h1 class="text-2xl font-bold mb-4">Edit Service Region</h1>
                            <form id="packageDetailEditForm" action="{{ route('PackageDetail.store') }}" method="PUT">
                                @csrf
                                <input type="hidden" id="id" value="{{ $packageDetail->id }}">
                                <div class="row">
                                    <!-- Service Type Field -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="service_region_id">Region</label>
                                            <select name="service_region_id" id="service_region_id" class="form-control" required>
                                                <option value="">-- Select Region --</option>
                                                @foreach($serviceRegions as $serviceRegion)
                                                <option value="{{ $serviceRegion->id }}" {{ $packageDetail->service_region_id == $serviceRegion->id ? 'selected' : '' }}>
                                                    {{ $serviceRegion->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <div class="text-danger error-message" id="service_region_id-error"></div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="category_id">Category</label>
                                            <select name="category_id" id="category_id" class="form-control" required>
                                                <option value="">-- Select Category --</option>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $packageDetail->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <div class="text-danger error-message" id="category_id-error"></div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Name Field -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name', $packageDetail->name) }}" required>
                                            <div class="text-danger error-message" id="name-error"></div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="old_price">Old Prce</label>
                                            <input step="any" type="number" name="old_price" class="form-control" value="{{ old('old_price', $packageDetail->old_price) }}" required>
                                            <div class="text-danger error-message" id="old_price-error"></div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label for="price">New Price</label>
                                            <input step="any" type="number" name="price" class="form-control" value="{{ old('price', $packageDetail->price) }}" required>
                                            <div class="text-danger error-message" id="price-error"></div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="difficulty_level_id">Difficulty Level</label>
                                            <select name="difficulty_level_id" id="difficulty_level_id" class="form-control" required>
                                                <option value="">-- Select Difficulty --</option>
                                                @foreach($difficultyLevels as $difficultyLevel)
                                                <option value="{{ $difficultyLevel->id }}" {{ $packageDetail->difficulty_level_id == $category->id ? 'selected' : '' }}>
                                                    {{ $difficultyLevel->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <div class="text-danger error-message" id="difficulty_level_id-error"></div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="package_accommodation">Accommodation</label>
                                            <select name="package_accommodation[]" id="package_accommodation" class="form-control" multiple required>
                                                @foreach($accomodations as $accommodation)
                                                <option value="{{ $accommodation->id }}"
                                                    {{ in_array($accommodation->id, old('package_accommodation', $packageDetail->package_accommodation->pluck('accomodation_id')->toArray())) ? 'selected' : '' }}>
                                                    {{ $accommodation->name }}
                                                </option>

                                                @endforeach
                                            </select>
                                            <div class="text-danger error-message" id="package_accommodation-error"></div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group mb-3">
                                            <label for="starting_point">Starting Point</label>
                                            <input type="text" name="starting_point" class="form-control" value="{{ old('starting_point', $packageDetail->starting_point) }}" required>
                                            <div class="text-danger error-message" id="starting_point-error"></div>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-3">
                                            <label for="availability">Availability</label>
                                            <input type="text" name="availability" class="form-control" value="{{ old('availability', $packageDetail->availability) }}" required>
                                            <div class="text-danger error-message" id="availability-error"></div>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-3">
                                            <label for="duration">Duration</label>
                                            <input type="text" name="duration" class="form-control" value="{{ old('duration', $packageDetail->duration) }}" required>
                                            <div class="text-danger error-message" id="duration-error"></div>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-3">
                                            <label for="walking_per_day">Walking Per Day</label>
                                            <input type="text" name="walking_per_day" class="form-control" value="{{ old('walking_per_day', $packageDetail->walking_per_day) }}" required>
                                            <div class="text-danger error-message" id="walking_per_day-error"></div>

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-3">
                                            <label for="group_size">Group size</label>
                                            <input type="text" name="group_size" class="form-control" value="{{ old('group_size', $packageDetail->group_size) }}" required>
                                            <div class="text-danger error-message" id="group_size-error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-3">
                                            <label for="total_distance">Total Distance</label>
                                            <input type="text" name="total_distance" class="form-control" value="{{ old('total_distance', $packageDetail->total_distance) }}" required>
                                            <div class="text-danger error-message" id="total_distance-error"></div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group mb-3">
                                            <label for="max_elevation">Max Elevation</label>
                                            <input type="text" name="max_elevation" class="form-control" value="{{ old('max_elevation', $packageDetail->max_elevation) }}" required>
                                            <div class="text-danger error-message" id="max_elevation-error"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-2 mt-4">
                                        <label for="best_seller" class="form-label">Best Seller?</label>
                                        <input type="hidden" name="best_seller" value="0">
                                        <input type="checkbox" class="form-check-input" name="best_seller" id="best_seller" value="1"
                                            {{ old('best_seller', $packageDetail->best_seller ?? false) ? 'checked' : '' }}>
                                    </div>
                                    <div class="mb-3 col-md-2 mt-4">
                                        <label for="popular" class="form-label">Popular?</label>
                                        <input type="hidden" name="popular" value="0">
                                        <input type="checkbox" class="form-check-input" name="popular" id="popular" value="1"
                                            {{ old('popular', $packageDetail->popular ?? false) ? 'checked' : '' }}>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="slugURL">Slug URL</label>
                                            <input type="text" name="slugURL" class="form-control" value="{{ old('slugURL', $packageDetail->slugURL) }}" required>
                                            <div class="text-danger error-message" id="slugURL-error"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Short Description Field -->
                                <div class="form-group mb-3">
                                    <label for="short_description">Short Description</label>
                                    <textarea id="short_description" name="short_description" rows="3" class="form-control" required>
                                    {{ old('short_description', $packageDetail->short_description) }}
                                    </textarea>
                                    <div class="text-danger error-message" id="short_description-error"></div>

                                </div>

                                <!-- Description Field -->
                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" rows="3" class="form-control" required>
                                    {{ old('description', $packageDetail->description) }}
                                    </textarea>
                                    <div class="text-danger error-message" id="description-error"></div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="itinerarySection" role="tabpanel" aria-labelledby="pills-itinerary-tab">

                    </div>

                    <div class="tab-pane fade" id="inclusionSection" role="tabpanel" aria-labelledby="pills-inclusion-tab">

                    </div>
                    <div class="tab-pane fade" id="packageImageSection" role="tabpanel" aria-labelledby="pills-image-tab">

                    </div>

                    <div class="tab-pane fade" id="faqSection" role="tabpanel" aria-labelledby="pills-package-faq-tab">

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/pagescripts/PackageDetail/edit.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var epd = new EditPackageDetail();
        epd.init();
    });
</script>
@endsection