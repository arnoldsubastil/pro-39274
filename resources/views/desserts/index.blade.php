
@extends('layouts.index')

@section('title')
Desserts
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="css/pastries.css" media="screen">
@endsection

@section('content')  

    <section class="u-clearfix u-section-3" id="sec-2dfe">
      <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h3 class="u-text u-text-default u-text-1">Desserts</h3>
      </div>
    </section>
    <section class="u-clearfix u-section-4" id="sec-0999">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">


            <!--- begin product item --->

            @foreach($uniqueProductIds as $uniqueProductId)            
  
              <!--- get all sweets, beans, cereals --->
              @if($uniqueProductId['productTypeId'] == "BDB353A9-27DA-4257-A3F6-54477A8CA9B4" || $uniqueProductId['productTypeId'] == "DE3B5EB8-F1C8-45C1-819D-D5AB033A7335" || $uniqueProductId['productTypeId'] == "8D184E01-01C3-49FD-A2BC-8452B17D9F60")
                
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
                    <a href="{{ route('desserts.details', $uniqueProductId['productId']) }}" class="u-align-center u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View</a>
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