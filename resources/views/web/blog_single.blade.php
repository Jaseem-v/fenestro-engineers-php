@extends('layouts.app', ['title' => $blog->title])
@section('content')
<section class="pager-section">
    <div class="container">
        <div class="pager-content text-center">
            <h2>Blog Details</h2>
            <ul>
                <li><a href="{{url('')}}" title="">Home</a></li>
                <li><a href="{{route('blog')}}/" title="">Blog</a></li>
                <li><span>{{$blog->title}}</span></li>
            </ul>
        </div><!--pager-content end-->
        <h2 class="page-titlee">Fenestro</h2>
    </div>
</section>


<div class="single-article section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="single-article__heading">{{$blog->title}}</h1>
                <ul class="single-article__writer-details">
                    <li>
                        <img alt="" src="https://secure.gravatar.com/avatar/c4893c6db1d3a3a51f721f2c16a66fc6?s=125&amp;d=mm&amp;r=g">
                        <span class="author"> By: </span><a href="https://hellloexpert.com/wp/el-oule/author/admin/" rel="author">admin</a>
                    </li>
                    <li>
                        <i class="bi bi-timer"></i>
                        <a href="https://hellloexpert.com/wp/el-oule/how-to-get-more-traffic-in-your-website/">{{\Carbon\Carbon::parse($blog->created_at)->format('d M Y')}}</a>
                    </li>

                </ul>
                <img src="{{url('uploads/blog_300_'.$blog->file.'.webp')}}" alt="blog img">

                <div class="single-article__paragraph">{!! $blog->description !!}</div>
            </div>

            <div class="col-md-4">
                <aside>
                    <div class=" single-article__recent-post">
                        <h3>Recent Posts</h3>

                        @foreach($recent_blogs as $recent_blog_item)

                        <div class="single-article__post-suggest">

                            <div class="row">
                                <div class="col-4">
                                    <div class="single-article__post-img">
                                        <img src="{{url('uploads/blog_300_'.$recent_blog_item->file.'.webp')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-8">

                                    <div class="single-article__post-details">
                                        <h4>
                                            <a href="{{route('blog_single',$recent_blog_item->seo_url)}}/">{{$recent_blog_item->title}}</a>
                                        </h4>
                                        <span class="single-article__post-date">{{\Carbon\Carbon::parse($recent_blog_item->created_at)->format('d M Y')}}</span>
                                    </div>
                                </div>
                            </div>



                        </div>
                        @endforeach
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection