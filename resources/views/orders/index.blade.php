@extends('layouts.index')

@section('title')
Orders
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" name="" id="loginid" value="{!! !empty(Auth::user()->id) ? Auth::user()->id : '' !!}" />
<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="/css/orders/index.css" media="screen">
<link rel="stylesheet" href="/css/datagrid.css" media="screen">
<link rel="stylesheet" href="/css/SnippetButton.css" media="screen">
@endsection

@section('content')  
<br/>

<section class="u-clearfix u-section-5" id="sec-19b6">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              

              <div class="table ordersTable">
                    <div class="table-row">
                      <div class="table-head quantity">Status</div>
                      <div class="table-head">Order</div>
                      <div class="table-head">Payment</div>
                      <div class="table-head">Items</div>                      
                      <div class="table-head">Notes</div>
                      <div class="table-head arrow"></div>
                    </div>
              <!--- begin product item --->

              
                <!--- get selected products --->
                
                <div class="table-row">
                      <!-- <div class="table-cell selectCheckbox">
                        <div class="round">
                          <input type="checkbox" id="D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD" name="" value="D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD" class="itemchecker" checked="">
                          <label for="D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD"></label>
                        </div>
                      </div> -->
                      <div class="table-cell status">
                        <div class="round" style="margin: 0 8px 8px 0;    text-align: center;    display: inline-block;    height: 26px;">
                            <input type="checkbox" id="D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD" name="" value="D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD" class="itemchecker" checked="">
                            <label for="D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD"></label>
                           </div>
                        <br/>
                        <a href="/my-orders" class="listItemDetailLabel">Status</a>
                        <a href="/my-orders" class="listItemDetailValue">Paid</a>
                      </div>
                      <div class="table-cell payment"><a href="/my-orders" class="listItemDetailLabel">Order ID</a><a href="/my-orders" class="listItemDetailValue">OR-202301011122</a><a class="listItemDetailLabel">Transaction Date</a><a href="/my-orders" class="listItemDetailValue">January 1, 2022</a></div>
                      <div class="table-cell payment"><a href="/my-orders" class="listItemDetailLabel">Reference Number</a><a href="/my-orders" class="listItemDetailValue">115880-2439-36</a><a class="listItemDetailLabel">Mode of Payment</a><a href="/my-orders" class="listItemDetailValue">GCash</a><a class="listItemDetailLabel">Amount Paid</a><a href="/my-orders" class="listItemDetailValue"><span class="currency">PHP</span><span class="amount"> 320.00</span> </a></div>
                      <div class="table-cell payment"><a class="listItemDetailLabel">Products</a><a href="/my-orders" class="listItemDetailValue">Pineapple Cake(1 box), Plain Taiwanese Egg Roll (1 box)</a><a class="listItemDetailLabel">Amount Due</a><a href="/my-orders" class="listItemDetailValue"><span class="currency">PHP</span><span class="amount"> 570.00</span> </a></div>
                      <div class="table-cell"><a href="/my-orders" class="listItemDetailLabel">Delivery Address</a><a href="/my-orders" class="listItemDetailValue">308 Narra Building 2276 Pasong Tamo Extension, Makati City</a><a href="/my-orders" class="listItemDetailLabel">Notes</a><a href="/my-orders" class="listItemDetailValue">Please call 09396432921 if I'm not around.</a></div>
                      <div class="table-cell arrow">
                        <a href="/my-orders" class="listItemDetailLabel"></a>
                        <a href="/my-orders" class="listItemDetailValue">
                          <div class="triangle-right" style="margin-left: 16px;"></div>                               
                        </a>
                      </div>
                    </div>
              
                            
            </div>
             
              <!--                 
                <div class="u-container-align-center u-container-style u-layout-cell u-size-15 u-size-30-md u-layout-cell-1 border">
                  <div class="u-container-layout u-container-layout-1">
                    <div class="u-container-align-center u-container-style u-group u-group-1">
                      <div class="u-container-layout u-valign-bottom u-container-layout-2">
                        <h4 class="u-align-center u-custom-font u-text u-text-default u-text-font u-text-1 ellipsis">Pineapple Cake
                        </h4>
                      </div>
                    </div>
                    <p class="u-align-center u-text u-text-default u-text-2 small"> 鳳梨酥 </p>
                    <img class="u-image u-image-default u-image-1" src="/PlainPineappleCake_2935x2935.jpg" alt="" data-image-width="1684" data-image-height="1123">
                    <h4 class="u-align-center u-custom-font u-text u-text-default u-text-font u-text-3" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><span class="amount">PHP</span> 570</h4>
                    <a href="http://127.0.0.1:8000/Pastries/D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD" class="u-align-center u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View</a>
                    <input type="button" value="-" class="minustocart" productcount="" >

                    <input type="number" name="" prod-id="D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD" note="" class="itemNumber" value="1" />

                    <input type="checkbox" name="" value="D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD" class="itemchecker" />
                  </div>
                </div>
              
               -->
              <input type="hidden" name="tocheckout" class="tocheckout" value="D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD,">
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

@endsection

