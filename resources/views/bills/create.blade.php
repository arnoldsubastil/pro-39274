@extends('layouts.orders')

@section('title')
Bill Order
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="/css/bills/create.css" media="screen">
@endsection

@section('content')  

    @foreach($products as $product)

    <section class="u-clearfix u-container-align-center u-section-2" id="sec-2a5c">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                <div class="u-border-1 u-border-grey-5 u-container-layout u-container-layout-1">
                  <h3 class="u-text u-text-default u-text-1">Order Details</h3>
                  <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-2">
                    <div class="u-layout">
                      <div class="u-layout-col">
                        <div class="u-container-style u-image u-layout-cell u-size-30 u-image-1" data-image-width="1920" data-image-height="1275" style="background-image: url('/{{ $product['url'] }}');">
                          <div class="u-container-layout u-container-layout-2"></div>
                        </div>
                        <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-3">
                          <div class="u-container-layout u-container-layout-3">
                            <p class="u-text u-text-default u-text-2">{{ $product['name'] }}</p>
                            <p class="u-text u-text-default u-text-3"> {{ $product['foreignName'] }}</p>

                            <p class="u-text u-text-default u-text-4">Quantity:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $product['productSize'][0] }}</p>
                            <p class="u-text u-text-default u-text-5"> Total Amount:&nbsp; &nbsp; {{ $product['sellingPrice'] }}<span class="amount">&nbsp;PHP</span>
                            </p>
                            <a href="{{ route('orders.create', $product['productId']) }}" class="u-active-none u-align-left u-border-2 u-border-active-palette-2-dark-1 u-border-hover-palette-2-base u-border-no-left u-border-no-right u-border-no-top u-border-palette-1-base u-btn u-button-style u-hover-none u-none u-text-hover-palette-2-base u-text-palette-1-base u-btn-1">Edit order&nbsp;<span class="u-file-icon u-icon u-text-palette-1-base u-icon-1"><img src="images/1828911-0f7b06a1.png" alt=""></span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-4">
                <div class="u-border-1 u-border-grey-5 u-container-layout u-container-layout-4">
                  <h3 class="u-text u-text-default u-text-6">Billing Details</h3>
                  <div class="btn-submit form-vertical u-form u-form-1">
                    <form action="PaymentDetails.html" class="u-clearfix u-form-spacing-24 u-form-vertical u-inner-form" source="custom" name="form-1" style="padding: 10px;">
                      <div class="u-form-group u-form-name">
                        <label for="name-2382" class="u-label u-label-1">Name</label>
                        <input type="text" placeholder="Full name" id="name-2382" name="name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1">
                      </div>
                      <div class="u-form-group u-form-group-2">
                        <label for="text-864f" class="u-label u-label-2">Contact Number</label>
                        <input type="text" placeholder="Valid contact number" id="text-864f" name="text-1" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-2">
                      </div>
                      <div class="u-form-email u-form-group">
                        <label for="email-2382" class="u-label u-label-3">Email Address</label>
                        <input type="email" placeholder="Valid email address" id="email-2382" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-3">
                      </div>
                      <div class="u-form-group u-form-group-4">
                        <label for="text-c306" class="u-label u-label-4">Delivery Address</label>
                        <input type="text" placeholder="Complete address" id="text-c306" name="text" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-4">
                      </div>
                      <div class="u-form-group u-form-message u-form-group-5">
                        <label for="message-2382" class="u-label u-label-5">Order notes</label>
                        <textarea placeholder="Notes about your order, e.g. special notes for delivery" rows="4" cols="50" id="message-2382" name="message" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-5"></textarea>
                      </div>
                      <div class="u-align-right u-form-group u-form-submit">
                        <a href="PaymentDetails.html" class="form-submit u-btn u-btn-round u-btn-submit u-button-style u-radius-4 u-btn-2">Hidden</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                      </div>
                      <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
                      <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
                      <input type="hidden" value="" name="recaptchaResponse">
                    </form>
                  </div>
                  <a href="{{ route('payments.create') }}" class="u-btn u-btn-round u-button-style u-radius-4 u-btn-3" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Pay now&nbsp;</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    @endforeach


@endsection