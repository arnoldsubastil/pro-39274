@extends('layouts.index')

@section('title')
Categories
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="css/categories.css" media="screen">
@endsection

@section('content')

<section class="u-clearfix u-white u-section-1" id="carousel_5bda">
      <div class="u-expanded-width u-grey-10 u-shape u-shape-rectangle u-shape-1"></div>
      <div class="u-container-style u-group u-shape-rectangle u-group-1">
        <div class="u-container-layout u-container-layout-1">
          <img alt="" class="u-align-left u-image u-image-default u-image-1" data-image-width="816" data-image-height="816" src="images/Customer_816x816.jpg">
        </div>
      </div>
      <div class="u-list u-list-1">
        <div class="u-repeater u-repeater-1">
          <div class="u-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-1">
            <div class="u-container-layout u-similar-container u-container-layout-2"><span class="u-file-icon u-icon u-icon-1">
              <img src="images/BestSellers_100x100.png" alt=""></span>
              <h4 class="u-text u-text-default u-text-1"><a href="/Pastries">Best sellers</a></h4>
            </div>
          </div>
          <div class="u-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-2">
            <div class="u-container-layout u-similar-container u-container-layout-3"><span class="u-file-icon u-icon u-icon-2"><img src="images/NewProducts_100x100.png" alt=""></span>
              <h4 class="u-text u-text-default u-text-2"><a href="/Pastries/DEE36E3F-9D7E-46C9-951F-26282B0F3841">Must try</a></h4>
            </div>
          </div>
          <div class="u-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-3">
            <div class="u-container-layout u-similar-container u-container-layout-4"><span class="u-file-icon u-icon u-icon-3"><img src="images/Promos_100x100.png" alt=""></span>
              <h4 class="u-text u-text-default u-text-3"><a href="{{ route('eventProducts.index') }}">Events</a></h4>
            </div>
          </div>
          <div class="u-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-4">
            <div class="u-container-layout u-similar-container u-container-layout-5"><span class="u-file-icon u-icon u-icon-4"><img src="images/Bundles_100x100.png" alt=""></span>
              <h4 class="u-text u-text-default u-text-4"><a href="/Pastries">Bundles</a></h4></h4>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-container-align-center u-section-2" id="sec-c0c2">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-border-1 u-border-palette-4-base u-expanded-width u-line u-line-horizontal u-line-1"></div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-section-3" id="carousel_229a">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-text u-text-1">Best Sellers</h2>
        <p class="u-text u-text-grey-70 u-text-2"> Have you tried our best selling pineapple cakes and suncakes?</p>
        <!---
        <a href="{{ route('bestsellerProducts.index') }}" class="u-active-none u-align-center u-border-2 u-border-active-palette-2-dark-1 u-border-hover-palette-2-base u-border-no-left u-border-no-right u-border-no-top u-border-palette-1-base u-btn u-button-style u-hover-none u-none u-text-hover-palette-2-base u-text-palette-1-base u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Browse all best sellers</a>
-->
        <div class="u-expanded-width u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-align-center u-container-align-center u-container-style u-custom-border u-list-item u-repeater-item u-shape-rectangle">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                <h4 class="u-align-center u-text u-text-grey-70 u-text-3"> Salted Egg Pineapple Cake</h4>
                <h4 class="u-align-center u-text u-text-4"> 鳳​凰酥</h4>
                <div class="u-align-center u-border-16 u-border-grey-10 u-container-style u-group u-image u-shape-circle u-image-1" data-image-width="480" data-image-height="480">
                  <div class="u-container-layout u-valign-top u-container-layout-2"></div>
                  <div class="u-preserve-proportions-child" style="padding-top: 100%;"></div>
                </div>
                <p class="u-align-center u-text u-text-grey-70 u-text-5"> Buttery shortbread crust generously stuffed with homemade pineapple filling and salted egg.</p>
                <a href="/Pastries/F0FF91B6-050B-4E2E-9694-5E36550E95DC" class="u-btn u-btn-round u-button-style u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View</a>
              </div>
            </div>
            <div class="u-align-center u-container-align-center u-container-style u-custom-border u-list-item u-repeater-item u-shape-rectangle">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
                <h4 class="u-align-center u-text u-text-grey-70 u-text-6">Pineapple Cake</h4>
                <h4 class="u-align-center u-text u-text-7"> 鳳梨酥</h4>
                <div class="u-align-center u-border-16 u-border-grey-10 u-container-style u-group u-image u-shape-circle u-image-2" data-image-width="1684" data-image-height="1123">
                  <div class="u-container-layout u-valign-top u-container-layout-4"></div>
                </div>
                <p class="u-align-center u-text u-text-grey-70 u-text-8"> Buttery shortbread crust generously stuffed with homemade pineapple filling.</p>
                <a href="/Pastries/D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD" class="u-btn u-btn-round u-button-style u-radius-4 u-btn-3" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View</a>
              </div>
            </div>
            <div class="u-align-center u-container-align-center u-container-style u-custom-border u-list-item u-repeater-item u-shape-rectangle">
              <div class="u-container-layout u-similar-container u-valign-top u-container-layout-5">
                <h4 class="u-align-center u-text u-text-grey-70 u-text-9">Suncake</h4>
                <h4 class="u-align-center u-text u-text-10"> 太陽餅</h4>
                <div class="u-align-center u-border-16 u-border-grey-10 u-container-style u-group u-image u-shape-circle u-image-3" data-image-width="480" data-image-height="480">
                  <div class="u-container-layout u-valign-top u-container-layout-6"></div>
                  <div class="u-preserve-proportions-child" style="padding-top: 100%;"></div>
                </div>
                <p class="u-align-center u-text u-text-grey-70 u-text-11"> We only use the finest ingredients, such as real fresh ube. It’s a favorite Taiwanese snack with a Filipino twist!&nbsp;</p>
                <a href="/Pastries/26E0F202-8063-4EEB-9EE9-134720810CBC" class="u-btn u-btn-round u-button-style u-radius-4 u-btn-4" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-container-align-center u-section-4" id="carousel_e8bc">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-border-1 u-border-palette-4-base u-expanded-width u-line u-line-horizontal u-line-1"></div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-section-5" id="carousel_318f">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-text u-text-default u-text-1">Must Try</h2>
        <p class="u-text u-text-2"> Order now to try it yourself!</p>
        <!--
        <a href="/Pastries/DEE36E3F-9D7E-46C9-951F-26282B0F3841" class="u-active-none u-align-center u-border-2 u-border-active-palette-2-dark-1 u-border-hover-palette-2-base u-border-no-left u-border-no-right u-border-no-top u-border-palette-1-base u-btn u-button-style u-hover-none u-none u-text-hover-palette-2-base u-text-palette-1-base u-btn-1 " data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Browse all new products</a>
