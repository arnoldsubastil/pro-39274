
@extends('layouts.index')

@section('title')
Promos and Events
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="css/eventProducts/index.css" media="screen">
<link rel="stylesheet" href="/css/datagrid.css" media="screen">
@endsection

@section('content')  

<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" name="" id="loginid" value="{!! !empty(Auth::user()->id) ? Auth::user()->id : '' !!}" />

<section class="u-clearfix u-section-1" id="sec-3310">

    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
        <div class="u-gutter-0 u-layout">
          <div class="u-layout-row">
          <div class="eventThumbnails thumbnailView">
            <div class="table-row">
              <div class="table-head" style="display: none">Product ID</div>
              <div class="table-head">Product Name</div>
            </div>
            <!--- begin product item --->
            @foreach($uniqueProductIds as $uniqueProductId)
            <!--- get selected products --->
            <div class="table-row">
              <div class="table-cell" style="display: none"><span class="listItemDetailLabel">Product ID</span><span class="listItemDetailValue">{{$uniqueProductId->productIdlong}}</span></div>
              <div class="table-cell"><span class="listItemDetailLabel">Product Image</span><span class="listItemDetailValue"><img class="u-image u-image-default u-image-1" src="{{ '/resizer/images/ProductThumbnails/'.$uniqueProductId->url}}/1080" alt="" ></span></div>
              <div class="table-cell">
                <span class="listItemDetailLabel">Product Name</span><h5><span class="listItemDetailValue">{{$uniqueProductId->name}}</span></h5>
                <span class="listItemDetailLabel">Foreign Name</span><span class="listItemDetailValue foreignName">{{$uniqueProductId->productDescription}}</span>
                <span class="listItemDetailLabel">Product Price</span><span class="listItemDetailValue"><span class="currency">PHP</span><span class="amount"> {{$uniqueProductId->sellingPrice}}</span> </span>
               
                <ul class="u-text u-text-default u-text-7 noListStyle">
                      @if($uniqueProductId->chooseitem != null)
                      
                      @foreach (explode('----,',$uniqueProductId->chooseitem) as $choices)
                      @if($labels = explode('-',$choices)) @endif

                      @if($labels['0'] != 0)
                        <li><br/><b>Mix & Match: </b> {{ $labels['0'] }} pcs {{ $labels['1'] }}</li>
                      @endif
                          @for ($i = 0; $i < intval($labels['0']); $i++)
                                <select id="year" name="year" class="flavorSelect form-control {{ $uniqueProductId->product_id }}_items">
                                    @foreach (explode('/',$labels['2']) as $choicesitem)
                                        <option value="{{ $choicesitem }}">{{ $choicesitem }}</option>
                                    @endforeach
                                </select>
                          @endfor
                          
                      @endforeach
                      @endif
                      
                 </ul>
                <a prod-id="{{ $uniqueProductId->productIdlong }}" prod-unique-id="{{ $uniqueProductId->product_id }}" class="button u-align-center u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1 addtocart" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="" target="_blank">Order now!</a>
              </div>
            </div>                
            @endforeach      
            </div>
          </div>
        </div>
      </div>
    </div>    


<br/>

    </section>
    
   <br/><br/>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script >

function duplicate() {    
    var original = document.getElementById('service');
    var rows = original.parentNode.rows;
    var i = rows.length - 1;
    var clone = original.cloneNode(true); // "deep" clone

    clone.id = "duplic" + (i); // there can only be one element with an ID
    original.parentNode.insertBefore(clone, rows[i]);
}

jQuery(document).ready(function ($) {  

  

  $('.addtocart').click(function(){
    
    let _token = $('meta[name="csrf-token"]').attr('content');
    let myid = $("#loginid").val();
    let id = $(this).attr('prod-id');
    let uniqueid = $(this).attr('prod-unique-id');

    $itemslist = 'Content: ';
    $("." + uniqueid + "_items").each(function() {
        $itemslist = $itemslist + $(this).val() + ", ";
    });

    let notes = $itemslist;
    console.log(notes);
    $.ajax({
        url: "/api/add-to-cart",
        type:"POST",
        data:{
        myid:myid,
        id:id,
        note:notes,
        _token: _token
        },
        success:function(response){
            console.log(response);
        location.href='/Cart';
        },
    });  
  });
  

});

</script>

@endsection