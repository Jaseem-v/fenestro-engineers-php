@extends('layouts.app', ['title' => 'About'])
@section('content')

<section class="pager-section">
    <div class="container">
        <div class="pager-content text-center">
            <h2>About Us</h2>
            <ul>
                <li><a href="{{url('')}}" title="">Home</a></li>
                <li><span>About</span></li>
            </ul>
        </div><!--pager-content end-->
        <h2 class="page-titlee">Fenestro</h2>
    </div>
</section>




<!--Start About One-->
<section class="about-one about-one--two">
    <div class="container">
        <div class="row">
            <!--Start About One Img Box-->
            <div class="col-md-6">
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
            <div class="col-md-6">
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



                </div>
            </div>

            <div class="col-md-12">
                <!-- <ul class="about-one__content-list">
                    <li>
                        <div class="title">
                            <h3>Excellence</h3>
                        </div>
                    </li>

                    <li>
                        <div class="title">
                            <h3> Reliability</h3>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <h3>Customized Solutions</h3>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <h3>Customer Satisfaction.</h3>
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <h3>Good Team</h3>
                        </div>
                    </li>

                </ul> -->

            </div>
            <!--End About One Content-->
        </div>
    </div>
</section>
<!--End About One-->


<div class="about__swiper">

    <div class="swiper-container about__swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">

                <img src="{{url('')}}/assets/img/sliders/slider-1.png" alt="gallery-1">
            </div>
            <div class="swiper-slide">

                <img src="{{url('')}}/assets/img/sliders/slider-2.png" alt="gallery-1">
            </div>
            <div class="swiper-slide">

                <img src="{{url('')}}/assets/img/sliders/slider3.png" alt="gallery-1">
            </div>
            <div class="swiper-slide">

                <img src="{{url('')}}/assets/img/sliders/slider4.png" alt="gallery-1">
            </div>
            <div class="swiper-slide">

                <img src="{{url('')}}/assets/img/sliders/slider5.png" alt="gallery-1">
            </div>
            <div class="swiper-slide">

                <img src="{{url('')}}/assets/img/sliders/slider-2.png" alt="gallery-1">
            </div>
            <div class="swiper-slide">

                <img src="{{url('')}}/assets/img/sliders/slider3.png" alt="gallery-1">
            </div>
            <div class="swiper-slide">

                <img src="{{url('')}}/assets/img/sliders/slider4.png" alt="gallery-1">
            </div>
            <div class="swiper-slide">

                <img src="{{url('')}}/assets/img/sliders/slider5.png" alt="gallery-1">
            </div>


        </div>


        <div class="about__swiper-prev">
            <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.2625 13.2375L3.5375 7.5L9.2625 1.7625L7.5 0L0 7.5L7.5 15L9.2625 13.2375Z" fill="#A99260" />
            </svg>

        </div>
        <div class="about__swiper-next">
            <svg width="10" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.737305 13.2375L6.4623 7.5L0.737305 1.7625L2.4998 0L9.9998 7.5L2.4998 15L0.737305 13.2375Z" fill="#A99260" />
            </svg>

        </div>
    </div>

</div>



<section class="chooseus-section ">

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
            <div class="col-lg-4 col-md-12 col-sm-12 content-column">
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
            <div class="col-lg-8 col-md-12 col-sm-12 inner-column">
                <div class="inner-content">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one wow fadeInDown animated animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInDown;">
                                <div class="inner-box">
                                    <figure class="icon-box">
                                        <img src="https://templatekit.tokomoo.com/doorkit/wp-content/uploads/sites/53/2021/12/people.png" alt="">
                                        <div class="icon-shape"></div>
                                    </figure>
                                    <h3>Quality Services</h3>
                                    <p>Kaoreet efficitur aliquam volut consequat sed imperdiet</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one wow fadeInDown animated animated animated" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms; animation-name: fadeInDown;">
                                <div class="inner-box">
                                    <figure class="icon-box">
                                        <img src="	https://templatekit.tokomoo.com/doorkit/wp-content/uploads/sites/53/2021/12/grid-2.png" alt="">
                                        <div class="icon-shape"></div>
                                    </figure>
                                    <h3>Expert Staff</h3>
                                    <p>Kaoreet efficitur aliquam volut consequat sed imperdiet</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one wow fadeInDown animated animated animated" data-wow-delay="400ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 400ms; animation-name: fadeInDown;">
                                <div class="inner-box">
                                    <figure class="icon-box">
                                        <img src="	https://templatekit.tokomoo.com/doorkit/wp-content/uploads/sites/53/2021/12/like-shapes-02.png" alt="">
                                        <div class="icon-shape"></div>
                                    </figure>
                                    <h3>Simple Pricing</h3>
                                    <p>Kaoreet efficitur aliquam volut consequat sed imperdiet</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one wow fadeInUp animated animated animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
                                <div class="inner-box">
                                    <figure class="icon-box">
                                        <img src="	https://templatekit.tokomoo.com/doorkit/wp-content/uploads/sites/53/2021/12/grid-2.png" alt="">
                                        <div class="icon-shape"></div>
                                    </figure>
                                    <h3>Available 24/7</h3>
                                    <p>Kaoreet efficitur aliquam volut consequat sed imperdiet</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one wow fadeInUp animated animated animated" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms; animation-name: fadeInUp;">
                                <div class="inner-box">
                                    <figure class="icon-box">
                                        <img src="https://templatekit.tokomoo.com/doorkit/wp-content/uploads/sites/53/2021/12/people.png" alt="">
                                        <div class="icon-shape"></div>
                                    </figure>
                                    <h3>Covering All Areas</h3>
                                    <p>Kaoreet efficitur aliquam volut consequat sed imperdiet</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one wow fadeInUp animated animated animated" data-wow-delay="400ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 400ms; animation-name: fadeInUp;">
                                <div class="inner-box">
                                    <figure class="icon-box">
                                        <img src="	https://templatekit.tokomoo.com/doorkit/wp-content/uploads/sites/53/2021/12/like-shapes-02.png" alt="">
                                        <div class="icon-shape"></div>
                                    </figure>
                                    <h3>100% Guranteed</h3>
                                    <p>Kaoreet efficitur aliquam volut consequat sed imperdiet</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="about__mv section-padding bg-f6f5ed">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about__mv-single">
                    <img src="{{url('')}}/assets/img/mission.svg" alt="" class="about__mv-img">
                    <div class="section-heading">
                        <h1 class="section-heading__title">
                            Our Mission
                        </h1>

                        <p class="section-heading__description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna.
                        </p>


                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="about__mv-single">
                    <img src="{{url('')}}/assets/img/vision.svg" alt="" class="about__mv-img">
                    <div class="section-heading">
                        <h1 class="section-heading__title">
                            Our Vision
                        </h1>

                        <p class="section-heading__description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna.
                        </p>


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection