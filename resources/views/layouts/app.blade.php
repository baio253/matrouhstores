<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Matrouh Stores - Every Store In Matrouh In One Place</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}"/>

    <!--  Styles -->

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/pe-icon-7-stroke.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/quick_view_popup.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/revolution-slider.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/shortcode.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet"/>


</head>
<body>

<!--Loader & alert-->
<div id="loader" style="position: absolute; display: none;">
    <div class="loader-inner"></div>

    <div class="loader-section"></div>
</div>

<!--Loader & alert-->

<div id="mobile-menu">
    <ul>
        @foreach(App\Category::all() as $category)
            <li><a class="text-capitalize" href="">
                    {{ $category->name }}
                </a>

                <div class="wrap-popup column1">
                    <div class="popup">
                        <ul class="nav">
                            @foreach($category->subcategories as $subCategory)
                                <li>
                                    <a class="text-capitalize"
                                       href="{{ route('category.products', ['id'=> $subCategory->id])}}">
                                        {{ $subCategory->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
<div id="page">
    <header>
        <div class="header-container">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-xs-12">
                            <!-- Default Welcome Message -->
                            <!--<div class="welcome-msg hidden-xs hidden-sm">Default welcome msg! </div>-->
                            <!-- Language &amp; Currency wrapper -->
                            <div class="language-currency-wrapper">
                                <div class="inner-cl">
                                    <div class="block block-language form-language">
                                        <div class="lg-cur">
                                            <span style="margin-right: 5px">English </span><i
                                                class="fa fa-angle-down"></i>
                                        </div>
                                        <ul>
                                            <li><a class="selected" href="#"><span>English</span></a>
                                            </li>
                                            <li><a class="disabled" href="#"><span>Arabic</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="block block-currency">
                                        <div class="item-cur"><span>USD</span><i class="fa fa-angle-down"></i></div>
                                        <ul>
                                            <li><a class="selected" href="#">USD</a></li>
                                            <li><a href="#">EGP</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- top links -->
                        <div class="headerlinkmenu col-md-8 col-sm-8 col-xs-12">
                            <span
                                class="phone  hidden-xs hidden-sm"> Call us :+201*********</span>
                            <ul class="links">
                                @guest
                                    <li><a href="{{ route('login') }}"><span> Login </span></a></li>
                                    <!--  <li><a href="" data-toggle="modal" data-target="#loginpop">login1</a></li> -->
                                    @if (Route::has('register'))
                                        <li>
                                            <a href="{{ route('register') }}"><span> Register </span></a>
                                        </li>
                                    @endif
                                @else
                                    <li><a title="Checkout" href="#"><span>Checkout</span></a></li>
                                    <li>
                                        <div class="dropdown"><a class="current-open" data-toggle="dropdown"
                                                                 aria-haspopup="true" aria-expanded="false"
                                                                 href="#"><span> My Account  </span> <i
                                                    class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                @can('control_store')
                                                <li><a href="{{ route('owner.dashboard') }}">
                                                       Dashboard </a></li>
                                                @endcan
                                                <li><a href="{{ route('users.show') }}">
                                                        Account </a></li>
                                                <li><a href="{{ route('about.us') }}"> About us </a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        Log Out
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                          style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .popup1, .popup2 {
                vertical-align: top;
                background: #fff;

                box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .2);
                display: none;
                text-align: left;
                z-index: 3000;
                padding: 10px 20px;
                font-size: 13px;
                margin-left: 21px;
                margin-top: -11px;
            }

            .popup1, .popup1, .popup2 {
                display: none;
                background: #fff;
            }

            .popup li.active .popup1 {
                display: block;
            }

            .popup1:hover .popup2 {
                display: block;
            }
        </style>
        <!--  <link rel="stylesheet" href="https://demo.laravelecommerce.com/public/themes/css/style.css"> -->


        <!-- header inner -->
        <div class="header-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-xs-12 jtv-logo-block">

                        <!-- Header Logo -->
                        <div class="logo"><a class="brand" href="/"><img
                                    src="{{ asset('images/logo-header.png') }}"
                                    alt=" Logo "/></a></div>

                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-6 jtv-top-search">

                        <!-- Search -->

                        <div class="top-search">
                            <div id="search">
                                <form action=""
                                      class="form-inline navbar-search searBoxStyle">
                                    @csrf
                                    <div class="input-group">
                                        <select class="cate-dropdown hidden-xs hidden-sm" name="category">
                                            <option value="0">All Categories</option>
                                            @foreach(App\Category::all() as $category)
                                                <option class="text-capitalize" value="">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <input type="text" id="searchbox" value=""
                                               placeholder="Search for Product/Deal Name" autocomplete="on"
                                               style="font-family:lato !important;border-radius: 0px; float: left;"
                                               name="q" class="form-control"/>

                                        <button class="btn-search" name="submit" type="submit"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- End Search -->

                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-3 top-cart">
                        <div class="link-wishlist">
                            <a href="" role="button" data-toggle="modal" data-target="#loginpop">
                                <i class="icon-heart icons"></i><span>  Wishlist </span></a>
                        </div>
                        <!-- top cart -->
                        <div class="top-cart-contain">
                            <div class="mini-cart">
                                <!-- removed data-toggle="dropdown"  -->
                                <div class="basket">
                                    <a href="{{ route('myCart') }}" role="button">
                                        <div class="cart-icon"><i class="icon-basket-loaded icons"></i>
                                            @auth
                                                @if(count(Auth::user()->products) > 0)
                                                    <span class="cart-total">{{ count(Auth::user()->products) }}</span>
                                                @endif
                                            @endauth
                                        </div>
                                        <div class="shoppingcart-inner hidden-xs">
                                       <span
                                           class="cart-title"> My Cart  </span></div>
                                    </a>
                                </div>
                            </div>

                            <div class="menuIcon" onclick="myFunction(this)">
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</header>
<!-- end header -->
<nav>
    <div class="container">
        <div class="row">
            <div class="mm-toggle-wrap">
                <div class="mm-toggle"><i class="fa fa-align-justify"></i></div>
                <span class="mm-label"> All Categories  </span></div>
            <div class="col-md-3 col-sm-3 mega-container hidden-xs">
                <div class="navleft-container">
                    <div class="mega-menu-title">
                        <h3><span> All Categories  </span></h3>
                    </div>

                    <!-- Shop by category -->
                    <div class="mega-menu-category">
                        <ul class="nav">
                            @foreach(App\Category::take(8)->get() as $category)
                                <li><a class="text-capitalize" href="">
                                        {{ $category->name }}
                                    </a>

                                    <div class="wrap-popup column1">
                                        <div class="popup">
                                            <ul class="nav">
                                                @foreach($category->subcategories as $subCategory)
                                                    <li>
                                                        <a class="text-capitalize"
                                                           href="{{ route('category.products', ['id'=> $subCategory->id])}}">
                                                            {{ $subCategory->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 jtv-megamenu">
                <div class="mtmegamenu">
                    <ul id="res_menu"> <!-- Removed hidden-xs -->
                        <li class="active">
                            <div class="mt-root-item"><a href="/">
                                    <div class="title title_font"><span class="title-text">Home</span></div>
                                </a></div>
                        </li>

                        <li class="active mt-root">
                            <div class="mt-root-item"><a href="{{ route('products.index') }}">
                                    <div class="title title_font"><span class="title-text">Products</span></div>
                                </a></div>
                        </li>

                        <li class="active mt-root">
                            <div class="mt-root-item"><a href="{{ route('stores.index') }}">
                                    <div class="title title_font"><span class="title-text">Stores</span></div>
                                </a></div>
                        </li>

                        <li class="active mt-root">
                            <div class="mt-root-item">
                                <a class="text-muted" href="#">
                                    <div style="text-decoration: line-through; cursor: not-allowed"
                                         class="title title_font"><span class="title-text">Deals</span></div>
                                </a></div>
                        </li>

                        <li class="active mt-root">
                            <div class="mt-root-item"><a href="#">
                                    <div style="text-decoration: line-through; cursor: not-allowed"
                                         class="title title_font"><span class="title-text">Sold Out</span></div>
                                </a></div>
                        </li>


                        <li class="active mt-root">
                            <div class="mt-root-item"><a href="#">
                                    <div style="text-decoration: line-through; cursor: not-allowed"
                                         class="title title_font"><span class="title-text">Near by store</span>
                                    </div>
                                </a></div>
                        </li>

                        <li class="active mt-root">
                            <div class="mt-root-item"><a href="{{ route('contact.us') }}">
                                    <div class="title title_font"><span class="title-text">Contact Us</span></div>
                                </a></div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    function myFunction(x) {
        x.classList.toggle("change");
        var element = document.getElementById("res_menu");
        element.classList.toggle("active");
    }
</script>
<div class="preloader-wrapper">
    <div class="preloader">
        <img src="{{ asset('/images/favicon.png') }}" alt="NILA">
    </div>
</div>

<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('.preloader-wrapper').fadeOut();
        }, 3);
    });
</script>

@yield('content')

<!-- MicFooter -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3 col-xs-12">
                <div class="footer-logo"><a class="brand" href="/"><img
                            src="{{ asset('/images/logo-footer.png') }}"
                            alt=" Logo "/></a></div>
                <p> Matrouh Stores - Every Store In Matrouh In One Place </p>

                <div class="social">
                    <ul class="inline-mode">

                        <li class="social-network fb"><a title="Connect us on Facebook"
                                                         href="https://www.facebook.com/" target="_blank"><i
                                    class="fa fa-facebook"></i></a></li>

                        <li class="social-network tw"><a title="Connect us on Twitter"
                                                         href="https://www.twitter.com/" target="_blank"><i
                                    class="fa fa-twitter"></i></a></li>
                        <li class="social-network linkedin"><a title="Connect us on linkedin"
                                                               href="https://www.linkedin.com" target="_blank"><i
                                    class="fa fa-linkedin"></i></a></li>
                        <li class="social-network googleplus"><a title="Connect us on Youtube"
                                                                 href="https://www.youtube.com" target="_blank"><i
                                    class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>

            </div>
            <div class="col-sm-6 col-md-3 col-xs-12 collapsed-block">
                <div class="footer-links">
                    <h5 class="links-title">CONTACT US<a class="expander visible-xs" href="#TabBlock-1">+</a></h5>
                    <div class="tabBlock" id="TabBlock-1">
                        <ul class="list-links list-unstyled">
                            <li><a href="mailto:sales@matrouhstores.com"><i class="icon-envelope"></i>&nbsp;&nbsp;sales@matrouhstores.com</a>
                            </li>
                            <li><i class="icon-phone"></i>+201*********</li>
                            <li><a href="{{ route('contact.us')  }}"><i
                                        class="icon-map-marker"></i>Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-xs-12 collapsed-block">
                <div class="footer-links">
                    <h5 class="links-title">ABOUT COMPANY<a class="expander visible-xs" href="#TabBlock-3">+</a>
                    </h5>
                    <div class="tabBlock" id="TabBlock-3">
                        <ul class="list-links list-unstyled">
                            <li><a href="/">Home</a></li>
                            <li><a href="{{ route('stores.index') }}">Stores</a></li>
                            <li><a href="{{ route('about.us') }}">About us</a></li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 col-xs-12 collapsed-block">
                <div class="footer-links">
                    <h5 class="links-title">PAYMENT METHOD<a class="expander visible-xs" href="#TabBlock-5">+</a>
                    </h5>

                    <div class="tabBlock" id="TabBlock-5">
                        <div class="payment">
                            <ul>
                                <li>Soon!
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <br>
                <div class="footer-links">
                    <h5 class="links-title">OWNER LOGIN<a class="expander visible-xs" href="#TabBlock-4">+</a>
                    </h5>
                    <div class="tabBlock" id="TabBlock-4">
                        <ul class="list-links list-unstyled">
                            <li><a href="{{ route('owner.register') }}">Register</a>/ <a
                                    href="{{ route('owner.login') }}" target="_blank"> Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <div class="footer-coppyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12 coppyright"> Copyright © {{date("Y")}} Matrouh Stores. Made with
                    <span style="color: red; font-size: 20px">&hearts;</span> by ITI Matrouh. All rights
                    reserved.
                </div>
                <div class="col-sm-6 col-xs-12">
                    <ul class="footer-company-links">
                        <li><a href="">Terms &amp; Conditions</a>
                        </li>
                        <li><a href="">Help</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- jquery js -->
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

<!-- bootstrap js -->
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- owl.carousel.min js -->
<script type="text/javascript"
        src="{{ asset('js/owl.carousel.min.js') }}"></script>

<!-- jquery.mobile-menu js -->
<script type="text/javascript" src="{{ asset('js/mobile-menu.js') }}"></script>

<!--jquery-ui.min js -->
<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>

<!-- main js -->
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

<!-- flexslider js -->
<script type="text/javascript"
        src="{{ asset('js/jquery.flexslider.js') }}"></script>

<!-- countdown js -->
<script type="text/javascript" src="{{ asset('js/countdown.js') }}"></script>

<!-- Slider Js -->
<script type="text/javascript"
        src="{{ asset('js/revolution-slider.js') }}"></script>
<script type='text/javascript'>
    jQuery(document).ready(function () {
        jQuery(".flexslider-thumb .slides li a img").on("click", function () {
            var imgHref = jQuery(this).attr("src");
            jQuery(".large-image a").attr("href", imgHref);
            jQuery(".large-image a img").attr("src", imgHref);
        });
    });
    jQuery(document).ready(function () {
        jQuery('#rev_slider_4').show().revolution({
            dottedOverlay: 'none',
            delay: 5000,
            startwidth: 865,
            startheight: 450,

            hideThumbs: 200,
            thumbWidth: 200,
            thumbHeight: 50,
            thumbAmount: 2,

            navigationType: 'thumb',
            navigationArrows: 'solo',
            navigationStyle: 'round',

            touchenabled: 'on',
            onHoverStop: 'on',

            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,

            spinner: 'spinner0',
            keyboardNavigation: 'off',

            navigationHAlign: 'center',
            navigationVAlign: 'bottom',
            navigationHOffset: 0,
            navigationVOffset: 20,

            soloArrowLeftHalign: 'left',
            soloArrowLeftValign: 'center',
            soloArrowLeftHOffset: 20,
            soloArrowLeftVOffset: 0,

            soloArrowRightHalign: 'right',
            soloArrowRightValign: 'center',
            soloArrowRightHOffset: 20,
            soloArrowRightVOffset: 0,

            shadow: 0,
            fullWidth: 'on',
            fullScreen: 'off',

            stopLoop: 'off',
            stopAfterLoops: -1,
            stopAtSlide: -1,

            shuffle: 'off',

            autoHeight: 'off',
            forceFullWidth: 'on',
            fullScreenAlignForce: 'off',
            minFullScreenHeight: 0,
            hideNavDelayOnMobile: 1500,

            hideThumbsOnMobile: 'off',
            hideBulletsOnMobile: 'off',
            hideArrowsOnMobile: 'off',
            hideThumbsUnderResolution: 0,


            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            startWithSlide: 0,
            fullScreenOffsetContainer: ''
        });
    });
</script>
<!-- extension Js -->
<script type="text/javascript"
        src="{{ asset('js/revolution-extension.js') }}"></script>

<!-- bxslider js -->
<script type="text/javascript" src="{{ asset('js/jquery.bxslider.js') }}"></script>


<!-- carousel js -->
<!-- <script type="text/javascript" src="/public/themes/js/owl.carousel.rtl.js"></script> -->

<!--cloud-zoom js -->
<script type="text/javascript" src="{{ asset('js/cloud-zoom.js') }}"></script>


<script type="text/javascript">
    /*var __lc = {};
__lc.license = 6132091;

(function() {
var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();*/
</script>

<script>
    //paste this code under head tag or in a seperate js file.
    // Wait for window load
    $(window).load(function () {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
        ;
    });
</script>

<script>
    $('document').ready(function () {
        console.clear();

        $('#demo').jplist({

            itemsBox: '.list'
            , itemPath: '.list-item'
            , panelPath: '.jplist-panel'

            //save plugin state
            , storage: 'localstorage' //'', 'cookies', 'localstorage'
            , storageName: 'jplist-div-layout'
        });
        $(".loading_prnt").hide();
        $(".productLoading").css("opacity", "1");

    });
</script>

<script type="text/javascript">
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 2000);
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
</script>
<script type="text/javascript">


    $(document).on("click", ".quick-view", function () {
        $(window).trigger('resize');

        setTimeout(function () {
            $(window).trigger('resize');
        });
        $(window).scrollTop(0);
    });

</script>


<a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a>
<!-- End Footer -->
</div>
<!-- JS -->

<!-- Preloader -->
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        var Body = $('body');
        Body.addClass('preloader-site');
    });
    $(window).load(function () {
        $('.preloader-wrapper').fadeOut();
        $('body').removeClass('preloader-site');
    });
</script>

</body>
</html>
