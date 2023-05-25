<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{url('assets/admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/admin/vendor/animate-css/animate.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/admin/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{url('assets/admin/css/main.css')}}">
    <link rel="stylesheet" href="{{url('assets/admin/css/color_skins.css')}}">
    <script src="{{url('assets/admin/bundles/libscripts.bundle.js')}}"></script>
</head>
<body class="theme-blue">


                    <div class="container">
                        <div class="row justify-content-center align-items-center" style="height:100vh">


                            <div class="body" style="background-color:#fff;padding: 1.25rem;width:320px">
                                <h5>Login</h5>
                                <hr/>
                                <div id="msg">  @if(\Session::has('error'))
                                        <div class="alert alert-danger">
                                            {{\Session::get('error')}}
                                        </div>
                                    @endif
                                    @if(\Session::has('success'))
                                        {!!\Session::get('success')!!}
                                    @endif</div>

                                <form class="form-auth-small" id="auth-form" action="{{ route('login') }}" method="post">

                                    @csrf





                                    <div class="form-group">
                                                                <label>Email</label>
                                                                <input maxlength="50" type="text" class="@error('email') is-invalid @enderror form-control  username-txt" placeholder="Enter Username" name="email" value="{{ old('email') }}{{\Session::has('email')?\Session::get('email'):''}}" autofocus>

                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                @enderror
                                                            </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input maxlength="50"  placeholder="Password" type="password" class="@error('password') is-invalid @enderror form-control pwd-txt" name="password" value="">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                    @enderror

                                </div>


                                    <div class="form-group clearfix">
                                        <label class="fancy-checkbox element-left">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span>Remember me</span>
                                        </label>
                                    </div>
                                    <button type="button"  class="btn btn-primary btn-lg btn-block authBtn">login</button>


{{--                                    <div class="bottom">--}}
{{--                                        <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="page-forgot-password.html">Forgot password?</a></span>--}}
{{--                                        <span>Don't have an account? <a href="page-register.html">Register</a></span>--}}
{{--                                    </div>--}}



                                </form>

                                <hr/>
                                <div align="right">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="txt3">
                                            <i class="fa fa-lock"></i> Forgot Password?
                                        </a>
                                    @endif
                                </div>


                            </div>



                        </div>
                    </div>






</body>
<script>
    $(document).ready(function(){
        $(".authBtn").click(function(){

            if ( $(".username-txt").val() == null ||  $(".username-txt").val() == "")
            {
                $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Enter Email</div>");
                $("html, body").animate({scrollTop:0},"slow");
            }
            else if ( $(".pwd-txt").val() == null ||  $(".pwd-txt").val() == "")
            {
                $("#msg").html("<div class='alert alert-danger'><span data-dismiss='alert' class='close' onclick=this.parentElement.style.display='none';>&times;</span><i class='fa fa-warning'></i>  Please Enter Password</div>");
                $("html, body").animate({scrollTop:0},"slow");
            }
            else
            {
                $(this).html('<i class="fa fa-spinner fa-spin"></i> <span>Loading...</span>');
                $(this).attr("disabled", true);
                $("#auth-form").submit();
            }
        });
    });
</script>
</html>
