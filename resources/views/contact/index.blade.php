@extends('layouts.index')

@section('title')
Contact Us
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="/css/contact/index.css" media="screen">
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
                    <form method="POST" action="/post-contact" style="padding: 0px;">
                    @csrf
                      <h2 class="u-form-group u-form-text u-text u-text-1"> What can we help you with?</h2>
                      <p class="u-custom-font u-font-montserrat u-form-group u-form-text u-text u-text-2">
                        <span style="font-weight: 400;">Get in touch with us by either the contact details below or fill out the form with your concerns.</span>
                        <br>
                      </p>

                      <div class="contactUsDiv socialIcons">
                        <ul class="noListStyle listSocialIcons">
                          <li><a class="u-social-url" title="Phone Number" target="_blank"><span class="u-file-icon u-icon u-social-facebook u-social-icon u-text-palette-5-base ">
                            <img src="/images/Icons/Footer_Phone_32x32.png" alt=""></span>
          </a><span class="u-icon-span">
          <a href="#"><span >+63 917 138 0392</span></a><br/><a href="#"><span>+63 920 921 1290</span>
          </span></a></li>
                          <li><span class="u-file-icon u-icon u-social-icon u-social-Icons u-text-palette-5-base socialSpan"><img src="/images/Icons/Footer_Instagram_32x32.png" alt=""></span><a href="https://www.facebook.com/soystorypastries"><span>SOYSTORYPASTRIES</span></a></li>
                          <li><span class="u-file-icon u-icon u-social-facebook u-social-icon u-text-palette-5-base socialSpan"><img src="/images/Icons/Footer_Facebook_32x32.png" alt=""></span><a href="https://www.instagram.com/soystorypastries/"><span>SOYSTORY AUTHENTIC TAIWANESE PASTRIES</span></a></li>
                          <!-- <li><img src="" /><a href="mailto:service@sunnyhills.com.sg"><span style="line-height: 26px;">service@sunnyhills.com.sg</span></a></li> -->
                        </ul>
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
                        <label for="email" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="u-custom-font u-font-montserrat u-input u-input-rectangle u-text-grey-80 u-white u-input-2 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="u-form-group u-form-group-4">
                        <label for="inquiries" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('Message') }}</label>
                        <textarea id="InquiryTextArea" rows="8" class="u-custom-font u-font-montserrat u-input u-input-rectangle u-text-grey-80 u-white u-input-2" name="inquiries" required ></textarea>
                        @error('inquiries')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    
                                       
                      <div class="u-align-center u-form-group u-form-submit">
                        <button type="submit" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-2">{{ __('Submit') }}</button>                        
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
    <!-- <section class="u-clearfix u-section-2" id="sec-9ead">
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
    </section> -->


@endsection
