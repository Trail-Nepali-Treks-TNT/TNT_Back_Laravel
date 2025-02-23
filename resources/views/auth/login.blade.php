<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
        name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, material pro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, material dashboard bootstrap 5 dashboard template" />
    <meta
        name="description"
        content="Material Pro is powerful and clean admin dashboard template" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Material Pro Template by WrapPixel</title>
    <link
        rel="canonical"
        href="https://www.wrappixel.com/templates/materialpro/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/background/logo.png" />
    <link href="/assets/css/style.min.css" rel="stylesheet" />
</head>

<body>
    <div class="main-wrapper">
        <!-- -------------------------------------------------------------- -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- -------------------------------------------------------------- -->
        <div class="preloader">
            <img src="/assets/images/background/loader.svg" />
        </div>
        <!-- -------------------------------------------------------------- -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- -------------------------------------------------------------- -->
        <!-- -------------------------------------------------------------- -->
        <!-- Login box.scss -->
        <!-- -------------------------------------------------------------- -->
        <div
            class="auth-wrapper d-flex no-block justify-content-center align-items-center"
            style="background: url('/assets/images/background/login-bg.jpeg') no-repeat center center;background-size: cover;">
        <div class="auth-box p-4 bg-white rounded">
            <div id="loginform">
                <div class="logo">
                    <h3 class="box-title mb-3">Sign In</h3>
                </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        @if (Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif

                        @if (Session::has('error'))
                        <div class="alert alert-danger ">{{Session::get('error')}}</div>
                        @endif
                        <form
                            class="form-horizontal mt-3 form-material"
                            id="loginform"
                            action="{{ route('account.authenticate') }}"
                            method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <div class="">
                                    <input
                                        type="text" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" />

                                    @error('email')
                                    <p class="invalid-feedback">{{ $message }}</p>

                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="">
                                    <input

                                        type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" />
                                    <label for="password" class="form-label"></label>
                                    @error('password')
                                    <p class="invalid-feedback">{{ $message }}</p>

                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-flex">
                                    <div class="checkbox checkbox-info pt-0">
                                        <input
                                            id="checkbox-signup"
                                            type="checkbox"
                                            class="material-inputs chk-col-indigo" />
                                        <label for="checkbox-signup"> Remember me </label>
                                    </div>
                                    <div class="ms-auto">
                                        <a
                                            href="/resetpass"

                                            class="font-weight-medium"><i class="fa fa-lock me-1"></i> Forgot passwordd?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center mt-4 mb-3">
                                <div class="col-xs-12">
                                    <button
                                        class="
                          btn btn-info
                          d-block
                          w-100
                          waves-effect waves-light
                        "
                                        type="submit">
                                        Log In
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
                                    <div class="social mb-3">
                                        <a
                                            href="javascript:void(0)"
                                            class="btn btn-facebook"
                                            data-bs-toggle="tooltip"
                                            title="Login with Facebook">
                                            <i aria-hidden="true" class="fab fa-facebook-f"></i>
                                        </a>
                                        <a
                                            href="javascript:void(0)"
                                            class="btn btn-googleplus"
                                            data-bs-toggle="tooltip"
                                            title="Login with Google">
                                            <i aria-hidden="true" class="fab fa-google"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 mt-4">
                                <div class="col-sm-12 justify-content-center d-flex">
                                    <p>
                                        Don't have an account?
                                        <a
                                            href="/account/register"
                                            class="text-info font-weight-medium ms-1">Sign Up</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="/assets/lib/jquery/dist/jquery.min.js"></script>

        <script src="/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


        <script>
            $(".preloader").fadeOut();
            $("#to-recover").on("click", function() {
                $("#loginform").slideUp();
                $("#recoverform").fadeIn();
            });
        </script>
</body>

</html>