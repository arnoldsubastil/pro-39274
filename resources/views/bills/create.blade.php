@extends('layouts.orders')

@section('title')
Bill Order
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="/css/bills/create.css" media="screen">
@endsection

@section('content')  


    <section class="u-clearfix u-container-align-center u-section-2" id="sec-2a5c">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-1">
            @foreach($carttocheckout as $product)
                <div class="u-border-1 u-border-grey-5 u-container-layout u-container-layout-1">
                  <h3 class="u-text u-text-default u-text-1">Order Details</h3>
                  <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-2">
                    <div class="u-layout">
                      <div class="u-layout-col">
                        <div class="u-container-style u-image u-layout-cell u-size-30 u-image-1" data-image-width="1920" data-image-height="1275" style="background-image: url('/{{ $product->url }}');">
                          <div class="u-container-layout u-container-layout-2"></div>
                        </div>
                        <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-3">
                          <div class="u-container-layout u-container-layout-3">
                            <p class="u-text u-text-default u-text-2">{{ $product->name }}</p>
                            <p class="u-text u-text-default u-text-3"> {{ $product->foreignName }}</p>

                            <p class="u-text u-text-default u-text-4">Quantity:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $product->numberoforder }}</p>
                            <p class="u-text u-text-default u-text-5"> Total Amount:&nbsp; &nbsp; <span class="totalprodamount">{{ $product->totalamount }}</span><span class="amount">&nbsp;PHP <p style="font-weight: bold">({{ $product->sellingPrice }} each)</p></span>
                            </p>
                            <textarea name="" product-id="{{ $product->productIdlong }}" class="prodcomments" cols="30" rows="3">{{ $product->product_note }}</textarea>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
              </div>


            <form method="POST" action="/Pay" enctype="multipart/form-data" id="payform">
            @csrf
            <input type="hidden" name="productlist" value="" id="productlist" />
              <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-4">
                <div class="u-border-1 u-border-grey-5 u-container-layout u-container-layout-4">
                  <h3 class="u-text u-text-default u-text-6">Billing Details</h3>
                  <div class="btn-submit form-vertical u-form u-form-1">
                    <form action="PaymentDetails.html" class="u-clearfix u-form-spacing-24 u-form-vertical u-inner-form" source="custom" name="form-1" style="padding: 10px;">
                      <div class="u-form-group u-form-name">
                        <label for="name-2382" class="u-label u-label-1">Name</label>
                        <input type="text" placeholder="Full name" id="name" name="name" value="{{ $user->firstName ?? '' }} {{ $user->lastName ?? '' }}" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1">
                      </div>
                      <div class="u-form-group u-form-group-2">
                        <label for="text-864f" class="u-label u-label-2">Contact Number</label>
                        <input type="text" placeholder="Valid contact number" value="{{ $user->contact_no ?? '' }}" id="contact" name="contact" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-2">
                      </div>
                      <div class="u-form-email u-form-group">
                        <label for="email-2382" class="u-label u-label-3">Email Address</label>
                        <input type="email" placeholder="Valid email address" id="email" value="{{ $user->email  ?? '' }}" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-3">
                      </div>
                      <div class="u-form-group u-form-group-4">
                        <label for="text-c306" class="u-label u-label-4">Mailing Address</label>
                        <input type="text" placeholder="Mailing address" id="maddress" value="{{ $user->deliveryAddress  ?? '' }}" name="maddress" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-4">
                      </div>
                      <div class="u-form-group u-form-group-4">
                        <label for="text-c306" class="u-label u-label-4">Delivery Address</label>
                        <input type="text" placeholder="Complete address" id="daddress" value="{{ $user->deliveryAddress  ?? '' }}" name="daddress" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-4">
                      </div>
                      <div class="u-form-group u-form-group-4">
                        <label for="text-c306" class="u-label u-label-4">Mode of Payment</label> <br>
                        <label><input type="radio" name="mode_of_payment" value="BPI">BPI</label> <br>
                        <label><input type="radio" name="mode_of_payment" value="GCash">GCash</label> <br>
                        <input type="hidden" name="voucher_id" id="voucher_id" />
                        <input type="hidden" name="allproductcomments" id="allproductcomments" />
                      </div>
                      <div class="u-form-group u-form-group-4">
                        <label for="text-c306" class="u-label u-label-4">Reference Number</label>
                        <input type="text" placeholder="Payment Reference" id="reference_no" value="" name="reference_no" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-4">
                      </div>
                      <div class="u-form-group u-form-group-4 proofvoucher" style="display:none">
                        <label for="text-c306" class="u-label u-label-4">Proof for Promo Selected</label>
                        <input type="file" placeholder="Enter valid ID for proof" id="text-c306"  name="image" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-4">
                      </div>
                      <div class="u-form-group u-form-message u-form-group-5">
                        <label for="message-2382" class="u-label u-label-5">Order notes</label>
                        <textarea placeholder="Notes about your order, e.g. special notes for delivery" rows="4" cols="50" id="message-2382" name="message" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-5"></textarea>
                      </div>
  
                      <div class="u-form-group u-form-message u-form-group-5">
                        <label for="message-2382" class="u-label u-label-5">Total: <span id="totalcomputedamount"></span> PHP</label>
                        <input type="hidden" id="totalcomputedamount_submt" value="" />
                      </div>

                      <div class="u-align-right u-form-group u-form-submit">
                        <a href="PaymentDetails.html" class="form-submit u-btn u-btn-round u-btn-submit u-button-style u-radius-4 u-btn-2">Hidden</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                      </div>
                      <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
                      <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
                      <input type="hidden" value="" name="recaptchaResponse">
                    </form>
                  </div>
                  <span id="myBtn">View Voucher</span>

                    <!-- The Modal -->
                    <div id="myModal" class="modal">

                      <!-- Modal content -->
                      <div class="modal-content">
                        <span class="close">&times;</span>
                        
                        @foreach($voucher as $onevoucher)
                              <label><input type="radio" name="voucher" vid="{{ $onevoucher['voucher_id'] }}" requirement="{{ $onevoucher['proof_needed'] }}" vouchermode="{{ $onevoucher['discount_type'] }}" value="{{ $onevoucher['discount'] }}">{{ $onevoucher['voucher_code'] }}</label> <br>
                        @endforeach

                      </div>

                    </div>
                  <a  id="myBtnsubmit" class="u-btn u-btn-round u-button-style u-radius-4 u-btn-3" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Pay now&nbsp;</a>
                  
                    <!-- The Modal -->
                    <div id="myModal2" class="modal">

                      <!-- Modal content -->
                      <div class="modal-content">
                        <span class="close2">&times;</span>
                        <span class="confirm">Confirm</span>

                      </div>

                    </div>

                </div>
              </div>
            </div>
