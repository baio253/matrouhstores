@extends('layouts.app')
@section('content')

    <div id="mainBody">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul>
                            <li><a href="/"> Home </a> <span class="divider">/</span></li>
                            <li class="active"> Owner Sign up</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="span12">
                            <h3> Welcome to owners sign up !</h3>
                            <p> You will now be guided through a few steps to create your own personal online store !
                            </p>
                            <div class="content forms_new">
                                <form method="POST" action="{{ route('stores.store') }}"
                                      class="testform" id="testform"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="personal-data">
                                        <div class="col-md-6">
                                            <h4 style="padding:10px;background:#eee;"> Create your store </h4>
                                            <div class="w-100">
                                                <div class="span5 w-100">
                                                    <label for="name"> Store Name
                                                        (English):<span class="text-sub">*</span></label>
                                                    <input type="text" id="name" maxlength="150" name="name"
                                                           class="form-control @error('store_name') is-invalid @enderror span5"
                                                           placeholder=" Enter Your Store Name"
                                                           value="{{ old('store_name') }}" required/>
                                                    @error('store_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong></span>
                                                    @enderror

                                                    <label for="store_phone"> Phone :<span class="text-sub">*</span></label>
                                                    <input type="text" id="store_phone" maxlength="16" required="required"
                                                           name="store_phone" placeholder=" Enter Your Contact number  "
                                                           class="form-control @error('store_phone') is-invalid @enderror span5"
                                                           value="{{ old('store_phone') }}"
                                                           onkeypress="return isNumber(event)"
                                                           data-minlength="15" data-maxlength="15"
                                                           data-error="Less Number">
                                                    <div id="store_pho_error_msg">
                                                        @error('store_phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <label for="address"> Address
                                                        (English):<span class="text-sub">*</span></label>
                                                    <input type="text" id="address" name="address"
                                                           placeholder=" Enter Your Address1   English"
                                                           class="form-control @error('address') is-invalid @enderror span5"
                                                           value="{{ old('address') }}">
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                    <label for="category"> Store Category :<span
                                                            class="text-sub">*</span></label>
                                                    <select class="span5 text-capitalize" name="category" id="category"
                                                            required>
                                                        <option selected>-- Select Category --</option>
                                                        @foreach(\App\Category::all() as $category)
                                                            <option value="{{$category->id}}"
                                                                    class="text-capitalize">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="span5">
                                                    <label for="logo"><span class="text-sub"></span></label>
                                                    <label for="logo"> Upload images :<span class="text-sub">
                                                            * (image size must be 455 x 378 pixels )</span>*JPG,PNG</label>
                                                    <input type="file" placeholder="455 x 378"
                                                           class="form-control @error('logo') is-invalid @enderror span5"
                                                           id="logo" name="logo"
                                                           required>
                                                    <span style="color:red">
                                                        @error('logo')
                                                            <span class="invalid-feedback" role="alert">
                                                                 <strong>{{ $message }}</strong>
                                                             </span>
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <h4 style="padding:10px;background:#eee;"> Personal Details </h4>
                                            <div class="">
                                                <div class="span5">
                                                    <label for="first_name"> First name :<span
                                                            class="text-sub">*</span></label>
                                                    <input type="text" maxlength="100" id="first_name" name="first_name"
                                                           placeholder=" Enter Your First Name  "
                                                           class="form-control @error('first_name') is-invalid @enderror span5"
                                                           value="{{ old('first_name') }}" required>
                                                    @error('first_name')
                                                    <div>
                                                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                         </span>
                                                    </div>
                                                    @enderror
                                                    <label for="last_name"> Last name :<span
                                                            class="text-sub">*</span></label>
                                                    <input type="text" id="last_name" maxlength="100"
                                                           class="form-control  @error('last_name') is-invalid @enderror span5"
                                                           name="last_name" value="{{ old('last_name') }}"
                                                           placeholder=" Enter Your Last Name  " required>
                                                    @error('last_name')
                                                    <div>
                                                         <span class="invalid-feedback" role="alert">
                                                             <strong>{{ $message }}</strong>
                                                         </span>
                                                    </div>
                                                    @enderror
                                                    <label for="email"> E-mail :<span class="text-sub">*</span></label>
                                                    <input type="email" id="email"
                                                           class="form-control @error('email') is-invalid @enderror span5"
                                                           name="email" value="{{ old('email') }}"
                                                           placeholder=" Enter your Email Id"
                                                           required>
                                                    <div id="email_id_error_msg"
                                                         style="color:#F00;font-weight:800">
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <label for="phone"> Contact Number :<span class="text-sub">*</span></label>
                                                    <input type="text" id="phone" maxlength="16"
                                                           class="form-control  @error('phone') is-invalid @enderror span5"
                                                           name="phone" value="{{ old('phone') }}"
                                                           placeholder=" Enter Your Contact number  "
                                                           onkeypress="return isNumber(event)" data-minlength="15"
                                                           data-maxlength="15" data-error="Less Number" required/>
                                                    @error('phone')
                                                    <div>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit_btn_form">
                                        <div class="form-controls"><input type="submit" value="Submit"
                                                                          id="submit-button"
                                                                          class="simple-form-button btn btn-success">
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    </div>
    <script>
        /* Mobile Number Validation */

        function isNumber(evt) {

            evt = (evt) ? evt : window.event;

            var charCode = (evt.which) ? evt.which : evt.keyCode;

            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

                return false;

            }

            return true;

        }


    </script>
    <!-- MainBody End ============================= -->
@endsection
