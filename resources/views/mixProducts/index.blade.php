
@extends('layouts.index')

@section('title')
Mix and Match
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="css/pastries.css" media="screen">
@endsection

@section('content')  
<br/>
<section class="u-clearfix u-section-1" id="sec-0b38">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-18-sm u-size-18-xs u-size-51-lg u-size-51-md u-size-51-xl u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">
                  <form action="#" method="get" class="u-align-left u-border-1 u-border-grey-30 u-radius-4 u-search u-search-left u-white u-search-1">
                    <button class="u-search-button" type="submit">
                      <span class="u-search-icon u-spacing-10">
                        <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 56.966 56.966"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-275a"></use></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="svg-275a" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" class="u-svg-content"><path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"></path></svg>
                      </span>
                    </button>
                    <input class="u-search-input" type="search" name="search" value="" placeholder="Search">
                  </form>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-20-sm u-size-20-xs u-size-3-lg u-size-3-md u-size-3-xl u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2 right">
                  <a href="#" class="u-active-palette-4-base u-align-right u-border-1 u-border-active-palette-4-dark-1 u-border-grey-40 u-border-hover-palette-4-base u-btn u-btn-round u-button-style u-hover-palette-4-light-2 u-none u-radius-4 u-text-active-palette-1-dark-3 u-text-body-color u-text-hover-palette-1-dark-3 u-btn-1 inline" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><span class="u-file-icon u-icon u-text-palette-4-dark-3"><img src="images/ListView_128x128.png" alt=""></span>
                  </a>
                  <a href="#" class="u-active-palette-4-base u-align-center u-border-1 u-border-active-palette-4-dark-1 u-border-grey-40 u-border-hover-palette-4-base u-btn u-btn-round u-button-style u-hover-palette-4-light-2 u-none u-radius-4 u-text-active-palette-1-dark-3 u-text-body-color u-text-hover-palette-1-dark-3 u-btn-2 inline" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><span class="u-file-icon u-icon u-text-palette-4-dark-3 u-icon-2"><img src="images/IconView_128x128.png" alt=""></span>
                  </a>
                  <a href="#" class="u-active-palette-4-base u-align-left u-border-1 u-border-active-palette-4-dark-1 u-border-grey-40 u-border-hover-palette-4-base u-btn u-btn-round u-button-style u-hover-palette-4-light-2 u-none u-radius-4 u-text-active-palette-1-dark-3 u-text-body-color u-text-hover-palette-1-dark-3 u-btn-3 inline"><span class="u-file-icon u-icon u-text-palette-4-dark-3 u-icon-3"><img src="images/Sort_128x128.png" alt=""></span>
                  </a>
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-container-align-center u-section-2" id="sec-e817">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-border-1 u-border-palette-4-base u-expanded-width u-line u-line-horizontal u-line-1"></div>
      </div>
    </section>
<br/>
    <section class="u-clearfix u-section-3" id="sec-2dfe">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h3 class="u-text u-text-default u-text-1">Pastries</h3>
      </div>
    </section>
    <section class="u-clearfix u-section-4" id="sec-0999">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">


            <!--- begin product item --->

            @foreach($uniqueProductIds as $uniqueProductId)
            
              <!--- get all pastries --->
              @if($uniqueProductId['categories'] == "Mix and Match")
              
                
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
    
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>  

@endsection