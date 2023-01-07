
@extends('layouts.index')

@section('title')
Product Details
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="/css/pastries/details.css" media="screen">
<link rel="stylesheet" href="/css/datagrid.css" media="screen">
@endsection

@section('content')  
<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" name="" id="loginid" value="{!! !empty(Auth::user()->id) ? Auth::user()->id : '' !!}" />
  <br/>
  @if($urlvid = '') @endif
    @foreach($products as $product)
    <section class="u-clearfix u-section-1" id="carousel_7dcd">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-50 u-layout-spacing-vertical u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-size-30 u-size-60-md">
                <div class="u-layout-col">
                  <div class="u-container-style u-image u-layout-cell u-left-cell u-size-45 u-image-1" data-image-width="1696" data-image-height="1129">
                    <div class="u-container-layout u-container-layout-1" style="background-image: url('/resizer/images/ProductImages/{{$product->url}}/320'); background-size: cover;"></div>
                  </div>
                  <div class="u-align-left u-container-style u-layout-cell u-left-cell u-size-15 u-layout-cell-2">
                    <div class="u-container-layout u-container-layout-2">
                      <h2 class="u-text u-text-1"> {{ $product->name }}<br>
                      </h2>
                      <h4 class="u-text u-text-2"> {{ $product->foreignName }} </h4>                      
                      <h4>{{  $product->productSize }}</h4>
                        <p class="u-text u-text-3">
                          <span style="font-size: 1.75rem;">PHP</span>
                          <span style="font-size: 1.75rem;">{{ number_format($product->sellingPrice, 2, '.') }}</span>

                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="u-size-30 u-size-60-md">
                <div class="u-layout-col">
                  <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-45 u-layout-cell-3">
                    <div class="u-container-layout u-container-layout-3">
                      <div class="u-container-style u-group u-image u-image-tiles u-image-2" data-image-width="100" data-image-height="60">
                        <div class="u-container-layout u-container-layout-4"></div>
                      </div>
                      <div class="u-image u-image-circle u-image-3" data-image-width="4288" data-image-height="2848" style="background-image: url('/resizer/images/ProductThumbnails/{{$product->thumbnailUrl}}/437'); background-size: cover;"></div>
                      <br/>
                      <br/>
                      <p class="u-text u-text-8"> {{ $product->productDescription }} </p>
                      
                    </div>
                  </div>
                  <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-15 u-layout-cell-4">
                    <div class="u-container-layout u-container-layout-5">        
                    @for($i=0; $i < count(explode('/' ,$product->productOptions)); $i++)   
                       
                        @if (count(explode('/',$product->productOptions)) === 1)
                          @if(count(explode('/' ,$product->productOptions)) > 1)
                        <li>
                        {{ explode('/', $product->productOptions)[0] }}
                        </li>
                          @endif
                        @else
                        
                        <p class="u-text u-text-default u-text-6"> Available flavors:</p>
                      <ul class="u-text u-text-default u-text-7">
                        @for($i=0; $i < count(explode('/', $product->productOptions)); $i++)   
                        
                        <li>
                        {{ explode('/', $product->productOptions)[$i] }}
                        </li>
                      
                        @endfor
                      </ul>
                      
