@extends('layouts.app', ['title' => 'Booking'])
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
            zipcode = $(".zipcode").val();
            floorSize = $(".floorsize").val();
            installationDate = $(".installationDate").val();
            support = $(".support").val();
            if (fname.trim() == null || fname.trim() == "") {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Enter Full Name</div>");
                $("html, body").animate({
                    scrollTop: 100
                }, "slow");
            } else if (phone.trim() == null || phone.trim() == "") {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Enter Mobile</div>");
                $("html, body").animate({
                    scrollTop: 100
                }, "slow");
            } else if (email.trim() == null || email.trim() == "") {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Enter Email</div>");
                $("html, body").animate({
                    scrollTop: 100
                }, "slow");
            } else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Enter valid Email</div>");
                $("html, body").animate({
                    scrollTop: 100
                }, "slow");
            } else if (zipcode.trim() == null || zipcode.trim() == "") {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Enter Zipcode</div>");
                $("html, body").animate({
                    scrollTop: 100
                }, "slow");
            } else if (floorSize == null || floorSize == "") {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Select Floor Size</div>");
                $("html, body").animate({
                    scrollTop: 100
                }, "slow");
            } else if (installationDate == null || installationDate == "") {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Select Installation Date</div>");
                $("html, body").animate({
                    scrollTop: 100
                }, "slow");
            } else if (support == null || support == "") {
                $("#msg").html("<div class='alert alert-danger'><i class='fa fa-warning'></i> Please Select Support</div>");
                $("html, body").animate({
                    scrollTop: 100
                }, "slow");
            } else {
                $(this).html('<i class="fa fa-spinner fa-spin" style="padding-left: 0px;\n' +
                    '    position: sticky;"></i> <span>Loading...</span>');
                $(this).attr("disabled", true);
                $("#booking_form").submit();
            }
        });
    });
</script>
@endpush
<section class="pager-section">
    <div class="container">
        <div class="pager-content text-center">
            <h2>Book a Demo</h2>
            <ul>
                <li><a href="{{url('')}}" title="">Home</a></li>
                <li><span>Book a Demo</span></li>
            </ul>
        </div><!--pager-content end-->
        <h2 class="page-titlee">Fenestro</h2>
    </div>
</section>



<div class="booking section-padding ">
    <div class="container">
        <!-- <div class="section-heading">

                <h1 class="section-heading__title">
                    Booking Form
                </h1>

                <p class="section-heading__description">
                    Pellentesque sit amet porttitor eget dolor morbi non arcu.
                    Vitae justo eget magna fermentum
                    iaculis eu non
                </p>

            </div> -->

        <p id="msg">
            @if ($message = Session::get('book_msg'))
            {!! $message !!}
            @endif
        </p>

        <div class="row">
            <div class="col-md-6">
                <div class="booking__left">
                    <div class="about-one__content mt-0">
                        <div class="sec-title">
                            <span class="sec-title__tagline">Unlocking Possibilities</span>
                            <h2 class="sec-title__title">BOOK
                                YOUR DEMO NOW!</h2>
                        </div>

                        <div class="about-two__content-text1">
                            <p>Fenestro Enginners will be happy to visit you for your requirement. </p>
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

            </div>

            <div class="col-md-6">
                <form class="booking__form" method="post" id="booking_form" action="{{route('bookDemo_post')}}" name="myForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" class="booking__input fname" name="fname" placeholder="Full Name" value="">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="booking__input phoneTxt" onkeypress="return isNumber(event)" name="phone" placeholder="Phone">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="booking__input emailTxt" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="booking__input zipcode" id="zipcode" name="zipcode" placeholder="Zipcode">
                        </div>
                        <div class="col-md-12">
                            <select name="floorsize" id="floorsize" class="booking__input floorsize">
                                <option value="">Floor size of home*</option>
                                <option value="Less than 1000 sq.ft">Less than 1000 sq.ft</option>
                                <option value="1000 to 2000 sq. ft">1000 to 2000 sq. ft</option>
                                <option value="2000 to 3000 sq.ft.">2000 to 3000 sq.ft.</option>
                                <option value="More than 3000 sq.ft.">More than 3000 sq.ft.</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <select name="installationDate" id="installationDate" class="booking__input installationDate">
                                <option value="">Planned date of installation*</option>
                                <option value="Already installed">Already installed</option>
                                <option value="Less than 2 months">Less than 2 months</option>
                                <option value="More than 3 months">More than 3 months</option>
                            </select>

                        </div>
                        <div class="col-md-12">
                            <select name="support" id="support" class="booking__input support">
                                <option value="">Support required*</option>
                                <option value="Schedule product demo and send catalogue">Schedule product demo and send
                                    catalogue</option>
                                <option value="Schedule sales team visit and send catalogue">Schedule sales team visit
                                    and send catalogue</option>
                                <option value="Send product catalogue only">Send product catalogue only</option>
                            </select>

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
@endsection