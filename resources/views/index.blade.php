@extends('layouts.app')

@section('page-content')

    <!-- Slider Area Start -->
    @include('includes.sections.slider')
    <!-- Slider Area End -->

    <!-- Featured Products Start -->
    <div class="new-products-selection pb-80">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-xs-12">
                    <div class="section-title text-center mb-40">
                        <span class="section-desc mb-15">Top Featured Products</span>
                        <h3 class="section-info">featured products</h3>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <!-- New Products Activation Start -->
                    <div class="new-products owl-carousel">
                        <!-- Single Product Start -->
                        @foreach($featured_products as $product)
                            <div class="single-product mb-25">
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
                                        <a href="#" id="{{ $product->id }}" data-toggle="modal" data-target="#myModal" onclick="quickView(this.id)">
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
                                    <h4><a href="{{ route('product.details', $product->id) }}">{{ Str::words($product->product_name, 2, '...') }}</a></h4>
                                    <p class="price">
                                        @if($product->discounted_price)
                                            <span>${{ $product->discounted_price }} <del class="text-danger">{{ $product->selling_price }}</del></span>
                                        @else
                                            <span>${{ $product->selling_price }}</span>
                                        @endif
                                    </p>
                                    <div class="action-links2">
                                        <a class="addcart" data-id="{{ $product->id }}" data-toggle="tooltip" title="Add to Cart" href="javarscript:">add to cart</a>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                    @endforeach
                    <!-- Single Product End -->
                    </div>
                    <!-- New Products Activation End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Featured Products End -->

    <!-- New Products Selection Start -->
    <div class="new-products-selection pb-80">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-xs-12">
                    <div class="section-title text-center mb-40">
                        <span class="section-desc mb-15">Top new in this week</span>
                        <h3 class="section-info">new products</h3>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <!-- New Products Activation Start -->
                    <div class="new-products owl-carousel">
                        <!-- Single Product Start -->
                        @foreach($new_products as $product)
                            <div class="single-product mb-25">
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
                                        <a href="#" id="{{ $product->id }}" data-toggle="modal" data-target="#myModal" onclick="quickView(this.id)">
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
                                    <h4><a href="{{ route('product.details', $product->id) }}">{{ Str::words($product->product_name, 2, '...') }}</a></h4>
                                    <p class="price">
                                        @if($product->discounted_price)
                                            <span>${{ $product->discounted_price }} <del class="text-danger">{{ $product->selling_price }}</del></span>
                                        @else
                                            <span>${{ $product->selling_price }}</span>
                                        @endif
                                    </p>
                                    <div class="action-links2">
                                        <a class="addcart" data-id="{{ $product->id }}" data-toggle="tooltip" title="Add to Cart" href="javarscript:">add to cart</a>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                    @endforeach
                    <!-- Single Product End -->
                    </div>
                    <!-- New Products Activation End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- New Products Selection End -->

    <!-- New Products Banner Start -->
    <div class="new-products-banner pb-100">
        <div class="container">
            <div class="row">
                <!-- Single Banner Start -->
                @foreach($categories as $category)
                    <div class="col-sm-6">
                        <div class="single-banner zoom mb-30">
                            <img src="{{ asset('uploads/category_images') . '/' . $category->category_image }}" alt="product-banner">
                            <div class="banner-desc">
                                <a href="{{ route('shop.page', ['category_id' => $category->id]) }}">{{ $category->category_name }}</a>
                                <p>{{ count(\App\Product::where('category_id', $category->id)->get()) }} Products</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Single Banner End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- New Products Banner End -->

    <!-- Best Seller Products Start -->
    <div class="best-seller-products pb-100">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-xs-12">
                    <div class="section-title text-center mb-40">
                        <span class="section-desc mb-20">Top sale in this week</span>
                        <h3 class="section-info">best seller</h3>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>
            <!-- Row End -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- Best Seller Product Activation Start -->
                    <div class="best-seller new-products owl-carousel">
                        <!-- Single Product Start -->
                        @foreach($best_sellers as $product)
                            <div class="single-product mb-25">
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
                                        <a href="#" id="{{ $product->id }}" data-toggle="modal" data-target="#myModal" onclick="quickView(this.id)">
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
                                    <h4><a href="{{ route('product.details', $product->id) }}">{{ Str::words($product->product_name, 2, '...') }}</a></h4>
                                    <p class="price">
                                        @if($product->discounted_price)
                                            <span>${{ $product->discounted_price }} <del class="text-danger">{{ $product->selling_price }}</del></span>
                                        @else
                                            <span>${{ $product->selling_price }}</span>
                                        @endif
                                    </p>
                                    <div class="action-links2">
                                        <a class="addcart" data-id="{{ $product->id }}" data-toggle="tooltip" title="Add to Cart" href="javarscript:">add to cart</a>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                    @endforeach
                        <!-- Single Product End -->
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Best Seller Products End -->
@endsection