<br/>
                        @endif
                        
                      
                    @endfor
                    
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @if($urlvid = $product->video_url) @endif
 @endforeach 
 <section class="u-clearfix u-section-6" id="sec-9474">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
        <div class="u-layout right" >
          <a href="javascript:history.back()" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Go back</a>
         
          @if($product->stock == null || $product->stock <= 0)
            <span class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2">Product not available this time...</span>
          @else
          <a class="addtocart u-border-2 u-border-hover-palette-1-base u-button-style u-btn u-btn-round u-radius-4 u-btn-3" prod-id="{{ $product->productIdlong }}" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Add to cart</a>
          @endif 
          


          <!-- <button id="placeorder"  class="u-border-2 u-border-hover-palette-1-base u-button-style u-btn u-btn-round u-radius-4 u-btn-3" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Order now</button>             -->
        </div>
      </div>
    </div>
  </section><br/>
  <section class="u-clearfix u-section-2" id="sec-1333">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1 storageDiv">
        <label><b>Storage Instructions:</b></label>
        <p class="u-text u-text-8">  $product->storage</p>
      </div>
    </section>
  <br/>
    <section class="u-clearfix u-grey-5 u-section-2" id="sec-1333">
    <br/><br/>
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h2 class="u-text u-text-1">You might also like:</h2>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-container-align-center u-grey-5 u-section-3" id="sec-ff51">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-layout-horizontal u-list u-list-1">
          <div class="u-repeater u-repeater-1">

          <!--- begin product item --->

          @foreach($alsobuy as $uniqueProductId)
            
            <!--- get all pastries --->
          
            <div class="u-container-style u-list-item u-repeater-item u-shape-rectangle">
              <div class="u-container-layout u-similar-container u-container-layout-1">
                <img class="u-border-2 u-border-grey-10 u-expanded-width u-image u-image-contain u-image-default u-image-1" alt="" data-image-width="3024" data-image-height="2520" src="/resizer/images/ProductThumbnails/{{$uniqueProductId->thumbnailUrl}}/309">

                <h4 class="u-align-center u-text u-text-1"> {{$uniqueProductId->name}}<br> {{$uniqueProductId->foreignName}}<br>
                </h4>
                <a href="{{ route('pastries.details', $uniqueProductId->productIdlong) }}" class="u-align-center u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View</a>
              </div>
            </div>
       
          
          @endforeach

            @foreach($uniqueProductIds as $uniqueProductId)
            
            
              <div class="u-container-style u-list-item u-repeater-item u-shape-rectangle">

                <div class="u-container-layout u-similar-container u-container-layout-1">
                  <img class="u-border-2 u-border-grey-10 u-expanded-width u-image u-image-contain u-image-default u-image-1" alt="" data-image-width="3024" data-image-height="2520" src="/resizer/images/ProductThumbnails/{{$uniqueProductId->thumbnailUrl}}/309">

                  <h4 class="u-align-center u-text u-text-1"> {{$uniqueProductId->name}}<br> {{$uniqueProductId->foreignName}}<br>
                  </h4>
                  <a href="{{ route('pastries.details', $uniqueProductId->productIdlong) }}" class="u-align-center u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View</a>
                </div>
              </div>
            @endforeach

          <!--- end product item --->  

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
          <a class="u-absolute-vcenter u-gallery-nav u-gallery-nav-next u-grey-70 u-icon-circle u-opacity u-opacity-70 u-spacing-10 u-text-white u-gallery-nav-2" href="#" role="button">
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
      </div><br/>

    </section><br/>
    <section class="u-clearfix u-section-2" id="sec-1333">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1"><br/>
        <h2 class="u-text u-text-1">Reviews:</h2><br/>
      </div>
    </section>
    <section class="u-clearfix u-section-2" id="sec-1333">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <div class="reviewThumbnails thumbnailView">
              <div class="table-row">
                <div class="table-head" style="display: none">Product ID</div>
                <div class="table-head">Product Name</div>
              </div>
              <!--- begin product item --->
              @foreach($reviews as $review)
              <!--- get selected products --->
              <div class="table-row">
                <div class="table-cell" style="display: none"><span class="listItemDetailLabel">Product ID</span><span class="listItemDetailValue">{{$uniqueProductId->productIdlong}}</span></div>
                <div class="table-cell">
                  <span class="listItemDetailLabel">Title</span><h5><span class="listItemDetailValue">No issues with delivery</span></h5><br/>
                  <!-- <span class="listItemDetailLabel">Time</span><span class="listItemDetailValue">reviewed 3 hrs ago</span><br/> -->
                  <span class="listItemDetailLabel">Review</span><span class="listItemDetailValue foreignName"><i>"{{ $review->review }}"</i></span><br/><br/>
                  <span class="listItemDetailLabel">Customer Name</span><h5><span class="listItemDetailValue">- {{ $review->customer_id }}</span></h5></div>
              </div>                
              @endforeach      
            </div>
        
      </div>
    </section>
    <br/> 
    <section class="u-clearfix u-section-2" id="sec-1333">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1"><br/>
        <h2 class="u-text u-text-1">Links:</h2>
      </div>
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1 storageDiv">
        <label><b>I Made Buttery Pineapple Cakes From Scratch</b></label>
        <p class="u-text u-text-8"> <a href="'{{ $urlvid }}'">{{ $urlvid }} </a></p>
      </div>
    </section><br/><br/><br/>
      <!-- <div>Products Review</div>
          @foreach($reviews as $review)
            <div>
                <div class="reviewerName">
                    {{ $review->customer_id }}
                </div>
                <div class="customerReview">
                    {{ $review->review }}
                </div>
            </div>
          @endforeach -->

          <!-- <div>VIdeo URL</div>
          <div> URL embed here {{ $urlvid }}</div> -->

    
       
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
jQuery(document).ready(function ($) {  

  $('.addtocart').click(function(){
    
    let _token = $('meta[name="csrf-token"]').attr('content');
    let myid = $("#loginid").val();
    let id = $(this).attr('prod-id');
    let notes = '';
    $.ajax({
        url: "/api/add-to-cart",
        type:"POST",
        data:{
        myid:myid,
        id:id,
        notes:notes,
        _token: _token
        },
        success:function(response){
        location.href='/Cart';

        },
    });  
  });
  

});

</script>

@endsection