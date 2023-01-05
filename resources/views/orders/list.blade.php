@extends('layouts.index')

@section('title')
Order Details
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" name="" id="loginid" value="{!! !empty(Auth::user()->id) ? Auth::user()->id : '' !!}" />
<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="/css/orders/details.css" media="screen">
<link rel="stylesheet" href="/css/datagrid.css" media="screen">
@endsection

@section('content')  
<br/>
<section class="u-clearfix u-container-align-center u-section-2">
    <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
            <div class="u-layout">
                <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-4">                   
                                              
                            @foreach($products as $product)
                            <div class="u-border-1 u-border-grey-5 u-container-layout u-container-layout-4">                         
                                <div class="btn-submit form-vertical u-form u-form-1">
                                <h4 class="u-text u-text-default u-text-6">Order ID: {{ $product->order_id }}</h4>
<br/>
                                <div class="table ordersDetailsTable">
                    <div class="table-row">
                      <div class="table-head quantity">Status</div>
                      <div class="table-head">Order</div>
                      <div class="table-head">Payment</div>
                      <div class="table-head">Bill</div>                      
                      <div class="table-head">Delivery</div>
                      <!-- <div class="table-head arrow"></div> -->
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
                        <!-- <div class="round" style="margin: 0 8px 8px 0;    text-align: center;    display: inline-block;    height: 26px;">
                            <input type="checkbox" id="D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD" name="" value="D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD" class="itemchecker" checked="">
                            <label for="D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD"></label>
                           </div>
                        <br/> -->
                        <a class="listItemDetailLabel">Status</a>
                        <a class="listItemDetailValue">{{ $product->statusname }}</a>
                      </div>
                      <div class="table-cell payment">
                        <a class="listItemDetailLabel">Order ID</a><a class="listItemDetailValue">OR-202301011122</a>
                        <a class="listItemDetailLabel">Order Date</a><a class="listItemDetailValue">January 1, 2022</a>
                    </div>
                      <div class="table-cell payment"><a class="listItemDetailLabel">Order ID</a><a class="listItemDetailValue">OR-2023{{ $product->order_id }}</a><a class="listItemDetailLabel">Order Date</a><a class="listItemDetailValue">{{ $product->created_at }}</a></div>

                      <div class="table-cell payment">
                        <a class="listItemDetailLabel">Reference Number</a>
                        <a class="listItemDetailValue">{{ $product->reference_no }}</a> 
                        <a class="listItemDetailLabel">Mode of Payment</a>
                        <a class="listItemDetailValue">{{ $product->mode_of_payment }}</a>
                        <a class="listItemDetailLabel">Amount Paid</a>
                        <a class="listItemDetailValue">
                            <span class="currency">PHP</span><span class="amount"> 320.00</span> 
                        </a>
                      </div>                      
                      <div class="table-cell payment">
                        <!-- <a class="listItemDetailLabel">Products</a>
                        <a class="listItemDetailValue">
                          <ul>
                            <li><span></span> <span>Pineapple Cake</span> (<span>1 box <span>)</li>
                            <li><span>Plain</span> <span>Taiwanese Egg Roll</span> (<span>1 box <span>)</li>                        
                          </ul>
                        </a> -->
                        <a class="listItemDetailLabel">Voucher</a>
                        @if ($product->productslist != "")
                            <a class="listItemDetailValue">{{ $product->voucher_code }}</a>
                        @else
                            <a class="listItemDetailValue">No voucher</a>
                        @endif
                        <br/>
                        @if ($product->voucher_proof != "")                          
                        <a class="listItemDetailValue"><img src="/images/voucherproof/{{ $product->voucher_proof }}" alt="" width="100" /></a>
                        @endif
                        <a class="listItemDetailLabel">Amount Due</a>
                        <a class="listItemDetailValue"><span class="currency">PHP</span><span class="amount"> {{ $product->amount }}</span> </a></div>
                      <div class="table-cell"><a class="listItemDetailLabel">Delivery Address</a><a class="listItemDetailValue">{{ $product->delivery_address }}</a><a class="listItemDetailLabel">Notes</a><a class="listItemDetailValue">{{ $product->notes }}</a></div>
                 
                      <!-- <div class="table-cell arrow">
                        <a href="/my-orders" class="listItemDetailLabel"></a>
                        <a href="/my-orders" class="listItemDetailValue">
                          <div class="triangle-right" style="margin-left: 16px;"></div>                               
                        </a>
                      </div> -->
                    </div>
              
                            
            </div>

                               
                                <!-- <div class="u-form-group u-form-group-4">
                                  <label for="text-c306" class="u-label u-label-4">Mailing Address</label>
                                  <input disabled type="text" placeholder="Mailing address" id="maddress" value="adfds" name="maddress" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-4"/>
                                </div>
                                <div class="u-form-group u-form-group-4">
                                  <label for="text-c306" class="u-label u-label-4">Delivery Address</label>
                                  <input disabled type="text" placeholder="Complete address" id="daddress" value="adfds" name="daddress" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-4"/>
                                </div> 
                                <div class="u-form-group u-form-group-4">
                                  <label for="text-c306" class="u-label u-label-4">Voucher</label>

                                    @if ($product->productslist != "")
                                      <input disabled type="text" value="{{ $product->voucher_code}}" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-4"/>
                                    @else
                                      <input disabled type="text" value="No voucher" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-4"/>
                                    @endif
                                    <br/>
                                    @if ($product->voucher_proof != "")
                                      <img src="/images/voucherproof/{{ $product->voucher_proof }}" alt="" width="100" />
                                    @endif  

                                </div>-->

                                <br/>
                                <br/>
                                <h5 class="u-text u-text-default u-text-6">Orders</h5>  
                                <br/>
                                <div class="table ordersTable">            
                                  <div class="table-row">
                                      <div class="table-head" style="display: none">Product ID</div>
                                      <div class="table-head" >Image</div>
                                      <div class="table-head">Product</div>
                                      <!-- <div class="table-head quantity">Quantity</div> -->
                                      <div class="table-head">Total Price</div>
                                      <div class="table-head">Notes</div>
                                  </div>   
                                  <div class="addedInfo {{ $product->order_id }}_item" orderId="{{ $product->order_id }}"></div>
                                </div>
                        </div>
                    </div>
                            @endforeach
                        
                </div>
            </div>
        </div>
    </div>
    
