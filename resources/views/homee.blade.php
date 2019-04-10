@extends('layouts.front')
@section('content')
@push('nav')
    <ul class="nav-menu nav navbar-nav">
        @php
            $no = 1;
        @endphp
        @foreach ($parsing as $item)
        <li class="cat-{{$no}}"><a href="{{route('front.category', $item->id)}}">{{$item->nama_category}}</a></li>
        @php
            $no++;
        @endphp
        @endforeach
    </ul>
@endpush
@push('nav1')
        @foreach ($parsing as $item)
        <li><a href="category.html">{{$item->nama_category}}</a></li>
        @endforeach
@endpush
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- post Atas -->
            @foreach ($article as $item)
            <div class="col-md-6">
                <div class="post post-thumb">
                    <a class="post-img" href="#"><img src={{asset('uploads/'. $item->picture)}} alt="" width="300" height="300"></a>
                    <div class="post-body">
                        <div class="post-meta">
                            <a class="post-category cat-2" href="category.html">{{$item->category->nama_category}}</a>
                            <span class="post-date">{{$item->created_at->diffForHumans()}}</span>
                        </div>
                        <h3 class="post-title"><a href="{{route('front.show', $item->slug)}}">{{$item->title}}</a></h3>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- /post Atas -->
        </div>
        <!-- /row -->
        <!-- pagination -->
        <div  class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">{{$article->appends(Request::all())->links()}}</div>
        <div class="col-md-6"></div>
        </div>
        <!-- pagination -->
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Recent Posts</h2>
                </div>
            </div>
            <div class="clearfix visible-md visible-lg"></div>
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                    <div class="clearfix visible-md visible-lg"></div>

                    <!-- post Content-->
                    <div class="col-md-6">
                        <div class="post">
                            @foreach ($article2 as $item)                       
                            <a class="post-img" href="blog-post.html"><img src="{{asset('uploads/'. $item->picture)}}"
                                    alt=""></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category cat-2" href="category.html">{{$item->category->nama_category}}</a>
                                    <span class="post-date">{{$item->created_at->diffForHumans()}}</span>
                                </div>
                                <h3 class="post-title"><a href="blog-post.html">{{$item->title}}</a></h3>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /post Content -->

                    <div class="clearfix visible-md visible-lg"></div>
                </div>
            </div>

            <div class="col-md-5">
                <!-- post widget Terkait -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Most Read</h2>
                    </div>
                    <div class="post post-widget">
                        <a class="post-img" href="blog-post.html"><img src="{{asset('front/img/widget-2.jpg')}}"
                                alt=""></a>
                        <div class="post-body">
                            <h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website
                                    Design Mockup
                                    Into Code Automatically</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row Terkait -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

@endsection