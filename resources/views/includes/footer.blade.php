<footer>
    <!-- Footer Top Start -->
    @if($brands ?? '')
        <div class="footer-top ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="banner-slider owl-carousel">
                            <!-- Single Banner Start -->
                            @foreach($brands as $brand)
                                <div class="single-banner">
                                    <a href="#"><img src="{{ asset('uploads/brand_logos') . '/' . $brand->brand_logo }} " alt="{{ $brand->brand_name }}"></a>
                                </div>
                            @endforeach
                            <!-- Single Banner End -->
                        </div>
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
    @endif

    <!-- Footer Top End -->
    <!-- Footer Middle Start -->
    <div class="footer-middle">
        <div class="container">
            <div class="container-footer ptb-100">
                <div class="row">
                    <!-- Single Footer Start -->
                    <div class="single-footer col-md-3 col-sm-6">
                        <div class="footer-logo">
                            <a href="#"><img class="img" src="{{ asset('frontend_assets') }}/img/logo/logo.png" alt="logo-img"></a>
                        </div>
                        <div class="footer-content">
                            <p>We are a team of designers and developers that create high quality HTML, Magento, Prestashop, Opencart.</p>
                            <h5 class="contact-info mtb-10">contact info:</h5>
                            <ul class="footer-list first-content">
                                <li><i class="pe-7s-map-marker"></i>Address will be here</li>
                                <li><i class="pe-7s-mail"></i>your-email@example.com</li>
                                <li><i class="pe-7s-call"></i>+00 123 45678</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Start -->
                    <!-- Single Footer Start -->
                    <div class="single-footer col-md-3 col-sm-6">
                        <h4 class="footer-title">information</h4>
                        <div class="footer-content">
                            <ul class="footer-list">
                                <li><a href="#">about us</a></li>
                                <li><a href="#">delivery information</a></li>
                                <li><a href="#">privacy policy</a></li>
                                <li><a href="#">terms & conditions</a></li>
                                <li><a href="#">warranty</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Start -->
                    <!-- Single Footer Start -->
                    <div class="single-footer col-md-3 col-sm-6">
                        <h4 class="footer-title">extras</h4>
                        <div class="footer-content">
                            <ul class="footer-list">
                                <li><a href="#">brands</a></li>
                                <li><a href="#">gift certificates</a></li>
                                <li><a href="#">Affiliate</a></li>
                                <li><a href="#">Specials</a></li>
                                <li><a href="#">contact us</a></li>
                                <li><a href="#">returns</a></li>
                                <li><a href="#">Map</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Start -->
                    <!-- Single Footer Start -->
                    <div class="single-footer col-md-3 col-sm-6">
                        <h4 class="footer-title">NEWSLETTER</h4>
                        <div class="footer-content subscribe-form">
                            <p class="mb-25">Subscribe to our newsletter and get 10% off your first purchase</p>
                            <div class="subscribe-box">
                                <form action="{{ route('newsletter.store') }}" method="POST">
                                    @csrf
                                    <input type="email" name="email" id="subscribe_email" placeholder="Enter you email address here..." required>
                                    <input type="submit" class="submit" value="subscribe">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Start -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container Footer End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Footer Middle End -->
    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="container-footer ptb-30">
                <div class="row">
                    <div class="col-sm-7">
                        <p class="text-left copyright-text">Copyright ©  <a target="_blank" href="#">Nevara</a> All Rights Reserved.</p>
                    </div>
                    <div class="col-sm-5">
                        <!-- Footer Social List Start -->
                        <div class="socila-footer">
                            <ul class="social-footer-list list-inline text-right">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <!-- Footer Social List End -->
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container Footer End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Footer Bottom End -->
</footer>
