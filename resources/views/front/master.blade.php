    @include('front.includes.top-menu')
    @include('front.includes.main-menu')

<!-- header-section-ends-here -->
<div class="wrap">
   @include('front.includes.breaking-news')
</div>
<!-- content-section-starts-here -->
<div class="main-body">
    @yield('content')
</div>
<!-- content-section-ends-here -->
<!-- footer-section-starts-here -->
@include('front.includes.footer')