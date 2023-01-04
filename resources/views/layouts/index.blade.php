<!DOCTYPE html>
<html style="font-size: 16px;"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content=""><meta name="description" content="">
    <title>@yield('title')</title>
    
    <!--Static StyleSheets-->
    <link rel="icon" type="image/x-icon" href="/images/Icons/Cart_Orange_16x16.ico">
    <link rel="stylesheet" href="/css/fontscheme.css" media="screen">
    <link rel="stylesheet" href="/css/format.css" media="screen">
    <link rel="stylesheet" href="/css/nicepage.css" media="screen">
    <link rel="stylesheet" href="/css/responsive.css" media="screen">
    <link rel="stylesheet" href="/css/menu.css" media="screen">    
    <!--Dynamic StyleSheets added from a view would be pasted here-->
    @yield('styles')    
   
    <script class="u-script" type="text/javascript" src="/script/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="/script/nicepage.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="/script/menu.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="/script/SnippetButtons.js" defer=""></script>

    <meta name="generator" content="Nicepage 4.21.5, nicepage.com"><style class="custom-css" type="text/css">.u-backlink{
	display: none;
}</style><link rel="stylesheet" data-font="Aleo:300,300i,400,400i,700,700i" href="https://fonts.googleapis.com/css?family=Aleo:300,300i,400,400i,700,700i"></head>
<body class="u-body u-xl-mode" data-style="blank" data-posts="" data-global-section-properties="{&quot;colorings&quot;:{&quot;light&quot;:[&quot;clean&quot;],&quot;colored&quot;:[&quot;clean&quot;],&quot;dark&quot;:[&quot;dark&quot;]}}" data-source="blank" data-lang="en" data-page-sections-style="[]" data-page-coloring-types="{&quot;light&quot;:[&quot;clean&quot;],&quot;colored&quot;:[&quot;clean&quot;],&quot;dark&quot;:[&quot;dark&quot;]}" data-page-category="&quot;Basic&quot;"><section class="u-clearfix u-valign-middle-xs u-block-dabe-1" custom-posts-hash="[I,T]" data-post-id="2779219866" data-section-properties="{&quot;width&quot;:&quot;sheet&quot;,&quot;stretch&quot;:true}" data-id="dabe" data-posts-content="[{'images':[[532,559]],'maps':[],'videos':[],'icons':[],'textWidth':608,'textHeight':559,'id':1,'headingProp':'h1','textProp':'text'}]" data-style="shapes-p-new" id="sec-51e3" data-source="Sketch">

<header class=" u-clearfix u-header u-section-row-container" id="sec-71d2" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="" style="background-image: none"><div class="u-section-rows">
        <div class="u-custom-color-3 u-section-row u-sticky u-sticky-a482 u-section-row-1" id="sec-018c">
          <div class="u-clearfix u-sheet u-sheet-1" style="text-align: center;">
            <p class="u-align-center u-text u-text-default u-text-1" style="display: inline-block; margin-bottom: 8px; margin-top: 8px;"> Free delivery for orders worth 2,000 PHP and above within Metro Manila!</p>
          </div>
        </div>        
          
          
