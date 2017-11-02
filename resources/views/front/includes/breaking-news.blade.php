<div class="move-text">
    <div class="breaking_news">
        <h2>Breaking News</h2>
    </div>
    <div class="marquee">
        @foreach($posts as $post)
        <div class="marquee1"><a class="breaking" href="{{ url('/post-details/'.$post->id) }}"> >> {{$post->breaking_news}}</a></div>
        @endforeach
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <script type="text/javascript" src="{{ asset('/front/') }}/js/jquery.marquee.min.js"></script>
    <script>
        $('.marquee').marquee({ pauseOnHover: true });
        //@ sourceURL=pen.js
    </script>
</div>