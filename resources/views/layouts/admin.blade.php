<!doctype html>
<html lang="en">
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Admin">
    <meta name="author" content="">
    <link rel="icon" href="{{url('admin/')}}favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{url('assets/admin/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/admin/vendor/animate-css/animate.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/admin/vendor/font-awesome/css/font-awesome.min.css')}}">

@stack('custom-style')


    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{url('assets/admin/css/main.css')}}">
    <link rel="stylesheet" href="{{url('assets/admin/css/color_skins.css')}}">
    <script src="{{url('assets/admin/bundles/libscripts.bundle.js')}}"></script>
    <link rel="stylesheet" href="{{url('assets/admin/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}">



    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}
<style>
    /*overlay*/
    .overlay{position: fixed;z-index:99999; left: 0;right: 0;bottom: 0;top: 0;background: rgba(255,255,255,0.6); display: flex;justify-content: center;align-items: center; width: 100%;height: 100%;text-align: center;}
    .overlay p{color: #ff0000;}
    .wrapper.ovr{
        -webkit-filter: blur(6px);
        -moz-filter: blur(6px);
        -o-filter: blur(6px);
        -ms-filter: blur(6px);
        filter: blur(6px);
    }
    /*overlay*/
</style>
</head>
<body class="theme-blue">

<!-- Page Loader -->

<!-- Overlay For Sidebars -->
<div class="overlay" style="display: none;"></div>

<div id="wrapper">



    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-brand">
                <a href="{{url('')}}">
{{--                    <img src="{{url('assets/img/logo.svg')}}" style="width: 25%;" alt="Logo" class="img-responsive logo">--}}
                    <span class="name">Fenestro  Admin</span>
                </a>
            </div>

            <div class="navbar-right">




                <ul class="list-unstyled clearfix mb-0">




                    <li>
                        <div class="navbar-btn btn-toggle-show">
                            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                        </div>
                        <a href="javascript:void(0);" class="btn-toggle-fullwidth btn-toggle-hide"><i class="fa fa-bars"></i></a>

                    </li>


                    <li>

                        <div id="navbar-menu">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                      <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu animated flipInY user-profile">
                                        <div class="d-flex p-3 align-items-center">
                                            <div class="drop-left m-r-10">
                                                <i class="fa fa-user-circle" aria-hidden="true"></i>

                                            </div>
                                            <div class="drop-right">
                                                <h4>Admin</h4>
                                            </div>
                                        </div>
                                        <div class="m-t-10 p-3 drop-list">
                                            <ul class="list-unstyled">
                                                <li><a href="{{route('admin.profile')}}"><i class="icon-settings"></i>Settings</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-power"></i>Logout</a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>




                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>



                </ul>

            </div>

        </div>

    </nav>






@yield('content')







    <!-- SIDE MENU START -->
    <div id="leftsidebar" class="sidebar">
        <div class="sidebar-scroll">
            <nav id="leftsidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="heading">Main</li>


                    @include('layouts.side_menu');






{{--                    <li {{isset($menu)?($menu==1?'class=active':''):''}}>--}}
{{--                        <a href="{{route('admin.users')}}"><i class="fa fa-shopping-cart"></i><span>Users</span></a>--}}
{{--                    </li>--}}



{{--                    <li {{isset($menu)?($menu==1?'class=active':''):''}}>--}}
{{--                        <a href="{{route('admin.devices')}}"><i class="fa fa-shopping-cart"></i><span>Stores</span></a>--}}
{{--                    </li>--}}


{{--                    <li {{isset($menu)?($menu==1?'class=active':''):''}}>--}}
{{--                        <a href="{{route('admin.digitalcard')}}"><i class="fa fa-plus-square"></i><span>New Card</span></a>--}}
{{--                    </li>--}}

{{--                    <li {{isset($menu)?($menu==2?'class=active':''):''}}>--}}
{{--                        <a href="{{route('admin.user_cards')}}"><i class="icon-screen-desktop"></i><span>User Cards</span></a>--}}
{{--                    </li>--}}




{{--                    <li {{isset($menu)?($menu==1?'class=active':''):''}}>--}}
{{--                        <a href="{{route('admin.members')}}"><i class="fa fa-calendar"></i><span>Users</span></a>--}}
{{--                    </li>--}}

{{--                        <li {{isset($menu)?($menu==2?'class=active':''):''}}>--}}
{{--                            <a href="{{route('admin.professional')}}"><i class="fa fa-television"></i><span>Profession</span></a>--}}
{{--                        </li>--}}


{{--                    <li {{isset($menu)?($menu==3?'class=active':''):''}}>--}}
{{--                        <a href="{{route('admin.qualification')}}"><i class="fa fa-television"></i><span>Qualification</span></a>--}}
{{--                    </li>--}}

{{--                    <li {{isset($menu)?($menu==4?'class=active':''):''}}>--}}
{{--                        <a href="{{route('admin.attendance')}}"><i class="fa fa-television"></i><span>Attendance</span></a>--}}
{{--                    </li>--}}


    {{----}}
                        {{--<li {{isset($menu)?($menu==3?'class=active':''):''}}>--}}
                            {{--<a href="{{url('admin/team')}}"><i class="fa fa-users"></i><span>Team</span></a>--}}
                        {{--</li>--}}
    {{----}}
    {{----}}
    {{----}}
    {{----}}
    {{----}}
                        {{--<li {{isset($menu)?($menu==4?'class=active':''):''}}>--}}
                            {{--<a href="{{url('admin/gallery')}}"><i class="fa fa-photo"></i><span>Gallery</span></a>--}}
                        {{--</li>--}}
    {{----}}
    {{----}}
                        {{--<li {{isset($menu)?($menu==5?'class=active':''):''}}>--}}
                            {{--<a href="{{url('admin/joinus')}}"><i class="fa fa-bell-o"></i><span>Join us</span></a>--}}
                        {{--</li>--}}
    {{----}}
    {{----}}
    {{----}}
    {{----}}
    {{----}}
    {{----}}
    {{----}}
{{--@if(Auth::user()->role==1)--}}
{{--                    <li class="heading">Franchises</li>--}}
{{--                    <li {{isset($menu)?($menu==101?'class=active':''):''}}>--}}
{{--                        <a href="{{route('admin.franchises')}}"><i class="fa fa-gear"></i><span>Franchises</span></a>--}}
{{--                    </li>--}}
{{--@endif--}}








                </ul>
            </nav>
        </div>
    </div>
    <!-- SIDE MENU END -->
{{--    <div class="modal fade" id="del_itm_Modal" tabindex="-1" role="dialog">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h4 class="title" id="defaultModalLabel">Delete</h4>--}}
{{--                </div>--}}
{{--                <div class="modal-body"> <h5>Do you really want to Delete?</h5></div>--}}
{{--                <div class="modal-footer" id="status_button">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

</div>
<!-- Javascript -->

<script src="{{url('assets/admin/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{url('assets/admin/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{url('assets/admin/bundles/morrisscripts.bundle.js')}}"></script>




<script src="{{url('assets/admin/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script src="{{url('assets/admin/vendor/parsleyjs/js/parsley.min.js')}}"></script>

<script src="{{url('assets/admin/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script> <!-- Bootstrap Colorpicker Js -->

@stack('custom-scripts')



<!-- Javascript -->


<script>
    function del_itm(del_id)
    {
        document.getElementById("status_button").innerHTML =('<button type="button" data-dismiss="modal" class="btn btn-default"><i class="fa fa-close"></i> Cancel</button><form id="delete-item" action="'+del_id+'" method="POST"><input name="_method" type="hidden" value="DELETE"> @csrf<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Delete</button></form>');
    }
    $(function() {
        // validation needs name of the element
        $('#food').multiselect();
        // initialize after multiselect
        $('#basic-form').parsley();
    });
</script>

<script>
    $('#showProfile').on('show.bs.modal', function (e) {
        var loadurl = $(e.relatedTarget).data('load-url');
        $(this).find('.modal-body').load(loadurl);
    });
</script>

</body>
</html>
