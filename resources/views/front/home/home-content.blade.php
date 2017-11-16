@extends('front.master')
@section('content')
  <div class="wrap">
        <div class="col-md-8 content-left">
            @include('front.includes.slider')
            <div class="articles">
                <header>
                    <h3 class="title-head">All around the world</h3>
                </header>
                @foreach($posts as $post)
                <div class="article">
                    <div class="article-left">
                        <a href="{{ url('/post-details/'.$post->id) }}"><img src="{{ asset($post->post_image) }}"></a>
                    </div>
                    <div class="article-right">
                        <div class="article-title">
                            <p>{{ $post->created_at }} <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>{{ count($comment) }}</a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>{{ $post->views }} </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>52</a></p>
                            <a class="title" href="{{ url('/post-details/'.$post->id) }}"> {{ $post->post_title }}.</a>
                        </div>
                        <div class="article-text">
                            <p>{{ $post->short_description }}</p>
                            <a href="{{ url('/post-details/'.$post->id) }}"><img src="{{ asset('/front/') }}/images/more.png" alt="" /></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
               @endforeach
            </div>

            <div class="life-style">
                <header>
                    <h3 class="title-head">Life Style</h3>
                </header>
                <div class="life-style-grids">
                    @foreach($lifeStylePosts as $lifeStyle)
                    <div class="life-style-left-grid">
                        <a href="{{ url('/post-details/'.$lifeStyle->id) }}"><img src="{{ asset($lifeStyle->post_image)  }}" alt="" /></a>
                        <a class="title" href="{{ url('/post-details/'.$lifeStyle->id) }}">{{ $lifeStyle->post_title }}</a>
                    </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>

            </div>
            <div class="sports-top">
                <div class="s-grid-left">
                    <div class="cricket">
                        <header>
                            <h3 class="title-head">Business</h3>
                        </header>
                        @foreach($businessPosts as $businessPost)
                        <div class="s-grid-small">
                            <div class="sc-image">
                                <a href="{{ url('/post-details/'.$businessPost->id) }}"><img src="{{ asset($businessPost->post_image) }}" alt="" /></a>
                            </div>
                            <div class="sc-text">
                                <a class="power" href="{{ url('/post-details/'.$businessPost->id) }}">{{ $businessPost->post_title }}</a>
                                <p class="date">{{ $businessPost->created_at }}</p>
                                <a class="reu" href="{{ url('/post-details/'.$businessPost->id) }}"><img src="{{ asset('/front/') }}/images/more.png" alt="" /></a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="s-grid-right">
                    <div class="cricket">
                        <header>
                            <h3 class="title-popular">Technology</h3>
                        </header>
                        @foreach($technologyPosts as $technologyPost)
                        <div class="s-grid-small">
                            <div class="sc-image">
                                <a href="{{ url('/post-details/'.$technologyPost->id) }}"><img src="{{ asset($technologyPost->post_image) }}" alt="" /></a>
                            </div>
                            <div class="sc-text">
                                <a class="power" href="{{ url('/post-details/'.$technologyPost->id) }}">{{ $technologyPost->post_title }}</a>
                                <p class="date">{{ $technologyPost->created_at }}</p>
                                <a class="reu" href="{{ url('/post-details/'.$technologyPost->id) }}"><img src="{{ asset('/front/') }}/images/more.png" alt="" /></a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        @include('front.includes.sidebar')
        <div class="clearfix"></div>
    </div>
@endsection