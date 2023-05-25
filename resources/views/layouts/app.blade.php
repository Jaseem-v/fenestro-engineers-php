<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title)?$title.' -':'' }} Fenestro Engineers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/justifiedGallery@3.8.1/dist/css/justifiedGallery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.3.2/swiper-bundle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.css">
    <link rel="stylesheet" href="{{url('assets/dist/style.css')}}">
    <link rel="shortcut icon" href="{{url('assets/img/logo.svg')}}" type="image/x-icon">
    @stack('custom-style')
</head>

<body>


    <main>

        <a href="https://api.whatsapp.com/send/?phone=%2B919207664000&text&type=phone_number&app_absent=0" class="whatsapp-float" target="_blank">
            <i class="fab fa-whatsapp whatsapp-float--icon"></i>
        </a>
        <!-- <div class="main-bg"> -->
        <nav class="nav nav--home" id="nav">
            <div class="container">
                <div class="nav__content">
                    <a href="{{url('')}}" class="nav__logo">
                        <img src="{{url('assets/img/logo.svg')}}" alt="logo" class="nav__img">
                        <!-- <h1>British Logo</h1> -->
                    </a>
                    <ul class="nav__list">

                        <!-- <li class="nav__li nav__list-title"><a href="#">Menu</a></li> -->
                        <!-- <li class="nav__li nav__li-link"><a href="#">Login</a></li> -->
                        <li class="nav__li"><a class="active" href="{{url('')}}">Home</a></li>
                        <li class="nav__li"><a href="{{route('about')}}/">About</a></li>
                        <li class="nav__li"><a href="{{route('bookDemo')}}/">Book A Demo</a></li>
                        <li class="nav__li"><a href="{{route('products')}}/"> Products</a></li>
                        <li class="nav__li"><a href="{{route('testimonial')}}/">Testimonials</a></li>
                        <li class="nav__li"><a href="{{route('gallery')}}/">Gallery</a></li>
                        <li class="nav__li"><a href="{{route('blog')}}/">Blog</a></li>
                    </ul>
                    <div class="btn-grp">

                        <a href="{{route('contact')}}/" class="btn btn--nav">
                            Contact us
                        </a>
                    </div>

                    <div class="nav__menu ">
                        <ul class="open-btn">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>

                </div>
            </div>
        </nav>



        <!--
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="header__left">
                        <div class="section-heading">
                            <h1 class="sec-title__title">
                                Lorem ipsum dolor sit consectetur amet
                            </h1>
                        </div>
                    </div>

                </div>
                <div class="col-md-5">

                    <div class="header__right">

                        <div class="section-heading">
                            <h1 class="sec-title__text">
                                Eiusm od tempor incididunt ut labore. Consectetur adipiscing elit, sed do.
                                Consectetur
                                adipiscing elit, sed do eiusm onsectetur adipiscing elit.
                            </h1>
                        </div>

                    </div>
                </div>
                <div class="col-md-2">

                    <div class="header__extr-right">


                        <div class="section-heading">
                            <h1 class="section-heading__sub-title">
                                <i class="bi bi-arrow-down"></i>
                            </h1>
                        </div>

                    </div>


                </div>
            </div>
        </div>

    </header> -->

        @yield('content')


        <!-- footer -->


        <footer class="footer section-padding">
            <div class="container">
                <ul class="footer__content">
                    <li class="footer__item">
                        <h2 class="footer__item-head">
                            <img src="{{url('assets/img/logo.svg')}}" alt="footer-logo">
                        </h2>
                        <ul class="footer__item-list">
                            <li class="footer__item-sub footer__item-sub--desc">
                                Fenestro provides end to
                                end solution for all types
                                of wall openings in both
                                residential and
                                commercial segments
                            </li>
                        </ul>
                    </li>
                    <li class="footer__item">
                        <h2 class="footer__item-head">
                            Office
                        </h2>
                        <ul class="footer__item-list">
                            <li class="footer__item-sub">
                                <a href="#" class="footer__item-sub-link">
                                    Door No.13, 1139-A, Mavoor Rd, Kuttikkattoor, Kerala 673016
                                </a>
                            </li>
                            <li class="footer__item-sub">
                                <a href="mailto:fenestroengineers@gmail.com" class="footer__item-sub-link">
                                    fenestroengineers@gmail.com
                                </a>
                            </li>
                            <li class="footer__item-sub">
                                <a href="tel:+919207664000" class="footer__item-sub-link">
                                    +91 92076 64000 <br>
                                    +91 98957 66011 <br>
                                    +91 77367 92999
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="footer__item">
                        <h2 class="footer__item-head">
                            Links
                        </h2>
                        <!-- 
                <li class="nav__li"><a href="{{url('')}}">Home</a></li>
                <li class="nav__li"><a href="">About</a></li>
                <li class="nav__li"><a href="{{route('bookDemo')}}/">Book A Demo</a></li>
                <li class="nav__li"><a href="{{route('products')}}/"> Products</a></li>
                <li class="nav__li"><a href="{{route('testimonial')}}/">Testimonials</a></li>
                <li class="nav__li"><a href="{{route('gallery')}}/">Gallery</a></li>
                <li class="nav__li"><a href="{{route('blog')}}/">Blog</a></li> -->


                        <ul class="footer__item-list">
                            <li class="footer__item-sub">
                                <a href="{{route('about')}}/" class="footer__item-sub-link">
                                    About Us
                                </a>
                            </li>
                            <li class="footer__item-sub">
                                <a href="{{route('testimonial')}}/" class="footer__item-sub-link">
                                    Testimonials
                                </a>
                            </li>
                            <li class="footer__item-sub">
                                <a href="{{route('products')}}/" class="footer__item-sub-link">
                                    Products
                                </a>
                            </li>
                            <li class="footer__item-sub">
                                <a href="{{route('gallery')}}/" class="footer__item-sub-link">
                                    Gallery
                                </a>
                            </li>
                            <li class="footer__item-sub">
                                <a href="{{route('blog')}}/" class="footer__item-sub-link">
                                    Blogs
                                </a>
                            </li>


                        </ul>
                    </li>
                    <li class="footer__item">
                        <h2 class="footer__item-head">
                            Social Media
                        </h2>
                        <ul class="footer__item-list">

                            <li class="footer__item-sub">
                                <a href="https://instagram.com/fenestro_engineers?igshid=MzRlODBiNWFlZA==" target="_blank" class="footer__item-sub-link">
                                    Instagram
                                </a>
                            </li>
                            <li class="footer__item-sub">
                                <a href="https://youtube.com/@FENESTROENGINEERS" class="footer__item-sub-link" target="_blank">
                                    Youtube
                                </a>
                            </li>
                            <li class="footer__item-sub">
                                <a href="https://api.whatsapp.com/send/?phone=%2B919207664000&text&type=phone_number&app_absent=0" class="footer__item-sub-link" target="_blank">
                                    Whatsapp
                                </a>
                            </li>


                        </ul>
                    </li>

                </ul>

                <div class="footer__copyright">
                    <h2 class="footer__copyright-text">
                        Copyright @ {{date('Y')}} Fenestro Engineers . inc. All rights reserved
                    </h2>

                    <h2 class="footer__copyright-text">
                        Powered by <a href="jaseem-v.me" target="_blank">Jaseem v </a>
                    </h2>


                </div>
            </div>

        </footer>







        <!-- </div> -->
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/justifiedGallery@3.8.1/dist/js/jquery.justifiedGallery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/9.3.2/swiper-bundle.min.js"></script>
    <script src="{{url('assets/js/main.js')}}"></script>
    @stack('custom-scripts')
</body>

</html>