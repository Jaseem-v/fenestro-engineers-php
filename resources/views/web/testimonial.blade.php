@extends('layouts.app', ['title' => 'Testimonial'])
@section('content')

<section class="pager-section">
    <div class="container">
        <div class="pager-content text-center">
            <h2>Testimonials</h2>
            <ul>
                <li><a href="{{url('')}}" title="">Home</a></li>
                <li><span>Testimonials</span></li>
            </ul>
        </div><!--pager-content end-->
        <h2 class="page-titlee">Fenestro</h2>
    </div>
</section>


<div class="testimonials section-padding">
    <div class="container">


        <div class="row">
            @if ($message = Session::get('view_msg2'))
            {!! $message !!}
            @endif

            @foreach($testimonials as $testimonial_item)
            <div class="col-md-6">
                <div class="testimonials__single">
                    <div class="testimonials-qmark">
                        &#10077;
                    </div>
                    <!-- <div class="testimonials-pattern">
            </div> -->
                    <div class="testimonials-base">
                        <blockquote class="testimonials-text" cite="Strugatsky Brothers">{{$testimonial_item->description}}

                        </blockquote>
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

            </div>
            @endforeach
        </div>




    </div>

</div>

@endsection