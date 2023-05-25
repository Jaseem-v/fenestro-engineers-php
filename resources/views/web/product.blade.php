@extends('layouts.app', ['title' => 'Products'])
@section('content')
<section class="pager-section">
    <div class="container">
        <div class="pager-content text-center">
            <h2>Products</h2>
            <ul>
                <li><a href="{{url('')}}" title="">Home</a></li>
                <li><span>Products</span></li>
            </ul>
        </div><!--pager-content end-->
        <h2 class="page-titlee">Fenestro</h2>
    </div>
</section>



<section class="projects-one projects-one--protfolio">
    <div class="container">
        <div class="products__drop">
            <h2> {{count($products)}} products</h2>

            <select name="floorsize" id="floorsize" class="booking__input floorsize">
                <option value="">Category</option>
                <option value="all">all</option>
                <option value="doors">doors</option>
                <option value="windows">windows</option>
            </select>

        </div>
        <div class="row">


            @foreach($products as $product_item)
            @php
            $product_image=DB::table('product_images')->where('product_id',$product_item->id)->first();
            @endphp
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
    </div>

</section>
@endsection