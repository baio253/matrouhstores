@extends('layouts.owner')
@section('content')

    <!-- MAIN WRAPPER -->

    <!-- MENU SECTION -->
    <div id="left">
        <div class="media user-media well-small">
            <!-- <a class="user-link" href="#">
                <img class="media-object img-thumbnail user-img" alt="User Picture" src="public/assets/img/user.gif" />
            </a> -->

            <div class="media-body">
                <h5 class="media-heading">STORES</h5>

            </div>
            <br/>
        </div>

        <ul id="menu" class="collapse">
            <li class="panel"><a href="{{ route('owner.stores') }}"> <i class="icon-dashboard"></i>&nbsp;Manage Stores
                </a></li>

            <li class="panel"><a href="{{ route('stores.create') }}"> <i class=" icon-plus-sign"></i>&nbsp;Add Stores
                </a></li>
        </ul>
    </div>



    <!--PAGE CONTENT -->
    <div id="content">

        <div class="inner">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li class=""><a href="/owner">Home</a></li>
                        <li class="active"><a href="#"> Manage Your Stores </a></li>
                    </ul>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="box dark">
                        <header>
                            <div class="icons"><i class="icon-edit"></i></div>
                            <h5>Manage Your Stores</h5>

                        </header>
                        <div id="div-1" class="accordion-body collapse in body">
                            <div class="accordion-body collapse in body" id="div-1">


                                <div class="panel_marg_clr ppd">
                                    <table aria-describedby="dataTables-example_info"
                                           class="table table-striped table-bordered table-hover dataTable no-footer"
                                           id="dataTables-example">
                                        <thead>
                                        <tr role="row">
                                            <th aria-label="S.No: activate to sort column ascending"
                                                style="width: 61px;" colspan="1" rowspan="1"
                                                aria-controls="dataTables-example" tabindex="0" class="sorting_asc"
                                                aria-sort="ascending">S.No
                                            </th>
                                            <th aria-label="Product Name: activate to sort column ascending"
                                                style="width: 69px;" colspan="1" rowspan="1"
                                                aria-controls="dataTables-example" tabindex="0" class="sorting"> Store
                                                Name
                                            </th>
                                            <th aria-label="City: activate to sort column ascending"
                                                style="width: 81px;" colspan="1" rowspan="1"
                                                aria-controls="dataTables-example" tabindex="0" class="sorting">Phone
                                            </th>
                                            <th aria-label="Store Name: activate to sort column ascending"
                                                style="width: 78px;" colspan="1" rowspan="1"
                                                aria-controls="dataTables-example" tabindex="0" class="sorting">Address
                                            </th>
                                            <th aria-label="Original Price($): activate to sort column ascending"
                                                style="width: 75px;" colspan="1" rowspan="1"
                                                aria-controls="dataTables-example" tabindex="0" class="sorting">Store
                                                Image
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($stores as $store)
                                            <tr class="gradeA odd">
                                                <td class="text-center">{{ $loop->iteration	 }}</td>
                                                <td class="text-center">{{$store->name}}</td>
                                                <td class=" text-center">{{ $store->phone }}</td>
                                                <td class="text-center">{{ $store->address }}</td>
                                                <td class="text-center">
                                                    <img
                                                        src="{{ $store->logo }}"
                                                        height="45px"></td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <ul>
                                         {{$stores->links()}}
                                    </ul>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>
    <!--END PAGE CONTENT -->
@endsection
