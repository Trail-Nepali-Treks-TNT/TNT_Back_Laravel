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
                <li class="breadcrumb-item active">
                    <a href="{{ route('ServiceRegion.index') }}">Service Region</a>
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

                    <h1 class="text-2xl font-bold mb-4">Add Service Region</h1>
                    <form action="{{ route('ServiceRegion.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <!-- Service Type Field -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="service_type_id">Service Type</label>
                                    <select name="service_type_id" id="service_type_id" class="form-control" required>
                                        <option value="">-- Select Service Type --</option>
                                        @foreach($serviceTypes as $serviceType)
                                        <option value="{{ $serviceType->id }}">{{ $serviceType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Name Field -->
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="slugURL">Slug URL</label>
                                    <input type="text" name="slugURL" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <!-- Description Field -->
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" rows="3" class="form-control"></textarea>
                        </div>

                        <!-- Reason Field -->
                        <div class="form-group mb-3">
                            <label for="reason">Reason</label>
                            <textarea name="reason" rows="3" class="form-control"></textarea>
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

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection