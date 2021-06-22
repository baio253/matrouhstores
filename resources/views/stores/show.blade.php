@extends('layouts.app')
@section('content')
    <div id="page">
        <div class="main container">
            <div class="about-page">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="single-img-add sidebar-add-slider">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active"><img
                                            src="{{ $store->logo }}"
                                            alt="{{ $store->name }}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <h2><span class="text-capitalize text_color">{{ $store->name }}</span></h2>
                        <ul style="margin-top: 30px">
                            <li style="margin-top: 30px"><h1>Address: {{ $store->address }}</h1></li>
                            <li style="margin-top: 30px"><h1>Total Products: {{ count($store->products) }}</h1></li>
                            <li style="margin-top: 30px"><h1> Mobile : {{ $store->phone }}</h1></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="inner-box">

        <div class="container">

            <div class="row store_branch">


                <!-- Best Sale -->

                <div class="col-sm-12 col-md-12 jtv-best-sale special-pro">

                    <div class="jtv-best-sale-list" style="margin-top: 30px">

                        <div class="wpb_wrapper">

                            <div class="best-title text-left">

                                <h3>{{ $store->name }} - <span class="text_color"> Products </span></h3>

                            </div>

                        </div>


                        <div class="slider-items-products">

                            <div id="jtv-best-sale-slider" class="product-flexslider">

                                <div class="slider-items">
                                    @foreach($store->products as $product)
                                        <div class="product-item">
                                            <div class="item-inner">
                                                <div class="product-thumbnail">
                                                    <div class="pr-img-area">
                                                        <a href="{{ route('products.show', $product->id) }}">

                                                            <figure>

                                                                <img class="first-img" alt="{{ $product->name }}"
                                                                     src="{{ $product->photo }}">
                                                            </figure>
                                                        </a>
                                                    </div>
                                                    <div class="pr-info-area">
                                                        <div class="pr-button">
                                                            <div class="mt-button add_to_wishlist"><a
                                                                    href="#"><i
                                                                        class="fa fa-heart-o"></i></a></div>
                                                            <div class="mt-button quick-view"><a href="quick_view.html"><i
                                                                        class="fa fa-search"></i></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title"><a title=""
                                                                                   href="">{{ $product->name }}</a>
                                                        </div>
                                                        <div class="item-content">
                                                            <div class="item-price">
                                                                <div class="price-box"><span
                                                                        class="regular-price"> <span
                                                                            class="price">$ {{ $product->price }}{{ $product->price < 10 ? '.00' : ''}}</span> </span>
                                                                </div>
                                                            </div>
                                                            <div class="pro-action">
                                                                @if($product->stock > 1)
                                                                    <a title=""></a>
                                                                    <a href="{{ route('products.show', ['id' => $product->id]) }}">
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
    @include('_service-aria')
@endsection
