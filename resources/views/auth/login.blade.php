@extends('layouts.app')

@section('content')

    <section class="main-container col1-layout">
        <div class="main container">
            <div class="col-12">
                <div class="page-content">
                    <div class="account-login">
                        <div class="box-authentication">
                            <h4> Login </h4>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <p class="before-login-text"> Welcome back! Sign in to your account </p>
                                <label for="email"> Email address <span class="required">*</span></label>
                                <!--	<input id="loginemail" required name="loginemail" type="email" class="form-control" placeholder=" Email address ">-->
                                <input id="email" required name="email" autofocus
                                       type="email" class="form-control @error('email') is-invalid @enderror"
                                       placeholder=" Email address"
                                       value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="password"> Password <span class="required">*</span></label>
                                <input id="password" required name="password"
                                       placeholder=" Mimimum 6 characters " type="password"
                                       class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p class="forgot-pass"><a href="{{ route('password.request') }}"> Lost
                                        your password ?</a></p>
                                <button id="login_submit" class="button"><i class="icon-lock icons"></i>&nbsp; <span> Login </span>
                                </button>
                            </form>
                        </div>
                        <div class="box-authentication">
                            <div class="register-benefits">
                                <h5> Dont have an account yet ? <a href="/register" style="color:#ff8400;"> Sign up</a>
                                </h5></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('_service-aria')
@endsection
