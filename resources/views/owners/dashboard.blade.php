@extends('layouts.owner')
@section('content')
    <!--PAGE CONTENT -->
    <div class=" container">
        <div class="inner" style="min-height: 700px;">
            <div class="row" style="margin: 50px auto">
                <div class="col-lg-12">
                    <div class="box">
                        <header style="margin-bottom: 50px">
                            <div class="icons"><i class="icon-dashboard"></i></div>
                            <h5> Merchant Dashboard
                            </h5>
                        </header>
                        <div class="col-lg-12">
                            <div style="text-align: center;">

                                <a class="quick-btn1 active"
                                   href="{{ route('owner.products') }}">
                                    <i class="icon-check icon-2x"></i>
                                    <span>
                                Active Products
                                 </span>
                                    <span class="label label-danger"> 5</span>
                                </a>
                                <a class="quick-btn1" href="#">
                                    <i class="icon-check-minus icon-2x"></i>
                                    <span> Sold Products
                                </span>
                                    <span class="label label-success">2 </span>
                                </a>

                                <a class="quick-btn1" href="#">
                                    <i class="icon-cloud-upload icon-2x"></i>
                                    <span>
                            Active Deals
                                </span>
                                    <span class="label label-warning">0</span>
                                </a>
                                <a class="quick-btn1" href="#">
                                    <i class="icon-external-link icon-2x"></i>
                                    <span> Expired Deals   </span>
                                    <span class="label btn-metis-2">0</span>
                                </a>

                                <a class="quick-btn1" href="#">
                                    <i class="icon-check icon-2x"></i>
                                    <span>
                                Stores
                                </span>
                                    <span class="label label-danger">{{ count(\Illuminate\Support\Facades\Auth::user()->stores) }}</span>
                                </a>
                            </div>

                            <div style="height:30px"></div>

                        </div>
                    </div>
                </div>
            </div>
    <!--END MAIN WRAPPER -->
@endsection


