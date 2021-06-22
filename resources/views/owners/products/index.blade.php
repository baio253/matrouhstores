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
                        <li class="active"><a href="#"> Manage Products </a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="box dark">
                        <header>
                            <div class="icons"><i class="icon-edit"></i></div>
                            <h5> Manage Products</h5>
                        </header>
                        <div style="display: none;" class="la-alert date-select1 alert-success alert-dismissable">End
                            date should be greater than Start date!
                            <button class="close closeAlert" aria-hidden="true" type="button">×</button>
                        </div>
                        <div id="div-1" class="">
                            <div class="panel_marg_clr ppd">
                                <div class="dataTables_wrapper form-inline" role="grid">
                                    <table id="dataTables-example"
                                           class="table table-striped table-bordered table-hover dataTable no-footer"
                                           aria-describedby="dataTables-example_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_desc">S.No
                                            </th>
                                            <th class="sorting"
                                                style="width: 92px;">Product
                                                Name
                                            </th>
                                            <th class="sorting"
                                                style="width: 92px;"
                                            >Store Name
                                            </th>
                                            <th class="sorting"
                                                style="width: 93px;">
                                                Price ($)
                                            </th>
                                            <th class="sorting"
                                                style="width: 93px;">
                                                Product Image
                                            </th>
                                            <th class="sorting"
                                                style="width: 93px;">Product
                                                Description
                                            </th>
                                        </tr>

                                        </thead>

                                        <tbody>

                                        @foreach(App\Store::where('user_id', Auth::id())->get() as $store)
                                            @foreach($store->products as $product)
                                                <tr class="gradeA odd">
                                                    <td class="sorting_1">{{ $loop->iteration }}</td>
                                                    <td class="center ">{{ $product->name }}</td>
                                                    <td class="center   ">{{ $product->store->name }}</td>
                                                    <td class="center   ">$ {{ $product->price }}.00</td>
                                                    <td class="center   ">
                                                        <a href="#"><img style="height:60px;"
                                                                         src="{{ $product->photo }}"></a>
                                                    </td>
                                                    <td class="center   ">{{ $product->description }}</td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