-->
      </div>
    </section>
    <section class="u-align-center u-clearfix u-section-6" id="sec-a12a">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-10 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-image u-layout-cell u-left-cell u-size-30 u-image-1" src="" data-image-width="1440" data-image-height="960">
                <div class="u-container-layout u-valign-middle u-container-layout-1"></div>
              </div>
              <div class="u-align-left u-container-style u-layout-cell u-size-30 u-layout-cell-2">
                <div class="u-container-layout u-valign-middle u-container-layout-2">
                  <h3 class="u-text u-text-1"> Salted Egg Coco Pastry</h3>
                  <p class="u-text u-text-2"> One of our crowd’s favorite- salted egg coco pastry. A Pinoy twist to the traditional Taiwanese mooncake. Light flaky crust of a Taiwanese mooncake generously stuffed with sweetened grated coconut meat and salted egg. It’s a pan de coco-mooncake hybrid.</p>
                  <a href="/Pastries/DEE36E3F-9D7E-46C9-951F-26282B0F3841" class="u-btn u-btn-round u-button-style u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-container-align-center u-section-7" id="carousel_85b0">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-border-1 u-border-palette-4-base u-expanded-width u-line u-line-horizontal u-line-1"></div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-section-8" id="carousel_7652">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-text u-text-default u-text-1">Bundles</h2>
        <p class="u-text u-text-2"> Soystory bundles to make your day extra special.</p>
        <!---
        <a href="{{ route('mixProducts.index') }}" class="u-active-none u-align-center u-border-2 u-border-active-palette-2-dark-1 u-border-hover-palette-2-base u-border-no-left u-border-no-right u-border-no-top u-border-palette-1-base u-btn u-button-style u-hover-none u-none u-text-hover-palette-2-base u-text-palette-1-base u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Browse all bundles</a>
