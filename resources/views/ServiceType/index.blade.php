@extends('Layout._Layout')

@section('main-content')
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0">Service Type</h3>
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="javascript:void(0)">Service Type</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        @if(session('success'))
            @include('Shared.successAlert')
        @endif
        <div class="card ">
            <div class="row">
                <div class="widget-content searchable-container list">
                    <div class="d-flex justify-content-end mb-3 mt-3">
                        <a href="{{ route('ServiceType.create') }}" style="margin-right: 17px;"> <button class="btn btn-primary">Add New</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-body">
            <div class="table-responsive">

                <table class="table table-bordered search-table v-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($serviceTypes as $index => $service)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->description }}</td>
                            <td>
                                <a href="{{ route('ServiceType.edit', $service->id) }}"
                                    style="background-color:#6610f2; border-radius: .3rem; padding: .13rem .6rem; margin-right: .4rem;">
                                    <i class="fa-regular fa-pen-to-square" style="color: white;"></i>
                                </a>
                                <a href="{{ route('ServiceType.delete', $service->id) }}"
                                    style="background-color: red; border-radius: .3rem; padding: .13rem .6rem; margin-right: .4rem;">
                                    <i data-feather="trash-2" class="feather-sm fill-white" style="color: white;"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

@endsection