</form>
          </div>
        </div>
      </div>
    </section>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
jQuery(document).ready(function ($) {  
// Get the modal
var modal = document.getElementById("myModal");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}



// Get the modal
var modal2 = document.getElementById("myModal2");
// Get the button that opens the modal
var btn2 = document.getElementById("myBtnsubmit");
// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close")[0];
// When the user clicks on the button, open the modal
btn2.onclick = function() {
  modal2.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
  modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    modal2.style.display = "none";
  }
}



var mvar = 0;
$(".totalprodamount").each(function() {
    console.log($(this).html());
    mvar = mvar + parseFloat($(this).html());
});

Number.prototype.format = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};
Array.prototype.insert = function ( index, ...items ) {
    this.splice( index, 0, ...items );
};
$('#totalcomputedamount').html(mvar.format());
$('#totalcomputedamount_submt').val(mvar);


var productcomments = '';
var productlist = '';
$(".prodcomments").each(function() {
  productcomments = productcomments + '"'+ $(this).attr('product-id') + '":"' + $(this).val() + '",';
  productlist = $(this).attr('product-id') + ',' + productlist;
});

productcomments = '{' + productcomments.substr(0,productcomments.length-1) + '}';
$('#allproductcomments').val(productcomments);
$('#productlist').val(productlist);

$(".prodcomments").keyup(function(){

  var productcomments = '';
$(".prodcomments").each(function() {
  productcomments = productcomments + '"'+ $(this).attr('product-id') + '":"' + $(this).val() + '",';
});
productcomments = '{' + productcomments.substr(0,productcomments.length-1) + '}';
$('#allproductcomments').val(productcomments);
});


$("input[name='voucher']").click(function(){
            var radioValue = $("input[name='voucher']:checked").val();
            var vouchermode = $("input[name='voucher']:checked").attr('vouchermode');
            var requirement = $("input[name='voucher']:checked").attr('requirement');
            var id = $("input[name='voucher']:checked").attr('vid');
            if(radioValue){
              if(vouchermode == 'fix') {
                newvalue = mvar - parseFloat(radioValue);
              } else {
                newvalue = mvar - (mvar * (parseFloat(radioValue)/100));
              }

              if(requirement != '0'){
                $('.proofvoucher').show();
              } else {
                $('.proofvoucher').hide();
              }
              $('#voucher_id').val(id);
              $('#totalcomputedamount').html(newvalue.format());
              $('#totalcomputedamount_submt').val(newvalue);
              console.log(newvalue);
            }
        });


        $('.confirm').click(function(){

          $( "#payform" ).submit();
        });

});

</script>

@endsection