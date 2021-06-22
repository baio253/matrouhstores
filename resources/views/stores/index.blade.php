@extends('layouts.app')
@section('content')


    <div class="breadcrumbs">

        <div class="container">

            <div class="row">

                <div class="col-xs-12">

                    <ul>

                        <li class="home"><a title="" href="/"> Home </a><span>&raquo;</span></li>

                        <li class=""><a title="Go to Home Page" href="{{ route('stores.index') }}"><strong>
                                    Stores </strong></a></li>


                    </ul>

                </div>

            </div>

        </div>

    </div>

    <section class="blog_post">

        <div class="container">
            <!-- Center column-->
            <div class="blog-wrapper">
                <div class="page-title">
                    <h2> Stores </h2>
                </div>
                <ul class="blog-posts">
                    @foreach($stores as $store)
                        <li class="post-item col-md-3">

                            <div class="blog-box"><a href="{{ route('stores.show', $store->id) }}">
                                    <img class="primary-img"
                                         src="{{ $store->logo }}"
                                         alt="{{ $store->name }}"></a>

                                <div class="blog-btm-desc">

                                    <div class="blog-top-desc">

                                        <center><h4> {{ $store->name }}

                                            </h4>

                                        </center>

                                    </div>

                                    <center style="margin-bottom: 20px;">
                                        <table border="0" class="table table-hover">

                                            <tr>

                                                <td> Deals</td>

                                                <td>:</td>

                                                <td> N/A</td>

                                            </tr>

                                            <tr>

                                                <td> Products</td>

                                                <td>:</td>

                                                <td>{{ count($store->products) > 0 ? count($store->products) : 'N/A'  }}</td>

                                            </tr>
                                        </table>

                                    </center>

                                    <a class="read-more str-det"
                                       href="{{ route('stores.show', $store->id) }}"> View
                                        Details </a></div>

                            </div>

                        </li>
                    @endforeach
                </ul>
                <div class="sortPagiBar">
                    <div class="pagination-area">
                        {{ $stores->links() }}
                    </div>
                </div>

            </div>

        </div>

        <!-- ./ Center colunm -->


        </div>

    </section>

    <!-- Main Container End -->

    <!-- service section -->

    @include('_service-aria')



@endsection
