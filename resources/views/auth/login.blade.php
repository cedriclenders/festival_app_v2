@extends('layouts.unsigned-app')

@section('content')
<div class="page-content pb-0">

    <div data-card-height="cover" class="card">
        <div class="card-top notch-clear">
            <div class="d-flex">
                <a href="#" data-back-button class="me-auto icon icon-m"><i class="font-14 fa fa-arrow-left color-theme"></i></a>
                <a href="#" data-toggle-theme class="show-on-theme-light ms-auto icon icon-m"><i class="font-12 fa fa-moon color-theme"></i></a>
                <a href="#" data-toggle-theme class="show-on-theme-dark ms-auto icon icon-m"><i class="font-12 fa fa-lightbulb color-yellow-dark"></i></a>
            </div>
        </div>
        <div class="card-center">
            <div class="ps-5 pe-5">
                <h1 class="text-center font-800 font-40 mb-1">Sign In</h1>
                <p class="color-highlight text-center font-12">Let's get you logged in</p>
                <form id="loginForm" method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="input-style no-borders has-icon validate-field">
                    <i class="fa fa-user"></i>
                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address">
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                    

                <div class="input-style no-borders has-icon validate-field mt-4">
                    <i class="fa fa-lock"></i>
                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                @error('password')
                <span  role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                @error('email')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                <div class="d-flex mt-4 mb-4">
                    <div class="w-50 font-11 pb-2 text-start"><a href="{{('register')}}">Create Account</a></div>
                    <div class="w-50 font-11 pb-2 text-end"><a href="{{route('password.request')}}">Forgot Password</a></div>
                </div>

                <a href="#" class="back-button btn btn-full btn-m shadow-large rounded-sm text-uppercase font-700 bg-highlight" onclick="document.getElementById('loginForm').submit()">LOGIN</a>
                </form>
               {{--  <div class="divider mt-4"></div>
                <a href="#" class="btn btn-icon btn-m btn-full shadow-l rounded-sm bg-facebook text-uppercase font-700 text-start"><i class="fab fa-facebook-f text-center bg-transparent"></i>Sign in with Facebook</a>
                <a href="#" class="btn btn-icon btn-m btn-full shadow-l rounded-sm bg-twitter text-uppercase font-700 text-start mt-2 "><i class="fab fa-twitter text-center bg-transparent"></i>Sign in with Twitter</a> --}}
            </div>
        </div>
    </div>
</div>

@endsection
