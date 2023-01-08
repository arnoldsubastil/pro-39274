@extends('layouts.index')

@section('title')
About Soystory
@endsection

<!-- Push a style dynamically from a view -->
@section('styles')
<link rel="stylesheet" href="css/about.css" media="screen">
@endsection

@section('content')

<section class="u-clearfix u-section-1" id="sec-3310">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h6>Our Story</h6>
        <div class="u-clearfix u-expanded-width u-gutter-34 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-col">
              <div class="u-size-30">
                <div class="u-layout-row">
                  <div class="u-container-style u-image u-layout-cell u-left-cell u-size-30 u-image-1" src="" data-image-width="1718" data-image-height="965">
                    <div class="u-container-layout u-valign-middle u-container-layout-1"></div>
                  </div>
                  <div class="u-align-justify u-container-style u-layout-cell u-right-cell u-size-30 u-layout-cell-2">
                    <div class="u-container-layout u-container-layout-2">
                      <p class="u-text u-text-1">
                        </span>{{ $content[0]->page_content }}
&nbsp;<br>
                      </p>
                      <p class="u-text u-text-1">
                        <span style="font-size: 1.5rem;">
                        </span>{{ $content[1]->page_content }}


&nbsp;<br>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="u-size-30">
                <div class="u-layout-row">
                  <div class="u-align-justify u-container-style u-layout-cell u-left-cell u-size-30 u-layout-cell-3">
                    <div class="u-container-layout u-container-layout-3">
                      <p class="u-text u-text-2"> {{ $content[2]->page_content }}
&nbsp; &nbsp;<i></i>
                       
                        <br>
                      </p>
                      <blockquote class="u-text u-text-3"> “<i>“{{ $content[3]->page_content }}” 
 - Mirriam Adeney
</i>
                      </blockquote><br>
                        <br>
                      <p class="u-text u-text-2"> {{ $content[4]->page_content }}

&nbsp; &nbsp;<i></i>
                        <br>
                        <br>
                      </p>
                     
                    </div>
                  </div>
                  <div class="u-container-style u-image u-layout-cell u-right-cell u-size-30 u-image-2" src="" data-image-width="816" data-image-height="816">
                    <div class="u-container-layout u-valign-middle u-container-layout-4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br/><br/>


@endsection




<!-- Push a script dynamically from a view -->
@push('scripts')
<!-- <script src="/example.js"></script> -->    
@endpush