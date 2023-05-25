@extends('layouts.admin')
@push('custom-style')
<link rel="stylesheet" href="{{url('assets/admin/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}">
<link rel="stylesheet" href="{{url('assets/admin/vendor/chartist/css/chartist.min.css')}}">
<link rel="stylesheet" href="{{url('assets/admin/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css')}}">
@endpush

@push('custom-scripts')
    <script src="{{url('assets/admin/js/index.')}}"></script>

    {{--<script src="{{url('assets/admin/bundles/libscripts.bundle.js')}}"></script>--}}
{{--<script src="{{url('assets/admin/bundles/vendorscripts.bundle.js')}}"></script>--}}
{{--<script src="{{url('assets/admin/bundles/morrisscripts.bundle.js')}}"></script><!-- Morris Plugin Js -->--}}
{{--<script src="{{url('assets/admin/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->--}}
{{--<script src="{{url('assets/admin/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob-->--}}
{{--<script src="{{url('assets/admin/bundles/mainscripts.bundle.js')}}"></script>--}}
{{--<script src="{{url('assets/admin/bundles/morrisscripts.bundle.js')}}"></script>--}}
{{--<script src="{{url('assets/admin/js/pages/blog.js')}}"></script>--}}
@endpush

@section('content')



    {{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
    {{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">Dashboard</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    You are logged in!--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div id="main-content">--}}
{{--    <div class="container-fluid">--}}
{{--    </div>--}}
{{--</div>--}}






{{--<div id="main-content">--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="block-header">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-5 col-md-8 col-sm-12">--}}
{{--                    <h2>Dashboard</h2>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}



{{--    </div>--}}
{{--</div>--}}


    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Dashboard</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    </div>
                </div>
            </div>

            <div class="row clearfix">
            </div>



        </div>
    </div>

@endsection
