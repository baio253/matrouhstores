@extends('layouts.app')

@section('content')
    <div class="main-slider" id="home">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 banner-left hidden-xs">
                    <br><br>
                    <div class="jtv-banner3">
                        <div class="jtv-banner3-inner"><img
                                src="{{ $products->whereBetween('stock', [1, 10])->first()->photo }}"
                                alt="{{ $products->whereBetween('stock', [1, 10])->first()->name }}">
                        </div>
                    </div>
                    <br><br>
                    <div class="hover_content">
                        <div class="hover_data">
                            <div class="title"> Big sale</div>
                            <div class="desc-text"> Up to 60% off</div>
                            <!-- //if -->
                            <p class="big-sale"><a
                                    href="{{ route('products.show', ['id' => $products->whereBetween('stock', [1, 10])->first()->id]) }}"
                                    title="{{ App\Product::first()->name }}" class="shop-now">
                                    Get it now! </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9 col-xs-12 jtv-slideshow">
                    <div id="jtv-slideshow">
                        <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
                            <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                                <ul>
                                    <li data-transition='fade' data-slotamount='7' data-masterspeed='1000'
                                        data-thumb=''>
                                        <a> <img style="filter: brightness(30%)"
                                                 src="{{ asset('images/bannerimage/Banner1527126377.jpg') }}"
                                                 data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat'
                                                 alt="banner"/></a>
                                        <div class="caption-inner">
                                            <div class='tp-caption LargeTitle sft  tp-resizeme' data-x='250'
                                                 data-y='110' data-endspeed='500' data-speed='500' data-start='1300'
                                                 data-easing='Linear.easeNone' data-splitin='none' data-splitout='none'
                                                 data-elementdelay='0.1' data-endelementdelay='0.1'
                                                 style='z-index:3; white-space:nowrap;'> E-Shop for your business
                                            </div>
                                            <div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='200'
                                                 data-y='160' data-endspeed='500' data-speed='500' data-start='1100'
                                                 data-easing='Linear.easeNone' data-splitin='none' data-splitout='none'
                                                 data-elementdelay='0.1' data-endelementdelay='0.1'
                                                 style='z-index:2; white-space:nowrap; color:#fff; text-shadow:none;'>
                                                Easy to Buy
                                            </div>
                                            <div class='tp-caption' data-x='310' data-y='230' data-endspeed='500'
                                                 data-speed='500' data-start='1100' data-easing='Linear.easeNone'
                                                 data-splitin='none' data-splitout='none' data-elementdelay='0.1'
                                                 data-endelementdelay='0.1'
                                                 style='z-index:2; white-space:nowrap; color:#f8f8f8;'></div>
                                            <div class='tp-caption sfb  tp-resizeme ' data-x='370' data-y='280'
                                                 data-endspeed='500' data-speed='500' data-start='1500'
                                                 data-easing='Linear.easeNone' data-splitin='none' data-splitout='none'
                                                 data-elementdelay='0.1' data-endelementdelay='0.1'
                                                 style='z-index:4; white-space:nowrap;'><a
                                                    href='{{ route('products.index') }}' class="buy-btn">
                                                    Get Started </a></div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="tp-bannertimer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('_service-aria')
    <div class="container">
        <div class="home-tab">
            <div class="tab-title text-left">
                <h2> Best offers </h2>

            </div>
            <div id="productTabContent" class="tab-content">
                <div class="tab-pane active in" id="computer">
                    <div class="featured-pro">
                        <div class="slider-items-products">
                            <div id="computer-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col4">
                                    @foreach($products as $product)
                                        <div class="product-item">
                                            <div class="item-inner">
                                                <div class="product-thumbnail">
                                                    <div class="pr-img-area">
                                                        <a href="{{ route('products.show', ['id' => $product->id]) }}"
                                                           title="{{ $product->name }}">
                                                            <figure><img class="first-img"
                                                                         src="{{ asset($product->photo) }}"
                                                                         alt="{{ $product->name }}"></figure>
                                                        </a>
                                                    </div>
                                                    <div class="pr-info-area">
                                                        <div class="pr-button">
                                                            <div class="mt-button add_to_wishlist">
                                                                <a href="" role="button" data-toggle="modal"
                                                                   data-target="#loginpop" title="Add to Wishlist">
                                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            <div class="mt-button quick-view"><a href="" role="button"
                                                                                                 data-toggle="modal"
                                                                                                 data-target="#quick_view_popup-wrap103">
                                                                    <i class="fa fa-search"></i> </a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a title="">{{ $product->name }}</a>
                                                        </div>
                                                        <div class="item-content">

                                                            <div class="item-price">
                                                                <div class="price-box"><span
                                                                        class="regular-price"> <span
                                                                            class="price">$ {{ $product->price  }} {{ $product->price < 10  ? '.00' : '' }}</span> </span>
                                                                </div>
                                                            </div>
                                                            <div class="pro-action">
                                                                @if($product->stock > 1)
                                                                    <a title="">

                                                                    </a><a
                                                                        href="{{ route('products.show', ['id' => $product->id]) }}">
                                                                        <button type="button" class="add-to-cart"><span>  Add to cart  </span>
                                                                        </button>
                                                                    </a>
                                                                @else
                                                                    <button type="button" class="add-to-cart">
                                                                        <span>  Sold  </span></button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="inner-box">
        <div class="container">
            <div class="row">
                <!-- Banner -->
                <div class="col-md-3 top-banner hidden-sm">
                    <div class="jtv-banner3">

                        <div class="jtv-banner3-inner">
                            <img
                                style="filter: brightness(70%)"
                                src="{{ \App\Product::orderBy('price', 'desc')->first()->photo }}"
                                alt="Coolers">
                            <div class="hover_content">
                                <div class="hover_data">
                                    <div class="title"> Big sale</div>
                                    <div class="desc-text"> Up to 70% off</div>
                                    <p>
                                        <a href="{{ route('products.show', ['id' => \App\Product::orderBy('price', 'desc')->first()->id]) }}"
                                           title="Coolers" class="shop-now">
                                            Get it now! </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Best Sale -->
                <div class="col-sm-12 col-md-9 jtv-best-sale special-pro">
                    <div class="jtv-best-sale-list">
                        <div class="wpb_wrapper">
                            <div class="best-title text-left">
                                <h2> Upto 50% Offers </h2>
                            </div>
                        </div>
                        <div class="slider-items-products">
                            <div id="jtv-best-sale-slider" class="product-flexslider">
                                <div class="slider-items">
                                    @foreach($products as $product)
                                        <div class="product-item">
                                            <div class="item-inner">
                                                <div class="product-thumbnail">
                                                    <div class="pr-img-area">
                                                        <a href="{{ route('products.show', ['id' => $product->id]) }}"
                                                           title="{{ $product->name }}">
                                                            <figure><img class="first-img"
                                                                         src="{{ asset($product->photo) }}"
                                                                         alt="{{ $product->name }}"></figure>
                                                        </a>
                                                    </div>
                                                    <div class="pr-info-area">
                                                        <div class="pr-button">
                                                            <div class="mt-button add_to_wishlist">
                                                                <a href="" role="button" data-toggle="modal"
                                                                   data-target="#loginpop" title="Add to Wishlist">
                                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                                </a>
                                                            </div>
                                                            <div class="mt-button quick-view"><a href="" role="button"
                                                                                                 data-toggle="modal"
                                                                                                 data-target="#quick_view_popup-wrap103">
                                                                    <i class="fa fa-search"></i> </a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a title="">{{ $product->name }}</a>
                                                        </div>
                                                        <div class="item-content">

                                                            <div class="item-price">
                                                                <div class="price-box"><span
                                                                        class="regular-price"> <span
                                                                            class="price">$ {{ $product->price  }} {{ $product->price < 10  ? '.00' : '' }}</span> </span>
                                                                </div>
                                                            </div>
                                                            <div class="pro-action">
                                                                @if($product->stock > 1)
                                                                    <a title="">

                                                                    </a><a
                                                                        href="{{ route('products.show', ['id' => $product->id]) }}">
                                                                        <button type="button" class="add-to-cart"><span>  Add to cart  </span>
                                                                        </button>
                                                                    </a>
                                                                @else
                                                                    <button type="button" class="add-to-cart">
                                                                        <span>  Sold  </span></button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="daily-deal-section">
                <!-- daily deal section-->
                <div class="col-md-7 daily-deal">
                    <h3 class="deal-title"> Deals of the Day </h3>
                    <div class="title-divider"><span></span></div>
                    <p> Great Savings. Every Day. Shop from our Deal of the Day, Lightning Deals and avail other great
                        offers. </p>
                    <div class="hot-offer-text"> Great Sale <span>{{ date('Y') }}</span></div>
                    <div class="box-timer">
                        <span class="des-hot-deal"> Hurry up! Special offer  </span>
                        <p> No Deals available </p>
                    </div>
                </div>
                <div class="col-md-5 hot-pr-img-area">
                    <div id="daily-deal-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 ">


                            <figure><img class="first-img"
                                         src="{{ asset('images/noimage/No_image_1544278034_800x800.jpg') }}"
                                         alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="featured-products">
        <div class="container">
            <div class="row">
                <!-- Best Sale -->
                <div class="col-sm-12 col-md-4 jtv-best-sale">
                    <div class="jtv-best-sale-list">
                        <div class="wpb_wrapper">
                            <div class="best-title text-left">
                                <h2> Top Rate </h2>
                            </div>
                        </div>
                        <div class="slider-items-products">
                            <div id="toprate-products-slider" class="product-flexslider">
                                <div class="slider-items">
                                    <!-- start -->
                                    @for($i = 1, $d=0 ; $i < 4 ; $i++, $d = $d+2)
                                        <ul class="products-grid">
                                            @foreach($products->where('stock', '>', 0)->where('id', '>', $d)->take(2) as $product)
                                                <li class="item">
                                                    <div class="item-inner">
                                                        <div class="item-img">
                                                            <a href="{{ route('products.show', ['id' => $product->id]) }}"
                                                               title="{{ $product->name }}">
                                                                <img alt="{{ $product->name }}"
                                                                     src="{{ $product->photo }}">
                                                            </a>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="info-inner">
                                                                <div class="item-title">
                                                                    {{ $product->name }}
                                                                </div>
                                                                <div class="item-price">
                                                                    <div class="price-box"><span
                                                                            class="regular-price"> <span
                                                                                class="price">$ {{ $product->price  }} {{ $product->price < 10  ? '.00' : '' }}</span> </span>
                                                                    </div>
                                                                </div>
                                                                <div class="pro-action">
                                                                    <a href="https://demo.laravelecommerce.com/productview/mens/shirt/NzY="
                                                                       class="product-image">
                                                                        <button type="button" class="add-to-cart"><i
                                                                                class="fa fa-shopping-cart"></i>
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                                <div class="pr-button-hover">
                                                                    <div class="mt-button =">
                                                                        <a href="" role="button" data-toggle="modal"
                                                                           data-target="#loginpop"
                                                                           title="Add to Wishlist">
                                                                            <i class="fa fa-heart-o"
                                                                               aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                @endfor
                                <!-- end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Banner -->
                <div class="col-sm-12 col-md-4 top-banner hidden-sm">
                    <div class="jtv-banner3">


                        <div class="jtv-banner3-inner">
                            <img
                                src="{{ $product->latest()->first()->photo }}"
                                alt="rulment">
                            <div class="hover_content">
                                <div class="hover_data">
                                    <div class="title"> Big sale</div>
                                    <div class="desc-text"> Up to 87 off</div>
                                    <!-- /*//if*/ -->
                                    <p>
                                        <a href="{{ route('products.show', ['id' => $product->latest()->first()->id]) }}"
                                           title="rulment" class="shop-now">
                                            Get it now! </a>
                                    </p>
                                    <!-- //if -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 jtv-best-sale">
                    <div class="jtv-best-sale-list">
                        <div class="wpb_wrapper">
                            <div class="best-title text-left">
                                <h2> New products </h2>
                            </div>
                        </div>
                        <div class="slider-items-products">
                            <div id="new-products-slider" class="product-flexslider">
                                <div class="slider-items">
                                    @for($i = 1, $d=count($products)-2 ; $i < 4 ; $i++, $d = $d-2)
                                        <ul class="products-grid">
                                            @foreach($products->where('id', '>', $d)->take(2) as $product)
                                                <li class="item">
                                                    <div class="item-inner">
                                                        <div class="item-img">
                                                            <a href="{{ route('products.show', ['id' => $product->id]) }}"
                                                               title="{{ $product->name }}">
                                                                <img alt="{{ $product->name }}"
                                                                     src="{{ $product->photo }}">
                                                            </a>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="info-inner">
                                                                <div class="item-title">
                                                                    {{ $product->name }}
                                                                </div>
                                                                <div class="item-price">
                                                                    <div class="price-box"><span
                                                                            class="regular-price"> <span
                                                                                class="price">$ {{ $product->price  }} {{ $product->price < 10  ? '.00' : '' }}</span> </span>
                                                                    </div>
                                                                </div>
                                                                <div class="pro-action">
                                                                    <a href="https://demo.laravelecommerce.com/productview/mens/shirt/NzY="
                                                                       class="product-image">
                                                                        <button type="button" class="add-to-cart"><i
                                                                                class="fa fa-shopping-cart"></i>
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                                <div class="pr-button-hover">
                                                                    <div class="mt-button =">
                                                                        <a href="" role="button" data-toggle="modal"
                                                                           data-target="#loginpop"
                                                                           title="Add to Wishlist">
                                                                            <i class="fa fa-heart-o"
                                                                               aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="banner-area">
        <div class="container">
            <div class="best-title text-left">
                <h2> Featured Store </h2>
            </div>
            <div class="row py-5">
                @foreach($stores->take(3) as $store)
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="banner-block">
                            <a href="{{ route('stores.show', $store->id) }}"> <img
                                    src="{{ $store->logo }}"
                                    alt="{{ $store->name }}"> </a>
                            <div class="text-des-container">
                                <div class="text-des">
                                    <h2>{{ $store->name }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
