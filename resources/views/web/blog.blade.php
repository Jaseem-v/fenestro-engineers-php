@extends('layouts.app', ['title' => 'Blog'])
@section('content')

    <section class="pager-section">
        <div class="container">
            <div class="pager-content text-center">
                <h2>Blog</h2>
                <ul>
                    <li><a href="{{url('')}}" title="">Home</a></li>
                    <li><span>Blog</span></li>
                </ul>
            </div><!--pager-content end-->
            <h2 class="page-titlee">Fenestro</h2>
        </div>
    </section>

    <div class="blog section-padding blog--page">
        <div class="container">

            <div class="blog__content">
                <div class="row blog__row">
                    @foreach($blog as $blog_item)
                        @php
                            $content=strip_tags($blog_item->description);
                        @endphp
                    <div class="col-md-4">
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
