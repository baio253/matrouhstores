@extends('layouts.app')

@section('content')
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="page-content">
                <div class="account-login">
                    <div class="col-sm-12 col-md-12 col-xs-12">
                        <div class="box-authentication">
                            <h4>Register</h4>
                            <p>Create your very own account</p>
                            <form enctype="multipart/form-data" method="POST" action="{{ route('register') }}">
                                @csrf

                                <label for="first_name">First Name<span class="required">*</span></label>
                                <input type="text" id="first_name" name="first_name"
                                       class="form-control @error('first_name') is-invalid @enderror"
                                       placeholder=" Enter your first name " value="{{ old('first_name') }}" autofocus
                                       required/>
                                @error('first_name')
                                <div>
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                </div>
                                @enderror
                                <label for="last_name">Last Name<span class="required">*</span></label>
                                <input type="text" id="last_name" name="last_name"
                                       class="form-control @error('last_name') is-invalid @enderror"
                                       placeholder=" Enter your last name " value="{{ old('last_name') }}"
                                       required/>
                                @error('last_name')
                                <div>
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                </div>
                                @enderror
                                <label for="phone"> Phone <span class="required">*</span></label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                       id="phone"
                                       placeholder=" Enter your mobile number " name="phone"
                                       value="{{ old('phone') }}"
                                       onkeypress="return isNumber(event)" required>
                                @error('phone')
                                <div>
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                </div>
                                @enderror
                                <label for="email"> Email <span class="required">*</span></label>
                                <input type="email" maxlength="50" id="email" name="email"
                                       placeholder=" Enter Your Email "
                                       class="form-control @error('email') is-invalid @enderror span5"
                                       value="{{ old('email') }}" required/>
                                @error('email')
                                <div>
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                </div>
                                @enderror
                                <label for="password"> Password <span class="required">*</span></label>
                                <input type="password" minlength="6" maxlength="75" id="password"
                                       name="password"
                                       placeholder=" Mimimum 6 characters "
                                       class="form-control @error('password') is-invalid @enderror" required
                                       autocomplete="new-password"/>
                                @error('password')
                                <div>
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                </div>
                                @enderror
                                <label for="password-confirm">Confirm Password <span
                                        class="required">*</span></label>
                                <input type="password" id="password-confirm"
                                       name="password_confirmation"
                                       placeholder=" Mimimum 6 characters "
                                       class="form-control" required autocomplete="new-password"/>
                                <button type="submit" id="register_submit" class="button"><i
                                        class="icon-user icons"></i>&nbsp; <span> Register </span></button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('_service-aria')
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
@endsection
