@extends('layouts.app', ['title' => 'Gallery'])
@section('content')
    <section class="pager-section">
        <div class="container">
            <div class="pager-content text-center">
                <h2>Gallery</h2>
                <ul>
                    <li><a href="{{url('')}}" title="">Home</a></li>
                    <li><span>Gallery</span></li>
                </ul>
            </div><!--pager-content end-->
            <h2 class="page-titlee">Fenestro</h2>
        </div>
    </section>


    <div class="gallery section-padding">

        <div class="container">

            <div class="gallery-content" id="gallery-content">
                @foreach($gallery as $gallery_item)

                    <a href="{{url('uploads/'.$gallery_item->image)}}" class="projects__btn gallery__img">
                        <img src="{{url('uploads/'.$gallery_item->image)}}" alt="gallery">
                    </a>
                @endforeach
            </div>


        </div>

    </div>

@endsection
