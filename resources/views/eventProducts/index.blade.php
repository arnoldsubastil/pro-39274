
@extends('layouts.index')

@section('title')
Promos and Events
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="css/eventProducts/index.css" media="screen">
@endsection

@section('content')  

<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" name="" id="loginid" value="{!! !empty(Auth::user()->id) ? Auth::user()->id : '' !!}" />
<section class="u-clearfix u-section-1" id="sec-3310">
@if ($lastid = '') @endif
@foreach($uniqueProductIds as $uniqueProductId)
  @if ($lastid != $uniqueProductId->product_id)
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-34 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-col">
              <div class="u-size-30">
                <div class="u-layout-row">
                  <!-- <div class="u-container-style u-image u-layout-cell u-left-cell u-size-30 u-image-1 giftset" src="" data-image-width="1718" data-image-height="965">
                    <div class="u-container-layout u-valign-middle u-container-layout-1"></div>
                  </div> -->
                  
                  <img src="/images/GiftSets/ChristmasGiftSet625_1080x1080.jpg" style="margin: 24px; min-width: 320px; max-width: 432px;"/>
                  <div class="u-align-justify u-container-style u-layout-cell u-right-cell u-size-30 u-layout-cell-2">
                    <div class="u-container-layout u-container-layout-2">
                    <p class="u-text u-text-1">
                     {{ $uniqueProductId->productDescription }}
                      </p>
                      <br/><br/>
                      <h4 class="u-text u-text-1">
                      {{ $uniqueProductId->name }}
                      </p>
                      <ul class="u-text u-text-default u-text-7">
                      @foreach (explode(',',$uniqueProductId->chooseitem) as $choices)
                      @if($labels = explode('-',$choices)) @endif
                        <li>{{ $labels['0'] }} pcs {{ $labels['1'] }}</li>
                          @for ($i = 0; $i < intval($labels['0']); $i++)
                                <select id="year" name="year" class="form-control {{ $uniqueProductId->product_id }}_items">
                                    @foreach (explode('/',$labels['2']) as $choicesitem)
                                        <option value="{{ $choicesitem }}">{{ $choicesitem }}</option>
                                    @endforeach
                                </select>
                          @endfor
                      @endforeach
                      </ul>
                      <p class="u-text u-text-3">
                          <span style="font-size: 1.25rem;">PHP </span>
                          <span style="font-size: 1.75rem;">{{ $uniqueProductId->sellingPrice }}</span>
                      </p>

                      <br/><br/>
<a prod-id="{{ $uniqueProductId->productIdlong }}" prod-unique-id="{{ $uniqueProductId->product_id }}" class="u-align-center u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1 addtocart" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="" target="_blank">Order now!</a>
                 
                      
                    </div>
                  </div>
                </div>
              </div>


<br/>

@if ($lastid = $uniqueProductId->product_id) @endif
@endif
@endforeach
    </section>
    
   <br/><br/>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
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