</section>
<!-- 
<section class="u-clearfix u-section-2" id="sec-e3fd">
    
  @foreach($products as $product)
  <div>
    <div>
        <div class="item">
            Status: {{ $product->status }}
        </div>
        <div class="item">
            Delivery Address: {{ $product->delivery_address }}
        </div>
        <div class="item">
            Mode of Payment: {{ $product->mode_of_payment }}
        </div>
        <div class="item">
            Reference: {{ $product->reference_no }}
        </div>
        <div class="item">
            Notes: {{ $product->notes }}
        </div>
        <div class="item">
            Voucher:
            @if ($product->productslist != "")
                <option>{{ $product->voucher_code}}</option>
            @else
            No voucher
            @endif
        </div>
        <div class="item">
            @if ($product->voucher_proof != "")
            <img src="/images/voucherproof/{{ $product->voucher_proof }}" alt="" width="100" />
            @endif
        </div>

        <div class="addedInfo {{ $product->order_id }}_item" orderId="{{ $product->order_id }}">
                    Checking info...
        </div>

    </div>
  </div>
  @endforeach
</section> -->

    <br/>
    <br/>
    <br/>
    <br/>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
jQuery(document).ready(function ($) {  

    let _token = $('meta[name="csrf-token"]').attr('content');
    let myid = $("#loginid").val();

    $(".addedInfo").each(function(){
        var alltext = '';

        var orderId = $(this).attr('orderId');
        $.ajax({
        url: "/api/my-order",
        type:"POST",
        data:{
        myid:myid,
        orderId: orderId,
        _token: _token
        },
        success:function(response){
                $.each(response, function( index, value ) {
                    var note = 'No message from the user for this specific product...';
                    if(value.product_note != null) {
                        note = value.product_note;
                    }

                    var withreview = ``;
                    console.log(value.review);
                    if(value.review == ''){
                      withreview = `
                      <form method="get" action="/posted-review">
                              <meta name="csrf-token" content="`+_token+`">
                              <input type="hidden" name="carts" value="`+value.carts+`" />
                              <input type="hidden" name="productIdlong" value="`+value.productIdlong+`" />
                              <input type="hidden" name="user_id" value="`+value.user_id+`" />
                              <span class="listItemDetailValue">
                                  <textarea name='myreview' class="prodcomments" rows="5" placeholder="Review this product"></textarea>
                              </span>
                              <span class="listItemDetailValue button">
                                <input type="submit" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="" />
                              </span>                              
                        </form>`;
                    }

                    alltext = alltext + `

                <div class="table-row">
                    <div class="table-cell" style="display: none"><span class="listItemDetailLabel">Product ID</span><span class="listItemDetailValue">DEE36E3F-9D7E-46C9-951F-26282B0F3841</span></div>
<div class="table-cell image"><span class="listItemDetailLabel" style="display: none">Image</span><span class="listItemDetailValue"><img class="u-image u-image-default u-image-1" src="/images/ProductImages/SaltedEggCocoPastry_1440x960.jpg" alt=""></span></div>
                    <div class="table-cell"><span class="listItemDetailLabel">Name</span><span class="listItemDetailValue">`+ value.name +`</span><span class="listItemDetailLabel foreignName">Foreign Name</span><span class="listItemDetailValue foreignName">蛋黃酥</span><span class="listItemDetailLabel">Quantity</span><span class="listItemDetailValue">`+ value.qty +`</span></div>

                    <div class="table-cell image"><span class="listItemDetailLabel" style="display: none">Image</span><span class="listItemDetailValue"><img class="u-image u-image-default u-image-1" src="/resizer/images/ProductImages/`+ value.url +`/128" alt=""></span></div>
                    <div class="table-cell"><span class="listItemDetailLabel">Name</span><span class="listItemDetailValue">`+ value.name +`</span><span class="listItemDetailLabel foreignName">Foreign Name</span><span class="listItemDetailValue foreignName">蛋黃酥</span></div>
                    <div class="table-cell quantity"><span class="listItemDetailLabel">Quantity</span><span class="listItemDetailValue">`+ value.qty +`</span></div>

                    <div class="table-cell"><span class="listItemDetailLabel">Total Price</span><span class="listItemDetailValue"><span class="currency">PHP</span><span class="amount"> 3520</span></span><span class="listItemDetailLabel price">Price</span><span class="listItemDetailValue">(<span class="currency">PHP</span><span class="price"> 320 </span>each)</span></div>
                    <div class="table-cell"><span class="listItemDetailLabel">Notes</span>
                      <span class="listItemDetailValue">
                          <p name="" class="prodcomments" >`+ note +`</p>
                      </span>
                      <br/>` + withreview + `
                    </div>
                </div>`;
                
                });
          $('.'+orderId+'_item').html(alltext);
        },
    }); 

    });

});

</script>