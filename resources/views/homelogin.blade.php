@extends('layouts.index')

@section('title')
Home
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="css/home.css" media="screen">
@endsection

@section('content')

<section class="u-clearfix u-section-1 heroImage" id="sec-ea9a"  style="background-color: #F4DFB0;" >
<img class="u-image u-image-1" src="images/Animations/{{ $banner->bannerimage }}" style=" width:100%;">
      <!-- <div class="u-clearfix u-sheet u-sheet-1"  style="backgroun-color: ##EDC97C; background: url('images/Animations/Animations_1024x600.gif'); background-position: center; background-repeat: no-repeat; height: 600px; min-height: auto; width: 100%;">
        <img class="u-image u-image-1" src="images/Animations/Animations_1024x700.gif" data-image-width="700" data-image-height="700"> 
      </div>-->
    </section>
    <section class="u-border-1 u-border-no-left u-border-no-right u-border-palette-5-light-1 u-clearfix u-palette-5-base u-section-2" id="carousel_c3cc">
      <p class="u-align-center u-text u-text-1"> Check out our best sellers!</p>
    </section>
    <section class="u-carousel u-carousel-duration-2000 u-carousel-left u-slide u-block-d061-1" id="carousel_ae0d" data-interval="8000" data-u-ride="carousel">
      <ol class="u-absolute-hcenter u-carousel-indicators u-block-d061-2">
        @if($ctr = 0) @endif
      @foreach($products as $product)
      @if($ctr=$ctr+1) @endif
        <li data-u-target="#carousel_ae0d" class="@if($ctr == 1) u-active @endif u-grey-30" data-u-slide-to="{{ $ctr }}"></li>
      @endforeach
      </ol>
        @if($ctr = 0) @endif
      <div class="u-carousel-inner" role="listbox">
        @foreach($products as $product)
        @if($ctr=$ctr+1) @endif
        <div class="@if($ctr == 1) u-active @endif u-carousel-item u-clearfix u-palette-5-light-2 u-section-3-{{ $ctr }}">
          <div class="u-clearfix u-sheet u-sheet-1">
            <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
              <div class="u-gutter-0 u-layout">
                <div class="u-layout-row">
                  <div class="u-size-30">
                    <div class="u-layout-row">
                      <div class="u-container-style u-image u-layout-cell u-right-cell u-size-60 u-image-1" data-image-width="480" data-image-height="480" style="background-image: url(/resizer/images/ProductImages/{{ $product->url }}/480);">
                        <div class="u-container-layout u-valign-middle u-container-layout-1"></div>
                      </div>
                    </div>
                  </div>
                  <div class="u-size-30">
                    <div class="u-layout-col">
                      <div class="u-align-left u-container-style u-layout-cell u-left-cell u-palette-5-base u-size-60 u-layout-cell-2">
                        <div class="u-container-layout u-container-layout-2">
                          <h1 class="u-custom-font u-text u-title u-text-1"> {{ $product->name }}&nbsp;</h1>
                          <h2 class="u-text u-text-2"> {{ $product->foreignName }}</h2>
                          <p class="u-text u-text-3"> {{ $product->productDescription }}</p>
                          <h2 class="u-text u-text-4"><span style="font-size: 1.125rem;">PHP</span> {{ $product->sellingPrice }} 
                          </h2>
                          <a href="/view/{{ $product->productIdlong }}" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Order now!</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <a class="u-absolute-vcenter u-carousel-control u-carousel-control-prev u-text-grey-30 u-block-d061-3" href="#carousel_ae0d" role="button" data-u-slide="prev">
        <span aria-hidden="true">
          <svg class="u-svg-link" viewBox="0 0 477.175 477.175"><path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                    c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"></path></svg>
        </span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="u-absolute-vcenter u-carousel-control u-carousel-control-next u-text-grey-30 u-block-d061-4" href="#carousel_ae0d" role="button" data-u-slide="next">
        <span aria-hidden="true">
          <svg class="u-svg-link" viewBox="0 0 477.175 477.175"><path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                    c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z"></path></svg>
        </span>
        <span class="sr-only">Next</span>
      </a>
    </section>
    <section class="u-border-1 u-border-grey-10 u-border-no-left u-border-no-right u-clearfix u-white u-section-4" id="carousel_bc58">
      <p class="u-align-center u-text u-text-1">Today's offer new fresh products!</p>
    </section>
    <section class="u-clearfix u-section-5" id="sec-8af5">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout" style="">
            <div class="u-layout-row" style="">
              <div class="u-align-center u-container-style u-layout-cell u-left-cell u-size-30 u-size-xs-60 u-white u-layout-cell-1" src="">
                <div class="u-container-layout u-valign-middle u-container-layout-1">
                  <h6>New Product</h6>
                  <h2 class="u-text u-text-default u-text-1">{{ $newproduct->name }}</h2>
                  <p class="u-text u-text-2">{{ $newproduct->productDescription }}</p>
                  @if($newproduct->categories == 'Events')
                  <a href="/Events" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View Events</a>
                  @else
                  <a href="/{{ $newproduct->categories }}/{{ $newproduct->productIdlong }}" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Order now!</a>
                  @endif
                </div>
              </div>
              <div class="u-align-center u-container-style u-image u-layout-cell u-right-cell u-size-30 u-size-xs-60 u-image-1" src="" data-image-width="1440" data-image-height="960"  style="background-image: url(/resizer/images/ProductImages/{{ $newproduct->url }}/480);">
                <div class="u-container-layout u-valign-middle u-container-layout-2" src=""></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- <section class="u-border-1 u-border-no-left u-border-no-right u-border-palette-5-light-1 u-clearfix u-palette-5-base u-section-6" id="carousel_aac6">
      <p class="u-align-center u-text u-text-1">Order now and get tasty discounts!</p>
    </section>
    <section class="u-align-center u-clearfix u-palette-5-light-2 u-section-7" id="sec-8af9">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout" style="">
            <div class="u-layout-row" style="">
              <div class="u-align-left u-container-style u-image u-layout-cell u-left-cell u-size-30 u-size-xs-60 u-image-1" src="" data-image-width="1440" data-image-height="1080">
                <div class="u-container-layout u-valign-middle u-container-layout-1" src=""></div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-palette-5-base u-right-cell u-size-30 u-size-xs-60 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <h1 class="u-text u-text-default u-text-1">Not your traditional Mooncake</h1>
                  <p class="u-text u-text-2"> A box includes a variety of 4 flavors: salted egg red bean, ube quezo, salted egg yema taro, and chocnut.<br>
                    <br>Available for pre-order! Limited slots only.<br>
                    <br>
                  </p>
                  <a href="/Events" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View promos &amp; discounts</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    
    <section class="u-align-left u-clearfix u-grey-10 u-section-9" id="carousel_078b">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-align-left u-container-style u-image u-layout-cell u-size-19 u-image-1" data-image-width="1440" data-image-height="1440">
                <div class="u-container-layout u-valign-middle u-container-layout-1"></div>
              </div>
              
              <div class="u-container-style u-layout-cell u-size-41 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <h2 class="u-align-left u-custom-font u-heading-font u-text u-text-default u-text-1">{{ $about[0]->maintitle }}</h2>
                  <p class="u-align-justify u-text u-text-2">
                  {{ $about[0]->page_content }} 
                </p>
                  <a href="/About" class="u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Read more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection

<!-- Push a style dynamically from a view -->
@push('styles')
<link rel="stylesheet" href="css/home.css" media="screen">
@endpush

<!-- Push a script dynamically from a view -->
@push('scripts')
<!-- <script src="/example.js"></script> -->    
@endpush