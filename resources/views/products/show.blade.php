@extends('layouts.app')
@section('content')
    <div id="page">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul>
                            <li class="home"><a title="" href="/">Home</a><span>&raquo;</span></li>
                            <li class=""><a title="" href="{{ route('products.index') }}">Products</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs End -->
        <div class="main-container col1-layout">
            <div class="container">
                <div class="row">
                    <div class="col-main">
                        <div class="product-view-area">
                            <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5"
                                 style="margin-bottom: 70px">
                                <div class="large-image">
                                    <a href="{{ $product->photo }}" class="cloud-zoom" id="zoom1"
                                       rel="useWrapper: false, adjustY:0, adjustX:20">
                                        <img class="zoom-img" src="{{ $product->photo }}" alt="{{ $product->name }}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
                                <div class="product-name">
                                    <h1>{{ $product->name }}</h1>
                                </div>
                                <div class="price-box">
                                    <p class="special-price"><span class="price-label">Special Price</span> <span
                                            class="price"> $ {{ $product->price }}.00</span></p>
                                    <p class="availability {{ $product->stock > 0 ? 'in-stock' : 'out-of-stock' }} pull-right"
                                       style="margin: 10px">

                                        Available Stock : <span>
                                            {{ $product->stock > 0 ? $product->stock . ' In Stock' : 'Out Of Stock' }}
                                        </span>
                                    </p>
                                </div>

                                <div class="short-description">
                                    <h2> Quick Overview </h2>
                                    <p>
                                        {{ $product->description }}
                                    </p>
                                </div>
                                    <div class="product-color-size-area">
                                    </div>
                                    <div class="product-variation">
                                        <form method="POST" action="{{ route('add.to.cart') }}"
                                              accept-charset="UTF-8" class="form-horizontal qtyFrm"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <div class="cart-plus-minus">
                                                <label for="qty"> Quantity :</label>
                                                <div class="numbers-row">
                                                    <div onClick="remove_quantity()" class="dec qtybutton"><i
                                                            class="fa fa-minus">&nbsp;</i></div>
                                                    <input type="number" class="qty" min="1" value="1"
                                                           max="{{ $product->stock }}"
                                                           id="addtocart_qty" name="quantity" readonly required>
                                                    <div onClick="add_quantity()" class="inc qtybutton"><i
                                                            class="fa fa-plus">&nbsp;</i></div>
                                                </div>
                                            </div>

                                            <button type="submit" class=" button pro-add-to-cart">
                                            <span><i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                                    Add to cart </span>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="product-cart-option">
                                        <ul>
                                            <li>
                                                <a href="" role="button" data-toggle="modal" data-target="#loginpop">
                                                    <i class="fa fa-heart-o" aria-hidden="true"></i> Add to Wishlist
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pro-tags">
                                        <div class="pro-tags-title"> Delivery On :</div>
                                        {{ $date }}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Container End -->
        <!-- Related Product Slider -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="related-product-area">
                        <div class="page-header">
                            <h2> Related Products </h2>
                        </div>
                        <div class="related-products-pro">
                            <div class="slider-items-products">
                                <div id="related-product-slider" class="product-flexslider hidden-buttons">
                                    <div class="slider-items slider-width-col4 fadeInUp">
                                        @if(App\Product::where('id', '!=', $product->id)->where('sub_category_id', '=', $product->subCategory->id)->get())
                                            @foreach(App\Product::where('id', '!=', $product->id)->where('sub_category_id', '=', $product->subCategory->id)->get() as $relatedProduct)
                                                <div class="product-item">
                                                    <div class="item-inner">
                                                        <div class="product-thumbnail">
                                                            <div class="pr-img-area">
                                                                <a href="{{ route('products.show', $relatedProduct->id) }}">
                                                                    <figure><img class="first-img"
                                                                                 src="{{ $relatedProduct->photo }}"
                                                                                 alt="{{ $relatedProduct->name }}">
                                                                    </figure>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="info-inner">
                                                                <div class="item-title">
                                                                    <a href="{{ route('products.show', $relatedProduct->id) }}">
                                                                        {{ $relatedProduct->name }}
                                                                    </a>
                                                                </div>

                                                                <div class="item-content">
                                                                    <div class="item-price">
                                                                        <div class="price-box"><span
                                                                                class="regular-price"> <span
                                                                                    class="price">$ {{ $relatedProduct->price }}.00</span> </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Related Product Slider End -->
            <!-- Store section -->
            <div class="store-details">
                <h5 class="page-header" style="font-size: 18px;font-weight: 600;"> Store Details </h5>
                <div class="main container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <h1 style="font-weight: 600;font-size: 22px;"><span
                                    style="color: #e83f33;">{{ $product->store->name }}</span>
                            </h1>
                            <p><a title="View Store" target="_blank"
                                  href="{{ route('stores.show', $product->store->id) }}">
                                    <img
                                        src="{{ $product->store->logo }}"
                                        alt="spotlight" style="width:250px; height:250px;">
                                </a></p>
                            <ul style="color: #999;  font-size: 15px; list-style-type:none;display: block;  margin: 1.2em 0 0;">
                                <li>Address: {{ $product->store->address }}</li>
                                <li>Total Products: {{ count($product->store->products) }}</li>
                                <li> Mobile : {{ $product->store->phone }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Store section -->
            <!-- service section -->
            @include('_service-aria')
        </div>

        <a href="" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a>


        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

        <script type="text/javascript">


            $(document).ready(function () {

                $('#add_to_cart_session').click(function () {

                    var pro_purchase1 = '5';

                    var pro_purchase = parseInt($('#addtocart_qty').val()) + parseInt(pro_purchase1);

                    var pro_qty = '22';

                    if (pro_purchase > parseInt(pro_qty)) {

                        $('#addtocart_qty').focus();

                        $('#addtocart_qty').css('border-color', 'red');

                        $('#addtocart_qty_error').html('Limited Quantity Available');

                        return false;

                    } else {

                        $('#addtocart_qty').css('border-color', '');

                        $('#addtocart_qty_error').html('');

                    }

                    if ($('#addtocart_color').val() == 0) {

                        $('#addtocart_color').focus();

                        $('#addtocart_color').css('border-color', 'red');

                        $('#size_color_error').html('Select Color');

                        return false;

                    } else {

                        $('#addtocart_color').css('border-color', '');

                        $('#size_color_error').html('');

                    }

                    if ($('#addtocart_size').val() == 0) {

                        $('#addtocart_size').focus();

                        $('#addtocart_size').css('border-color', 'red');

                        $('#size_color_error').html('Select Size');

                        return false;

                    } else {

                        $('#addtocart_size').css('border-color', '');

                        $('#size_color_error').html('');

                    }

                });

                $("#searchbox").keyup(function (e) {


                    var searchbox = $(this).val();

                    var dataString = 'searchword=' + searchbox;

                    if (searchbox == '') {

                        $("#display").html("").hide();

                    } else {

                        var passData = 'searchword=' + searchbox;

                        $.ajax({

                            type: 'GET',

                            data: passData,

                            url: 'https://demo.laravelecommerce.com/autosearch',

                            success: function (responseText) {

                                $("#display").html(responseText).show();

                            }

                        });

                    }

                    return false;


                });

            });


        </script>


        <script type="text/javascript">


            $(document).ready(function () {

                $('#policyclick').click(function (event) {

                    $('.dev_cancel').slideToggle("fast");

                    event.stopPropagation();

// $(".dev_cancel").css({"background":"#ffffff", "position":"absolute"});

                });

                $('#returnclick').click(function (event) {

                    $('.dev_return').slideToggle("fast");

                    event.stopPropagation();

// $(".dev_return").css({"background":"#ffffff", "position":"absolute"});

                });

                $('#replaceclick').click(function (event) {

                    $('.dev_replace').slideToggle("fast");

                    event.stopPropagation();

                });


                $(".policy-container").on("click", function (event) {

                    event.stopPropagation();

                });


            });


            $(document).on("click", function () {

                $(".policy-container").hide();

            });


        </script>


        <script type="text/javascript">

            function add_quantity() {

//alert();

                /*var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;*/


                var quantity = $("#addtocart_qty").val();

                var remaining_product = parseInt({{ $product->stock }});


                if (quantity < remaining_product) {

                    var new_quantity = parseInt(quantity) + 1;

                    $("#addtocart_qty").val(new_quantity);

                }

//alert();

            }


            function remove_quantity() {

//alert();

                /*var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;*/


                var quantity = $("#addtocart_qty").val();

                var quantity = parseInt(quantity);

                if (quantity > 1) {

                    var new_quantity = quantity - 1;

                    $("#addtocart_qty").val(new_quantity);

                }

//alert();

            }

        </script>


        <script type="text/javascript">

            function addtowish(pro_id, cus_id) {

//alert();

                var wishlisturl = document.getElementById('wishlisturl').value;


                $.ajax({

                    type: "get",

                    url: "https://demo.laravelecommerce.com/addtowish",

                    data: {'pro_id': pro_id, 'cus_id': cus_id},

                    success: function (response) {

//alert(response); return false;

                        if (response == 0) {


                            $(".add-to-wishlist").fadeIn('slow').delay(5000).fadeOut('slow');

//window.location=wishlisturl;

                            window.location.reload();


                        } else {

                            alert('Product Already exists in Your Wishlist');

//window.location=wishlisturl;

                        }


                    }

                });

            }

        </script>


        <script src="https://demo.laravelecommerce.com/themes/js/handleCounter.js"></script>

        <script>

            $(function ($) {

                var options = {

                    minimum: 1,

                    maximize: 10,

                    onChange: valChanged,

                    onMinimum: function (e) {

                        console.log('reached minimum: ' + e)

                    },

                    onMaximize: function (e) {

                        console.log('reached maximize' + e)

                    }

                }

                $('#handleCounter').handleCounter(options)

                $('#handleCounter2').handleCounter(options)

                $('#handleCounter3').handleCounter({maximize: 100})

            })

            function valChanged(d) {

//            console.log(d)

            }

        </script>


        <!-- For Responsive menu-->

        <script type="text/javascript">


            $(document).ready(function () {

                $(document).on("click", ".customCategories .topfirst b", function () {

                    $(this).next("ul").css("position", "relative");


                    $(".topfirst ul").not($(this).parents(".topfirst").find("ul")).css("display", "none");

                    $(this).next("ul").toggle();

                });


                $(document).on("click", ".morePage", function () {

                    $(".nextPage").slideToggle(200);

                });


                $(document).on("click", "#smallScreen", function () {

                    $(this).toggleClass("customMenu");

                });


                $(window).scroll(function () {

                    if ($(this).scrollTop() > 250) {

                        $('#comp_myprod').show();

                    } else {

                        $('#comp_myprod').hide();

                    }

                });


            });

        </script>
@endsection
