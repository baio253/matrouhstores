@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://demo.laravelecommerce.com/public/themes/css/sidemenu.css">
    <div class="loading_prnt">
        <div class="loadingGiff"></div>
    </div>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"><a title="Go to Home Page"
                                            href="/">Home</a><span>&raquo;</span>
                        </li>
                        <li><strong>Product</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Main Container -->
    <div class="main-container col2-left-layout" alt="Products Page">
        <div class="container">
            <div class="row">
                <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
                    <div class="shop-inner" id="prdt_ajax_display">
                        <div class="page-title">
                            @isset($category)
                                <h2 class="text-capitalize">{{ $category }}</h2>
                            @else
                                <h2>Products</h2>
                            @endisset
                        </div>
                        <div class="toolbar">
                            <div class="sorter">
                                <div class="short-by">
                                    <label> Sort by :</label>
                                    <select name="filtertypes"
                                            onchange="displayproductrecords('9','1',this.options[this.selectedIndex].value);">
                                        <option value="">Sort By</option>
                                        <option value="1"> Price low - high</option>
                                        <option value="2"> Price high - low</option>
                                        <option value="3"> Title A - Z</option>
                                        <option value="4"> Title Z - A</option>
                                        <option value="5"> Description A - Z</option>
                                        <option value="6"> Description Z - A</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="product-grid-area">
                            <ul class="products-grid">
                                @foreach($products as $product)
                                    <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
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
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="pagination-area">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
                <aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
                    <!-- Sidebar ================================================== -->
                    <div class="block shop-by-side">
                        <div class="sidebar-bar-title">

                            <h3>Shop By</h3>

                        </div>
                        <div class="block-content">
                            <p class="block-subtitle">Categories</p>
                            <div id="divMenu">
                                <ul>
                                    @foreach(App\Category::take(14)->get() as $category)
                                        <li><a class="text-capitalize" href="#">
                                                {{ $category->name }}</a>
                                            <ul>
                                                @foreach($category->subcategories as $subCategory)
                                                    <li>
                                                        <a class="text-capitalize"
                                                           href="{{ route('category.products', ['id'=> $subCategory->id])}}">
                                                            {{ $subCategory->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <br>
                            <!--end side bar-->
                            <br><br>
                            <div class="block special-product">
                                <div class="sidebar-bar-title">
                                    <h3> Most Visited Products </h3>
                                </div>
                                <div class="block-content">
                                    <ul>
                                        @foreach($products->take(5) as $product)
                                            <li class="item">
                                                <div class="products-block-left">
                                                    <img
                                                        src="{{ $product->photo }}"
                                                        alt="{{ $product->name }}" style="">
                                                </div>
                                                <div class="products-block-right">
                                                    <p class="product-name">{{ $product->name }}
                                                    </p>
                                                    <span
                                                        class="price">$ {{ $product->price  }} {{ $product->price < 10  ? '.00' : '' }}</span>
                                                    <br>
                                                    </h4>
                                                    @if($product->stock > 1)
                                                        <a class="link-all"
                                                           href="{{ route('products.show', ['id' => $product->id]) }}">
                                                            Add to cart </a>
                                                    @else
                                                        <a class="link-all text-center"
                                                           style="width: 50%"
                                                           href="{{ route('products.show', ['id' => $product->id]) }}">
                                                            SOLD </a>
                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </div>
    <!-- Main Container End -->
    <!-- service section -->
    @include('_service-aria')
@endsection
