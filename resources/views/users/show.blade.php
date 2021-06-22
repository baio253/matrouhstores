@extends('layouts.app')
@section('content')





    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- countdown js -->

    <style>

        .box-authentication {

            /*width: 37%;

            padding: 15px;

            border: 1px solid #ccc;

            margin: 2px;*/

        }

        .spanhelp {
            float: left;
            width: 100%
        }

        .spanlabel {
            width: 40%
        }

        .clearfix {
            margin-top: 5px;
        }

        .labelheader {
            float: left;
            width: 100%
        }

        .editiconLabel {
            float: right;
        }

    </style>









    <!-- start my work -->

    <section class="main-container col2-right-layout">

        <div class="main container">

            <div class="row">

                <div class="col-main col-sm-12 col-xs-12">

                    <div class="my-account">

                        <div class="page-title">

                            <h4>My Account</h4>

                        </div>

                    </div>

                    <!-- Main Container -->

                    <section class="main-container col1-layout">

                        <div class="">

                            <div class="page-content">

                                <div class="account-login">

                                    <div class="box-authentication">

                                        <!-- USER NAME SECTION -->

                                        <span class="cusnameSuccess"
                                              style="position: absolute;font-size: 15px;left: 30%;margin-top: -8px;color: #156f0b;font-weight: 600;"></span>

                                        <label for="emmail_login" class="labelheader"> Name <span class="editiconLabel"
                                                                                                  style="cursor:pointer;"
                                                                                                  id="toggleDiv"><i
                                                    class="fa fa-pencil"></i>  Edit  </span></label>

                                        <span class="help-block spanhelp">

															<span class="spanlabel"
                                                                  id="cusname">{{ Auth::user()->first_name }}</span>



														</span>


                                        <div style="display:none" id="username_div">
                                            <form action="" method="POST">
                                                @csrf
                                                <label for="first_name">First Name</label>
                                                <input id="first_name" name="first_name" type="text" autocomplete="off"
                                                       class="form-control "
                                                       value="{{ Auth::user()->first_name  }}">
                                                <label for="last_name">Last Name</label>
                                                <input id="username1" type="text" autocomplete="off"
                                                       class="form-control" value="{{ Auth::user()->last_name  }}">
                                                <div class="submit-text">
                                                    <button type="submit" class="button button-compare"
                                                            id="update_username">
                                                        <span>Update</span></button>

                                                    <button type="reset" class="button button-clear" style="color:#000"
                                                            id="cancel_username">&nbsp; <span> Cancel  </span></button>
                                                </div>
                                            </form>
                                        </div>


                                        <div class="clearfix"></div>

                                        <hr/>

                                        <!-- EMAIL -->

                                        <label for="emmail_login"> Email </label>

                                        <span class="help-block spanhelp">
                                            <span class="spanlabel">{{ Auth::user()->email }}</span>

														<div class="clearfix"><hr/></div>

														<div style="clear:both;"></div>

                                            <!-- PASSWORD SECTION -->

														<span class="passwordupdate"
                                                              style="position: absolute;font-size: 15px;left: 30%;margin-top: -8px;color: #156f0b;font-weight: 600;"></span>

														<span class="passwordupdatefails"
                                                              style="position: absolute;font-size: 15px;left: 30%;margin-top: -8px;color: #F00;font-weight: 600;"></span>

														<label for="emmail_login" class="labelheader"> Password   <span
                                                                class="editiconLabel" style="cursor:pointer;"
                                                                id="toggleDiv1"><i
                                                                    class="fa fa-pencil"></i>  Edit  </span></label>

														<span class="help-block spanhelp"><span class="spanlabel"
                                                                                                id="Password">*********</span>

														</span>



														<div style="display:none" id="password_div">
                                                            <form action="" method="post">
															<input id="oldpwd" type="password" class="form-control"
                                                                   placeholder=" Enter Your Old password  "><br/>
															<input type="password" class="form-control"
                                                                   placeholder=" Enter Your New password  "
                                                                   id="pwd"><br/>
															<input type="password" class="form-control"
                                                                   placeholder=" Enter Confirm Password  "
                                                                   id="confirmpwd"><br/>
															<div class="submit-text">
															  <button class="button button-compare"
                                                                      id="update_password"><span> Update  </span></button>
															  <button class="button button-clear" style="color:#000"
                                                                      id="cancel_password">&nbsp; <span> Cancel  </span></button>
															</div>
                                                            </form>
														</div>

														<div class="clearfix"></div>

														<hr/>

                                            <!-- PROFILE IMAGE SECTION -->

														<span class="profile_success"
                                                              style="position: absolute;font-size: 15px;left: 30%;margin-top: -8px;color: #156f0b;font-weight: 600;"></span>

														<span class="profile_error"
                                                              style="position: absolute;font-size: 15px;left: 30%;margin-top: -8px;color: #F00;font-weight: 600;"></span>

														<label for="emmail_login"
                                                               class="labelheader"> Profile image   <span
                                                                class="editiconLabel" style="cursor:pointer;"
                                                                id="toggleImage"><i
                                                                    class="fa fa-pencil"></i>  Edit  </span></label>

														<div style="display:none" id="image_div">
															<form method="POST"
                                                                  action="{{route('users.update')}}"
                                                                  class="form-horizontal loginFrm"
                                                                  enctype="multipart/form-data">
                                                                @csrf
																<div class="controls"> *Jpeg,Png
                                                                    <input type="hidden" name="id"
                                                                       value="{{Auth::user()->id}}">
																    <input type="file" class="input-file" name="photo"
                                                                       id="photo">

																    <span id="error_image"> </span>

																</div>
																<br>
																<span> image upload size 1[MB] </span><br><br>
																<div class="submit-text">

																  <button class="button button-compare" type="submit"
                                                                          id="update_image"><span> Update  </span></button>

																  <button class="button button-clear" type="button"
                                                                          style="color:#000"
                                                                          id="cancel_image">&nbsp; <span> Cancel  </span></button>

																</div>
															</form>
														</div>

														 <br>




														   <img src="{{ Auth::user()->photo}}" alt=""
                                                                width="100px" height="auto">



														<div style="clear:both;"></div>
                                                <div class="clearfix"></div>

                                        <hr/>

                                            <!-- end div -->
                                        </span>
                                    </div>


                                    <div class="box-authentication">

                                        <!-- PHONE NUMBER SECTION -->

                                        <span id="success_mobile"
                                              style="position: absolute;font-size: 15px;left: 68%;margin-top: -15px;color: #156f0b;font-weight: 600;"></span>

                                        <span id="error_mobile"
                                              style="position: absolute;font-size: 15px;left: 68%;margin-top: -15px;color: #f00;font-weight: 600;"></span>

                                        <label for="emmail_login" class="labelheader"> Phone Number <span
                                                class="editiconLabel" style="cursor:pointer;" id="toggleDiv2"><i
                                                    class="fa fa-pencil"></i>  Edit  </span></label>

                                        <span class="help-block spanhelp">

															<span class="spanlabel"
                                                                  id="cusphone">{{ Auth::user()->phone }}</span>

														</span>


                                        <div style="display:none" id="phonenumber_div">

                                            <input type="text" class="form-control"
                                                   value="{{ Auth::user()->phone }}" id="phonenum">

                                            <div class="submit-text">

                                                <button class="button button-compare" id="update_phonenumber"><span> Update  </span>
                                                </button>

                                                <button class="button button-clear" style="color:#000"
                                                        id="cancel_phonenumber">&nbsp; <span> Cancel  </span></button>

                                            </div>

                                        </div>


                                        <div class="clearfix"></div>

                                        <hr/>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </section>

                </div>


            </div>

        </div>

    </section>

    <!-- IMAGE UPLOAD SECTION -->


    <!-- EOF IMAGE UPLOAD SECTION -->

    <!-- end of my work -->


    <script>

        $(document).ready(function () {

            //USERNAME SECTION

            $('#toggleDiv').click(function () {

                $('#username_div').toggle();

            });


            $('#cancel_username').click(function () {

                $('#username_div').hide();

            });


            //PASSWORD SECTION

            $('#toggleDiv1').click(function () {

                $('#password_div').toggle();

            });

            $('#cancel_password').click(function () {

                $('#password_div').hide();

            });


            //PROFILE SECTION

            $('#file_submit').click(function () {

                if ($('#imgfile').val() == '') {

                    $('#error_image').html('Image field required!');

                    return false;


                }

                if ($('#imgfile').val() != '') {

                    var checkimage = /\.(jpe?g|png)$/i.test($('#imgfile').val());

                    if (!checkimage) {

                        $('#error_image').html('upload image like jpg,png,jpeg format');

                        return false;

                    }

                }

            });

            //PHONE NUMBER

            $('#toggleDiv2').click(function () {

                $('#phonenumber_div').toggle();

            });

            $('#cancel_phonenumber').click(function () {

                $('#phonenumber_div').hide();

            });

            //IMAGE

            $('#toggleImage').click(function () {

                $('#image_div').toggle();

            });


            $('#cancel_image').click(function () {

                $('#image_div').hide();

            });

        });
    </script>

    <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a> </div>

@endsection
