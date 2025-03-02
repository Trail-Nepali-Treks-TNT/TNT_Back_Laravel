{{-- resources/views/Client/dashboard.blade.php --}}
@extends('Client.layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Client Dashboard</h1>
                    <p>Welcome to your client dashboard.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@php
    // Set SEO variables
    $title = 'Trail Nepal Treks';
    $description = 'Discover your gateway to the Himalayas with seamless Nepal adventure planning. From trekking and expert guides to transport and tours, customize and book your unforgettable journey today!';

@endphp