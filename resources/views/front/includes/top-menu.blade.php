<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>Express News a Entertainment Category Flat Bootstarp responsive Website Template | Home :: w3layouts</title>
    <link href="{{ asset('/front/') }}/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('/front/') }}/js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <link href="{{ asset('/front/') }}/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Express News Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- for bootstrap working -->
    <script type="text/javascript" src="{{ asset('/front/') }}/js/bootstrap.js"></script>
    <!-- //for bootstrap working -->
    <!-- web-fonts -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <script src="{{ asset('/front/') }}/js/responsiveslides.min.js"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset('/front/') }}/js/move-top.js"></script>
    <script type="text/javascript" src="{{ asset('/front/') }}/js/easing.js"></script>
    <!--/script-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
            });
        });
    </script>
</head>
<body>
<!-- header-section-starts-here -->
<div class="header">
    <div class="header-top">
        <div class="wrap">
            <div class="top-menu">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/about-content') }}">About Us</a></li>
                    <li><a href="{{ url('/contact-content') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="top-menu pull-right">
                <ul>
                    @if(Session::get('customerId'))
                    <li><a href="{{ url('/customer-logout') }}">Logout</a></li>
                    @else
                    <li><a href="{{ url('/login-registration') }}">Login</a></li>
                    <li><a href="{{ url('/login-registration') }}">Registration</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="logo text-center">
            <a href="{{ url('/') }}"><img src="{{ asset('/front/') }}/images/logo.jpg" alt="" /></a>
        </div>