<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" name="" id="loginid" value="{!! !empty(Auth::user()->id) ? Auth::user()->id : '' !!}" />           
          
        
        <div class="u-border-1 u-border-no-left u-border-no-right u-border-no-top u-border-palette-5-base u-section-row u-sticky u-sticky-a971 u-white u-section-row-2" id="sec-9eb6">
          <div class="u-clearfix u-sheet u-sheet-2">          

          <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-2 quickNavigationBar" data-position="">
              <!-- <div class="menu-collapse" style="font-size: 1.125rem; letter-spacing: 0px; font-weight: 400;">
                <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-file-icon u-nav-link u-text-grey-75 u-file-icon-2" href="#">
                  <img src="/images/Icons/Menu_VerticalDots_32x32.png" alt="">
                </a>
              </div> -->
              <div class="u-custom-menu u-nav-container ">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
              <!-- BEGIN - hide quick navigation items if the user successfully signed in, show otherwise -->
                <ul class=" u-nav u-spacing-20 u-unstyled u-nav-3">                  
                  @if (!Auth::guest())
                  <li class="u-nav-item">
                    <span class=" u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base">
                      Welcome {{ Auth::user()->firstName }}
                    </span>
                  </li>                    
                  @endif
                  <li class="u-nav-item"><a class=" u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base" href="/my-orders">Orders</a></li>  
                  @if (!Auth::guest())
                  <li class="u-nav-item">
                    <a class="dropdown-item u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      {{ __('Log out') }}
                    </a>
                  </li>                    
                  @else
                  <li class="u-nav-item"><a class=" u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base" href="/register">Register</a></li>
                  <li class="u-nav-item"><a class=" u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base" href="/login">Log in</a></li>                    
                  <li class="u-nav-item"><a class=" u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base" href="/Contact">Contact</a></li>
                  @endif
                </ul>             
              
              <!-- END - hide quick navigation items if the user successfully signed in, show otherwise -->
              </div>
            </nav>


            <nav class="u-align-right u-menu u-menu-one-level u-offcanvas u-menu-1 shopMenu ">
              <!-- linked to google form -->
              <!-- <a href="https://docs.google.com/forms/d/e/1FAIpQLSd4K8kESzNAuFZsHarmN6-ajq39V45csHmTn2CPmu27pD4s_w/viewform?vc=0&c=0&w=1&flr=0" style="padding: 12px 20px;" class="shopButton">
                <img src="/images/Icons/Cart_Orange_64x64.png" alt="add to cart" height="64" width="64" />
              </a> -->
              
              <!-- BEGIN - add to cart button -->
              <div class="u-custom-menu">
                <ul class="u-nav u-unstyled u-nav-1">
                  <li class="u-nav-item">
                    <!-- button only-->
                    <!-- <a class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-4 u-btn-2" href="/Cart/" style="padding: 12px 20px;">
                      Add to cart
                    </a> -->
                    <!-- icon and label -->
                    <a class="u-none u-btn-2 shoppingCartButton" href="/Cart/" styli>
                      <span class="notificationCart"></span>
                      <img class="shoppingCartIcon" src="/images/Icons/Cart_Orange_48x48.png" alt="add to cart">
                      <span class="shoppingCartLabel">Add to cart</span>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- END - add to cart button -->

              <div class="u-custom-menu u-nav-container-collapse">
                <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                  <div class="u-inner-container-layout u-sidenav-overflow">
                    <div class="u-menu-close"></div>
                    <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2 shopButton"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="/Products">Shop now!</a>
</li></ul>
                  </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
              </div>
            </nav>
            <a href="/" class="u-align-left u-image u-logo u-image-1" data-image-width="256" data-image-height="64">
              <img src="/images/Logo_SoyStory_256x64.png" class="u-logo-image u-logo-image-1">
            </a>
            
            <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-2" data-position="">
              <!-- <div class="menu-collapse" style="font-size: 1.125rem; letter-spacing: 0px; font-weight: 400;">
                <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-file-icon u-nav-link u-text-grey-75 u-file-icon-2" href="#">
                  <img src="/images/Icons/Menu_VerticalDots_32x32.png" alt="">
                </a>
              </div> -->
              <div class="u-custom-menu u-nav-container moduleNavigation">
              
                <ul class="u-nav u-spacing-20 u-unstyled u-nav-3">
                  <li class="u-nav-item"><a class="homeNavItem u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base" href="/" style="padding: 10px;">Home</a></li>
                  <li class="u-nav-item"><a class="aboutNavItem u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base" href="/About" style="padding: 10px;">Our Story</a></li>
<li class="u-nav-item dropdown"><a class="dropbtn productsNavItem u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base" onclick="myFunction()" style="padding: 10px;">Our Products</a>
<div id="myDropdown" class="dropdown-content">
</div>
  
<!-- </li><li class="u-nav-item"><a class="categoriesNavItem u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base" href="/Categories" style="padding: 10px;">Categories</a> -->
<!-- </li><li class="u-nav-item"><a class="pastriesNavItem u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base" href="/Pastries" style="padding: 10px;">Pastries</a>
</li><li class="u-nav-item"><a class="dessertsNavItem u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base" href="/ToppingsAndSinkers" style="padding: 10px;">Toppings & Sinkers</a>
</li><li class="u-nav-item"><a class="dessertsNavItem u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base" href="/NutsAndNougat" style="padding: 10px;">Nuts & Nougat</a>
</li><li class="u-nav-item"><a class="beveragesNavItem u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base" href="/Beverages" style="padding: 10px;">Shake Shake Jelly</a>
</li><li class="u-nav-item"><a class="dessertsNavItem u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base" href="/Desserts" style="padding: 10px;">Special Orders</a>
</li> -->
<li class="u-nav-item"><a class="eventsNavItem u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base" href="/Events" style="padding: 10px;">Gift Sets </a>
</li>
<!-- <li class="u-nav-item"><a class="contactNavItem u-border-active-palette-1-base u-border-hover-palette-1-base u-border-no-bottom u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-body-color u-text-hover-palette-2-base" href="#" style="padding: 10px;">Contact Us</a> -->
</li></ul>
              </div>
              <!-- <div class="u-custom-menu u-nav-container-collapse">
                <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                  <div class="u-inner-container-layout u-sidenav-overflow">
                    <div class="u-menu-close"></div>
                    <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-4"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="/">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="/Products">Products</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="/Categories">Categories</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="/Pastries">Pastries</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="/Beverages">Beverages</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="/Desserts">Desserts</a>
