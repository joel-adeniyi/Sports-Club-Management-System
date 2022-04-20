@extends('layouts.web')

@section('content')
<div class="min-vh-100 d-flex align-items-center">
    <div class="d-flex justify-content-center  col-12 ">
        <div class="col-12 col-sm-9 col-md-6 col-lg-5 col-xl-4 col-xxl-3 border " style="border-radius: 13px;">

            <div class="col-12 d-flex justify-content-center mt-3">
                <a href="" class="navbar-brand">
                   <!-- <img src="{{ asset('images/main/logo-icon.png') }}" alt="logo" class="dark-logo">-->

                    <span class="logo-part">
                        <img src="{{ asset('images/main/login-logo.png') }}" alt="logo" class="dark-logo">
                    </span>
                </a>
            </div>

            <div class="text-center ">
                <h2><b>{{ __('Login') }}</b></h2>
            </div>

            <form method="POST" action="{{ route('login') }}" class="row g-3 p-3">
                @csrf
                <div class="col-12">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="inputPassword4" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="col-12 ">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class=" col-11 d-grid gap-2 mx-auto">
                    <button class="btn btn-primary" type="submit"> {{ __('Login') }}</button>

                </div>

               

            </form>

        </div>

    </div>



</div>

@endsection