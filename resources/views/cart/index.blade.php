@extends('layouts.index')

@section('title')
Shopping Cart
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="/css/cart/index.css" media="screen">
<link rel="stylesheet" href="/css/datagrid.css" media="screen">
@endsection

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" name="" id="loginid" value="{!! !empty(Auth::user()->id) ? Auth::user()->id : '' !!}" />
<section class="u-clearfix u-section-3" id="sec-2dfe">
  <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
    <h6 class="u-text u-text-default u-text-1">Your shopping cart</h6>
  </div>
</section>

    <section class="u-clearfix u-section-5" id="sec-19b6">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              

              <div class="table listView ">
                  <div class="table-row">
                      <div class="table-head" style="display: none">Product ID</div>
                      <div class="table-head">Product Name</div>
                  </div>
              <!--- begin product item --->

              @foreach($uniqueProductIds as $uniqueProductId)

                <!--- get selected products --->
                
                <div class="table-row">
                      <div class="table-cell selectCheckbox">
                        <div class="round">
                          <input type="checkbox" id="{{ $uniqueProductId->productIdlong }}" name="" value="{{ $uniqueProductId->productIdlong }}" class="itemchecker" checked />
                          <label for="{{ $uniqueProductId->productIdlong }}"></label>
                        </div>
                      </div>
                      <div class="table-cell" style="display: none"><a class="listItemDetailLabel">Product ID</a><a href="{{ route('pastries.details', $uniqueProductId->productIdlong) }}" class="listItemDetailValue">{{$uniqueProductId->productIdlong}}</a></div>
                      <div class="table-cell"><a class="listItemDetailLabel">Product Image</a><a href="{{ route('pastries.details', $uniqueProductId->productIdlong) }}" class="listItemDetailValue"><img class="u-image u-image-default u-image-1" src="{{ '/'.$uniqueProductId->thumbnailUrl}}" alt="" ></a></div>
                      <div class="table-cell"><a class="listItemDetailLabel">Product Name</a><a href="{{ route('pastries.details', $uniqueProductId->productIdlong) }}" class="listItemDetailValue">{{$uniqueProductId->name}}</a><a class="listItemDetailLabel">Foreign Name</a><a href="{{ route('pastries.details', $uniqueProductId->productIdlong) }}" class="listItemDetailValue foreignName">{{$uniqueProductId->foreignName}}</a><a class="listItemDetailLabel">Product Price</a><a href="{{ route('pastries.details', $uniqueProductId->productIdlong) }}" class="listItemDetailValue"><span class="currency">PHP</span><span class="amount"> {{$uniqueProductId->sellingPrice}}</span> </a></div>
                      <div class="table-cell"><a class="listItemDetailLabel">Product Quantity</a><a class="listItemDetailValue"><input type="button" value="-" class="minustocart" productcount="" style="display: none;"><input type="number" name="" prod-id="{{ $uniqueProductId->productIdlong }}" note="{{ $uniqueProductId->product_note}}" class="itemNumber" value="{{ $uniqueProductId->numberoforder }}" /></a></div>
                      <div class="table-cell"><button class="u-align-right u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Remove</button></div>
                    </div>
              
              @endforeach
              
            </div>
             
              <!-- @foreach($uniqueProductIds as $uniqueProductId)
                
                <div class="u-container-align-center u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-1 border">
                  <div class="u-container-layout u-container-layout-1">
                    <div class="u-container-align-center u-container-style u-group u-group-1">
                      <div class="u-container-layout u-valign-bottom u-container-layout-2">
                        <h4 class="u-align-center u-custom-font u-text u-text-default u-text-font u-text-1 ellipsis">{{$uniqueProductId->name}}
                        </h4>
                      </div>
                    </div>
                    <p class="u-align-center u-text u-text-default u-text-2 small"> {{$uniqueProductId->foreignName}} </p>
                    <img class="u-image u-image-default u-image-1" src="{{ '/'.$uniqueProductId->thumbnailUrl}}" alt="" data-image-width="1684" data-image-height="1123">
                    <h4 class="u-align-center u-custom-font u-text u-text-default u-text-font u-text-3" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><span class="amount">PHP</span> {{$uniqueProductId->sellingPrice}}</h4>
                    <a href="{{ route('pastries.details', $uniqueProductId->productIdlong) }}" class="u-align-center u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View</a>
                    <input type="button" value="-" class="minustocart" productcount="" >

                    <input type="number" name="" prod-id="{{ $uniqueProductId->productIdlong }}" note="{{ $uniqueProductId->product_note}}" class="itemNumber" value="{{ $uniqueProductId->numberoforder }}" />

                    <input type="checkbox" name="" value="{{ $uniqueProductId->productIdlong }}" class="itemchecker" />
                  </div>
                </div>
              
              @endforeach -->
              <input type="hidden" name="tocheckout" class="tocheckout" value='' />
              <!--- end product item --->

            </div>
          </div>
        </div>
      </div>
    </section>
    <br/>
    <section class="u-clearfix u-section-6" id="sec-9474">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout right" >
            <a href="javascript:history.back()" class="u-align-right u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Go back</a>
            <button id="placeorder"  class="u-align-center u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Place order</button>            
          </div>
        </div>
      </div>
    </section>

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
jQuery(document).ready(function ($) {  

  $(".itemNumber").keyup(function(){

    let _token = $('meta[name="csrf-token"]').attr('content');
    let myid = $("#loginid").val();
    let id = $(this).attr('prod-id');
    let note = $(this).attr('note');
    let qty = $(this).val();
    console.log(id);
    $.ajax({
        url: "/api/update-qty-cart",
        type:"POST",
        data:{
        myid:myid,
        qty:qty,
        productid:id,
        note:note,
        _token: _token
        },
        success:function(response){
            console.log(response);
        },
    });  
  });
  
  $('#placeorder').click(function(){

    var orderlist = '';
    $(".itemchecker:checked").each(function(){
      orderlist = $(this).val() + ',' + orderlist;
    });

    location.href='/Billing/Create/' + orderlist;
    // console.log('/checkout/' + orderlist);
  });

});

</script>


<!-- Push a script dynamically from a view -->
@push('scripts')
<!-- <script src="/example.js"></script> -->    
@endpush