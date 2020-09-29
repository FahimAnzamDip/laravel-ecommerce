@extends('layouts.app')

@section('page-content')
    <!-- Page Breadcrumb Start -->
    <div class="main-breadcrumb mb-100" style="background: rgba(0, 0, 0, 0) url('{{ asset('frontend_assets') }}/img/blog/5.png') no-repeat scroll center center / cover;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcrumb-content text-center ptb-70">
                        <ul class="breadcrumb-list breadcrumb">
                            <li><a href="{{ route('home.page') }}">home</a></li>
                            <li><a href="{{ route('user.home') }}">account</a></li>
                            <li>Register</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Page Breadcrumb End -->
    <!-- Register Account Start -->
    <div class="register-account">
        <div class="container">
            <div class="row">
                <div class="register-title">
                    <h3 class="mb-10">REGISTER ACCOUNT</h3>
                    <p class="mb-10">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
                </div>
            </div>
            <!-- Row End -->
            <div class="row">
                <form class="form-horizontal pb-100" action="{{ route('register') }}" method="post">
                    @csrf
                    <fieldset>
                        <legend>Your Personal Details</legend>
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Your Password</legend>

                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required
                                       autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="buttons newsletter-input">
                                <div class="pull-right">
                                    <input type="submit" value="Register" class="newsletter-btn">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Register Account End -->
@endsection
