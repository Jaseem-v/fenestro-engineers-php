@extends('layouts.app', ['title' => 'Contact'])
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
<section class="pager-section">
    <div class="container">
        <div class="pager-content text-center">
            <h2>Contact Us</h2>
            <ul>
                <li><a href="{{url('')}}" title="">Home</a></li>
                <li><span>Contact us</span></li>
            </ul>
        </div><!--pager-content end-->
        <h2 class="page-titlee">Fenestro</h2>
    </div>
</section>



<!-- --contact us -->

<div class="contact section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact__left">

                    <div class="section-heading">

                        <h1 class="section-heading__title">
                            Get in touch with us
                        </h1>

                        <p class="section-heading__description">
                            Let's talk about your project . send us a message and we
                            will be in touch with in one business day.
                        </p>

                    </div>

                    <hr class="contact__hr">

                    <div class="contact__mail">
                        <div class="d-flex gap-4 align-items-center justify-content-space-between">
                            <div class="contact__mail-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact__mail-text">
                                <h2 class="contact__icon-label">Email</h2>
                                <h4>fenestroengineers@gmail.com</h4>
                            </div>
                        </div>
                        <div class="d-flex gap-4 align-items-center justify-content-space-between">
                            <div class="contact__mail-icon">
                                <i class="fa fa-phone"></i>
                            </div>

                            <div class="contact__mail-text">
                                <h2 class="contact__icon-label">Contact</h2>
                                <h4>+91 92076 64000 </h4>
                            </div>
                        </div>
                    </div>

                    <hr class="contact__hr">

                    <h2 class="contact__icon-label">Our Social Media</h2>

                    <ul class="contact__social">

                        <li>
                            <a href="https://instagram.com/fenestro_engineers?igshid=MzRlODBiNWFlZA==" target="_blank">
                                <div class="contact__mail-icon">
                                    <i class="fab fa-instagram"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send/?phone=%2B919207664000&text&type=phone_number&app_absent=0" target="_blank">
                                <div class="contact__mail-icon">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="https://youtube.com/@FENESTROENGINEERS" target="_blank">
                                <div class="contact__mail-icon">
                                    <i class="fab fa-youtube"></i>
                                </div>
                            </a>
                        </li>
                    </ul>


                </div>

            </div>

            <div class="col-md-6">
                <p id="msg">
                    @if ($message = Session::get('contact_msg'))
                    {!! $message !!}
                    @endif
                </p>
                <form class="booking__form" method="post" id="contact_form" action="{{route('contact_post')}}" name="myForm">
                    @csrf
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
                            <textarea class="booking__input commentTxt" name="message" id="message" cols="30" rows="8" placeholder="Message"></textarea>
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
    </div>
</div>


<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3912.8885281257612!2d75.87598471480521!3d11.269603891988027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTHCsDE2JzEwLjYiTiA3NcKwNTInNDEuNCJF!5e0!3m2!1sen!2sin!4v1685009223082!5m2!1sen!2sin" class="contact-page-google-map__one" allowfullscreen=""></iframe>
@endsection