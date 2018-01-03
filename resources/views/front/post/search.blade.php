@extends('front.master')
@section('content')
    <div class="wrap">
        <div class="col-md-8 content-left">

            <div class="articles">
                <header>
                    <h3 class="title-head">Search Result for : </h3>
                </header>
                @foreach($datas as $post)
                    <div class="article">
                        <div class="article-left">
                            <a href="{{ url('/post-details/'.$post->id) }}"><img src="{{ asset($post->post_image) }}"></a>
                        </div>
                        <div class="article-right">
                            <div class="article-title">
                                <p>{{ $post->created_at }} <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span></a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>{{ $post->views }} </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>52</a></p>
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
                {{ $datas->links() }}
            </div>



        </div>
        @include('front.includes.sidebar')
        <div class="clearfix"></div>
    </div>
@endsection