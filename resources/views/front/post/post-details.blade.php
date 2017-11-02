@extends('front.master')
@section('content')
    <div class="wrap">
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="active">Single Page</li>
        </ol>
        <div class="single-page">
            <div class="col-md-2 share_grid">
                <h3>SHARE</h3>
                <ul>
                    <li>
                        <a class="w-inline-block social-share-btn fb" href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Share on Facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;">
                            <i class="facebook"></i>
                            <div class="views">
                                <span>SHARE</span>
                                <label>180</label>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li>
                        <a class="w-inline-block social-share-btn tw" href="https://twitter.com/intent/tweet?" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=%20Check%20up%20this%20awesome%20content' + encodeURIComponent(document.title) + ':%20 ' + encodeURIComponent(document.URL)); return false;">
                            <i class="twitter"></i>
                            <div class="views">
                                <span>TWEET</span>
                                <label>355</label>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li>
                        <a class="w-inline-block social-share-btn lnk" href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' + encodeURIComponent(document.title)); return false;">
                            <i class="linkedin"></i>
                            <div class="views">
                                <span>SHARES</span>
                                <label>28</label>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li>
                        <a class="w-inline-block social-share-btn pin" title="Pin it" target="_blank" href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;); e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;); e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;); e.setAttribute(&apos;src&apos;,&apos; http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'>
                            <i class="pinterest"></i>
                            <div class="views">
                                <span>PIN</span>
                                <label>16</label>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li>
                        <a class="w-inline-block social-share-btn gplus" href="https://plus.google.com/share?url=" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;">
                            <i class="email"></i>
                            <div class="views">
                                <span>Email</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 content-left single-post">
                <div class="blog-posts">
                    <h3 class="post">{{ $postById->post_title }}</h3>
                    <div class="last-article">
                        <p class="artext">{{ $postById->long_description }}</p>
                         <ul class="categories">
                            <li><a href="#">Markets</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Sport</a></li>
                            <li><a href="#">Special reports</a></li>
                            <li><a href="#">Culture</a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <!--related-posts-->
                        <div class="row related-posts">
                            <h4>Articles You May Like</h4>
                            @foreach($relatedPosts as $relatedPost)
                            <div class="col-xs-6 col-md-3 related-grids">
                                <a href="{{ url('/post-details/'.$relatedPost->id) }}" class="thumbnail">
                                    <img src="{{ asset($relatedPost->post_image) }}" alt=""/>
                                </a>
                                <h5><a href="{{ url('/post-details/'.$relatedPost->id) }}">{{ $relatedPost->post_title }}</a></h5>
                            </div>
                            @endforeach
                        </div>
                        <!--//related-posts-->

                        <div class="coment-form">
                            <h4>To Write Your Comment <a href="{{ url('/user-login') }}">Login</a> <span>or</span> <a href="{{ url('/user-registration') }}">Registration</a></h4>

                        </div>
                        <div class="coment-form">
                            <h4>Leave your comment</h4>
                            <form action="{{ url('/new-comment') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="text" placeholder="Name " name="name" required="">
                                <input type="email" placeholder="Email (will not be published)*" name="email" required="">
                                <textarea name="message" placeholder="Your Comment..." required=""></textarea>
                                <input type="submit" name="submit" value="Submit Comment" >
                            </form>
                        </div>


                        <div class="clearfix"></div>

                    </div>
                </div>

            </div>
            @include('front.includes.sidebar')
            <div class="clearfix"></div>
        </div>
    </div>
@endsection