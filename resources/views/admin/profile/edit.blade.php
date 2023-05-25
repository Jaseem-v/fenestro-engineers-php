@extends('layouts.admin')
@section('content')
    <script>
        function validateNumber(event) {
            var key = window.event ? event.keyCode : event.which;
            if (event.keyCode === 8 || event.keyCode === 46) {
                return true;
            } else if ( key < 48 || key > 57 ) {
                return false;
            } else {
                return true;
            }
        };
        $(document).ready(function(){
            $(".actionBtn_email").click(function(){
                email=$("#email").val();
                if(email == null || email== "")
                {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Enter Email</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)))
                {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Enter valid Email</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else
                {
                    $(this).html('<i class="fa fa-spinner fa-spin"></i> <span>Loading...</span>');
                    $(this).attr("disabled", true);
                    $("#basic-form_email").submit();
                }
            });


            $(".actionBtn_pwd").click(function(){
                current_password=$("#current_password").val();
                new_password=$("#new_password").val();
                c_password=$("#c_password").val();
                if(current_password == null || current_password== "")
                {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Enter Current Password</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else if(new_password == null || new_password== "")
                {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Enter New Password</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else if(new_password.length<8)
                {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Your Password must be  8 Character</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else if(c_password == null || c_password== "")
                {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Enter Confirm password</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else if(!(new_password == c_password))
                {
                    $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Confirm password do not match</div>");
                    $("html, body").animate({scrollTop:0},"slow");
                }
                else
                {
                    $(this).html('<i class="fa fa-spinner fa-spin"></i> <span>Loading...</span>');
                    $(this).attr("disabled", true);
                    $("#basic-form_pwd").submit();
                }
            });


        });
    </script>


    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-12 col-md-8 col-sm-12">
                        <h2><?=isset($pageTitle)?$pageTitle:''?></h2>
                        <hr/>
                    </div>





                </div>
            </div>

            <div class="row clearfix">




                <div class="col-md-3"></div>

                <div class="col-md-6">
                    <div class="card" style="border-color:#2b2e33">
                        <!--                        <div class="header">-->
                        <!--                            <h2>Basic Validation</h2>-->
                        <!--                        </div>-->
                        <!--                        <hr/>-->
                        <div class="body">

                            <div id="msg"> @if ($message = Session::get('edit_msg'))
                                    {!! $message !!}
                                @endif
                            </div>

@if(Auth::user()->role==1)
                            <form id="basic-form_email" method="post" action="{{route('admin.profile_change_email',$result->id)}}">
                                @csrf

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" maxlength="50" class="form-control" id="email" name="email" value="{{$result->email}}">
                                </div>

                                <br>
                                <button type="button" class="btn btn-primary actionBtn_email">Change Email</button>
                            </form>
<hr/>
@endif
                            <form id="basic-form_pwd" method="post" action="{{route('admin.profile_change_password',$result->id)}}">
                                @csrf

                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" maxlength="50" class="form-control" id="current_password" name="current_password" value="">
                                </div>


                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" maxlength="50" class="form-control" id="new_password" name="new_password" value="">
                                </div>


                                <div class="form-group">
                                    <label>Confirm password</label>
                                    <input type="password" maxlength="50" class="form-control" id="c_password" name="c_password" value="">
                                </div>

                                <br>
                                <button type="button" class="btn btn-primary actionBtn_pwd">Change password</button>
                            </form>






                        </div>
                    </div>
                </div>

                <div class="col-md-3"></div>



            </div>
        </div>




    </div>
@endsection
