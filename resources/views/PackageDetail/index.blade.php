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
                    <a href="javascript:void(0)">Package</a>
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
                        <a href="{{ route('PackageDetail.create') }}" style="margin-right: 17px;"> <button class="btn btn-primary">Add New</button></a>
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
                        @foreach ($packageList as $index => $pkg)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pkg->name }}</td>
                            <td>{{ $pkg->description }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

@endsection