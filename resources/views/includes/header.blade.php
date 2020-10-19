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
                                    <form id="search" action="{{ route('product.search') }}" method="GET">
                                        <input type="text" class="search" name="query" placeholder="Search for products..." value="{{ request()->input('query') }}">
                                    </form>
                                    <i onclick="document.getElementById('search').submit();" class="pe-7s-search"></i>
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
                        <li>
                            <a href="{{ route('home.page') }}">Home</a>
                        </li>

                        <li><a href="#">Categories</a>
                            <!-- Mega Menu Start -->
                            <ul>
                                <!-- Single Mega Sub Menu Start -->
                                @foreach(\App\Category::all() as $category)
                                    <li>
                                        <a href="{{ route('shop.page', ['category_id' => $category->id]) }}"><h3 class="mt-5">{{ $category->category_name }}</h3></a>
                                        @if($category->subCategories)
                                            <ul>
                                                @foreach($category->subCategories as $subCategory)
                                                    <li>
                                                        <a href="{{ route('shop.page', ['sub_category_id' => $subCategory->id]) }}">{{ $subCategory->sub_category_name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                            @endforeach
                            <!-- Single Mega Sub Menu Start -->
                            </ul>
                            <!-- Mega Menu End -->
                        </li>

                        <li>
                            <a href="{{ route('shop.page') }}">Shop</a>
                        </li>

                        <li><a href="{{ route('about.page') }}">About us</a></li>

                        <li>
                            <a href="{{ route('contact.page') }}">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Mobile Menu  End -->
        </div>
    </div>
</header>
