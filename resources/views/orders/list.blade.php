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
                    <div class="u-border-1 u-border-grey-5 u-container-layout u-container-layout-4">                         
                        <div class="btn-submit form-vertical u-form u-form-1"> 
                            <h3 class="u-text u-text-default u-text-6">Order Details</h3>                  
                            @foreach($products as $product)

                                <div class="u-form-group u-form-name">
                                  <label for="name-2382" class="u-label u-label-1">Status</label>
                                  <input disabled type="text" placeholder="Full name" id="name" name="name" value="{{ $product->status }}" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1"/>
                                </div>
                                <div class="u-form-group u-form-group-2">
                                  <label for="text-864f" class="u-label u-label-2">Delivery Address</label>
                                  <input disabled type="text" placeholder="Valid contact number" value="{{ $product->delivery_address }}" id="contact" name="contact" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-2"/>
                                </div>
                                <div class="u-form-email u-form-group">
                                  <label for="email-2382" class="u-label u-label-3">Mode of Payment</label>
                                  <input disabled type="email" placeholder="Valid email address" id="email" value="{{ $product->mode_of_payment }}" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-3"/>
                                </div>
                                <div class="u-form-group u-form-group-4">
                                  <label for="text-c306" class="u-label u-label-4">Mailing Address</label>
                                  <input disabled type="text" placeholder="Mailing address" id="maddress" value="adfds" name="maddress" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-4"/>
                                </div>
                                <div class="u-form-group u-form-group-4">
                                  <label for="text-c306" class="u-label u-label-4">Delivery Address</label>
                                  <input disabled type="text" placeholder="Complete address" id="daddress" value="adfds" name="daddress" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-4"/>
                                </div>
                                <div class="u-form-group u-form-group-4">
                                  <label for="text-c306" class="u-label u-label-4">Reference Number</label>
                                  <input disabled type="text" placeholder="Payment Reference" id="reference_no" value="{{ $product->reference_no }}" name="reference_no" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-4"/>
                                </div>
                                <div class="u-form-group u-form-group-4">
                                  <label for="text-c306" class="u-label u-label-4">Notes</label>
                                  <textarea disabled rows="4" id="message-2382" name="message" class="noResize u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-5">{{ $product->notes }}</textarea>
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

                                </div>

                                <br/>

                                <h3 class="u-text u-text-default u-text-6">Product Reviews</h3>  
                                <br/>                                

                                <div class="table orderDetailsTable">            
                                  <div class="table-row">
                                      <div class="table-head" style="display: none">Product ID</div>
                                      <div class="table-head">Image</div>
                                      <div class="table-head">Product</div>
                                      <div class="table-head quantity">Quantity</div>
                                      <div class="table-head">Total Price</div>
                                      <div class="table-head">Notes</div>
                                  </div>   
                                  <div class="addedInfo {{ $product->order_id }}_item" orderId="{{ $product->order_id }}"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
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

    $alltext = '';
    $(".addedInfo").each(function(){
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
                $alltext = $alltext + `

                <div class="table-row">
                    <div class="table-cell" style="display: none"><span class="listItemDetailLabel">Product ID</span><span class="listItemDetailValue">DEE36E3F-9D7E-46C9-951F-26282B0F3841</span></div>
                    <div class="table-cell image"><span class="listItemDetailLabel">Image</span><span class="listItemDetailValue"><img class="u-image u-image-default u-image-1" src="/images/ProductImages/SaltedEggCocoPastry_1440x960.jpg" alt=""></span></div>
                    <div class="table-cell"><span class="listItemDetailLabel">Name</span><span class="listItemDetailValue">`+ value.name +`</span><span class="listItemDetailLabel foreignName">Foreign Name</span><span class="listItemDetailValue foreignName">蛋黃酥</span></div>
                    <div class="table-cell quantity"><span class="listItemDetailLabel">Quantity</span><span class="listItemDetailValue">`+ value.qty +`</span></div>
                    <div class="table-cell"><span class="listItemDetailLabel">Total Price</span><span class="listItemDetailValue"><span class="currency">PHP</span><span class="amount"> 3520</span></span><span class="listItemDetailLabel price">Price</span><span class="listItemDetailValue">(<span class="currency">PHP</span><span class="price"> 320 </span>each)</span></div>
                    <div class="table-cell"><span class="listItemDetailLabel">Notes</span>
                      <span class="listItemDetailValue">
                          <p name="" class="prodcomments" >`+ note +`</p>
                      </span>
                      <br/>
                      <form method="get" action="/posted-review">
                              <meta name="csrf-token" content="`+_token+`">
                              <input type="hidden" name="productIdlong" value="`+value.productIdlong+`" />
                              <span class="listItemDetailValue">
                                  <textarea name='myreview' class="prodcomments" rows="5" placeholder="Review this product"></textarea>
                              </span>
                              <span class="listItemDetailValue button">
                                <input type="submit" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="" />
                              </span>                              
                        </form>
                    </div>
                </div>

                `;
                });
                
                $('.'+orderId+'_item').html($alltext);
        },
    }); 
    });

});

</script>