@extends('front.master')
@section('content')
    <div class="wrap">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">About</li>
        </ol>
        <div class="about-page">
            <div class="col-md-8 content-left">
                <div class="about">
                    @foreach($pageContents as $pageContent)
                    <h2 class="head">{{$pageContent->about_page_title}}</h2>
                    <h5>{{$pageContent->about_page_sub_title}}</h5>
                    <p>{{$pageContent->about_page_content}}</p>
                        <div class="more-address">
                        <address>
                            <strong>Express News</strong><br>
                            {{ $pageContent->address }}<br>
                            <abbr title="Phone">Mobile :</abbr> {{ $pageContent->mobile_no }}
                        </address>
                        <address>
                            <strong>Email</strong><br>
                            <a href="{{ $pageContent->email }}">{{ $pageContent->email }}</a>
                        </address>
                    </div>
                    @endforeach
                </div>
            </div>
            @include('front.includes.sidebar')
            <div class="clearfix"></div>
        </div>
    </div>
@endsection

