<div class="slide-show-ver1">
    <div class="container">
        <div class="tp-banner-container">
            <div class="tp-banner tp-banner-ver1">
                <ul>
                    @foreach($banners as $banner)
                    <!-- SLIDE  -->
                    <li data-transition="notransition" data-slotamount="6" data-masterspeed="1000">
                        <img src="{{asset('frontend/images/bg-slide-show.png')}}" alt="bg-slide-show.png" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <div class="tp-caption large_bold_orange weight-600 capitalize color-white skewfromleft customout size-60 weight-800 uppercase" data-x="155" data-y="260" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="800" data-start="1600" data-easing="Power4.easeOut" data-endspeed="300" data-endeasing="Power1.easeIn" data-captionhidden="on" style="z-index: 9">{{$banner ->title}}
                        </div>
                        <div class="tp-caption large_bold_orange size-18 color-white skewfromright customout transform-none" data-x="155" data-y="370" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="800" data-start="1800" data-easing="Power4.easeOut" data-endspeed="300" data-endeasing="Power1.easeIn" data-captionhidden="on" style="z-index: 7">{{$banner ->content}}
                        </div>
                        <div class="tp-caption skewfromleft customout link-1 link-2 height-50" data-x="155" data-y="500" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1500" data-easing="Power4.easeOut" data-endspeed="300" data-endeasing="Power1.easeIn" data-captionhidden="on" style="z-index: 8"><a href="{{$banner ->link}}" title="Follow">Buy Now</a>
                        </div>
                        <div class="tp-caption skewfromleft customout link-1 link-2 icons height-50" data-x="270" data-y="500" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1500" data-easing="Power4.easeOut" data-endspeed="300" data-endeasing="Power1.easeIn" data-captionhidden="on" style="z-index: 8"><a href="{{$banner ->link}}" title="{{$banner ->title}}"></a>
                        </div>
                        <div class="tp-caption skewfromright customout" data-x="590" data-y="130" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1500" data-easing="Power4.easeOut" data-endspeed="300" data-endeasing="Power1.easeIn" data-captionhidden="on" style="z-index: 1"><img src="{{asset('storage/'.$banner->image)}}" alt="{{ $banner->alt }}">
                        </div>
                    </li>
                    <!-- SLIDER -->
                    @endforeach
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
            <!-- End container -->
        </div>
        <!-- End tp-banner -->
        <div class="social">
            <a title="facebook" href="#" class="facebook"><i class="zmdi zmdi-facebook"></i></a>
            <a title="twitter" href="#" class="twitter"><i class="zmdi zmdi-twitter"></i></a>
            <a title="instagram" href="#" class="instagram"><i class="zmdi zmdi-instagram"></i></a>
            <a title="google" href="#" class="google"><i class="zmdi zmdi-google-glass"></i></a>
            <!-- End cart -->
        </div>
    </div>
</div>
<!-- End Slide-Show -->
