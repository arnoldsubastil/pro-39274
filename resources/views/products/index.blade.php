@extends('layouts.index')

@section('title')
Products
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="css/products/index.css" media="screen">
@endsection

@section('content')

<section class="u-clearfix u-palette-4-light-3 u-section-1" id="sec-a3a8">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                <div class="u-container-layout u-valign-bottom u-container-layout-1">
                  <h5 class="u-align-left u-text u-text-default u-text-1">Soystory</h5>
                  <h2 class="u-align-left u-text u-text-default u-text-2">Taiwanese Pastries</h2>
                  <p class="u-align-left u-text u-text-default u-text-3"> Pineapple cakes&nbsp;(鳳梨酥) are&nbsp;a famous pastry from Taiwan.&nbsp;These cakes are usually square-shaped and features a tender, shortbread-like exterior with a jammy pineapple filling. Taiwanese pineapple cakes fall somewhere between a filled cookie and a small pie, and is not what we commonly think of as ‘cake.’</p>
                  <a href="/Pastries" class="u-btn u-btn-round u-button-style u-hover-palette-1-dark-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View Pastries</a>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <img class="u-expanded-height-lg u-expanded-height-md u-expanded-height-xl u-image u-image-contain u-image-default u-image-1" src="images/Products/HeroImage_Pastries_700x700.png" alt="" data-image-width="700" data-image-height="700">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-palette-4-light-3 u-section-2" id="carousel_f4a5">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                <div class="u-container-layout u-valign-bottom u-container-layout-1">
                  <h5 class="u-align-left u-text u-text-default u-text-1">Sun-Q</h5>
                  <h2 class="u-align-left u-text u-text-default u-text-2">Beverages &amp; Mix-ins</h2>
                  <p class="u-align-left u-text u-text-default u-text-3"> Just like in Taiwan, Tea shops are popping up all over the world. One Taiwan based company has over 450 locations while in the Philippines another person owns over 100 within 1.5 years.</p>
                  <a href="/Beverages" class="u-btn u-btn-round u-button-style u-hover-palette-1-dark-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View Beverages</a>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <img class="u-expanded-height-lg u-expanded-height-md u-expanded-height-xl u-image u-image-contain u-image-default u-image-1" src="images/Products/HeroImage_Beverages_700x700.png" alt="" data-image-width="700" data-image-height="700">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-palette-4-light-3 u-section-3" id="carousel_648d">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
                <div class="u-container-layout u-valign-bottom u-container-layout-1">
                  <h5 class="u-align-left u-text u-text-default u-text-1">Soystory &amp; Sun-Q</h5>
                  <h2 class="u-align-left u-text u-text-default u-text-2">Desserts</h2>
                  <p class="u-align-left u-text u-text-default u-text-3"> Igniting Taiwanese cuisine with vibrant colors, sumptuous, gooey textures, and spellbinding decadence, these&nbsp;Taiwanese desserts&nbsp;are must-try dishes on your trip to Taiwan.Food plays an incredibly important role in Taiwanese culture, and that dedication, tradition, and creativity truly comes through in all of these popular dessert dishes.</p>
                  <a href="/Desserts" class="u-btn u-btn-round u-button-style u-hover-palette-1-dark-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View Desserts</a>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <img class="u-expanded-height-lg u-expanded-height-md u-expanded-height-xl u-image u-image-contain u-image-default u-image-1" src="images/Products/HeroImage_Desserts_700x700.png" alt="" data-image-width="700" data-image-height="700">
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