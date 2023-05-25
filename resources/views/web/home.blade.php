@extends('layouts.app')
@section('content')
@push('custom-scripts')
<script>
    $(document).ready(function() {
        $(".actionBtn").click(function() {
            fname = $(".fname").val();
            place = $(".place").val();
            file = $(".file");
            comment = $(".commentTxt").val();
            var maxSize = '50100';
            if (fname.trim() == null || fname.trim() == "") {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Enter Full Name</div>");
            } else if (place.trim() == null || place.trim() == "") {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Enter Place</div>");
            } else if (file.val() == null || file.val() == "") {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Select Image</div>");
            } else if (!/(\.gif|\.jpg|\.jpeg|\.png|\.JPEG|\.JPG|\.PNG)$/i.test(file.val())) {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Select Only Image File(Eg: .gif, .jpg, .png etc)...</div>");
            } else if ((file[0].files[0].size / 1024) > maxSize) {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> File size must under 5 MB!...</div>");
            } else if (comment.trim() == null || comment.trim() == "") {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Enter Your Feedback</div>");
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

<div class="testimonial__popup">
    <form class="contact__form" method="post" id="contact_form" action="{{route('testimonial_post')}}" name="myForm" enctype="multipart/form-data">
        @csrf
        <div class="d-flex align-items-center justify-content-end">
            <h6>
                x
            </h6>
        </div>
        <p id="msg"></p>
        <input type="text" name="fname" class="contact__form-input fname" name="fname" placeholder="Name *">
        <input type="text" name="place" class="contact__form-input place" placeholder="Place">
        <input type="file" name="image" class="contact__form-input file" placeholder="Image">
        <textarea name="description" id="text-area" cols="30" rows="5" class="contact__form-input commentTxt" placeholder="Enter your feedback"></textarea>
        <button type="button" class="land-nav__btn btn land-btn footer__news-letter-btn actionBtn">
            Send
        </button>
    </form>

</div>



<!--Main Slider Start-->
<section class="main-slider main-slider-one main-slider-one--two">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true, "effect": "fade", "pagination": {
            "el": "#main-slider-pagination",
            "type": "bullets",
            "clickable": true
            },
            "navigation": {
            "nextEl": "#main-slider__swiper-button-next",
            "prevEl": "#main-slider__swiper-button-prev"
            },
            "autoplay": {
            "delay": 7000
            }}'>

        <div class="swiper-wrapper">

            @foreach($slider as $slider_item)
            <!--Start Single Swiper Slide-->
            <div class="swiper-slide">
                <div class="image-layer" style="background-image: url({{url('uploads/'.$slider_item->file.'.webp')}});">
                </div>
                <div class="main-slider-one__overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider-one__inner">
                                <div class="border-box"></div>
                                <p class="main-slider-one__text">{{$slider_item->top_title}}</p>
                                <h2 class="main-slider-one__title">{!! $slider_item->heading !!}</h2>
                                @if($slider_item->btn1Visible=='1')
                                <div class="main-slider-one__btn">
                                    <a href="{{$slider_item->btn1Url}}" class="thm-btn btn">{{$slider_item->btn1Title}}</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Single Swiper Slide-->
            @endforeach


        </div>

        <!-- If we need navigation buttons -->
        <div class="swiper-pagination" id="main-slider-pagination"></div>
        <div class="main-slider__nav">
            <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
            <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</section>
<!--Main Slider End-->

<!-- <img src="assets/img/banner-1.jpg" alt=""> -->

<!--Start About One-->
<section class="about-one about-one--two">
    <div class="container">
        <div class="row">
            <!--Start About One Img Box-->
            <div class="col-xl-6">
                <div class="about-one__img">
                    <div class="shape1 zoom-fade"><img src="https://alori-html.vercel.app/assets/images/shapes/about-v1-shape1.png" alt="" />
                    </div>
                    <div class="about-one__img1">
                        <img src="{{url('')}}/assets/img/new/about1.jpg" alt="" />
                    </div>

                    <div class="about-one__img2">

                        <img src="{{url('')}}/assets/img/new/about2.jpg" alt="" />
                    </div>
                </div>
            </div>
            <!--End About One Img Box-->



            <!--Start About One Content-->
            <div class="col-xl-6">
                <div class="about-one__content">
                    <div class="sec-title">
                        <span class="sec-title__tagline">Unlocking Possibilities</span>
                        <h2 class="sec-title__title">Discover Fenestro's Unparalleled Door Solutions</h2>
                    </div>

                    <div class="about-two__content-text1">
                        <p>Welcome to Fenestro, your ultimate destination for
                            top-notch solutions catering to all your wall opening needs in both
                            residential and commercial segments. We pride ourselves on offering an
                            end-to-end solution that encompasses a wide range of door options,
                            ensuring unmatched quality and innovation. </p>
                    </div>

                    <div class="about-two__content-text2">
                        <p>At Fenestro, we understand the importance of a well-designed space, and our unique features
                            truly set us apart. Our doors are not only visually stunning but also possess a plethora of
                            remarkable characteristics. Imagine doors that are not just strong and impact-resistant, but
                            also possess the remarkable ability to resist bacteria, chemicals, fire, and radiation. With
                            Fenestro, you can enjoy a peaceful and serene environment as our doors are designed to
                            combat noise and ensure a tranquil atmosphere. Furthermore, our doors are not only durable
                            but also lightweight, making them a breeze to operate and maintain. </p>
                    </div>

                    <!-- <ul class="about-one__content-list">
                        <li>
                            <div class="icon">
                                <span class="icon-wood-board"></span>
                            </div>

                            <div class="title">
                                <h3>Hardwood door Care Center</h3>
                            </div>
                        </li>

                        <li>
                            <div class="icon">
                                <span class="icon-customer-satisfaction-1"></span>
                            </div>

                            <div class="title">
                                <h3>High-Quality doorings At Great Prices</h3>
                            </div>
                        </li>
                    </ul> -->

                </div>
            </div>
            <!--End About One Content-->
        </div>
    </div>
</section>
<!--End About One-->



<!--Start Services Two-->
<section class="services-two">
    <div class="container">
        <div class="sec-title text-center">
            <h2 class="sec-title__title">Our Category</h2>
            <p class="sec-title__text">Our design services starts and ends with a best in class experience<br>
                strategy that builds brands.</p>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="services-two__carousel">    
                    @foreach($prod_categories as $prod_categories_item)
                    <!--Start Single Services Two-->
                    <div class="services-two__single wow animated fadeInUp" data-wow-delay="0.1s">
                        <div class="services-two__single-img">
                            <img src="{{url('uploads/'.$prod_categories_item->file.'.webp')}}" alt="" />
                            <div class="icon">
                                <span class="icon-carpet"></span>
                            </div>
                        </div>

                        <div class="services-two__single-content text-center">
                            <h2><a href="#">{{$prod_categories_item->title}}</a></h2>

                        </div>
                    </div>
                    <!--End Single Services Two-->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Services Two-->



<div class="about section-padding about--2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about__left">
                    <img src="{{url('')}}/assets/img/new/services1.jpg" alt="" class="about__img about__img--1">
                    <img src="{{url('')}}/assets/img/new/services2.jpg" alt="" class=" about__img about__img--2">
                </div>
            </div>
            <div class="col-md-6">
                <div class="about__right">

                    <div class="section-heading">
                        <h3 class="section-heading__sub-title">
                            Open the Door to Excellence:
                        </h3>

                        <h1 class="sec-title__title m-0">

                            Discover Our Premium Door Solutions!"
                        </h1>

                        <p class="sec-title__text">

                            Discover the perfect doors to elevate your space at Fenestro Engineers. Our extensive range offers stylish,
                            functional, and durable options for every architectural style. From elegant entry doors to seamless interior
                            designs, our meticulous attention to detail ensures excellence in design and quality.
                        </p>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<section class="projects-one projects-one--protfolio">
    <div class="container">
        <div class="row">


            @foreach($products as $product_item)
            @php
            $product_image=DB::table('product_images')->where('product_id',$product_item->id)->first();
            @endphp
            <!-- echo $product_item; -->
            <!--Start Single Projects One-->
            <div class="col-xl-3 col-md-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="projects-one__single">
                    <div class="projects-one__single-img">
                        @if($product_image)<img src="{{url('uploads/'.$product_image->image)}}" alt="" />@endif
                    </div>

                    <div class="projects-one__single-content">
                        <!-- <span>Hardwood</span> -->
                        <h2><a href="{{route('product_single',[$product_item->seo_url])}}/">{{$product_item->product_name}}</a></h2>
                        <!-- <p>Volutpat lacus laoreet curabitur. Cursus turpis in eu mi bibendum </p> -->

                        <!-- <div class="btn-box">
                                    <a href="products-single.html"><span class="icon-next"></span></a>
                                </div> -->
                    </div>
                </div>
            </div>
            <!--End Single Projects One-->
            @endforeach



        </div>

        <div class="d-flex align-items-center justify-content-center mt-3">
            <a href="{{url('')}}/products" class="btn">View More</a>
        </div>


    </div>

</section>
<!--End Projects One-->


<div class="about section-padding about--3">
    <div class="container">
        <div class="row row_sm_reverese">

            <div class="col-md-6">
                <div class="about__right">

                    <div class="section-heading">
                        <h3 class="section-heading__sub-title">
                            Unlocking Extraordinary Services
                        </h3>

                        <h1 class="sec-title__title">
                            Explore our service
                        </h1>

                        <p class="sec-title__text">
                            we offer a wide range of exceptional services to meet all your
                            door-related needs. Our expert team is dedicated to providing
                            superior craftsmanship, prompt installations, and efficient repairs.
                            Whether you require customized door solutions, professional consultations,
                            or reliable maintenance, our services are designed to exceed your expectations
                        </p>

                        <div class="services__content">

                            <div class="row">

                                <div class="col-md-12 col-lg-6">
                                    <div class="services__single mt-3">
                                        <div class="row">

                                            <div class="col-4">
                                                <div class="services__single-img-box">

                                                    <img src="https://templatekit.tokomoo.com/doorkit/wp-content/uploads/sites/53/2021/12/icon-01.png" alt="services" class="services__single-img">
                                                </div>
                                            </div>

                                            <div class="col-8">
                                                <div class="category__single-details services__details p-0">
                                                    <h6 class="category__single-title">
                                                        Window Services
                                                    </h6>
                                                    <h4 class="category__single-desc m-0 mt-3">
                                                        Lorem ipsum dolor sit amet consectetur adipiscing.

                                                    </h4>
                                                    <!-- <h6 class="category__single-icon">
                                                        <i class="	fa fa-arrow-right"></i>
                                                    </h6> -->
                                                </div>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="services__single mt-3">
                                        <div class="row">

                                            <div class="col-4">
                                                <div class="services__single-img-box">

                                                    <img src="https://templatekit.tokomoo.com/doorkit/wp-content/uploads/sites/53/2021/12/icon-03.png" alt="services" class="services__single-img">
                                                </div>
                                            </div>

                                            <div class="col-8">
                                                <div class="category__single-details services__details p-0">
                                                    <h6 class="category__single-title">
                                                        Window Installation
                                                    </h6>
                                                    <h4 class="category__single-desc m-0 mt-3">
                                                        Lorem ipsum dolor sit amet consectetur adipiscing.

                                                    </h4>
                                                    <!-- <h6 class="category__single-icon">
                                                        <i class="	fa fa-arrow-right"></i>
                                                    </h6> -->
                                                </div>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="services__single mt-3">
                                        <div class="row">

                                            <div class="col-4">
                                                <div class="services__single-img-box">

                                                    <img src="https://templatekit.tokomoo.com/doorkit/wp-content/uploads/sites/53/2021/12/icon-04.png" alt="services" class="services__single-img">
                                                </div>
                                            </div>

                                            <div class="col-8">
                                                <div class="category__single-details services__details p-0">
                                                    <h6 class="category__single-title">
                                                        Door Services
                                                    </h6>
                                                    <h4 class="category__single-desc m-0 mt-3">
                                                        Lorem ipsum dolor sit amet consectetur adipiscing.

                                                    </h4>
                                                    <!-- <h6 class="category__single-icon">
                                                        <i class="	fa fa-arrow-right"></i>
                                                    </h6> -->
                                                </div>
                                            </div>

                                        </div>



                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="services__single mt-3">
                                        <div class="row">

                                            <div class="col-4">
                                                <div class="services__single-img-box">

                                                    <img src="https://templatekit.tokomoo.com/doorkit/wp-content/uploads/sites/53/2021/12/icon-02.png" alt="services" class="services__single-img">
                                                </div>
                                            </div>

                                            <div class="col-8">
                                                <div class="category__single-details services__details p-0">
                                                    <h6 class="category__single-title">
                                                        Door Installation
                                                    </h6>
                                                    <h4 class="category__single-desc m-0 mt-3">
                                                        Lorem ipsum dolor sit amet consectetur adipiscing.

                                                    </h4>
                                                    <!-- <h6 class="category__single-icon">
                                                        <i class="	fa fa-arrow-right"></i>
                                                    </h6> -->
                                                </div>
                                            </div>

                                        </div>



                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="about__left">
                    <img src="assets/img/about.jpg" alt="" class="about__img about__img--1">
                    <img src="assets/img/about-2.jpg" alt="" class=" about__img about__img--2">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="gallery section-padding">


    <div class="container">


        <div class="section-heading section-heading--center">
            <h3 class="section-heading__sub-title">
                GALLERY

            </h3>

            <h1 class="sec-title__title">
                Our Gallery
            </h1>



        </div>

        <div class="gallery-content" id="gallery-content">
            @foreach($gallery as $gallery_item)

            <a href="{{url('uploads/'.$gallery_item->image)}}" class="projects__btn gallery__img">
                <img src="{{url('uploads/'.$gallery_item->image)}}" alt="gallery">
            </a>
            @endforeach
        </div>


    </div>

</div>




<section class="chooseus-section bg-f6f5ed">

    <div class="container">

        <div class="section-heading">
            <h3 class="section-heading__sub-title">
                PEOPLE SAY ABOUT US
            </h3>
            <h1 class="sec-title__title">
                Why Choose Us
            </h1>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-12 content-column">
                <div class="content_block_2">
                    <div class="content-box">
                        <div class="inner-box" style="background-image: url(http://azim.commonsupport.com/Dormatic/assets/images/resource/chooseus-1.jpg);">
                            <div class="text">
                                <h2>25</h2>
                                <h5>years of <br>Smart Working experience</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 inner-column">
                <div class="inner-content">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-6 chooseus-block">
                            <div class="chooseus-block-one wow fadeInDown animated animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInDown;">
                                <div class="inner-box">
                                    <figure class="icon-box">
                                        <img src="https://templatekit.tokomoo.com/doorkit/wp-content/uploads/sites/53/2021/12/people.png" alt="">
                                        <div class="icon-shape"></div>
                                    </figure>
                                    <h3>Quality Services</h3>
                                    <p>We deliver superior door solutions, ensuring top-notch craftsmanship and durability.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-6 chooseus-block">
                            <div class="chooseus-block-one wow fadeInDown animated animated animated" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms; animation-name: fadeInDown;">
                                <div class="inner-box">
                                    <figure class="icon-box">
                                        <img src="	https://templatekit.tokomoo.com/doorkit/wp-content/uploads/sites/53/2021/12/grid-2.png" alt="">
                                        <div class="icon-shape"></div>
                                    </figure>
                                    <h3>Expert Staff</h3>
                                    <p>Our team consists of skilled professionals who possess extensive knowledge and expertise in the field of doors, providing you with expert advice and guidance.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-6 chooseus-block">
                            <div class="chooseus-block-one wow fadeInDown animated animated animated" data-wow-delay="400ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 400ms; animation-name: fadeInDown;">
                                <div class="inner-box">
                                    <figure class="icon-box">
                                        <img src="	https://templatekit.tokomoo.com/doorkit/wp-content/uploads/sites/53/2021/12/like-shapes-02.png" alt="">
                                        <div class="icon-shape"></div>
                                    </figure>
                                    <h3>Simple Pricing</h3>
                                    <p>We offer transparent and straightforward pricing options, eliminating any hidden costs or complexities.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-6 chooseus-block">
                            <div class="chooseus-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                                <div class="inner-box">
                                    <figure class="icon-box">
                                        <img src="	https://templatekit.tokomoo.com/doorkit/wp-content/uploads/sites/53/2021/12/grid-2.png" alt="">
                                        <div class="icon-shape"></div>
                                    </figure>
                                    <h3>Available 24/7</h3>
                                    <p>Our services are accessible round-the-clock, allowing you to reach us at any time for immediate assistance or inquiries.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-6 chooseus-block">
                            <div class="chooseus-block-one wow fadeInUp animated animated animated" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms; animation-name: fadeInUp;">
                                <div class="inner-box">
                                    <figure class="icon-box">
                                        <img src="https://templatekit.tokomoo.com/doorkit/wp-content/uploads/sites/53/2021/12/people.png" alt="">
                                        <div class="icon-shape"></div>
                                    </figure>
                                    <h3>Covering All Areas</h3>
                                    <p>We extend our services to all regions, ensuring that customers from various locations can benefit from our door solutions.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-6 chooseus-block">
                            <div class="chooseus-block-one wow fadeInUp animated animated animated" data-wow-delay="400ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 400ms; animation-name: fadeInUp;">
                                <div class="inner-box">
                                    <figure class="icon-box">
                                        <img src="	https://templatekit.tokomoo.com/doorkit/wp-content/uploads/sites/53/2021/12/like-shapes-02.png" alt="">
                                        <div class="icon-shape"></div>
                                    </figure>
                                    <h3>100% Guranteed</h3>
                                    <p>We stand behind the quality of our products and services, offering a complete satisfaction guarantee to our valued customers.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="testimonials section-padding">
    <div class="container">

        <div class="section-heading section-heading--center">
            <h3 class="section-heading__sub-title">
                PEOPLE SAY ABOUT US

            </h3>

            <h1 class="sec-title__title">
                Clients' Testimonials

            </h1>



        </div>


        <div class="testimonials__slider">



            @foreach($testimonials as $testimonial_item)
            <div class="testimonials__single">
                <div class="testimonials-qmark">
                    &#10077;
                </div>
                <!-- <div class="testimonials-pattern">
                        </div> -->
                <div class="testimonials-base">
                    <blockquote class="testimonials-text" cite="Strugatsky Brothers">{{$testimonial_item->description}}</blockquote>
                    <div class="testimonials-meta">
                        <div class="testimonials-userpic">
                            @if($testimonial_item->image)
                            <img src="{{url('uploads/'.$testimonial_item->image)}}" alt="user" />
                            @else
                            <img src="{{url('')}}/assets/img/new/avatar.jpg" alt="user" />
                            @endif
                        </div>

                        <div class="testimonials-meta-info">
                            <div class="testimonials-author"><cite>{{$testimonial_item->fname}}</cite></div>
                            <div class="testimonials-source"><span>{{$testimonial_item->place}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

</div>



<section class="testimonial__feedback section-padding">
    <div class="container">
        <div class="testimonial__feedback-content">
            <div class="section-heading">
                <h3 class="section-heading__sub-title ">
                    Your reviews matters !
                </h3>

                <h1 class="sec-title__title testimonial__feedback-title">
                    Add Your <span> Feedback </span>
                </h1>
            </div>

            <button class="btn testimonial__feedback-btn">
                Add Feedback
            </button>
        </div>
    </div>
</section>



<!-- Blog -->


<div class="blog section-padding bg-f6f5ed">
    <div class="container">
        <div class="section-heading">
            <h3 class="section-heading__sub-title">
                Building The Future
            </h3>

            <h1 class="sec-title__title">
                Latest From the <span> Blog </span>
            </h1>
        </div>

        <div class="blog__content">
            <div class="row blog__row">

                @foreach($blog as $blog_item)
                @php
                $content=strip_tags($blog_item->description);
                @endphp
                <div class="col-md-6 col-lg-4">
                    <div class="blog__single-items">
                        <img src="{{url('uploads/blog_300_'.$blog_item->file.'.webp')}}" alt="blog">
                        <div class="d-flex justify-content-between">
                            <h6 class="blog__name">{{\Carbon\Carbon::parse($blog_item->created_at)->format('d M Y')}}</h6>
                        </div>
                        <h1 class="blog__title">{{$blog_item->title}}</h1>
                        <p class="blog__para paragraph">{{(strlen($content) > 13) ? substr($content,0,10).'...' : $content}}</p>
                        <a href="{{route('blog_single',$blog_item->seo_url)}}/" class="blog__link">Read More</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection