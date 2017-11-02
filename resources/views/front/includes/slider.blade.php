<div class="slider">
    <div class="callbacks_wrap">
        <ul class="rslides" id="slider">
            @foreach($sliders as $slider)
            <li>
                <img src="{{ asset($slider->slider_image) }}" alt="Slider Image">
                <div class="caption">
                    <a href="">{{ $slider->slider_title }}</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>