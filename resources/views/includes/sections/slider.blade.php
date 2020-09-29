<div class="slider-area pb-100">
    <!-- Main Slider Area Start -->
    <div class="slider-wrapper theme-default">
        <!-- Slider Background  Image Start-->
        <div id="slider" class="nivoSlider">
            @foreach($slides as $slide)
                <a href="{{ $slide->link }}"><img src="{{ asset('uploads/slider_images') . '/' . $slide->slider_image }}" data-thumb="{{ asset('uploads/slider_images') . '/' . $slide->slider_image }}" alt=""/></a>
            @endforeach
        </div>
    </div>
    <!-- Main Slider Area End -->
</div>
