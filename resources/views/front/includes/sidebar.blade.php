<div class="col-md-4 side-bar">
    <div class="first_half">
        <div class="list_vertical">
            <section class="accordation_menu">
                <div>
                    <input id="label-1" name="lida" type="radio" checked/>
                    <label for="label-1" id="item1"><i class="ferme"> </i>Popular Posts<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
                    <div class="content" id="a1">
                        <div class="scrollbar" id="style-2">
                            <div class="force-overflow">
                                <div class="popular-post-grids">

                                    <div class="popular-post-grid">
                                        <div class="post-img">
                                            <a href="single.html"><img src="{{ asset('/front/') }}/images/bus2.jpg" alt="" /></a>
                                        </div>
                                        <div class="post-text">
                                            <a class="pp-title" href="single.html"> The section of the mass media industry</a>
                                            <p>On Feb 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>3 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <input id="label-2" name="lida" type="radio"/>
                    <label for="label-2" id="item2"><i class="icon-leaf" id="i2"></i>Recent Posts<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
                    <div class="content" id="a2">
                        <div class="scrollbar" id="style-2">
                            <div class="force-overflow">
                                <div class="popular-post-grids">
                                    @foreach($posts as $post)
                                    <div class="popular-post-grid">
                                        <div class="post-img">
                                            <a href="{{ url('/post-details/'.$post->id) }}"><img src="{{ asset($post->post_image) }}" alt="" /></a>
                                        </div>
                                        <div class="post-text">
                                            <a class="pp-title" href="{{ url('/post-details/'.$post->id) }}"> The section of the mass media industry</a>
                                            <p>On Feb 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>3 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <input id="label-3" name="lida" type="radio"/>
                    <label for="label-3" id="item3"><i class="icon-trophy" id="i3"></i>Comments<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
                    <div class="content" id="a3">
                        <div class="scrollbar" id="style-2">
                            <div class="force-overflow">
                                <div class="response">

                                    @foreach($comments as $comment)
                                    <div class="media response-info">
                                        <div class="media-left response-text-left">
                                            <a href="#">
                                                <img class="media-object" src="{{ asset('https://s.gravatar.com/avatar/5baf8a70838e55f0febe575855fd1e4a?s=80') }}" alt="" />
                                            </a>
                                            <h5><a href="#">{{ $comment->name }}</a></h5>
                                        </div>
                                        <div class="media-body response-text-right">
                                            <p>{{ $comment->message }}</p>
                                            <ul>
                                                <li>{{ $comment->created_at }}</li>
                                                <li><a href="">Reply</a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="secound_half">
        <div class="tags">
            <header>
                <h3 class="title-head">Tags</h3>
            </header>
            <p>
                @foreach($tags as $tag)
                <a class="tag20" href="{{ url('/post-details/'.$tag->id) }}">{{ $tag->tag_name }}</a>
                @endforeach
            </p>
        </div>
        <div class="popular-news">
            <header>
                <h3 class="title-popular">popular news</h3>
            </header>
            <div class="popular-grids">
                <div class="popular-grid">
                    <a href="single.html"><img src="{{ asset('/front/') }}/images/popular-4.jpg" alt="" /></a>
                    <a class="title" href="single.html">It is a long established fact that a reader will be distracted</a>
                    <p>On Aug 31, 2015 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>250 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-thumbs-up"></span>68</a></p>
                </div>


                <div class="popular-grid">
                    <div id="vote">
                        <header>
                        <h3 class="title-popular">Pull Option</h3>
                        </header>
                        <h3>Select Your Favourite President ?</h3>
                        <form action="{{ url('/new-vote') }}" method="POST">
                            <div class="form-group">
                                <input type="radio" name="vote" value="o" onclick="doVote(this.value)" />Sheikh Hasina
                                <input type="radio" name="vote" value="r" onclick="doVote(this.value)" />Khaleda Zia
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>