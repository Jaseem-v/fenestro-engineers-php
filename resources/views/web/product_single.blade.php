@extends('layouts.app', ['title' => $product->product_name])
@section('content')
@push('custom-scripts')
<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
    $(document).ready(function() {
        $(".actionBtn").click(function() {
            fname = $(".fname").val();
            phone = $(".phoneTxt").val();
            email = $(".emailTxt").val();
            comment = $(".commentTxt").val();
            if (fname.trim() == null || fname.trim() == "") {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Enter Full Name</div>");
                // $("html, body").animate({scrollTop:1000},"slow");
            } else if (phone.trim() == null || phone.trim() == "") {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Enter Mobile</div>");
                // $("html, body").animate({scrollTop:1200},"slow");
            } else if (email.trim() == null || email.trim() == "") {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Enter Email</div>");
                // $("html, body").animate({scrollTop:1200},"slow");
            } else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Enter valid Email</div>");
                // $("html, body").animate({scrollTop:1200},"slow");
            } else if (comment.trim() == null || comment.trim() == "") {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Enter Message</div>");
                // $("html, body").animate({scrollTop:1200},"slow");
            } else {
                $(this).html('<i class="fa fa-spinner fa-spin" style="padding-left: 0px;\n' +
                    '    position: sticky;"></i> <span>Loading...</span>');
                $(this).attr("disabled", true);
                $("#contact_form").submit();
            }
        });
    });
</script>
@endpush
<!-- <div class="breadcrmb section-padding">
    <div class="container">
        <div class="breadcrmb__content">
            <div class="section-heading">
                <h3 class="section-heading__sub-title">Product</h3>

                <h1 class="section-heading__title">{{$product->product_name}}</h1>

                <p class="section-heading__description">
                    Home - Products - {{$product->product_name}}
                </p>

            </div>
        </div>
    </div>
</div> -->

<section class="pager-section">
    <div class="container">
        <div class="pager-content text-center">
            <h2>{{$product->product_name}}</h2>
            <ul>
                <li><a href="{{url('')}}" title="">Home</a></li>
                <li><a href="{{url('/products')}}" title="">products</a></li>
                <li><span>{{$product->product_name}}</span></li>
            </ul>
        </div><!--pager-content end-->
        <h2 class="page-titlee">Fenestro</h2>
    </div>
</section>


<div class="sdp section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">


                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper img-display-swiper">
                    <div class="swiper-wrapper">
                        @foreach($product_images as $product_image)
                        <div class="swiper-slide">
                            <div class="ImageWrapper">
                                <div class="AnimatedImage" style="background-image: url({{url('uploads/'.$product_image->image)}})">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div thumbsSlider="" class="swiper img-thumb-swiper">
                    <div class="swiper-wrapper">
                        @foreach($product_images as $product_image)
                        <div class="swiper-slide">
                            <img src="{{url('uploads/'.$product_image->image)}}" />
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="sdp__content">
                    <h1 class="sdp__title">{{$product->product_name}}</h1>
                    <p class="sdp__description">{{$product->description}}</p>
                    @if($color_json)
                    <form action="" class="w-100">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="sdp__select">
                                    <label class="sdp__label">
                                        Color
                                    </label>
                                    <div class="select">
                                        <!-- <select> -->
                                        @foreach($color_json as $color_json_item)<option value="{{$color_json_item->color_name}}">{{$color_json_item->color_name}}</option> @endforeach
                                        <!-- </select> -->
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="sdp__select">
                                    <label class="sdp__label">
                                        Design
                                    </label>

                                    <div class="select">
                                        <!-- <select> -->
                                        @foreach($color_json as $color_json_item)<option value="{{$color_json_item->color_value}}">{{$color_json_item->color_value}}</option> @endforeach
                                        <!-- </select> -->
                                    </div>
                                </div>

                            </div>


                        </div>

                    </form>
                    @endif


                    <div></div>

                    @if($features_json)


                    <label class="sdp__label">
                        Additional Features
                    </label>

                    <table class="sdp__table">
                        <tbody>
                            @foreach($features_json as $features_json_item)
                            <tr>
                                <th>{{$features_json_item->features}}</th>
                                <td>{{$features_json_item->feat_value}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif




                </div>
            </div>


        </div>
    </div>
</div>


<div class="booking section-padding bg-f6f5ed">
    <div class="container">
        <div class="section-heading">

            <h1 class="section-heading__title">
                Booking Form
            </h1>

            <p class="section-heading__description">
                Pellentesque sit amet porttitor eget dolor morbi non arcu.
                Vitae justo eget magna fermentum
                iaculis eu non
            </p>

        </div>







        <p id="msg">
            @if ($message = Session::get('contact_msg'))
            {!! $message !!}
            @endif
        </p>



        <form class="booking__form" method="post" id="contact_form" action="{{route('bookDemo_post')}}" name="myForm">
            @csrf
            <input type="hidden" name="product_name" value="{{$product->product_name}}">
            <input type="hidden" name="product_link" value="{{'product/'.$product->seo_url.'/'}}">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="booking__input fname" name="fname" placeholder="Full Name">
                </div>
                <div class="col-md-6">
                    <input type="text" class="booking__input phoneTxt" onkeypress="return isNumber(event)" name="phone" placeholder="Phone">
                </div>
                <div class="col-md-12">
                    <input type="text" class="booking__input emailTxt" name="email" placeholder="Email">
                </div>
                <div class="col-md-12">
                    <textarea class="booking__input commentTxt" name="support" id="support" cols="30" rows="8" placeholder="Message"></textarea>
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn booking__btn actionBtn">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection