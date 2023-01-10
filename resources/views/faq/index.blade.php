@extends('layouts.index')

@section('title')
FAQ
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="/css/faq/index.css" media="screen">
@endsection

@section('content')

<section class="u-clearfix u-container-align-center-lg u-container-align-center-md u-container-align-center-sm u-container-align-center-xs u-valign-middle-xs u-section-1" id="sec-54cf">
    <div class="stripeDiv"></div>
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-align-left u-container-align-center u-container-style u-layout-cell u-right-cell u-size-60 u-layout-cell-1">
                <div class="u-container-layout u-valign-middle u-container-layout-1">
                  <div class="u-align-center u-form u-form-1">
                  <br/><br/>
                  <h2>Soystory FAQs</h2>
                  <br/>
                    <div class="faqDiv">

                    @foreach($faqs as $faq)
                        <div>
                            <button type="button" class="collapsible">{!! $faq->question !!}</button>
                            <div class="content">
                              <p>{!! $faq->answer !!}</p>
                              <br>
                            </div>
                        </div>
                    @endforeach

                    </div>

                  <!-- <div>FAQ</div>
          @foreach($faqs as $faq)
            <div>
                <div class="FaqQuestion">
                    {{ $faq->question }}
                </div>
                <div class="FaqAnswer">
                    {{ $faq->answer }}
                </div>
            </div>
          @endforeach -->
                  </div>
                  <!-- <p class="u-align-center u-custom-font u-font-montserrat u-text u-text-default u-text-4">Don't have an account? <a href="/register" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-grey-80 u-btn-3">Sign up now</a>
                    <br>Continue as guest? <a href="/Pastries" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-grey-80 u-btn-4">Order now</a>
                    <br>
                  </p> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br/><br/><br/><br/>
      <div class="stripeDiv"></div>
    </section>

          <!-- <div>FAQ</div>
          @foreach($faqs as $faq)
            <div>
                <div class="FaqQuestion">
                    {{ $faq->question }}
                </div>
                <div class="FaqAnswer">
                    {{ $faq->answer }}
                </div>
            </div>
          @endforeach -->

          <script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>

@endsection