</li></ul>
                  </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
              </div> -->
            </nav>
          </div>
        </div>
      </div>
    </header>

<main>


@yield('content')
 
</main>



<footer class="u-clearfix u-custom-color-3 u-footer" id="sec-a9d8"><div class="u-clearfix u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout" style="">
            <div class="u-layout-row" style="">

              <div class="u-align-left u-container-align-left u-container-style u-layout-cell u-left-cell u-size-30-md">
                <div class="u-container-layout u-container-layout-1"><!--position-->
                  <div data-position="" class="u-align-left u-expanded-width u-position u-position-1"><!--block-->
                    <div class="u-block texts">
                      <div class="u-block-container u-clearfix"><!--block_header-->
                        <h2 class="u-block-header u-text" style="font-family: Bebas, sans-serif; color: #D66E28;"><!--block_header_content--> It's Soystory time!<!--/block_header_content--></h2><!--/block_header--><!--block_content-->
                        <p class="u-block-content u-text u-text-2"><!--block_content_content-->Share your soystories on Facebook and Instagram. <br/><!--/block_content_content-->
                        Don't forget to tag us in your posts!<!--/block_content_content-->
                        </p><!--/block_content-->
                      </div>
                    </div><!--/block-->
                  </div><!--/position--><!--position-->
                  
                </div>
              </div>
              
              <div class="u-align-left u-container-align-left u-container-style u-layout-cell u-right-cell u-size-30-md">
                <div class="u-container-layout u-container-layout-3"><!--position-->
                  
                  <div data-position="" class="u-align-left u-position"><!--block-->
                    <div class="u-block">
                      <div class="u-block-container u-clearfix"><!--block_header-->                      
                      <blockquote class="u-text u-text-3 socialIcons"> 
                        <ul class="listSocialIcons">
                          <li><a class="u-social-url" title="Phone Number" target="_blank"><span class="u-file-icon u-icon u-social-facebook u-social-icon u-text-palette-5-base "><img src="/images/Icons/Footer_Phone_32x32.png" alt=""></span>
          </a><div class="phoneNumberLabel"><p>+63 917 138 0392</p><p>+63 920 921 1290</p></div></li>
                          
                          <li><a class="u-social-url" title="Instagram" target="_blank" href="https://www.instagram.com/soystorypastries/"><span class="u-file-icon u-icon u-social-icon u-social-Icons u-text-palette-5-base socialSpan"><img src="/images/Icons/Footer_Instagram_32x32.png" alt=""></span>
          </a><div><p>Soystory Authentic</p><p>Taiwanese Pastries</p></div></li>
          <li><a class="u-social-url" title="Facebook" target="_blank" href="https://www.facebook.com/soystorypastries/"><span class="u-file-icon u-icon u-social-facebook u-social-icon u-text-palette-5-base socialSpan"><img src="/images/Icons/Footer_Facebook_32x32.png" alt=""></span>
          </a><div><p>soystorypastries</p></div></li>
                        </ul>
          
                      </blockquote>
                      </div>
                    </div><!--/block-->
                  </div><!--/position-->
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div></footer>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6S08TFE07G"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6S08TFE07G');
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
$(document).ready(function () {  

    let _token = $('meta[name="csrf-token"]').attr('content');
    let myid = $("#loginid").val();
    $.ajax({
        url: "/api/count-qty-cart",
        type:"POST",
        data:{
        myid:myid,
        _token: _token
        },
        success:function(response){
          if(response != 0)
           $('.notificationCart').html(response); 
           else          
           $('.notificationCart').hide();
        },
    });

    
    $.ajax({
        url: "/api/showcategorylist",
        type:"GET",
        data:{
        myid:myid,
        _token: _token
        },
        success:function(response){
          var newlink = '';
          $.each( response, function( key, value ) {
            newlink = newlink + `<a href="/products/`+value['slug']+`">`+value['categoryname']+`</a>`;
          });
          console.log(newlink);

          $('#myDropdown').html(newlink);
        },
    });
});

</script>
</body></html>