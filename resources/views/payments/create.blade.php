@extends('layouts.orders')

@section('title')
Pay Order
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="/css/payments/create.css" media="screen">
@endsection

@section('content')     

<br/>
<br/>
<br/>
<br/>
<br/>

<section class="u-clearfix u-valign-middle u-section-2" id="sec-719f">

<br/>
<br/>
<br/>
      <div class="u-align-center u-clearfix u-layout-wrap u-layout-wrap-1">
        <div class="u-gutter-0 u-layout">
          <div class="u-layout-row">
            <div class="u-container-align-center u-container-style u-layout-cell u-size-60 u-layout-cell-1">
              <div class="u-container-layout u-container-layout-1">
                <h2 class="u-align-center u-text u-text-default u-text-1">Hi!</h2>
                <p class="u-align-center u-text u-text-default u-text-2"> This page will be the customized payment plugin.&nbsp;<br>Click the button below to continue.
                </p>
                <a href="{{ route('orders.notification') }}" class="u-align-center u-btn u-btn-round u-button-style u-hover-palette-1-light-1 u-palette-1-base u-radius-4 u-btn-1">Continue&nbsp;</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

@endsection