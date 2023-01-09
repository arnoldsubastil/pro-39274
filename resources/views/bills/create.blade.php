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
                  
                  <div class="btn-submit form-vertical u-form u-form-1">
                  <h3 class="u-text u-text-default u-text-6">Billing Details</h3>
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
                      <div class="u-form-group">
                            <label for="name-2382" class="u-label u-label-1">City <span style="font-style:italic;color: #939393;font-size: 13px;">(for shipping fee)</span>:</label>
                            <select type="text" name="shipping" placeholder="---- ---- ---- ----" class="shippingSelect u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1 shipping">
                              @foreach($shipping as $ship)
                                <option value="{{ $ship->shippindId }}" price="{{ $ship->price }}">{{ $ship->shippingcondition }} - {{ $ship->price }} Php</option>
                              @endforeach  
                          </select>
                        </div> 
                      <div class="u-form-group u-form-group-4">
                        <label for="text-c306" class="u-label u-label-4">Mode of Payment</label> <br>
                        <label><input id="BPIRadioButton" checked="checked" type="radio" name="mode_of_payment" value="BPI"> BPI</label> <br>
                        <label><input id="GCashRadioButton" type="radio" name="mode_of_payment" value="BDO"> BDO</label> <br>
                        <label><input id="GCashRadioButton" type="radio" name="mode_of_payment" value="GCash"> GCash</label> <br>
                        <input type="hidden" name="voucher_id" id="voucher_id" />
                        <input type="hidden" name="allproductcomments" id="allproductcomments" />
                      </div>
                      <div class="u-form-group u-form-message u-form-group-5">
                        <label for="message-2382" class="u-label u-label-5">Order notes</label>
                        <textarea placeholder="Notes about your order, e.g. special notes for delivery" rows="4" cols="50" id="message-2382" name="message" class="noResize u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-5"></textarea>
                      </div>
  
                      <div class="u-form-group u-form-message u-form-group-5">
                        <!-- <label for="message-2382" class="u-label u-label-5">Voucher </label> -->
                        <span id="VouchersListSpan" class="u-align-right u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2">Select voucher</span>
                      </div>   
                      
                      <div class="u-form-group u-form-group-4 proofvoucher" style="display:none">
                        <label for="text-c306" class="u-label u-label-4">Proof for Promo Selected</label>
                        <input type="file" placeholder="Enter valid ID for proof" id="text-c306"  name="image" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-4">
                      </div>                  

                      <div class="u-align-right u-form-group u-form-submit">
                        <a href="PaymentDetails.html" class="form-submit u-btn u-btn-round u-btn-submit u-button-style u-radius-4 u-btn-2">Hidden</a>
                        <input type="submit" value="submit" class="u-form-control-hidden">
                      </div>
                      <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
                      <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
                      <input type="hidden" value="" name="recaptchaResponse">
                  </div>
                  <div class="btn-submit form-vertical u-form u-form-1">
                  <!-- <h3 class="u-text u-text-default u-text-6">Other Details</h3> -->
                    <div class="otherDetails u-form-group u-form-group-4">
                          <label for="text-c306" class="u-label u-label-4">Special requests:</label> <br>
                          <input id="GiftCheckbox" type="checkbox" name="mode_of_payment" value="BPI" class="btn-expand"><label for="GiftCheckbox" class="btn-expand"> Send my order as a gift/care package</label> <br>
                          <fieldset id="GiftFieldset" class="expand">
                            <div class="u-form-group u-form-group-4">
                                <label for="ReceiverNameTextBox" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('Receiver Name') }}</label>
                                <input id="ReceiverNameTextBox" type="text" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1 form-control @error('receiverName') is-invalid @enderror" name="receiverName" value="{{ old('receiverName') }}" required autocomplete="receiverName" autofocus>
                                @error('receiverName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="u-form-group u-form-group-4">
                                <label for="SenderNameTextBox" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('Sender Name') }}</label>
                                <input id="SenderNameTextBox" type="text" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1 form-control @error('firstName') is-invalid @enderror" name="giverName" value="{{ old('senderName') }}" required autocomplete="senderName" autofocus>
                                @error('senderName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="u-form-group u-form-group-4">
                              <label for="GiftTextArea" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('Message') }}</label>
                              <textarea id="GiftTextArea" placeholder="Message for the receiver" rows="4" cols="50" class="noResize u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1" name="receiverMessage" required ></textarea>
                              @error('message')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                            <div class="u-form-group u-form-group-4">
                                <label for="ReceiverAddressTextBox" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('Receiver Address') }}</label>
                                <input id="ReceiverAddressTextBox" type="text" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1 form-control @error('receiverAddress') is-invalid @enderror" name="receiverAddress" value="{{ old('receiverAddress') }}" required autocomplete="receiverAddress" autofocus>
                                @error('receiverAddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </fieldset>
                          <input id="ReceiptCheckbox" type="checkbox" name="mode_of_payment" value="GCash" class="btn-expand"><label for="ReceiptCheckbox" class="btn-expand"> Request for an official receipt</label> <br>
                          <fieldset id="ReceiptFieldset" class="expand">
                            <div class="u-form-group u-form-group-4">
                                <label for="NameTextBox" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('Name') }}</label>
                                <input id="NameTextBox" type="text" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1 form-control @error('firstName') is-invalid @enderror" name="companyName" value="{{ old('firstName') }}" required autocomplete="companyName" autofocus>
                                @error('receiverName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="u-form-group u-form-group-4">
                                <label for="AddressTextBox" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('Address') }}</label>
                                <input id="AddressTextBox" type="text" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1 form-control @error('deliveryAddress') is-invalid @enderror" name="companyAddress" value="{{ old('deliveryAddress') }}" required autocomplete="deliveryAddress" autofocus>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="u-form-group u-form-group-4">
                                <label for="TINTextbox" class="u-custom-font u-font-montserrat u-label u-label-2">{{ __('TIN') }}</label>
                                <input id="TINTextbox" type="text" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1 form-control @error('contact_no') is-invalid @enderror" name="TIN" aria-required="true" aria-invalid="false" value="" inputmode="numeric" data-mask="000000000000" placeholder="XXXXXXXXXXXX" maxlength="12" autocomplete="off">
                                @error('contact_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </fieldset>
                        </div>
                    </div>

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
                        <div class="table-head">Voucher</div>   
                        <div class="table-head">Description</div>                      
                        <div class="table-head">Discounted Amount</div>
                    </div>
                      @foreach($voucher as $onevoucher)
                        <div class="table-row">
                              <div class="table-cell selectCheckbox">
                                <div class="round">
                                  <input type="radio" id="{{ $onevoucher['voucher_id'] }}" requirement="{{ $onevoucher['proof_needed'] }}" name="voucher" vouchermode="{{ $onevoucher['discount_type'] }}" value="{{ $onevoucher['discount'] }}" />
                                  <label for="{{ $onevoucher['voucher_id'] }}"></label>
                                </div>
                              </div>

                              <div class="table-cell">
                                <span class="listItemDetailLabel">Code</span>
                                <span href="" class="listItemDetailValue code">{{ $onevoucher['voucher_code'] }}</span>
                              </div>

                              <div class="table-cell">                                
                                <span class="listItemDetailLabel">Description</span>
                                <span href="" class="listItemDetailValue">Valid until {{ $onevoucher['valid_date_start'] }} to {{ $onevoucher['valid_date_end'] }}</span>
                              </div>
                              
                              <div class="table-cell">
                                <span class="listItemDetailValue snippetButton">
                                  @if($onevoucher['discount_type'] == 'percent')
                                   {{ $onevoucher['discount'] }} %
                                   @elseif($onevoucher['discount_type'] == 'shipping')
                                   -----FREE SHIPPING-----
                                   @else
                                    {{ $onevoucher['discount'] }} Php
                                  @endif
                                </span>
                              </div>

                            </div>

                      @endforeach

                      <div class="modal-footer right">
                        <br/>
                        <button type="button" id="VouchersModalCancelButton" data-dismiss="modal" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Done</button>
                        <!-- <button class="u-border-2 u-border-hover-palette-1-base u-btn u-btn-round u-button-style u-radius-4 u-btn-3" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Select</button> -->
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
                            <input type="text" id="mode_ofpayment" value="BPI" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1" disabled>
                          </div>
                          <div class="u-form-group">
                            <label for="name-2382" class="u-label u-label-1">Delivery Date</label>  
                            <input id="ReceiveDateTextBox" class="receiveDateTextBox" placeholder="dddd - MMM DD, YYYY" type="text" autocomplete="off" autofill="off" name="to_received_date" class="form-control datepicker u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1">                          
                            <span id="DefaultOptionButton" class="moreOption" style="margin-top: 16px;">View selection instead?</span>
                            <div id="result" class="receivedDateList"></div>
                            <div class="moreOptionDiv"><span id="MoreOptionButton" class="moreOption">View calendar instead?</span></div>
                            <!-- <div class="moreOptionDiv"><span id="DefaultOptionButton" class="moreOption">View selection instead?</span></div> -->
                          </div>
                                      
                      <div class="u-form-group u-form-group-4">
                        <label for="text-c306" class="u-label u-label-4">Reference Number</label>
                        <input type="text" placeholder="Payment Reference" id="reference_no" value="" name="reference_no" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-4">
                      </div>
                          <!-- <div class="u-form-group">
                            <label for="name-2382" class="u-label u-label-1">Discount</label>
                            <input type="text" value="No available voucher" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1" disabled>
                          </div> -->
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
                             
                          <div class="u-form-group"><strong>
                          <h4>Payment Information</h4>
                            <div id="bankaccountinfo">
                              BPI: SOYSTORY FOOD SHOP 8260-0036-83 <br>
                              <img src="/images/bpiinfo.png" width="300">
                            </div>
                            </strong>
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
        <div style="text-align: right">

          <table style="display: inline-block;">
            <tr>
              <td>
               <strong> Product Amount:</strong>
              </td>
              <td>
                <span id="computetotalamountTable"></span> Php
              </td>
            </tr>
            <tr>
              <td>
              <strong>Voucher Discount:</strong>
              </td>
              <td>
              <span id="computevoucherdiscountTable">0</span> Php
              </td>
            </tr>
            <tr>
              <td>
              <strong>Shipping Fee:</strong>
              </td>
              <td>
              <span id="computeshippingfeeTable">0</span> Php
              </td>
            </tr>
          </table><br><br>
        </div>
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
</script>

<script>
  jQuery(document).ready(function ($) {  


  $('#GiftCheckbox').change(function() {
        $('#GiftFieldset').toggle();
    });

    $('#ReceiptCheckbox').change(function() {
        $('#ReceiptFieldset').toggle();
    });

  var receiveDateList = document.getElementById("result");
  var calendarTextBox = document.getElementById("ReceiveDateTextBox");
  var calendarOption = document.getElementById("MoreOptionButton");
  var defaultOption = document.getElementById("DefaultOptionButton");

  calendarOption.onclick = function() {
    receiveDateList.style.display = "none";
    defaultOption.style.display = "inline-block";
    calendarTextBox.style.display = "block";
    calendarTextBox.style.border = "1px solid #b3b3b3";
    calendarTextBox.style.display = "block";
    calendarOption.style.display = "none";
  }

  defaultOption.onclick = function() {
    receiveDateList.style.display = "block";
    defaultOption.style.display = "none";
    calendarTextBox.style.display = "none";
    calendarTextBox.style.display = "none";
    calendarOption.style.display = "inline-block";
  }

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
$('#computetotalamountTable').html(mvar.format(2));
$('#totalcomputedamount').html(mvar.format(2));
$('#BPITotalAmountDueSpan').html(mvar.format(2));
$('#GCashTotalAmountDueSpan').html(mvar.format(2));
$('#BPITotalAmountDueTextbox').html(mvar.format(2));
$('#BPITotalAmountDueTextbox').html(mvar.format(2));
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
      updateValueToPay();
        });


$('.shipping').change(function(){
  updateValueToPay()
});

function updateValueToPay() {
  
  var radioValue = $("input[name='voucher']:checked").val();
            var vouchermode = $("input[name='voucher']:checked").attr('vouchermode');
            var requirement = $("input[name='voucher']:checked").attr('requirement');
            var id = $("input[name='voucher']:checked").attr('id');
          
  var priceaddtional = parseFloat($('.shipping').find(":selected").attr('price'));
  var valuewithshipping = mvar + priceaddtional;

  $('#computeshippingfeeTable').html('+' + priceaddtional);

              $('#voucher_id').val(id);
            if(radioValue){
              if(vouchermode == 'fix') {
                newvalue = valuewithshipping - parseFloat(radioValue);
                $('#computevoucherdiscountTable').html('-' + parseFloat(radioValue));
              } else if(vouchermode == 'shipping') {
                newvalue = valuewithshipping - priceaddtional;
                $('#computevoucherdiscountTable').html('-' + priceaddtional);

              } else {
                newvalue = valuewithshipping - (mvar * (parseFloat(radioValue)/100));
                $('#computevoucherdiscountTable').html('-' + parseFloat(radioValue)/100);
              }

              if(requirement != '0'){
                $('.proofvoucher').show();
              } else {
                $('.proofvoucher').hide();
              }
              $('#totalcomputedamount').html(newvalue.format(2));              
              $('#totalcomputedamount_submt').val(newvalue);
              $('#BPITotalAmountDueSpan').html(newvalue.format(2));
              $('#BPITotalAmountDueTextbox').html(newvalue.format(2));
              console.log(newvalue);
            } else{
              $('#totalcomputedamount').html(valuewithshipping.format(2));
              $('#totalcomputedamount_submt').val(valuewithshipping);
              $('#BPITotalAmountDueSpan').html(valuewithshipping.format(2));
              $('#BPITotalAmountDueTextbox').html(valuewithshipping.format(2));
            }

}

$('input[type=radio][name=mode_of_payment]').change(function() {
    $('#mode_ofpayment').val(this.value);
    var payment = this.value;

    if(payment === 'BPI') {
      $('#bankaccountinfo').html(`
                              BPI: SOYSTORY FOOD SHOP 8260-0036-83 <br>
                              <img src="/images/bpiinfo.png" width="300">
                           `);
    } else if(payment === 'BDO') {
      $('#bankaccountinfo').html(`BDO: SOYSTORY FOOD SHOP 00-769-800-8061 <br>`);
    } else {
      $('#bankaccountinfo').html(`
                              GCASH: EANNE YEANNE L. 09171380392 <br>
                              <img src="/images/gcashinfo.jpg" width="300">
                           `);
    }
    
});

$('.confirm').click(function(){
  $( "#payform" ).submit();
});

});

</script>

@endsection