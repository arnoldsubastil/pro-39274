@extends('layouts.orders')

@section('title')
Order Product
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="/css/orders/notification.css" media="screen">
@endsection

@section('content')  

<section class="u-clearfix u-section-2" id="sec-e3fd">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout" style="text-align: center;">
            <div class="u-layout-row" style="display: block;">              
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2" style="display: inline-block;">
                <div class="u-container-layout u-valign-middle u-container-layout-2">
                  <h1 class="u-align-center u-text u-text-default u-text-1">Thank you.</h1>
                  <p class="u-align-center u-text u-text-default u-text-2">Your order was completed successfully.<br>An email notification was sent to your email.<br><br>Please check your inbox for the receipt.
                  </p>
                  <br/>
                  @if (!Auth::guest())
                  <a href="/my-orders" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Continue</a>                    
                  @else
                  <a href="/Register" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Sign up</a>                                
                  <a href="/my-orders" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Continue</a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <br/>
    <br/>
    <br/>
    <br/>

@endsection