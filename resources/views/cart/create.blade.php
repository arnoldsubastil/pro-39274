@extends('layouts.cart')

@section('title')
Order Product
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="/css/cart/create.css" media="screen">
@endsection

@section('content')     

  @foreach($products as $product)

  <section class="u-align-center-md u-align-center-sm u-align-center-xs u-clearfix u-container-align-left u-section-2" id="sec-d3f1">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h3 class="u-align-left u-text u-text-default u-text-1">Order Product</h3>
        <div class="u-carousel u-expanded-width-xs u-gallery u-layout-carousel u-lightbox u-no-transition u-show-text-none u-gallery-1" data-interval="5000" data-u-ride="carousel" id="carousel-4e02">
          <ol class="u-absolute-hcenter u-carousel-indicators u-carousel-indicators-1">
            <li data-u-target="#carousel-4e02" data-u-slide-to="0" class="u-active u-grey-70 u-shape-circle" style="width: 10px; height: 10px;"></li>
            <li data-u-target="#carousel-4e02" data-u-slide-to="1" class="u-grey-70 u-shape-circle" style="width: 10px; height: 10px;"></li>
          </ol>
          <div class="u-carousel-inner u-gallery-inner" role="listbox">
            <div class="u-active u-carousel-item u-gallery-item">
              <div class="u-back-slide" data-image-width="480" data-image-height="480">
                <img class="u-back-image u-expanded" src="/{{$product['url']}}">
              </div>
              <div class="u-over-slide u-over-slide-1">
                <h3 class="u-gallery-heading">Sample Title</h3>
                <p class="u-gallery-text">Sample Text</p>
              </div>
            </div>
            <div class="u-carousel-item u-gallery-item">
              <div class="u-back-slide" data-image-width="4288" data-image-height="2848">
                <img class="u-back-image u-expanded" src="/{{$product['thumbnailUrl']}}">
              </div>
              <div class="u-over-slide u-over-slide-2">
                <h3 class="u-gallery-heading">Sample Title</h3>
                <p class="u-gallery-text">Sample Text</p>
              </div>
            </div>
          </div>
          <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-icon-circle u-opacity u-opacity-70 u-text-grey-50 u-carousel-control-1" href="#carousel-4e02" role="button" data-u-slide="prev">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
            <span class="sr-only">
              <svg viewBox="0 0 451.847 451.847"><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"></path></svg>
            </span>
          </a>
          <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-icon-circle u-opacity u-opacity-70 u-text-grey-50 u-carousel-control-2" href="#carousel-4e02" role="button" data-u-slide="next">
            <span aria-hidden="true">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
            <span class="sr-only">
              <svg viewBox="0 0 451.846 451.847"><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744
L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284
c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"></path></svg>
            </span>
          </a>
        </div>
        <div class="u-container-style u-group u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h2 class="u-text u-text-default u-text-2"> {{ $product['name'] }} 
            </h2>
            <p class="u-text u-text-default u-text-3">
              <span style="font-size: 1.5rem;">{{ $product['foreignName'] }}</span>
            </p>
            <p class="u-text u-text-default u-text-3">
              <span style="font-size: 1.875rem;">{{ $product['sellingPrice'] }}&nbsp;</span>
              <span style="font-size: 1.125rem;">PHP</span>
            </p>
            <div class="u-form u-form-1">
              <form action="https://forms.nicepagesrv.com/Form/Process" class="u-clearfix u-form-spacing-32 u-form-vertical u-inner-form" source="email" name="form" style="padding: 0px;">
                <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
                <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
                <input type="hidden" value="" name="recaptchaResponse">
                <input type="hidden" name="formServices" value="ea8e2391cedfa74f815dafddfe4df780">
              </form>
              <div class="u-form-group u-form-radiobutton u-form-group-1">
                <label class="u-label u-label-1">This product is available in: </label>
                
                <div class="u-form-radio-button-wrapper">
                  @for($i=0; $i < count($product['productSize']); $i++)  

                      <div class="u-input-row">
                        <input type="radio" name="productSizeRadioButton" value="1 box">
                        <label class="u-label u-label-2" for="radiobutton">{{ $product['productSize'][$i] }}</label>
                      </div>

                  @endfor
                </div>

              </div>
              <div class="u-form-group u-form-radiobutton u-form-group-1">
                <label class="u-label u-label-1">Select product quantity:</label>
                <div class="u-form-radio-button-wrapper">

                @for($i=0; $i < count($product['productOptions']); $i++)  
                  
                  <div class="u-input-row">
                    <input type="radio" name="productQuantityRadioButton" value="1 box">
                    <label class="u-label u-label-2" for="radiobutton">{{ $product['productOptions'][$i] }}</label>
                  </div>

                @endfor
                
                </div>
              </div>
              <div class="u-form-group u-form-group-2">
                <label for="text-a211" class="u-label u-label-5">If others, please specify:</label>
                <input type="text" placeholder="" id="text-a211" name="text" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1">
              </div>
            </div>
            <div class="u-container-style u-group u-shape-rectangle u-group-2">
              <div class="u-container-layout u-container-layout-2">
                <a href="{{ route('pastries.details', $product['productId']) }}" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Cancel order</a>
                <a href="{{ route('cart.index') }}" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Add to cart</a>
                <a href="{{ route('bills.create', $product['productId']) }}" class="u-align-center u-border-2 u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-3" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Checkout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  @endforeach
    



@endsection