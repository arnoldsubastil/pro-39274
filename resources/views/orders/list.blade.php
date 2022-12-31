@extends('layouts.orders')

@section('title')
Order Product
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" name="" id="loginid" value="{!! !empty(Auth::user()->id) ? Auth::user()->id : '' !!}" />
<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="/css/orders/notification.css" media="screen">
@endsection

@section('content')  

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
</section>

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
                <div>
                    Product Name: `+ value.name +`
                </div>
                <div>
                    Product QTY: `+ value.qty +`
                </div>
                <div>
                    Product Note: `+ note +`
                </div>
                `;
                if(value.review == '') {
                    $alltext = $alltext + `
                <div>
                    <form method="get" action="/posted-review">
                        <meta name="csrf-token" content="`+_token+`">
                        <input type="hidden" name="productIdlong" value="`+value.cartorderId+`" />
                        <textarea name='myreview'></textarea>
                        <input type="submit" />
                    </form>
                </div>`;
                }
                });
                
                $('.'+orderId+'_item').html($alltext);
        },
    }); 
    });

});

</script>