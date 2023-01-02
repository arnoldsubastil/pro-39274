@extends('layouts.orders')

@section('title')
Bill Order
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="/css/bills/create.css" media="screen">
<link rel="stylesheet" href="/css/datagrid.css" media="screen">
<link rel="stylesheet" href="/css/SnippetButton.css" media="screen">
<link rel="stylesheet" href="/css/SnippetRadioButtons.css" media="screen">
@endsection

@section('content')  

<!-- <section class="u-clearfix u-section-3" id="sec-2dfe">
  <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
    <p class="u-text u-text-default u-text-1"><a href="/Cart">View Shopping cart</a> > Bill Orders</p>
  </div>

    </section> -->
    <section class="u-clearfix u-container-align-center u-section-2" id="sec-2a5c">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">


          <!-- BEGIN - billing form -->
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
                        <label><input id="BPIRadioButton" type="radio" name="mode_of_payment" value="BPI"> BPI</label> <br>
                        <label><input id="GCashRadioButton" type="radio" name="mode_of_payment" value="GCash"> GCash</label> <br>
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
                        <textarea placeholder="Notes about your order, e.g. special notes for delivery" rows="4" cols="50" id="message-2382" name="message" class="noResize u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-5"></textarea>
                      </div>
  
                      <div class="u-form-group u-form-message u-form-group-5">
                        <!-- <label for="message-2382" class="u-label u-label-5">Voucher </label> -->
                        <span id="VouchersListSpan" class="u-align-right u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2">Select voucher</span>
                      </div>                      

                      <div class="u-align-right u-form-group u-form-submit">
                        <a href="PaymentDetails.html" class="form-submit u-btn u-btn-round u-btn-submit u-button-style u-radius-4 u-btn-2">Hidden</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                      </div>
                      <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
                      <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
                      <input type="hidden" value="" name="recaptchaResponse">
                  </div>
                  <br/>
                  
                  <!-- <span id="myBtn">View Voucher</span> -->

            <!-- BEGIN - voucher list modal -->
            <div id="VouchersListModal" class="modal">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" id="VouchersModalCloseButton" class="closeButton modalCloseButton" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Select voucher</h4>
                </div>
                <div class="modal-body">
                  <br/>
                  <!-- BEGIN- vouchers list --> 
                  <div class="table vouchersListTable">
                    <div class="table-row">
                        <div class="table-head selectCheckbox"></div>
                        <div class="table-head">Voucher Name</div>             
                        <div class="table-head">Information</div>                      
                        <div class="table-head">Discounted Amount</div>
                    </div>
                      @foreach($voucher as $onevoucher)
                        <div class="table-row">
                              <div class="table-cell selectCheckbox"></div>
                              <div class="table-cell">
                                <div class="round">
                                  <input type="checkbox" id="{{ $onevoucher['voucher_id'] }}" requirement="{{ $onevoucher['proof_needed'] }}" name="voucher" vouchermode="{{ $onevoucher['discount_type'] }}" value="{{ $onevoucher['discount'] }}" />
                                  <label for="{{ $onevoucher['voucher_id'] }}"></label>
                                </div>
                              </div>
                              
                              <div class="table-cell">
                                <span class="listItemDetailLabel">Voucher</span>
                                <span class="listItemDetailLabel">Code</span>
                                <span href="" class="listItemDetailValue code">{{ $onevoucher['voucher_code'] }}</span>
                                <span class="listItemDetailLabel">Description</span>
                                <span href="" class="listItemDetailValue">Valid until {{ $onevoucher['valid_date_start'] }} to {{ $onevoucher['valid_date_end'] }}</span>
                              </div>
                              
                              <div class="table-cell">
                                <span class="listItemDetailValue snippetButton">
                                  @if($onevoucher['discount_type'] == 'percent')
                                   {{ $onevoucher['discount'] }} %
                                   @else
                                    {{ $onevoucher['discount'] }} Php
                                  @endif
                                </span>
                              </div>

                            </div>

                      @endforeach

                      <div class="modal-footer right">
                        <br/>
                        <button type="button" id="VouchersModalCancelButton" data-dismiss="modal" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Cancel</button>
                        <button class="u-border-2 u-border-hover-palette-1-base u-btn u-btn-round u-button-style u-radius-4 u-btn-3" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Select</button>
                        <br/>
                      </div>

                  </div>
                  <!-- END- voucher list -->
                </div>
                <!-- @foreach($voucher as $onevoucher)
                      <label><input type="radio" name="voucher" vid="{{ $onevoucher['voucher_id'] }}" requirement="{{ $onevoucher['proof_needed'] }}" vouchermode="{{ $onevoucher['discount_type'] }}" value="{{ $onevoucher['discount'] }}">{{ $onevoucher['voucher_code'] }}</label> <br>
                @endforeach -->
              </div>
              
            </div>
            <!-- END - voucher list modal -->

            <!-- BEGIN - payment modal -->
            <div id="PaymentModal" class="modal">
              <div class="modal-content">
                <div class="modal-header">
                  <div class="modal-header">
                    <button type="button" id="PaymentModalCloseButton" class="closeButton modalCloseButton" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Pay order</h4>
                  </div>
                </div>
                <div class="modal-body">
                  <div class="u-container-style u-layout-cell u-size-30 u-layout-cell-4">
                    <div class="u-border-1 u-border-grey-5 u-container-layout u-container-layout-4">
                      <section id="BPIPaymentSection" class="paymentSection">
                        <div class="form-vertical u-form u-form-1">  
                          <h4>Pay with</h4>                        
                          <div class="u-form-group">
                            <label for="name-2382" class="u-label u-label-1">Mode of Payment</label>
                            <input type="text" value="BPI" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1" disabled>
                          </div>
                          <div class="u-form-group">
                            <label for="name-2382" class="u-label u-label-1">Account Number</label>
                            <input type="text" value="2506 4318 0931 4904" placeholder="---- ---- ---- ----" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1">
                          </div>
                          <div class="u-form-group">
                            <label for="name-2382" class="u-label u-label-1">Expiration Date</label>
                            <input type="text" value="02/26" placeholder="MM/YY" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1">
                          </div>
                          <div class="u-form-group">
                            <label for="name-2382" class="u-label u-label-1">CVV</label>
                            <input type="text" value="2898" placeholder="----" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1">
                          </div>
                          <div class="u-form-group">
                            <label for="name-2382" class="u-label u-label-1">Discount</label>
                            <input type="text" value="No available voucher" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1" disabled>
                          </div>
                          <!-- <div class="u-form-group">
                            <label for="name-2382" class="u-label u-label-1">Amount Due</label>
                            <input id="BPITotalAmountDueTextbox" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1" />
                          </div> -->
                        </div>
                        <div class="form-vertical u-form u-form-1"> 
                          <h4>You are about to pay</h4>
                          <div class="u-form-group">
                            <label for="name-2382" class="u-label u-label-1">Total Amount</label>
                            <p>&nbsp;<span class="totalAmountCurrency">PHP&nbsp;</span><span id="BPITotalAmountDueSpan" class="totalAmount"></span></p>                             
                          </div> 
                          <div class="u-form-group">
                            <p>Please review to ensure that the details are correct before you proceed.</p>
                          </div>
                        </div>
                      </section>
                      <section id="GCashPaymentSection" class="paymentSection">
                        <div class="form-vertical u-form u-form-1">  
                          <h4>Pay with</h4>                        
                          <div class="u-form-group">
                            <label for="name-2382" class="u-label u-label-1">Mode of Payment</label>
                            <input type="text" value="GCash" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1" disabled>
                          </div>
                          <div class="u-form-group">
                            <label for="name-2382" class="u-label u-label-1">Contact Number</label>
                            <input type="text" value="{{ $user->contact_no ?? '' }}" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1">
                          </div>
                          <div class="u-form-group">
                            <label for="name-2382" class="u-label u-label-1">Discount</label>
                            <input type="text" value="No available voucher" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1" disabled>
                          </div>
                          <!-- <div class="u-form-group">
                            <label for="name-2382" class="u-label u-label-1">Amount Due</label>
                            <input id="GCashTotalAmountDueTextbox" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1" />
                          </div> -->
                        </div>
                        <div class="form-vertical u-form u-form-1"> 
                          <h4>You are about to pay</h4>
                          <div class="u-form-group">
                            <label for="name-2382" class="u-label u-label-1">Total Amount</label>
                            <p>&nbsp;<span class="totalAmountCurrency">PHP&nbsp;</span><span id="GCashTotalAmountDueSpan" class="totalAmount"></span></p>                             
                          </div> 
                          <div class="u-form-group">
                            <p>Please review to ensure that the details are correct before you proceed.</p>
                          </div>
                        </div>
                      </section>
                      <section id="NotificationPaymentSection">
                        <div class="form-vertical u-form">
                          <div class="u-form-group u-form-name">
                            <h3>No Mode of Payment Selected</h3>
                            <p>Close this dialog and select mode of payment, then click </b>Pay now</b>.</p>
                          </div>
                        </div>
                      </section>
                    </div>
                  </div>
                </div>
                <div class="modal-footer right">
                  <br/>
                  <button type="button" id="PaymentModalCancelButton" data-dismiss="modal" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Cancel</button>
                  <button class="u-border-2 u-border-hover-palette-1-base u-btn u-btn-round u-button-style u-radius-4 u-btn-3 confirm" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Pay</button>
                  <br/>
                </div>
              </div>           
            </div>
            <!-- END - payment modal -->

            <!-- BEGIN- related order list --> 
            <h3>Order Details</h3>         
            <div class="table orderDetailsTable">            
                  <div class="table-row">
                      <div class="table-head" style="display: none">Product ID</div>
                      <div class="table-head">Image</div>
                      <div class="table-head">Product</div>
                      <div class="table-head quantity">Quantity</div>
                      <div class="table-head">Total Price</div>
                      <div class="table-head">Notes</div>
                  </div>

              @foreach($carttocheckout as $product)
                
                <div class="table-row">                      
                      <div class="table-cell" style="display: none"><span class="listItemDetailLabel">Product ID</span><span class="listItemDetailValue">{{$product->productIdlong}}</span></div>
                      <div class="table-cell image"><span class="listItemDetailLabel">Image</span><span class="listItemDetailValue"><img class="u-image u-image-default u-image-1" src="{{ '/resizer/images/ProductImages/'.$product->url}}/128" alt="" ></span></div>
                      <div class="table-cell"><span class="listItemDetailLabel">Name</span><span class="listItemDetailValue">{{ $product->name }}</span><span class="listItemDetailLabel foreignName">Foreign Name</span><span class="listItemDetailValue foreignName">{{ $product->foreignName }}</span></div>
                      <div class="table-cell quantity"><span class="listItemDetailLabel">Quantity</span><span class="listItemDetailValue">{{ $product->numberoforder }}</span></div>
                      <div class="table-cell"><span class="listItemDetailLabel">Total Price</span><span class="listItemDetailValue"><span class="currency">PHP</span><span class="amount"> {{ $product->totalamount }}</span></span><span class="listItemDetailLabel price">Price</span><span class="listItemDetailValue">(<span class="currency">PHP</span><span class="price"> {{ $product->sellingPrice }} </span>each)</span></div>
                      <div class="table-cell"><span class="listItemDetailLabel">Notes</span><span class="listItemDetailValue"><textarea name="" product-id="{{ $product->productIdlong }}" class="prodcomments" rows="5" placeholder="Notes about this product">{{ $product->product_note }}</textarea></span></div>
                   </div>
              
              @endforeach
              
            </div>
            <!-- END- related order list -->
            
      <div class="u-form-group u-form-message right">
        <label for="message-2382" class="u-label u-label-5">Total Amount Due</label>
          <div class="totalAmount">
              <span class="totalAmountCurrency">PHP</span> <span id="totalcomputedamount" class="totalAmount" ></span>
            
          <input type="hidden" id="totalcomputedamount_submt" name="totalcomputedamount_submt" value="" />
        </div>               
      </div>
      <hr class="solid"/>
      <br/>
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
        <div class="u-layout right">            
          <a href="/Cart" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">View cart</a>
          <span id="PaymentSpan" class="u-border-2 u-border-hover-palette-1-base  u-btn u-btn-round u-button-style u-radius-4 u-btn-3" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Pay now</span>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- END - billing form -->
