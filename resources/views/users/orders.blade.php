@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"><a title="Go to Home Page"
                                            href="/">Home</a><span>&raquo;</span>
                        </li>
                        <li class="home"><a title="" href="">My Cart</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Container -->
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="col-main">
                <div class="cart">

                    <div class="page-content page-order">
                        <div class="page-title">
                            <h2> Shopping Cart </h2>
                        </div>


                        <div id='dev_session_er_alert' class=""
                             style="display: none; color:#fa0a0a;border:1px solid #fa0a0a; padding:15px;background:rgba(238, 177, 177, 0.67); border-radius: 5px;margin-bottom:10px ">
                        </div>


                        <div class="order-detail-content">
                            <div class="table-responsive">
                                <table class="table table-bordered cart_summary">
                                    <thead>
                                    <tr>
                                        <th class="cart_product"> Product</th>
                                        <th style="width: 25%;">Details</th>
                                        <th> Price</th>
                                        <th style="width: 20%;"> Quantity</th>
                                        <th> Total</th>
                                        <th class="action" style="width: 12%;"> Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse(auth()->user()->products as $product)
                                        <tr>
                                            <td class="cart_product">
                                                <a href=""><img
                                                        src="{{ $product->photo }}"
                                                        alt="{{ $product->name }}"></a></td>
                                            <td class="cart_description"><p class="product-name" style=""><a
                                                        href="">{{ $product->name }}</a></p>
                                                <small class="text-capitalize"><a href="">Product Category : {{ $product->subCategory->name }}</a></small>
                                                <small class="text-capitalize"><a href="">Store : {{ $product->store->name }}</a></small></td>

                                            <td class="price"><span>$ {{ $product->price }}.00</span></td>
                                            <td class="qty">

                                                <div class="input-append">
                                                    <input class="span1"
                                                           style="max-width:39px; height: 25px; min-height: 25px; padding: 13px 12px; margin: 5px 0px;"
                                                           value="{{ $product->orders->quantity }}" type="text"
                                                           disabled/>
                                                </div>

                                            </td>
                                            <td class="price"><span>$ {{ $product->price * $product->orders->quantity }}</span></td>
                                            <td class="action"><a href="{{ route('delete.order', $product->id) }}"><i
                                                        class="fa fa-trash-o fa-2x"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr><td colspan="6">
                                                <h2 class="display-2">
                                                No Items in cart
                                                ...
                                                </h2>
                                            </td></tr>
                                        @endforelse
                                    </tbody>


                                    <tfoot>
                                    <tr>
                                        <td colspan="2" rowspan="2"></td>
                                        <td colspan="3"><strong> Total </strong></td>
                                        <td colspan="2"><strong>$ {{ $total }}</strong></td>
                                    </tr>
                                    </tfoot>

                                </table>


                            </div>

                            <div class="cart_navigation"><a class="continue-btn"
                                                            href="/"><i
                                        class="fa fa-arrow-left"> </i>&nbsp; Continue Shopping </a>

                                <a class="checkout-btn" href="#"><i
                                        class="fa fa-check"></i> Proceed to Checkout </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('_service-aria')
    <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a>
@endsection
