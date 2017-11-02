@extends('front.master');
@section('content')
    <div class="wrap">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="active">Technology</li>
        </ol>
        <div class="col-md-8 content-left">
            <div class="articles sports">

                <header>
                    <h3 class="title-head">Category Post</h3>
                </header>
                <div class="technology">
                    <div class="tech-main">
                        @foreach($categoryPosts as $categoryPost)
                        <div class="tech">
                            <a href="{{ url('/post-details/'.$categoryPost->id) }}"><img src="{{ asset($categoryPost->post_image) }}" alt="" /></a>
                            <a class="power" href="{{ url('/post-details/'.$categoryPost->id) }}">{{ $categoryPost->post_title }}</a>
                        </div>
                       @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
                <header>
                    <h3 class="title-head">{{ $categoryPost->category_name }}</h3>
                </header>
                @foreach($categoryPosts as $categoryPost)
                <div class="article">
                    <div class="article-left">
                        <a href="{{ url('/post-details/'.$categoryPost->id) }}"><img src="{{ asset($categoryPost->post_image)  }}"></a>
                    </div>
                    <div class="article-right">
                        <div class="article-title">
                            <p>{{ $categoryPost->created_at }}<a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="{{ url('/post-details/'.$categoryPost->id) }}"><span class="glyphicon glyphicon-eye-open"></span>104 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>52</a></p>
                            <a class="title" href="{{ url('/post-details/'.$categoryPost->id) }}"> {{ $categoryPost->post_title }}</a>
                        </div>
                        <div class="article-text">
                            <p>{{ $categoryPost->short_description }}</p>
                            <a href="{{ url('/post-details/'.$categoryPost->id) }}"><img src="{{ asset('/front/') }}/images/more.png" alt="" /></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                @endforeach
            </div>


        </div>
        @include('front.includes.sidebar')
        <div class="clearfix"></div>
    </div>
@endsection