<!-- BEGIN - list of orders -->
<!-- TO DO - to delete -->
            <div class="u-layout-row" style="display: none;">
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
          </div>
<!-- END - list of orders -->


        </div>
      </div>
    </section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
  jQuery(document).ready(function ($) {  

  // BEGIN - show modals when clicked the span
  var vouchersListModal = document.getElementById("VouchersListModal");
  var vouchersListSpan = document.getElementById("VouchersListSpan");
  vouchersListSpan.onclick = function() {
    VouchersListModal.style.display = "block";
  }
  var paymentModal = document.getElementById("PaymentModal");
  var paymentSpan = document.getElementById("PaymentSpan");
  paymentSpan.onclick = function() {
    paymentModal.style.display = "block";
  }
  // END - show modals when clicked the span

  // BEGIN - close modals without refreshing the page
  //vouchers list modal  
  var vouchersListCloseButton = document.getElementById("VouchersModalCloseButton");
  var vouchersListCancelButton = document.getElementById("VouchersModalCancelButton");
  vouchersListCloseButton.onclick = function(event) {
    vouchersListModal.style.display = "none";
  }
  vouchersListCancelButton.onclick = function(event) {
    vouchersListModal.style.display = "none";
  }
  //vouchers list modal  
  var paymentCloseButton = document.getElementById("PaymentModalCloseButton");
  var paymentCancelButton = document.getElementById("PaymentModalCancelButton");
  paymentCloseButton.onclick = function(event) {
    paymentModal.style.display = "none";
  }
  paymentCancelButton.onclick = function(event) {
    paymentModal.style.display = "none";
  }
  // END - close vouchers modal without refreshing the page


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
$('#BPITotalAmountDueSpan').html(mvar.format());
$('#GCashTotalAmountDueSpan').html(mvar.format());
$('#BPITotalAmountDueTextbox').html(mvar.format());
$('#BPITotalAmountDueTextbox').html(mvar.format());
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
            console.log(radioValue);
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
              $('#BPITotalAmountDueSpan').html(newvalue.format());
              $('#GCashTotalAmountDueSpan').html(newvalue.format());
              $('#BPITotalAmountDueTextbox').html(newvalue.format());
              $('#GCashTotalAmountDueTextbox').html(newvalue.format());
              console.log(newvalue);
            } else{
              $('#totalcomputedamount').html(mvar.format());
              $('#totalcomputedamount_submt').val(mvar);
            }
        });


        $('.confirm').click(function(){

          $( "#payform" ).submit();
        });

});

</script>

@endsection