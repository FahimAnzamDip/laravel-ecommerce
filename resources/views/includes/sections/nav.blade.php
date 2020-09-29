<div class="col-lg-7 col-md-7 col-sm-12  hidden-sm hidden-xs">
    <div class="primary-menu">
        <nav>
            <ul class="primary-menu-list text-center">
                <li>
                    <a href="{{ route('home.page') }}">Home</a>
                </li>

                <li class="static-menu"><a href="#">Categories<i class="pe-7s-angle-down"></i></a>
                    <!-- Mega Menu Start -->
                    <ul class="ht-dropdown mega-menu-2">
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
</div>
