@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Choose Store</div>
                    <div class="card-body">
                        <form  method="POST" action="{{ route('products.create.product') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="store" class="col-md-4 col-form-label text-md-right">Store</label>
                                <div class="col-md-6">
                                    <select onchange="this.form.submit()" name="store" id="store" class="custom-select text-capitalize" required>
                                        <option selected></option>
                                        @foreach($stores as $store)
                                            <option value="{{$store->id}}"
                                                    class="text-capitalize">{{$store->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
