@extends('layouts.app')

@section('page-content')
    <!-- Page Breadcrumb Start -->
    <div class="main-breadcrumb mb-100"
         style="background: rgba(0, 0, 0, 0) url('{{ asset('frontend_assets') }}/img/blog/5.png') no-repeat scroll center center / cover;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcrumb-content text-center ptb-70">
                        <h1>Search Results</h1>
                        <ul class="breadcrumb-list breadcrumb">
                                <li><a href="{{ route('home.page') }}">home</a></li>
                                <li>Search results for "{{ request()->input('query') }}"</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Breadcrumb End -->
    <!-- Categories Product Start -->
    <div class="all-categories pb-100">
        <div class="container">
            <div class="row">
                <!-- Sidebar Content Start -->
                <div class="col-md-9 col-md-push-3">
                    <!-- Sidebar Right Top Content Start -->
                    <div class="sidebar-desc-content">
                        <p>Found ({{ $products->count() }}) results for "{{ request()->input('query') }}"</p>
                        <hr>
                    </div>
                    <!-- Sidebar Right Top Content Start -->
                    <!-- Best Seller Product Start -->
                    <div class="best-seller">
                        <div class="row mt-20">
                            <div class="col-md-3 col-sm-4 pull-left">
                                <div class="grid-list-view">
                                    <ul class="list-inline">
                                        <li class="active"><a data-toggle="tab" href="#grid-view"
                                                              aria-expanded="true"><i
                                                    class="zmdi zmdi-view-dashboard"></i><i
                                                    class="pe-7s-keypad"></i></a></li>
                                        <li><a data-toggle="tab" href="#list-view" aria-expanded="false"><i
                                                    class="zmdi zmdi-view-list"></i><i class="pe-7s-menu"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="tab-content categorie-list ">
                                    <div id="list-view" class="tab-pane fade">
                                        <div class="row">
                                            <!-- Main Single Product Start -->
                                            @foreach($products as $product)
                                                <div class="main-single-product fix">
                                                    <div class="col-sm-4">
                                                        <!-- Single Product Start -->
                                                        <div class="single-product">
                                                            <!-- Product Image Start -->
                                                            <div class="pro-img">
                                                                <a href="{{ route('product.details', $product->id) }}">
                                                                    <img
                                                                        src="{{ asset('uploads/product_images') . '/' . $product->image_one }}">
                                                                </a>
                                                                <div class="quick-view">
                                                                    <a href="#" id="{{ $product->id }}"
                                                                       data-toggle="modal" data-target="#myModal"
                                                                       onclick="quickView(this.id)">
                                                                        <i class="pe-7s-look"></i>
                                                                        quick view
                                                                    </a>
                                                                </div>
                                                                @if($product->discounted_price)
                                                                    @php
                                                                        $amount = $product->selling_price - $product->discounted_price;
                                                                        $discount = ($amount/$product->selling_price)*100;
                                                                    @endphp
                                                                    <span class="sticker-new sticker-sale">-{{ round($discount) }}%</span>
                                                                @else
                                                                    <span class="sticker-new"> new </span>
                                                                @endif
                                                            </div>
                                                            <!-- Product Image End -->
                                                        </div>
                                                        <!-- Single Product End -->
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <!-- Product Content Start -->
                                                        <div class="thubnail-desc fix">
                                                            <h4 class="product-header"><a
                                                                    href="{{ route('product.details', $product->id) }}">{{ Str::words($product->product_name, 2, '...') }}</a>
                                                            </h4>
                                                            <!-- Product Price Start -->
                                                            <div class="pro-price mb-15">
                                                                <ul class="pro-price-list">
                                                                    <li class="price">
                                                                        @if($product->discounted_price)
                                                                            <span>${{ $product->discounted_price }} <del
                                                                                    class="text-danger">{{ $product->selling_price }}</del></span>
                                                                        @else
                                                                            <span>${{ $product->selling_price }}</span>
                                                                        @endif
                                                                    </li>
                                                                    <li class="mtb-50">
                                                                        <p>{{ Str::words($product->product_details, 10, '...') }}</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <!-- Product Price End -->
                                                            <!-- Product Button Actions Start -->
                                                            <div class="product-button-actions">
                                                                <button class="add-to-cart addcart"
                                                                        data-toggle="tooltip" title="Add to Cart"
                                                                        data-id="{{ $product->id }}">add to cart
                                                                </button>
                                                                <a href="javascript:" data-id="{{ $product->id }}"
                                                                   data-toggle="tooltip" title="Add to Wishlist"
                                                                   class="same-btn mr-15 addwishlist"><i
                                                                        class="pe-7s-like"></i></a>
                                                            </div>
                                                            <!-- Product Button Actions End -->
                                                        </div>
                                                        <!-- Product Content End -->
                                                    </div>
                                                </div>
                                        @endforeach
                                        <!-- Main Single Product Start -->
                                        </div>
                                        <!-- Row End -->
                                        <div class="row mt-40 mb-70">
                                            <div class="col-sm-6">
                                            {{ $products->links() }}
                                            <!-- End of .blog-pagination -->
                                            </div>
                                        </div>
                                        <!-- Row End -->
                                    </div>
                                    <!-- #list-view End -->
                                    <div id="grid-view" class="tab-pane fade in active mt-40">
                                        <div class="row">
                                            @foreach($products as $product)
                                                <div class="col-md-4 col-sm-6">
                                                    <!-- Single Product Start -->
                                                    <div class="single-product">
                                                        <!-- Product Image Start -->
                                                        <div class="pro-img">
                                                            <a href="{{ route('product.details', $product->id) }}">
                                                                <img class="primary-img"
                                                                     src="{{ asset('uploads/product_images') . '/' . $product->image_one }}"
                                                                     alt="single-product">
                                                                <img class="secondary-img"
                                                                     src="{{ asset('uploads/product_images') . '/' . $product->image_two }}"
                                                                     alt="single-product">
                                                            </a>
                                                            <div class="quick-view">
                                                                <a href="#" id="{{ $product->id }}" data-toggle="modal"
                                                                   data-target="#myModal" onclick="quickView(this.id)">
                                                                    <i class="pe-7s-look"></i>
                                                                    quick view
                                                                </a>
                                                            </div>
                                                            @if($product->discounted_price)
                                                                @php
                                                                    $amount = $product->selling_price - $product->discounted_price;
                                                                    $discount = ($amount/$product->selling_price)*100;
                                                                @endphp
                                                                <span class="sticker-new sticker-sale">-{{ round($discount) }}%</span>
                                                            @else
                                                                <span class="sticker-new"> new </span>
                                                            @endif
                                                        </div>
                                                        <!-- Product Image End -->
                                                        <!-- Product Content Start -->
                                                        <div class="pro-content text-center">
                                                            <h4>
                                                                <a href="{{ route('product.details', $product->id) }}">{{ Str::words($product->product_name, 2, '...') }}</a>
                                                            </h4>
                                                            <p class="price">
                                                                @if($product->discounted_price)
                                                                    <span>${{ $product->discounted_price }} <del
                                                                            class="text-danger">{{ $product->selling_price }}</del></span>
                                                                @else
                                                                    <span>${{ $product->selling_price }}</span>
                                                                @endif
                                                            </p>
                                                            <div class="action-links2">
                                                                <a class="addcart" data-id="{{ $product->id }}"
                                                                   data-toggle="tooltip" title="Add to Cart"
                                                                   href="javarscript:">add to cart</a>
                                                            </div>
                                                        </div>
                                                        <!-- Product Content End -->
                                                    </div>

                                                    <!-- Single Product End -->
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- Row End -->
                                        <div class="row mt-40 mb-70">
                                            <div class="col-sm-6">
                                            {{ $products->links() }}
                                            <!-- End of .blog-pagination -->
                                            </div>
                                        </div>
                                        <!-- Row End -->
                                    </div>
                                    <!-- #Grid-view End -->
                                </div>
                                <!-- .Tab Content End -->
                            </div>
                        </div>
                        <!-- Row End -->
                    </div>
                    <!-- Best Seller Product End -->
                </div>
                <!-- Sidebar Content End -->
                <!-- Sidebar Start -->
                <div class="col-md-3 col-md-pull-9">
                    <aside class="categorie-sidebar mb-100">
                        <!-- Categories Module Start -->
                        <div class="categorie-module mb-80">
                            <h3>categories</h3>
                            <ul class="categorie-list">
                                <li><a href="{{ route('shop.page') }}">All Products ({{ \App\Product::count() }})</a>
                                </li>
                                @foreach(\App\Category::all() as $category)
                                    <li>
                                        <a href="{{ route('shop.page', ['category_id' => $category->id]) }}">{{ $category->category_name }}
                                            ({{ \App\Product::where('category_id', $category->id)->count() }})</a>
                                        @if($category->subCategories->isNotEmpty())
                                            <ul class="sub-categorie pl-30">
                                                @foreach($category->subCategories as $sub_category)
                                                    <li>
                                                        <a href="{{ route('shop.page', ['sub_category_id' => $sub_category->id]) }}">{{ $sub_category->sub_category_name }}
                                                            ({{ \App\Product::where('sub_category_id', $sub_category->id)->count() }}
                                                            )</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Categories Module End -->
                        <!-- Filter Option Start -->
                        <div class="flter-option mb-80">
                            <h3>PRICE FILTER</h3>
                            <form action="#">
                                <div id="slider-range"></div>
                                <input type="text" id="amount" class="amount" readonly>
                            </form>
                        </div>
                        <!-- Filter Option End -->
                    </aside>
                </div>
                <!-- Sidebar End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Categories Product End -->
@endsection