-->
      </div>
    </section>
    <section class="u-align-center u-clearfix u-container-align-center u-section-9" id="carousel_3363">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-expanded-width u-layout-horizontal u-list u-list-1">
          <div class="u-repeater u-repeater-1">
            <div class="u-align-left u-container-align-center u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-1">
                <img class="u-expanded-width u-image u-image-default u-image-1" alt="" data-image-width="3024" data-image-height="2520" src="images/ProductThumbnails/SaltedEggPastriesBox_1920x1600.jpg">
                <h4 class="u-align-center u-text u-text-1"> Salted Egg Pastries Box</h4>
                <p class="u-align-center u-text u-text-default u-text-2"> Customize your box of 4. For example, mix and match 2 taro, and 2 coco.<br>
                  <br>
                </p>
                <a href="/Pastries/DEE36E3F-9D7E-46C9-951F-26282B0F3841" class="u-btn u-btn-round u-button-style u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View</a>
              </div>
            </div>
            <div class="u-align-left u-container-align-center u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-2">
                <img class="u-expanded-width u-image u-image-default u-image-2" alt="" data-image-width="3024" data-image-height="3024" src="images/ProductThumbnails/SuncakeBox_1920x1920.jpg">
                <h4 class="u-align-center u-text u-text-3"> Suncake</h4>
                <p class="u-align-center u-text u-text-default u-text-4"> Customize your box of 5. For example, mix and match 3 plain, and 2 ube.<br>
                  <br>
                </p>
                <a href="/Pastries/26E0F202-8063-4EEB-9EE9-134720810CBC" class="u-btn u-btn-round u-button-style u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View</a>
              </div>
            </div>
            <div class="u-align-left u-container-align-center u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-3">
                <img class="u-expanded-width u-image u-image-default u-image-3" alt="" data-image-width="480" data-image-height="480" src="images/ProductThumbnails/RedBeanOrTaroCakes_1920x1256.jpg">
                <h4 class="u-align-center u-text u-text-5"> Red Bean or Taro Cakes</h4>
                <p class="u-align-center u-text u-text-default u-text-6"> Customize your box of 5. For example, mix and match ​3 red bean, and 2 salted egg taro.</p>
                <a href="/Pastries/EC667D18-D83A-4C6E-B68B-D238EBCA62E9" class="u-btn u-btn-round u-button-style u-radius-4 u-btn-3" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View</a>
              </div>
            </div>
            <div class="u-align-left u-container-align-center u-container-style u-list-item u-repeater-item">
              <div class="u-container-layout u-similar-container u-container-layout-4">
                <img class="u-expanded-width u-image u-image-default u-image-4" alt="" data-image-width="740" data-image-height="475" src="images/ProductThumbnails/Taiwanese3QPastryBox_740x475.jpg">
                <h4 class="u-align-center u-text u-text-7"> Taiwanese 3Q Pastry</h4>
                <p class="u-align-center u-text u-text-default u-text-8"> Customize your box of 3. For example, mix and match ​​2 mochi, and 1 salted egg.</p>
                <a href="/Pastries/E041A5A3-A2CB-4A21-8C3C-E577CB8F14B2" class="u-btn u-btn-round u-button-style u-radius-4 u-btn-4" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View</a>
              </div>
            </div>
          </div>
          <a class="u-absolute-vcenter u-gallery-nav u-gallery-nav-prev u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-1" href="#" role="button">
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
          <a class="u-gallery-nav u-gallery-nav-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-2" href="#" role="button">
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
      </div>
    </section>
    <section class="u-clearfix u-container-align-center u-section-10" id="carousel_2113">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-border-1 u-border-palette-4-base u-expanded-width u-line u-line-horizontal u-line-1"></div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-section-11" id="sec-fd2b">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h2 class="u-text u-text-default u-text-1">Promos &amp; Events</h2>
        <p class="u-text u-text-2">You still have a few more days to join our giveaway! Check our story to see how you can win your favorite Soystory goodies.</p>
        <a href="{{ route('eventProducts.index') }}" class="u-btn u-btn-round u-button-style u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Browse all promos &amp; events</a>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-white u-section-12" id="carousel_592a">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-col">
              <div class="u-size-30">
                <div class="u-layout-row">
                  <div class="u-align-center-xl u-container-style u-layout-cell u-size-20 u-layout-cell-1">
                    <div class="u-container-layout u-valign-middle-md u-valign-middle-sm u-valign-middle-xl u-valign-middle-xs u-container-layout-1">
                      <div class="u-image u-image-circle u-image-1" data-image-width="526" data-image-height="526"></div>
                    </div>
                  </div>
                  <div class="u-align-center u-container-style u-layout-cell u-palette-1-light-3 u-size-20 u-layout-cell-2">
                    <div class="u-container-layout u-container-layout-2">
                      <p class="u-align-center u-text u-text-default u-text-1"> No one is here to judge whether or not you have been naughty or nice, but this Christmas season, we are giving 3 lucky followers a chance to win your favorite SOYSTORY goodies!&nbsp;</p>
                    </div>
                  </div>
                  <div class="u-align-center-xl u-container-style u-layout-cell u-size-20 u-layout-cell-3">
                    <div class="u-container-layout u-valign-middle-sm u-valign-middle-xl u-valign-middle-xs u-container-layout-3">
                      <div class="u-image u-image-circle u-image-2" data-image-width="1440" data-image-height="1440"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="u-size-30">
                <div class="u-layout-row">
                  <div class="u-align-center u-container-style u-grey-5 u-layout-cell u-size-20 u-layout-cell-4">
                    <div class="u-container-layout u-container-layout-4">
                      <p class="u-align-center u-text u-text-default u-text-2"> ‘Tis season of giving!  We are giving 3 lucky followers a chance to win your favorite SOYSTORY goodies!</p>
                    </div>
                  </div>
                  <div class="u-align-center-xl u-container-style u-layout-cell u-size-20 u-layout-cell-5">
                    <div class="u-container-layout u-valign-middle-md u-valign-middle-sm u-valign-middle-xl u-valign-middle-xs u-container-layout-5">
                      <div class="u-image u-image-circle u-image-3" data-image-width="640" data-image-height="523"></div>
                    </div>
                  </div>
                  <div class="u-align-center u-container-style u-layout-cell u-palette-5-base u-size-20 u-layout-cell-6">
                    <div class="u-container-layout u-container-layout-6">
                      <p class="u-text u-text-default u-text-3"> This season of giving, we are giving our followers a chance to win our best selling pineapple cakes and more! Check our story to see how you can join! Good luck!</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection