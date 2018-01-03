
    <div class="navigation">
        <nav class="navbar navbar-default" role="navigation">
            <div class="wrap">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!--/.navbar-header-->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ url('/') }}">Home</a></li>
                        @foreach($PublishedCategories as $PublishedCategory)
                        <li><a href="{{ url('/post-category/'.$PublishedCategory->id) }}">{{ $PublishedCategory->category_name }}</a></li>
                        @endforeach
                        <div class="clearfix"></div>
                    </ul>
                    <div class="search">
                        <!-- start search-->
                        <div class="search-box">
                            <div id="sb-search" class="sb-search">
                                <form action="{{ url('/search') }}" method="post" role="search" accept-charset="UTF-8">
                                    {{ csrf_field() }}
                                    <input type="text" name="search" placeholder="Enter your search ..."  class="sb-search-input" id="search">
                                    <input type="submit" class="sb-search-submit"  value="">
                                    <span class="sb-icon-search"> </span>
                                </form>
                            </div>
                        </div>
                        <!-- search-scripts -->
                        <script src="{{ asset('/front/') }}/js/classie.js"></script>
                        <script src="{{ asset('/front/') }}/js/uisearch.js"></script>
                        <script>
                            new UISearch( document.getElementById( 'sb-search' ) );
                        </script>
                        <!-- //search-scripts -->
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!--/.navbar-collapse-->
            <!--/.navbar-->
    </div>
    </nav>
</div>
</div>