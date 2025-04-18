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
                <li class="breadcrumb-item active">
                    <a href="{{ route('PackageDetail.index') }}">Service Region</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Create</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="container-fluid" id="dataListContainer">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-body card-body--alternate mb-0">

                    <h1 class="text-2xl font-bold mb-4">Add Package</h1>
                    <form action="{{ route('PackageDetail.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <!-- Service Type Field -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="service_region_id">Region</label>
                                    <select name="service_region_id" id="service_region_id" class="form-control" required>
                                        <option value="">-- Select Region --</option>
                                        @foreach($serviceRegions as $serviceRegion)
                                        <option value="{{ $serviceRegion->id }}">{{ $serviceRegion->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_region_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="">-- Select Category --</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Name Field -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="old_price">Old Prce</label>
                                    <input step="any" type="number" name="old_price" class="form-control" required>
                                    @error('old_price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="price">New Price</label>
                                    <input step="any" type="number" name="price" class="form-control" required>
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
                                        <option value="{{ $difficultyLevel->id }}">{{ $difficultyLevel->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('difficulty_level_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="package_accommodation">Accommodation</label>
                                    <select name="package_accommodation[]" id="package_accommodation" class="form-control" multiple required>
                                        @foreach($accomodations as $accommodation)
                                        <option value="{{ $accommodation->id }}" {{ in_array($accommodation->id, old('package_accommodation', [])) ? 'selected' : '' }}>
                                            {{ $accommodation->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('package_accommodation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label for="starting_point">Starting Point</label>
                                    <input type="text" name="starting_point" class="form-control" required>
                                    @error('starting_point')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label for="availability">Availability</label>
                                    <input type="text" name="availability" class="form-control" required>
                                    @error('availability')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label for="duration">Duration</label>
                                    <input type="text" name="duration" class="form-control" required>
                                    @error('duration')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label for="walking_per_day">Walking Per Day</label>
                                    <input type="text" name="walking_per_day" class="form-control" required>
                                    @error('walking_per_day')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label for="group_size">Group size</label>
                                    <input type="text" name="group_size" class="form-control" required>
                                    @error('group_size')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label for="total_distance">Total Distance</label>
                                    <input type="text" name="total_distance" class="form-control" required>
                                    @error('total_distance')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group mb-3">
                                    <label for="max_elevation">Max Elevation</label>
                                    <input type="text" name="max_elevation" class="form-control" required>
                                    @error('max_elevation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2 col-md-2 mt-4">
                                <label for="best_seller" class="form-label">Best Seller?</label>
                                <input type="hidden" name="best_seller" value="0">
                                <input type="checkbox" class="form-check-input" name="best_seller" id="best_seller" value="1">
                            </div>
                            <div class="mb-2 col-md-2 mt-4">
                                <label for="popular" class="form-label">Popular?</label>
                                <input type="hidden" name="popular" value="0">
                                <input type="checkbox" class="form-check-input" name="popular" id="popular" value="1">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="slugURL">Slug URL</label>
                                    <input type="text" name="slugURL" class="form-control" required>
                                    @error('slugURL')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Short Description Field -->
                        <div class="form-group mb-3">
                            <label for="short_description">Short Description</label>
                            <textarea name="short_description" rows="3" class="form-control" required></textarea>
                            @error('short_description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description Field -->
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" rows="3" class="form-control" required></textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#package_accommodation').select2({
            placeholder: "Select Accommodations",
        });
    });
</script>
@endsection