
@extends('layouts.index')

@section('title')
{{ $category }}
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="../../css/pastries.css" media="screen">
<link rel="stylesheet" href="/css/datagrid.css" media="screen">
@endsection

@section('content')  

    <section class="u-clearfix u-section-3" id="sec-2dfe">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h6 class="u-text u-text-default u-text-1">{{ $category }}</h6>
      </div>
    </section>
    <section class="u-clearfix u-section-4" id="sec-0999">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">


            <!--- begin product item --->
            @foreach($uniqueProductIds as $uniqueProductId)
            
              @if($uniqueProductId->categories == "Events")
                <div class="eventThumbnails thumbnailView">
                  <div class="table-row">
                      <div class="table-head" style="display: none">Product ID</div>
                      <div class="table-head">Product Name</div>
                  </div>
                  <!--- begin product item --->

                  @foreach($uniqueProductIds as $uniqueProductId)
                  <!--- get selected products --->
                  <div class="table-row">
                    <div class="table-cell" style="display: none"><a class="listItemDetailLabel">Product ID</a><a href="{{ route('pastries.details', $uniqueProductId->productIdlong) }}" class="listItemDetailValue">{{$uniqueProductId->productIdlong}}</a></div>
                    <div class="table-cell"><a class="listItemDetailLabel">Product Image</a><a href="{{ route('pastries.details', $uniqueProductId->productIdlong) }}" class="listItemDetailValue"><img class="u-image u-image-default u-image-1" src="{{ '/resizer/images/ProductThumbnails/'.$uniqueProductId->thumbnailUrl}}/1080" alt="" ></a></div>
                    <div class="table-cell">
                      <a class="listItemDetailLabel">Product Name</a><h4><a href="{{ route('pastries.details', $uniqueProductId->productIdlong) }}" class="listItemDetailValue">{{$uniqueProductId->name}}</a></h4>
                      <a class="listItemDetailLabel">Foreign Name</a><a href="{{ route('pastries.details', $uniqueProductId->productIdlong) }}" class="listItemDetailValue foreignName">{{$uniqueProductId->productDescription}}</a>
                      <!-- <a class="listItemDetailLabel">Product Price</a><a href="{{ route('pastries.details', $uniqueProductId->productIdlong) }}" class="listItemDetailValue"><span class="currency">PHP</span><span class="amount"> {{$uniqueProductId->sellingPrice}}</span> </a> -->
                      <br/><br/>
                      <a href="/view/{{ $uniqueProductId->productIdlong }}" class="button u-align-center u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View</a>
                    </div>
                  </div>                
                  @endforeach
                
                </div>
              @else
                <!--- get all pastries --->                
               <div class="u-container-align-center u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-1 border">
                <div class="u-container-layout u-container-layout-1">
                  <div class="u-container-align-center u-container-style u-group u-group-1">
                    <div class="u-container-layout u-valign-bottom u-container-layout-2">
                      <h4 class="u-align-center u-custom-font u-text u-text-default u-text-font u-text-1 ellipsis">{{$uniqueProductId->name}}
                      </h4>
                    </div>
                  </div>
                  <p class="u-align-center u-text u-text-default u-text-2 small"> {{$uniqueProductId->foreignName}} </p>
                  <img class="u-image u-image-default u-image-1" src="/resizer/images/ProductThumbnails/{{$uniqueProductId->thumbnailUrl}}/240" alt="" data-image-width="1684" data-image-height="1123">
                  <h4 class="u-align-center u-custom-font u-text u-text-default u-text-font u-text-3" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><span class="amount">PHP</span> {{$uniqueProductId->sellingPrice}} </h4>
                  <a href="/view/{{ $uniqueProductId->productIdlong }}" class="u-align-center u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View</a>
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