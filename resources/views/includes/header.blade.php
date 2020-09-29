<header>
    <div class="container-fluid header-top-area header-sticky">
        <div class="row">
            <!-- Logo Start -->
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-5 full-col pl-0">
                <div class="logo">
                    <a href="{{ route('home.page') }}"><img src="{{ asset('frontend_assets') }}/img/logo/logo.png" alt="brand-image"></a>
                </div>
            </div>
            <!-- Logo End -->
            <div class="col-xs-12 visible-xs visible-control">
                <ul class="search-form mobile-form">
                    <li>
                        <form action="#">
                            <input type="text" class="search" name="search" placeholder="Search for products...">
                        </form>
                        <i class="pe-7s-search"></i>
                    </li>
                </ul>
            </div>
            <!-- Primary-Menu Start -->
            @include('includes.sections.nav')
            <!-- Primary-Menu End -->
            <!-- Header All Shopping Selection Start -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-7 full-col pr-0">
                <div class="main-selection">
                    <ul class="selection-list text-right">
                        <!-- Searcch Box Start -->
                        <li class="hidden-control"><i class="pe-7s-search"></i>
                            <ul class="search-form ht-dropdown">
                                <li>
                                    <form action="#">
                                        <input type="text" class="search" name="search" placeholder="Search for products...">
                                    </form>
                                    <i class="pe-7s-search"></i>
                                </li>
                            </ul>
                        </li>
                        <!-- Search Box End -->
                        @auth
                            <li><a href="{{ route('show.wishlist') }}"><i class="pe-7s-like"></i><span>{{ count(\App\Wishlist::all()) }}</span></a></li>
                        @endauth
                        <li><a href="{{ route('show.cart') }}"><i class="pe-7s-shopbag"></i><span>{{ Cart::count() }}</span></a>
                            <ul class="ht-dropdown main-cart-box">
                                <li>
                                    <!-- Cart Box Start -->
                                    @foreach(Cart::content() as $product)
                                        <div class="single-cart-box">
                                            <div class="cart-img">
                                                <a href="{{ route('product.details', $product->id) }}"><img src="{{ asset('uploads/product_images') . '/' . $product->options->product_image }}" alt="cart-image"></a>
                                            </div>
                                            <div class="cart-content">
                                                <h6><a href="#">{{ Str::words($product->name, 2, '...') }}</a></h6>
                                                <span>{{ $product->qty }} × ${{ $product->price }}</span>
                                            </div>
                                            <a href="{{ route('cart.remove', $product->rowId) }}"><i class="pe-7s-close"></i></a>
                                        </div>
                                    @endforeach
                                    <!-- Cart Box End -->

                                    <!-- Cart Footer Inner Start -->
                                    <div class="cart-footer fix">
                                        <h5>total :<span class="f-right">${{ Cart::total() }}</span></h5>
                                        <div class="cart-actions">
                                            <a class="checkout" href="{{ route('show.cart') }}">View Cart</a>
                                        </div>
                                    </div>
                                    <!-- Cart Footer Inner End -->
                                </li>
                            </ul>
                        </li>
                        <!-- Dropdown Currency Selection Start -->
                        <li><i class="pe-7s-config"></i>
                            <ul class="ht-dropdown currrency">
                                <li>
                                    <h3>my account</h3>
                                    <ul>
                                        @guest
                                            <li><a href="{{ route('register') }}">register</a></li>
                                            <li><a href="{{ route('login') }}">log in</a></li>
                                        @else
                                            <li><a href="{{ route('user.home') }}">Welcome, {{ Auth::user()->name }}</a></li>
                                            <li><a href="{{ route('user.logout') }}">Log out</a></li>
                                        @endguest
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- Dropdown Currency Selection End -->
                    </ul>
                </div>
            </div>
            <!-- Header All Shopping Selection End -->
            <!-- Mobile Menu  Start -->
            <div class="mobile-menu visible-sm visible-xs">
                <nav>
                    <ul>
                        <li><a href="#">Home</a>
                            <!-- Mobile Menu Dropdown Start -->
                            <ul>
                                <li><a href="index.html">Home Version 1</a></li>
                                <li><a href="home-2.html">Home Version 2</a></li>
                                <li><a href="home-3.html">Home Version 3</a></li>
                                <li><a href="home-4.html">Home Version 4</a></li>
                            </ul>
                            <!-- Mobile Menu Dropdown End -->
                        </li>
                        <li><a href="#">Furniture</a>
                            <!-- Mobile Menu Dropdown Start -->
                            <ul>
                                <li><a href="#">sofas & loveseats</a>
                                    <!-- Mobile Menu Sub-Dropdown Start -->
                                    <ul>
                                        <li><a href="categorie-page.html">convallis neceros</a></li>
                                        <li><a href="categorie-page.html">Outdoor Rugs</a></li>
                                        <li><a href="categorie-page.html">Mice and Trackballs</a></li>
                                        <li><a href="categorie-page.html">Cameras</a></li>
                                    </ul>
                                    <!-- Mobile Menu Sub-Dropdown End -->
                                </li>
                                <li><a href="#">chairs & recliners</a>
                                    <!-- Mobile Menu Sub-Dropdown Start -->
                                    <ul>
                                        <li><a href="categorie-page.html">commodo nunc</a></li>
                                        <li><a href="categorie-page.html">dignissim porta</a></li>
                                        <li><a href="categorie-page.html">necvelit dignissim</a></li>
                                        <li><a href="categorie-page.html">venenatis lacinia</a></li>
                                    </ul>
                                    <!-- Mobile Menu Sub-Dropdown End -->
                                </li>
                            </ul>
                            <!-- Mobile Menu Dropdown End -->
                        </li>
                        <li><a href="#">decor</a>
                            <!-- Mobile Menu Dropdown Start -->
                            <ul>
                                <li><a href="#">art gallery</a>
                                    <!-- Mobile Menu Sub-Dropdown Start -->
                                    <ul>
                                        <li><a href="categorie-page.html">congue nonorna</a></li>
                                        <li><a href="categorie-page.html">Etiam sapien</a></li>
                                        <li><a href="categorie-page.html">Outdoor Lighting</a></li>
                                        <li><a href="categorie-page.html">sapien enim</a></li>
                                    </ul>
                                    <!-- Mobile Menu Sub-Dropdown End -->
                                </li>
                                <li><a href="#">lighting</a>
                                    <!-- Mobile Menu Sub-Dropdown Start -->
                                    <ul>
                                        <li><a href="categorie-page.html">commodo nunc</a></li>
                                        <li><a href="categorie-page.html">elementum dolor</a></li>
                                        <li><a href="categorie-page.html">ligula velvenen</a></li>
                                        <li><a href="categorie-page.html">Vestibulum tempor</a></li>
                                    </ul>
                                    <!-- Mobile Menu Sub-Dropdown End -->
                                </li>
                                <li><a href="#">rugs</a>
                                    <!-- Mobile Menu Sub-Dropdown Start -->
                                    <ul>
                                        <li><a href="categorie-page.html">blandit vehicula</a></li>
                                        <li><a href="categorie-page.html">Praesent molestie</a></li>
                                        <li><a href="categorie-page.html">sagittis ipsum</a></li>
                                        <li><a href="categorie-page.html">venenatis innunc</a></li>
                                    </ul>
                                    <!-- Mobile Menu Sub-Dropdown End -->
                                </li>
                                <li><a href="#">throw pillows</a>
                                    <!-- Mobile Menu Sub-Dropdown Start -->
                                    <ul>
                                        <li><a href="categorie-page.html">Fire Pits</a></li>
                                        <li><a href="categorie-page.html">Garden Accents</a></li>
                                        <li><a href="categorie-page.html">Outdoor Fountains</a></li>
                                        <li><a href="categorie-page.html">Patio Heaters</a></li>
                                    </ul>
                                    <!-- Mobile Menu Sub-Dropdown End -->
                                </li>
                            </ul>
                            <!-- Mobile Menu Dropdown End -->
                        </li>
                        <li><a href="#">pages</a>
                            <!-- Home Version Dropdown Start -->
                            <ul>
                                <li><a href="categorie-page.html">shop</a></li>
                                <li><a href="product-page.html">Product Details</a></li>
                                <li><a href="cart.html">cart</a></li>
                                <li><a href="checkout.html">checkout</a></li>
                                <li><a href="wish-list.html">wish list</a></li>
                                <li><a href="blog.html">blog</a></li>
                                <li><a href="blog-details.html">blog details</a></li>
                                <li><a href="contact.html">contact</a></li>
                                <li><a href="privacy.html">Privacy Policy</a></li>
                                <li><a href="404.html">404</a></li>
                            </ul>
                            <!-- Home Version Dropdown End -->
                        </li>
                        <li><a href="about-us.html">about us</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Mobile Menu  End -->
        </div>
    </div>
</header>
