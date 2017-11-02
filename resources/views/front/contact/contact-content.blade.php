@extends('front.master')
@section('content')
    <div class="wrap">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Contact Us</li>
        </ol>

        <!--contact-section-starts-->
        <div class="contact-section">
            <header>
                <h2 class="heading text-center">Find Us Here</h2>
            </header>
        @foreach($pageContents as $pageContent)
            <div class="map">
                <iframe src="{{ $pageContent->gmap }}"> </iframe>
            </div>
            <div class="contact_grid">
                <div class="col-md-8 contact-top">
                    <h3>Send us a message</h3>
                    <p class="contact_msg">If you have any query, just contact with us.</p>
                    <form action="{{ url('/send-email') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="to">
                            <input type="text" name="name" class="text" placeholder="Name" >
                            <input type="text" name="email" class="text" placeholder="Email" style="margin-left:20px">
                            <input type="text" name="subject" class="text" placeholder="Subject" style="margin-left:20px">
                        </div>
                        <div class="text">
                            <textarea name="message" placeholder="Enter Your Query.."></textarea>
                        </div>
                        <div class="form-submit1">
                            <input name="submit" type="submit" id="submit" value="Submit Your Message"><br>
                            <p class="m_msg">Make sure you put a valid email</p>
                        </div>
                        <div class="clearfix"> </div>
                    </form>

                </div>
                <div class="col-md-4 contact-top_right">
                    <h3>contact info</h3>
                    <p>{{ $pageContent->address }}</p>
                    <ul class="contact_info">
                        <li><span>Mobile : {{ $pageContent->mobile_no }}</span></li>
                        <li><span class="msg">Email : <a href="{{ $pageContent->email }}{{ $pageContent->email }}">{{ $pageContent->email }}</a></span></li>
                    </ul>
                </div>
            @endforeach
                <div class="clearfix"></div>
            </div>
        </div>

        <!--contact-section-ends-->
    </div>
@endsection

