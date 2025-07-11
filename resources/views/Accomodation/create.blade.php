@extends('Layout._Layout')

@section('main-content')
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0">Accomodation</h3>
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{ route('Accomodation.index') }}">Accomodation</a>
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

                    <h1 class="text-2xl font-bold mb-4">Add Accomodation</h1>
                    <form action="{{ route('Accomodation.store') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class="mb-4">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                        @error('name')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-4">
                                        <label>Description</label>
                                        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                        @error('description')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('Accomodation.index') }}" class="ml-2 text-gray-600">Cancel</a>
                            </div>

                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        initHtmlEditor('#description');
    });
</script>
@endsection