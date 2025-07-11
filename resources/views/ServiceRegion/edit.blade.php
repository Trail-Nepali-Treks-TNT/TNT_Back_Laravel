@extends('Layout._Layout')

@section('main-content')
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0">Service Region</h3>
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('ServiceRegion.index') }}">Service Region</a>
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
                <input type="hidden" id="serviceRegionId" value="{{ $serviceRegion->id }}">
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" href="#content" role="tab" aria-controls="pills-profile" aria-selected="false">Content</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-faq-tab" data-bs-toggle="pill" href="#faqSection" role="tab" aria-controls="pills-faq" aria-selected="false">FAQs</a>
                    </li>
                </ul>
                <div class="tab-content tabcontent-border mt-3" id="pills-tabContent">

                    <div class="tab-pane fade active show" id="content" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card card-body card-body--alternate mb-0">
                            <h1 class="text-2xl font-bold mb-4">Edit Service Region</h1>
                            <form action="{{ route('ServiceRegion.update', $serviceRegion->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="banner_file_detail_id" value="{{ $serviceRegion->banner_file_detail_id }}">
                                <input type="hidden" name="dahboard_file_detail_id" value="{{ $serviceRegion->dahboard_file_detail_id }}">
                                <div class="row">
                                    <!-- Service Type Field -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="service_type_id">Service Type</label>
                                            <select name="service_type_id" id="service_type_id" class="form-control" required>
                                                <option value="">-- Select Service Type --</option>
                                                @foreach($serviceTypes as $serviceType)
                                                <option value="{{$serviceType->id }}" {{ $serviceRegion->service_type_id == $serviceType->id ? 'selected' : '' }}>
                                                    {{ $serviceType->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Name Field -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name', $serviceRegion->name) }}" required>
                                            @error('name')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="slugURL">Slug URL</label>
                                            <input type="text" name="slugURL" class="form-control" value="{{ old('slugURL', $serviceRegion->slugURL) }}" required>
                                            @error('slugURL')
                                            <div class="text-red-500">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- Description Field -->
                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" rows="3" class="form-control">
                                    {{ old('description', $serviceRegion->description) }}
                                    </textarea>
                                    @error('description')
                                    <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Reason Field -->
                                <div class="form-group mb-3">
                                    <label for="reason">Reason</label>
                                    <textarea id="reason" name="reason" rows="3" class="form-control">
                                    {{ old('reason', $serviceRegion->reason) }}
                                    </textarea>
                                    @error('reason')
                                    <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Banner File Upload -->
                                <div class="form-group mb-3">
                                    <label for="banner_file">Banner File</label>
                                    <input type="file" name="banner_file" class="form-control">
                                </div>

                                <!-- Dashboard File Upload -->
                                <div class="form-group mb-3">
                                    <label for="dashboard_file">Dashboard File</label>
                                    <input type="file" name="dashboard_file" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="faqSection" role="tabpanel" aria-labelledby="pills-faq-tab">
                        <div class="card card-body card-body--alternate mb-0">
                            <!-- <h1 class="text-2xl font-bold mb-4">FAQs</h1> -->

                            <div id="faq-list">
                                <table class="table table-bordered search-table v-middle">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($serviceRegion->faqs as $index=> $faqSingle)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $faqSingle->question }}</td>
                                            <td>{{ $faqSingle->answer }}</td>
                                            <td>
                                                <a href="javascript:void(0);" onclick='getfaqForm("{{ $faqSingle->id }}")'
                                                    style="background-color:#6610f2; border-radius: .3rem; padding: .13rem .6rem; margin-right: .4rem;">
                                                    <i class="fa-regular fa-pen-to-square" style="color: white;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4">
                                                No FAQs available yet.
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Button to show the FAQ form -->
                            <div id="faq-form-container">
                                @include('ServiceRegion.faq_form')
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/pagescripts/ServiceRegion/edit.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var esr = new EditServiceRegion();
        esr.init();
    });
</script>
@endsection