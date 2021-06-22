<!DOCTYPE html>

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8"/>
    <title>Matrouh Stores | Owners Login Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <!-- GLOBAL STYLES -->
    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/magic.css') }}"/>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <!-- END PAGE LEVEL STYLES -->
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body style="background: #333333 !important; color: white !important;" oncontextmenu="return false">

<!-- PAGE CONTENT -->
<div class="container">
    <div class="text-center">
        <img src="{{ asset('/images/logo-footer.png') }}" alt="Logo"/></a>
    </div>

    <div class="tab-content">

        <div id="login" class="tab-pane active">

            <form method="POST" action="{{ route('login') }}" class="form-signin">
                @csrf
                <p class="text-muted text-center btn-block  btn-primary    disabled">
                    Owner LOGIN
                </p>
                <input type="text" name="email" value="{{ old('email') }}" placeholder="Email"
                       class="form-control @error('email') is-invalid @enderror"/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <input type="password" name="password" placeholder="Password"
                       class="form-control @error('password') is-invalid @enderror"/>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <button class="btn text-muted text-center  btn-warning" type="submit">Sign in</button>
            </form>

        </div>


        <div id="forgot" class="tab-pane">
            <form method="POST" action="https://demo.laravelecommerce.com/merchant_forgot_check" accept-charset="UTF-8"
                  class="form-signin"><input name="_token" type="hidden"
                                             value="iqhLNlAnZau2TT3ETVaEfvuKlmzoqn2wATBcsCNM">
                <div class="alert alert-danger alert-dismissable" id="error_name" align="center"
                     style="height:50px;width:298px;display:none;"></div>
                <div class="alert alert-success alert-dismissable" id="success_name" align="center"
                     style="height:50px;width:298px;display:none;"></div>
                <p class="text-muted text-center btn-block btn-primary btn-rect disabled">Enter your valid e-mail</p>
                <input type="email" required="required" placeholder="Your E-mail" name="merchant_email"
                       id="merchant_email" class="form-control"/>
                <br/>
                <button class="btn text-muted text-center btn-success" id="recover_password" type="submit">Recover
                    Password
                </button>
            </form>
        </div>
        <div id="signup" class="tab-pane">
            <form action="index.html" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Please Fill Details To Register</p>
                <input type="text" placeholder="First Name" class="form-control"/>
                <input type="text" placeholder="Last Name" class="form-control"/>
                <input type="text" placeholder="Username" class="form-control"/>
                <input type="email" placeholder="Your E-mail" class="form-control"/>
                <input type="password" placeholder="Password>" class="form-control"/>
                <input type="password" placeholder="Re type password" class="form-control"/>
                <button class="btn text-muted text-center btn-success" type="submit">Register</button>
            </form>
        </div>
    </div>
    <div class="text-center ">
        <ul class="list-inline">
            <!--<li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>-->
            <li><a class="text-muted" href="#login" style="display:none;" id="login_click" data-toggle="tab">Back To
                    Login</a></li>
            <li><strong><a class="text-muted" id="forgot_click" href="#forgot" data-toggle="tab">Forgot
                        Password</a></strong></li>
            <!-- <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>-->
        </ul>
    </div>


</div>

<!--END PAGE CONTENT -->

<!-- PAGE LEVEL SCRIPTS -->
<script src="https://demo.laravelecommerce.com/public/assets/plugins/jquery-2.0.3.min.js"></script>

<script>
    $(document).ready(function () {


        $('#forgot_click').click(function () {
            $('#login_click').show();
            $('#forgot_click').hide();


            $('#error_div').hide();
            $('#success_div').hide();
        });
        $('#login_click').click(function () {
            $('#forgot_click').show();
            $('#login_click').hide();


            $('#error_div').hide();
            $('#success_div').hide();
        });
        $('#error_div').fadeOut(3000);
        $('#success_div').fadeOut(3000);


        $('#recover_password').click(function () {
            $('#recover_password').prop('disabled', true);
            var merchant_email = $('#merchant_email');
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if (merchant_email.val() == '') {
                $('#error_name').show();
                merchant_email.css({border: '1px solid red'});
                merchant_email.focus();
                $('#error_name').html('Enter your email');
                $('#error_name').fadeOut(3000);
                $('#recover_password').prop('disabled', false);
                return false;
            } else if (!emailReg.test(merchant_email.val())) {
                $('#error_name').show();
                merchant_email.css({border: '1px solid red'});
                merchant_email.focus();
                $('#error_name').html('Enter your valid Email');
                $('#error_name').fadeOut(3000);
                $('#recover_password').prop('disabled', false);
                return false;
            } else {
                $('#error_name').hide();
                merchant_email.css({border: ''});
                $.post("https://demo.laravelecommerce.com/merchant_forgot_check",
                    {
                        merchant_email: merchant_email.val()
                    },
                    function (data, status) {
                        var result = data.split(":");
                        if (result[1] == "0") {
                            $('#success_name').show();
                            merchant_email.css({border: '1px solid red'});
                            merchant_email.focus();
                            $('#success_name').html(result[0]);
                            $('#success_name').fadeOut(3000);
                            $('#recover_password').prop('disabled', true);
                            $('#recover_password').prop('disabled', false);
                            return false;
                        } else if (result[1] == "1") {
                            $('#error_name').show();
                            merchant_email.css({border: '1px solid red'});
                            merchant_email.focus();
                            $('#error_name').html(result[0]);
                            $('#error_name').fadeOut(3000);
                            $('#recover_password').prop('disabled', false);
                            return false;
                        }
                        //alert("Data: " + data + "\nStatus: " + status);
                        //alert("Data: " + result[0] + "\nStatus: " + result[1]);
                    });
                return false;
            }

        });
    });

</script>


<script src="https://demo.laravelecommerce.com/public/assets/plugins/bootstrap/js/bootstrap.js"></script>
<script src="https://demo.laravelecommerce.com/public/assets/js/login.js"></script>
<!--END PAGE LEVEL SCRIPTS -->

</body>
<!-- END BODY -->
</html>
