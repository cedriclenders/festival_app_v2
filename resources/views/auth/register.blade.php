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
            <form method="POST" id="signupForm" action="{{ route('register') }}">
            @csrf
            <div class="ps-5 pe-5">
                <h1 class="text-center font-800 font-40 mb-1">Sign Up</h1>
                <p class="color-highlight text-center font-12">Create an Account. It's free!</p>

                <div class="input-style no-borders has-icon validate-field">
                    <i class="fa fa-user"></i>
                    <input type="name" name="name" class="form-control validate-name" id="name" placeholder="Name">
                    <label for="form1a" class="color-blue-dark font-10 mt-1">Name</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style no-borders has-icon validate-field mt-2">
                    <i class="fa fa-at"></i>
                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address">
                    <label for="form1aa" class="color-blue-dark font-10 mt-1">Email</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style no-borders has-icon validate-field mt-2">
                    <i class="fa fa-lock"></i>
                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                    <label for="form3a" class="color-blue-dark font-10 mt-1">Choose a Password</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <div class="input-style no-borders has-icon validate-field mt-2">
                    <i class="fa fa-lock"></i>
                    <input type="password-confirm" type="password" name="password_confirmation" class="form-control validate-text" id="password-confirm" placeholder="Confirm your Password">
                    <label for="form3a1" class="color-blue-dark font-10 mt-1">Confirm your Password</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>

                <div class="text-center mb-5 mt-5">
                    <a href="/login" class="font-12">Already Registered? Sign in Here</a>
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
                <a href="#" class="back-button btn btn-full btn-m shadow-large rounded-sm text-uppercase font-700 bg-highlight" onclick="document.getElementById('signupForm').submit()">Create Account</a>
            </div>
            </form>
        </div>
    </div>

</div>
@endsection
