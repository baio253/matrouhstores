@extends('layouts.owner')
@section('content')

    <div id="left">
        <div class="media user-media well-small">
            <!-- <a class="user-link" href="#">
                <img class="media-object img-thumbnail user-img" alt="User Picture" src="public/assets/img/user.gif" />
            </a> -->

            <div class="media-body">
                <h5 class="media-heading">PRODUCTS</h5>

            </div>
            <br>
        </div>

        <ul id="menu" class="collapse">
            <li class="panel">
                <a href="{{ route('owner.products') }}">
                    <i class=" icon-edit"></i>&nbsp; Manage Products
                </a>
            </li>
            <li class="panel">

                <a href="{{ route('products.create')  }}">
                    <i class=" icon-plus-sign"></i>&nbsp;Add Products
                </a>
            </li>
            <li class="panel">
                <a href="#">
                    <i class="icon-tag"></i>&nbsp; Sold Products
                </a>
            </li>
        </ul>

    </div>

    <div id="content">

        <div class="inner">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li class=""><a href="/owner">Home</a></li>
                        <li class="active"><a href="#">Add Products</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="box dark">
                        <header>
                            <div class="icons"><i class="icon-edit"></i></div>
                            <h5>Add Products</h5>

                        </header>
                        <div id="div-1" class="accordion-body collapse in body">
                            <form method="POST" action="{{ route('products.store') }}" class="form-horizontal"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="control-label col-lg-2">Product Name<span
                                            class="text-sub">*</span></label>

                                    <div class="col-lg-8">
                                        <input id="name" placeholder="Enter Your Product Title In English"
                                               name="name" class="form-control @error('name') is-invalid @enderror"
                                               type="text">
                                        <div id="title_error_msg" style="color:#F00;font-weight:800"> @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror</div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="sub_category" class="control-label col-lg-2">Sub Category<span
                                            class="text-sub">*</span></label>

                                    <div class="col-lg-8">
                                        <select class="form-control" style="text-transform: capitalize"
                                                id="sub_category" name="sub_category">
                                            <option selected>--- Select ---</option>
                                            @foreach(\App\SubCategory::all() as $subCategory)
                                                <option value="{{ $subCategory->id }}"
                                                        style="text-transform: capitalize">{{ $subCategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div id="category_error_msg"
                                             style="color:#F00;font-weight:800">@error('sub_category')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror</div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="stock" class="control-label col-lg-2">Stock<span
                                            class="text-sub">*</span></label>

                                    <div class="col-lg-8">
                                        <input placeholder="Enter Quantity of Product"
                                               class="form-control @error('stock') is-invalid @enderror" type="text"
                                               maxlength="5" id="stock" name="stock"
                                               value="{{ old('stock') }}" required>
                                        <div id="qty_error_msg" style="color:#F00;font-weight:800">
                                            @error('stock')
                                            <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="price" class="control-label col-lg-2">Price ($)<span
                                            class="text-sub">*</span></label>

                                    <div class="col-lg-8">
                                        <input placeholder="Numbers Only" class="form-control" type="text"
                                               maxlength="10" id="price" name="price">
                                        <div id="org_price_error_msg" style="color:#F00;font-weight:800"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="description">Description<span
                                            class="text-sub"></span></label>

                                    <div class="col-lg-8">
                                        <textarea class="form-control" id="description" name="description"
                                                  placeholder="Enter Description In English"></textarea>
                                        <div id="meta_desc_error_msg" style="color:#F00;font-weight:800"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="store_id" class="control-label col-lg-2">Select Store<span
                                            class="text-sub">*</span></label>

                                    <div class="col-lg-8">
                                        <select class="form-control" style="text-transform: capitalize" name="store_id"
                                                id="store_id">
                                            <option value="0">--Select Store--</option>
                                            @foreach(auth()->user()->stores as $store)
                                                <option style="text-transform: capitalize"
                                                        value="{{ $store->id }}"> {{ $store->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="store_error_msg" style="color:#F00;font-weight:800"></div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="photo">Product Image <span
                                            class="text-sub">*</span></label>
                                    <span class="errortext red" style="color:red;"><em>image size must be 800 x 800 pixels</em></span>
                                    <div class="col-lg-8" id="img_upload">
                                        <div style="display: block; overflow: hidden;">
                                            <input type="file" name="photo" id="photo">
                                        </div>
                                    </div>
                                    <div id="img_error_msg" style="color:#F00;font-weight:800"></div>
                                </div>
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-warning btn-sm btn-grad">Add Product</button>
                                    <button type="reset" class="btn btn-danger btn-sm btn-grad" style="color:#fff">Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    </div>
@endsection
