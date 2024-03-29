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

  @if(Auth::check())

  
  @if(count($products) == 0)
                <!-- <p style="text-align: center; font-style: italic;">You have no previous orders</p> -->

                <section class="u-clearfix u-section-2" id="sec-e3fd">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout" style="text-align: center;">
            <div class="u-layout-row" style="display: block;">              
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-2" style="display: inline-block;">
                <div class="u-container-layout u-valign-middle u-container-layout-2 ">
                  <p class="u-align-center u-text u-text-default u-text-2">You have no previous orders.
                  </p>
                  <br/>
                  @if (!Auth::guest())
                  <a href="/products/pastries" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="" style="display: inline-block;">Continue Shopping</a>                    
                  @else
                  <a href="/Register" class="u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Sign up</a>                                
                  <a href="/products/pastries" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Continue Shopping</a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@else
  <section class="u-clearfix u-container-align-center u-section-2">
      <div class="u-clearfix u-sheet u-sheet-1">
          <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
              <div class="u-layout">
                  <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-4">                   
                                                
                              @foreach($products as $product)
                              <div class="u-border-1 u-border-grey-5 u-container-layout u-container-layout-4">                         
                                  <div class="btn-submit form-vertical u-form u-form-1">
                                  <h4 class="u-text u-text-default u-text-6" id="orders__{{ $product->order_id }}">Order ID: {{ $product->order_id }}</h4>
  <br/>
                                  <div class="table ordersDetailsTable">
                      <div class="table-row">
                        <div class="table-head quantity">Status</div>
                        <div class="table-head">Order</div>
                        <div class="table-head">Payment</div>
                        <div class="table-head">Bill</div>                      
                        <div class="table-head">Delivery</div>
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
                          <!-- <div class="round" style="margin: 0 8px 8px 0;    text-align: center;    display: inline-block;    height: 26px;">
                              <input type="checkbox" id="D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD" name="" value="D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD" class="itemchecker" checked="">
                              <label for="D79489EB-E8C1-44BC-AF8B-9E05DA9C84BD"></label>
                            </div>
                          <br/> -->
                          <a class="listItemDetailLabel">Status</a>
                          <a class="listItemDetailValue">{{ $product->statusname }}</a>
                        </div>
                        <div class="table-cell payment"><a class="listItemDetailLabel">Order ID</a><a class="listItemDetailValue">OR-2023{{ $product->order_id }}</a><a class="listItemDetailLabel">Order Date</a><a class="listItemDetailValue">{{ $product->created_at }}</a></div>

                        
                        <div class="table-cell payment">
                          <a class="listItemDetailLabel">Reference Number</a>
                          <a class="listItemDetailValue">{{ $product->reference_no }}</a> 
                          <a class="listItemDetailLabel">Mode of Payment</a>
                          <a class="listItemDetailValue">{{ $product->mode_of_payment }}</a>
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
                  
                        <div class="table-cell arrow">
                          <!-- <a href="/my-orders" class="listItemDetailLabel"></a> -->
                          <!-- <a href="/my-orders" class="listItemDetailValue">
                            <span id="{{ $product->order_id }}"><div class="triangle-right" style="margin-left: 16px;"></div></span>                                                         
                          </a> -->
                          <span class="arrowButton open-edit_user" data-toggle="modal" data-id="{{ $product->order_id }}"> <div class="triangle-right" ></div> </span> 
                          <!-- <span id="" data-toggle="modal" data-target="#{{$product->order_id}}" class-"arrowButton"><div class="triangle-right" style="margin-left: 16px;"></div></span> -->
                        </div>
                      </div>
                
                              
                        </div>

                                  <br/>
                                  <br/>


                                  <div class="modal" id="myModal-{{$product->order_id}}" data-bs-backdrop="true" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-content">

                                      <div class="modal-header">
                                        <button type="button" id="OrdersModalCloseButton" class="closeButton modalCloseButton" data-dismiss="modal" aria-hidden="true">&times;</button>
                                      </div>
                                      <div class="modal-body">

                                      <!-- BEGIN - orders --> 
                                      <h5 class="u-text u-text-default u-text-6">Orders</h5>  
                                      <br/>
                                      <div class="table ordersTable">            
                                        <div class="table-row">
                                            <div class="table-head" style="display: none">Product ID</div>
                                            <div class="table-head" >Image</div>
                                            <div class="table-head">Product</div>
                                            <div class="table-head quantity">Quantity</div>
                                            <div class="table-head">Unit Price</div>
                                            <div class="table-head">Total Price</div>
                                            <div class="table-head">Notes</div>
                                        </div> 
                                        <div class="addedInfo {{ $product->order_id }}_item" orderId="{{ $product->order_id }}"></div>
                                      </div>
                                      <!-- END - orders  --> 

                                      </div>
                                      <div class="modal-footer">
                                      <button type="button" id="OrdersModalCancelButton" data-dismiss="modal" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Done</button>
                                      </div>

                                    </div>
                                  </div>
                                  <!-- END - orders modal -->

                                  
                          </div>
                      </div>
                              @endforeach
                          
                  </div>
              </div>
          </div>
      </div>
      
  </section>
  
    @endif  
  @else
  <p style="text-align: center; font-style: italic;">This feature is for registered users only</p>
  @endif
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" ></script><!-- must comes first before ajax -->
<script>
jQuery(document).ready(function ($) {  
  
  //show modal through dynamic ID
  $('.arrowButton').click(function(){
    let id = $(this).data('id');
    $('#myModal-'+id).modal('show');    
  });

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
                    var note = 'No message from the user for this specific product.';
                    console.log(value.order_id + ' -- ' + value.productnote);
                    if(value.productnote != null) {
                        note = value.productnote;
                    }

                    var withreview = ``;
                    var totalprice = parseFloat(value.qty) * parseFloat(value.sellingPrice) ;
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
<div class="table-cell image"><span class="listItemDetailLabel" style="display: none">Image</span><span class="listItemDetailValue"><img class="u-image u-image-default u-image-1" src="/resizer/images/ProductImages/`+ value.url +`/128" alt=""></span></div>
                    <div class="table-cell"><span class="listItemDetailLabel">Name</span><span class="listItemDetailValue">`+ value.name +`(`+value.foreignName+`)</span></div>
                    <div class="table-cell quantity"><span class="listItemDetailLabel">Quantity</span><span class="listItemDetailValue">`+ value.qty +`</span></div>
                    
                    

                    <div class="table-cell amount"><span class="listItemDetailLabel">Unit Price</span><span class="listItemDetailValue"><span class="currency">PHP</span><span class="amount"> `+ value.sellingPrice +`</span></span></div>
                    <div class="table-cell amount"><span class="listItemDetailLabel">Total Price</span><span class="listItemDetailValue"><span class="currency">PHP</span><span class="amount"> `+ totalprice +`</span></span></div>
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