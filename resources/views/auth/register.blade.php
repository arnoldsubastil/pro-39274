@extends('layouts.index')

@section('title')
Sign Up
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="/css/registration/create.css" media="screen">
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
                    <form method="POST" action="{{ route('register') }}" style="padding: 0px;">
                    @csrf
                      <h2 class="u-form-group u-form-text u-text u-text-1"> Sign up!</h2>
                      <p class="u-custom-font u-font-montserrat u-form-group u-form-text u-text u-text-2">
                        <span style="font-weight: 400;">Create your account to avail free shipping fees and discounted offers.</span>
                        <br>
                      </p>
                      <div class="u-form-group u-form-group-3">
                        <label for="name" class="u-custom-font u-font-montserrat u-label u-label-1"> {{ __('Username') }}</label>
                        <input id="name" type="text" class="u-custom-font u-font-montserrat u-input u-input-rectangle u-text-grey-80 u-white u-input-1 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                      <div class="u-form-group u-form-group-4">
                        <label for="name" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('First Name') }}</label>
                        <input id="name" type="text" class="u-custom-font u-font-montserrat u-input u-input-rectangle u-text-grey-80 u-white u-input-2 form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>
                        @error('firstName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="u-form-group u-form-group-4">
                        <label for="name" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('Last Name') }}</label>
                        <input id="name" type="text" class="u-custom-font u-font-montserrat u-input u-input-rectangle u-text-grey-80 u-white u-input-2 form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>
                        @error('lastName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="u-form-group u-form-group-4">
                        <label for="name" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('Contact Number') }}</label>
                        <input id="name" type="text" class="u-custom-font u-font-montserrat u-input u-input-rectangle u-text-grey-80 u-white u-input-2 form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no') }}" required autocomplete="contact_no" autofocus>
                        @error('contact_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="u-form-group u-form-group-4">
                        <label for="name" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('Billing Address') }}</label>
                        <input id="name" type="text" class="u-custom-font u-font-montserrat u-input u-input-rectangle u-text-grey-80 u-white u-input-2 form-control @error('deliveryAddress') is-invalid @enderror" name="deliveryAddress" value="{{ old('deliveryAddress') }}" required autocomplete="deliveryAddress" autofocus>
                        @error('deliveryAddress')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="u-form-group u-form-group-4">
                        <label for="email" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="u-custom-font u-font-montserrat u-input u-input-rectangle u-text-grey-80 u-white u-input-2 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="u-form-group u-form-group-4">
                        <label for="password" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('Password') }}</label>
                        <input id="password" type="password" class="u-custom-font u-font-montserrat u-input u-input-rectangle u-text-grey-80 u-white u-input-2 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="u-form-group u-form-group-4">
                        <label for="password-confirm" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="u-custom-font u-font-montserrat u-input u-input-rectangle u-text-grey-80 u-white u-input-2 form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                                       
                      <div class="u-align-center u-form-group u-form-submit">
                        <button type="submit" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-2">{{ __('Register') }}</button>                        
                      </div>
                     
                    </form>
                  </div>
                 <br/>
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
                  <h2 class="u-text u-text-default u-text-1">For returning customers</h2>
                  <p class="u-custom-font u-font-montserrat u-text u-text-3">Log in with your existing account.&nbsp;</p>
                  <a href="/login" class="u-btn u-btn-round u-button-style u-custom-font u-font-montserrat u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-2">Login your account</a>
                  <p class="u-custom-font u-font-montserrat u-text u-text-default u-text-2">Proceed to order and you will have an opportunity to create an account after checking out if one does not already exist for you.</p>
                  <a href="/" class="u-align-left u-border-2 u-border-grey-75 u-btn u-btn-round u-button-style u-custom-font u-font-montserrat u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1">Continue as guest</a>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>

                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Contact Number') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no') }}" required autocomplete="contact_no" autofocus>

                                @error('contact_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Billing Address') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('deliveryAddress') is-invalid @enderror" name="deliveryAddress" value="{{ old('deliveryAddress') }}" required autocomplete="deliveryAddress" autofocus>

                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
