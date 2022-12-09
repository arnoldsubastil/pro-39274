@extends('layouts.cart')

@section('title')
Shopping Cart
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="/css/cart/index.css" media="screen">
@endsection

@section('content')

<section class="u-clearfix u-container-align-center u-section-2" id="sec-6f9e">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-border-1 u-border-palette-4-base u-expanded-width u-line u-line-horizontal u-line-1"></div>
      </div>
    </section>
    <section class="u-clearfix u-container-align-left u-section-3" id="sec-50ae">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h3 class="u-align-left u-text u-text-default u-text-1">Products</h3>
      </div>
    </section>
    <section class="u-clearfix u-container-align-left u-section-4" id="sec-c914">
      <div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-align-left u-text u-text-default u-text-1">Select one or more products to checkout. Click <span style="font-weight: 700;">View&nbsp;<span style="font-weight: 400;"> to check, remove, or buy the product.&nbsp;&nbsp;</span>
          </span>
        </p>
      </div>
    </section>
    <section class="u-clearfix u-section-5" id="sec-19b6">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              
              <!--- begin product item --->

              @foreach($uniqueProductIds as $uniqueProductId)

                <!--- get selected products --->
                @if($uniqueProductId['productStatusId'] == "1000")
                
                <div class="u-container-align-center u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-1 border">
                  <div class="u-container-layout u-container-layout-1">
                    <div class="u-container-align-center u-container-style u-group u-group-1">
                      <div class="u-container-layout u-valign-bottom u-container-layout-2">
                        <h4 class="u-align-center u-custom-font u-text u-text-default u-text-font u-text-1 ellipsis">{{$uniqueProductId['name']}}
                        </h4>
                      </div>
                    </div>
                    <p class="u-align-center u-text u-text-default u-text-2 small"> {{$uniqueProductId['foreignName']}} </p>
                    <img class="u-image u-image-default u-image-1" src="{{$uniqueProductId['thumbnailUrl']}}" alt="" data-image-width="1684" data-image-height="1123">
                    <h4 class="u-align-center u-custom-font u-text u-text-default u-text-font u-text-3" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">{{$uniqueProductId['sellingPrice']}} <span class="amount">PHP</small></h4>
                    <a href="{{ route('pastries.details', $uniqueProductId['productId']) }}" class="u-align-center u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View</a>
                  </div>
                </div>

               @endif
              
              @endforeach

              <!--- end product item --->

            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-6" id="sec-9474">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1"></div>
              </div>
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <a href="#" class="u-align-center u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Place order</a>
                  <a href="javascript:history.back()" class="u-align-right u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Go back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-7" id="sec-3548">
      <div class="u-clearfix u-sheet u-sheet-1"></div>
    </section>

@endsection




<!-- Push a script dynamically from a view -->
@push('scripts')
<!-- <script src="/example.js"></script> -->    
@endpush