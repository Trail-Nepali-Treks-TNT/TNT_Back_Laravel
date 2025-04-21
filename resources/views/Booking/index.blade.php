@extends('Layout._Layout')

@section('main-content')
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0">Booking</h3>
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="javascript:void(0)">Booking</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card card-body">
            <div class="table-responsive">

                <table class="table table-bordered search-table v-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Package</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Guest</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookingList as $index => $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->package_name }}</td>
                            <td>{{ $booking->full_name }}</td>
                            <td>{{ $booking->email }}</td>
                            <td>{{ $booking->phone }}</td>
                            <td>{{ $booking->travel_date }}</td>
                            <td>{{ $booking->guests }}</td>
                            <td>{{ $booking->message }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

@endsection