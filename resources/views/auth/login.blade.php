@extends('layouts.index')

@section('title')
Sign In
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="/css/login/index.css" media="screen">
@endsection


@section('content')
<section class="u-clearfix u-container-align-center-lg u-container-align-center-md u-container-align-center-sm u-container-align-center-xs u-custom-color-4 u-valign-middle-xs u-section-1" id="sec-54cf">
    <div class="stripeDiv"></div>
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1 stampImage">
        <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-align-left u-container-align-center u-container-style u-layout-cell u-right-cell u-size-60 u-layout-cell-1">
                <div class="u-container-layout u-valign-middle u-container-layout-1">
                  <div class="u-align-center u-form u-form-1">
                    <form method="POST" action="{{ route('login') }}" style="padding: 0px;">
                    @csrf
                      <h2 class="u-form-group u-form-text u-text u-text-1"> Welcome back!</h2>
                      <p class="u-custom-font u-font-montserrat u-form-group u-form-text u-text u-text-2">
                        <span style="font-weight: 400;">Sign in with your existing account.</span>
                        <br>
                      </p>
                      <div class="u-form-group u-form-group-3">
                        <label for="email" class="u-custom-font u-font-montserrat u-label u-label-1"> {{ __('Email Address') }}</label>
                        <input id="email" type="email" class="u-custom-font u-font-montserrat u-input u-input-rectangle u-text-grey-80 u-white u-input-1 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                    </div>
                      <div class="u-form-group u-form-group-4">
                        <label for="password" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('Password') }}</label>
                        <input id="password" type="password" class="u-custom-font u-font-montserrat u-input u-input-rectangle u-text-grey-80 u-white u-input-2 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                    </div>
                      <p class="u-form-group u-form-text u-text u-text-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
                      </p>                     
                      <div class="u-align-center u-form-group u-form-submit">
                        <button type="submit" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-2">{{ __('Login') }}</button>
                        <!-- <a href="Home.html" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-2">Sign in</a>
                        <input type="submit" value="submit" class="u-form-control-hidden"> -->
                        <br/>
                        @if (Route::has('password.request'))
                            <a href="/password/reset" onclick="reset()" class="u-active-none u-border-none u-btn u-button-link u-button-style u-custom-font u-font-montserrat u-hover-none u-none u-text-grey-80 u-btn-1" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                      </div>
                     
                    </form>
                  </div>
                  <!-- <p class="u-align-center u-custom-font u-font-montserrat u-text u-text-default u-text-4">Don't have an account? <a href="/register" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-grey-80 u-btn-3">Sign up now</a>
                    <br>Continue as guest? <a href="/Pastries" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-grey-80 u-btn-4">Order now</a>
                    <br>
                  </p> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="stripeDiv"></div>
    </section>
    <section class="u-clearfix u-section-2" id="sec-9ead">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-align-center u-clearfix u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-60 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                  <h2 class="u-text u-text-default u-text-1">For new customers</h2>
                  <p class="u-custom-font u-font-montserrat u-text u-text-default u-text-2">Proceed to order and you will have an opportunity to create an account after checking out if one does not already exist for you.</p>
                  <a href="Home.html" class="u-align-left u-border-2 u-border-grey-75 u-btn u-btn-round u-button-style u-custom-font u-font-montserrat u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1">Continue as guest</a>
                  <p class="u-custom-font u-font-montserrat u-text u-text-3">Create your account to avail free shipping fees and discounted offers.</p>
                  <a href="/register" class="u-btn u-btn-round u-button-style u-custom-font u-font-montserrat u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-2">Create an account</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
 
function reset() {
  window.location = "/password/reset"; 
}

  </script>

