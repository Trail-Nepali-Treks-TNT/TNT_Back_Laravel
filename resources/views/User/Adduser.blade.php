@extends('Layout._Layout')
@section('main-content')

<div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
    <div class=" auth-box p-4 bg-white rounded">
        <div class="logo text-center">
            <span class="db"><img src="../../assets/images/logo-icon.png" alt="logo" /></span>
            <h5 class="font-weight-medium mb-3 mt-1">Create a new user</h5>
        </div>
        <!-- Form -->
        <div class="row mt-4">
            <div class="col-12">
                <form class="form-horizontal" action="{{route('process-adduser')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <div class="form-floating mb-3"> <input

                                type="text" value="{{old('name')}}" class="form-control form-input-bg @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" required />
                            <label for="name">Full Name</label>
                            @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>

                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input

                                type="text" value="{{old('email')}}" class="form-control form-input-bg @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required />
                            <label for="email">Email</label>
                            @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>

                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input

                                type="text" value="" class="form-control form-input-bg @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="123456" required />
                            <label for="phone">phone</label>
                            @error('phone')
                            <p class="invalid-feedback">{{ $message }}</p>

                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input

                                type="file" value="" class="form-control form-input-bg @error('profile_image') is-invalid @enderror" name="profile_image" id="profile_image" placeholder="image" required />

                            @error('profile_image')
                            <p class="invalid-feedback">{{ $message }}</p>

                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input

                                type="text" value="" class="form-control form-input-bg @error('address') is-invalid @enderror" name="address" id="address" placeholder="abcd" required />
                            <label for="address">address</label>
                            @error('address')
                            <p class="invalid-feedback">{{ $message }}</p>

                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input

                                type="text" value="" class="form-control form-input-bg @error('role') is-invalid @enderror" name="role" id="role" placeholder="role" required />
                            <label for="role">role</label>
                            @error('role')
                            <p class="invalid-feedback">{{ $message }}</p>

                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input

                                type="password" class="form-control form-input-bg @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" required />
                            <label for="password">Password</label>
                            @error('password')
                            <p class="invalid-feedback">{{ $message }}</p>

                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input

                                type="password" class="form-control form-input-bg @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" value="" placeholder="Confirm Password" required />
                            <label for="password">Confirm Password</label>
                            @error('password_confirmation')
                            <p class="invalid-feedback">{{ $message }}</p>

                            @enderror
                        </div>

                        <div class="d-flex align-items-stretch">
                            <button type="submit" class="btn btn-info d-block w-100">
                                Add user
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection