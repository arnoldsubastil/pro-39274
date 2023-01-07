@extends('layouts.index')

@section('title')
Products
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="css/products.css" media="screen">
@endsection

@section('content')

<section class="u-clearfix u-white u-section-1" id="sec-fa27">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-custom-color-2 u-shape u-shape-rectangle u-shape-1"></div>
        <img class="u-align-center u-image u-image-contain u-image-1" src="images/RedBeanOrTaroCakes_1920x1256.jpg" data-image-width="4288" data-image-height="2804">
        <div class="u-align-left u-container-style u-group u-shape-rectangle u-white u-group-1">
          <div class="u-container-layout u-valign-middle u-container-layout-1">
            <h3 class="u-text u-text-1">Pastries<br>
            </h3>
            <p class="u-text u-text-2"> Pineapple cakes&nbsp;(鳳梨酥) are&nbsp;a famous pastry from Taiwan.&nbsp;These cakes are usually square-shaped and features a tender, shortbread-like exterior with a jammy pineapple filling. Taiwanese pineapple cakes fall somewhere between a filled cookie and a small pie, and is not what we commonly think of as ‘cake.’</p>
            <a href="/Pastries" class="u-btn u-btn-round u-button-style u-hover-palette-1-dark-1 u-palette-1-base u-radius-4 u-btn-1">View pastries</a>
          </div>
        </div>
      </div>
    </section>
    <section class="u-align-center-lg u-align-center-md u-align-center-sm u-align-center-xs u-clearfix u-custom-color-2 u-section-2" id="sec-9bbb">
      <div class="u-clearfix u-sheet u-sheet-1">
        <img class="u-align-center u-image u-image-1" src="images/Beverages_841x559.PNG" data-image-width="841" data-image-height="559">
        <div class="u-opacity u-opacity-80 u-shape u-shape-svg u-text-palette-4-light-3 u-shape-1">
          <svg class="u-svg-link" preserveAspectRatio="none" viewBox="0 0 160 160" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-db78"></use></svg>
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 160 160" x="0px" y="0px" id="svg-db78"><path d="M114.3,152.3l38-38C144.4,130.9,130.9,144.4,114.3,152.3z M117.1,9.1l-108,108c0.8,1.6,1.7,3.2,2.7,4.8l110-110
	C120.3,10.9,118.7,10,117.1,9.1z M97.5,2L2,97.5c0.4,2,1,4,1.5,5.9l99.9-99.9C101.5,2.9,99.5,2.4,97.5,2z M80,160c2,0,4-0.1,5.9-0.2
	l73.9-73.9c0.1-2,0.2-3.9,0.2-5.9c0-0.6,0-1.2,0-1.9L78.1,160C78.8,160,79.4,160,80,160z M34.9,146.1c1.5,1,3,2,4.6,2.9L149,39.5
	c-0.9-1.6-1.9-3.1-2.9-4.6L34.9,146.1z M132.7,19.8L19.8,132.7c1.2,1.3,2.3,2.6,3.6,3.9L136.6,23.4C135.3,22.2,134,21,132.7,19.8z
	 M59.6,157.4l97.8-97.8c-0.5-1.9-1.1-3.8-1.7-5.7L53.9,155.6C55.8,156.3,57.7,156.9,59.6,157.4z M7.6,45.9L45.9,7.6
	C29.1,15.5,15.5,29.1,7.6,45.9z M80,0c-2.6,0-5.1,0.1-7.6,0.4l-72,72C0.1,74.9,0,77.4,0,80c0,0.1,0,0.2,0,0.2L80.2,0
	C80.2,0,80.1,0,80,0z"></path></svg>
        </div>
        <div class="u-align-left u-container-style u-group u-shape-rectangle u-white u-group-1">
          <div class="u-container-layout u-valign-middle u-container-layout-1">
            <h2 class="u-text u-text-1">Beverages</h2>
            <p class="u-text u-text-2"> Just like in Taiwan, Tea shops are popping up all over the world. One Taiwan based company has over 450 locations while in the Philippines another person owns over 100 within 1.5 years.</p>
            <a href="/Beverages" class="u-btn u-btn-round u-button-style u-hover-palette-1-dark-1 u-palette-1-base u-radius-4 u-btn-1">View beverages</a>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-white u-section-3" id="carousel_2fd8">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-custom-color-2 u-shape u-shape-rectangle u-shape-1"></div>
        <img src="images/Mochi_1100x654.jpg" alt="" class="u-image u-image-default u-preserve-proportions u-image-1" data-image-width="1100" data-image-height="654">
        <div class="u-align-left u-container-style u-expanded-width-xs u-group u-shape-rectangle u-white u-group-1">
          <div class="u-container-layout u-valign-middle u-container-layout-1">
            <h3 class="u-text u-text-1">Desserts<br>
            </h3>
            <p class="u-text u-text-2"> Igniting Taiwanese cuisine with vibrant colors, sumptuous, gooey textures, and spellbinding decadence, these&nbsp;Taiwanese desserts&nbsp;are must-try dishes on your trip to Taiwan.Food plays an incredibly important role in Taiwanese culture, and that dedication, tradition, and creativity truly comes through in all of these popular dessert dishes.</p>
            <a href="/Desserts" class="u-btn u-btn-round u-button-style u-hover-palette-1-dark-1 u-palette-1-base u-radius-4 u-btn-1">View desserts</a>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-4" id="sec-7783">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-border-3 u-border-palette-5-base u-container-align-center u-container-style u-group u-palette-5-base u-group-1">
          <div class="u-container-layout u-valign-middle u-container-layout-1">
            <h1 class="u-text u-text-default u-text-1">Order now!</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-5" id="sec-d271">
      <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-container-style u-layout-cell u-size-28 u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
                <h2 class="u-text u-text-default u-text-1">New Customers</h2>
                <p class="u-text u-text-default u-text-2"> Proceed to order and you will have an opportunity to create an account after checking out if one does not already exist for you.</p>
                <a href="/" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1">Continue as guest</a>
                <p class="u-text u-text-default u-text-3">Create a customer account for fast checkout and easy to order transactions.&nbsp;</p>
                <a href="CustomerRegistration.html" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-2">Create an account</a>
              </div>
            </div>
            <div class="u-container-style u-layout-cell u-size-32 u-layout-cell-2">
              <div class="u-container-layout u-container-layout-2">
                <h2 class="u-text u-text-default u-text-4">Returning Customers</h2>
                <p class="u-text u-text-default u-text-5">Log in to speed up the check out process and save payments to account.</p>
                <div class="u-border-1 u-border-palette-5-dark-2 u-form u-radius-4 u-white u-form-1">
                  <form action="/" class="u-clearfix u-form-spacing-40 u-form-vertical u-inner-form" source="custom" name="form-1" style="padding: 40px;">
                    <div class="u-form-group u-form-group-1">
                      <label for="email-9d68" class="u-label u-label-1"> Email Address</label>
                      <input type="text" id="email-9d68" name="emailaddress" class="u-border-2 u-border-no-left u-border-no-right u-border-no-top u-border-palette-5-dark-1 u-input u-input-rectangle u-white u-input-1" required="required">
                    </div>
                    <div class="u-form-group u-form-group-2">
                      <label for="text-44ea" class="u-label u-label-2">Password</label>
                      <input type="text" id="text-44ea" name="password" class="u-border-2 u-border-no-left u-border-no-right u-border-no-top u-border-palette-5-dark-1 u-input u-input-rectangle u-white u-input-2" required="required">
                    </div>
                    <p class="u-form-group u-form-text u-text u-text-6">
                      <a href="/" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-1-base u-btn-3"> Forgot your password?</a>
                    </p>
                    <div class="u-align-center u-form-group u-form-submit">
                      <a href="/" class="u-btn u-btn-round u-btn-submit u-button-style u-radius-4 u-btn-4">Log in existing account</a>
                      <input type="submit" value="submit" class="u-form-control-hidden">
                    </div>
                    <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
                    <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
                    <input type="hidden" value="" name="recaptchaResponse">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection




<!-- Push a script dynamically from a view -->
@push('scripts')
<!-- <script src="/example.js"></script> -->    
@endpush