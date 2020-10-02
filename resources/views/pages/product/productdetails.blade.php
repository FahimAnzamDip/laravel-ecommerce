@extends('layouts.app')

@section('page-content')
    <!-- Page Breadcrumb Start -->
    <div class="main-breadcrumb mb-100"
         style="background: rgba(0, 0, 0, 0) url('{{ asset('frontend_assets') }}/img/blog/5.png') no-repeat scroll center center / cover;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcrumb-content text-center ptb-70">
                        <h1>PRODUCT DETAILS</h1>
                        <ul class="breadcrumb-list breadcrumb">
                            <li><a href="{{ route('home.page') }}">home</a></li>
                            <li><a href="{{ route('shop.page') }}">Shop</a></li>
                            <li>{{ $product->product_name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Breadcrumb End -->
    <!-- Product Thumbnail Start -->
    <div class="main-product-thumbnail pb-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <img id="big-img" src="{{ asset('uploads/product_images') . '/' . $product->image_one}}"
                         data-zoom-image="{{ asset('uploads/product_images') . '/' . $product->image_one}}"
                         alt="product-image"/>

                    <div id="small-img" class="mt-20">

                        <div class="thumb-menu owl-carousel">
                            <a href="#" data-image="{{ asset('uploads/product_images') . '/' . $product->image_one}}"
                               data-zoom-image="{{ asset('uploads/product_images') . '/' . $product->image_one}}">
                                <img src="{{ asset('uploads/product_images') . '/' . $product->image_one}}"
                                     alt="product-image"/>
                            </a>

                            <a href="#" data-image="{{ asset('uploads/product_images') . '/' . $product->image_two}}"
                               data-zoom-image="{{ asset('uploads/product_images') . '/' . $product->image_two}}">
                                <img src="{{ asset('uploads/product_images') . '/' . $product->image_two}}"
                                     alt="product-image"/>
                            </a>

                            <a href="#" data-image="{{ asset('uploads/product_images') . '/' . $product->image_three}}"
                               data-zoom-image="{{ asset('uploads/product_images') . '/' . $product->image_three}}">
                                <img src="{{ asset('uploads/product_images') . '/' . $product->image_three}}"
                                     alt="product-image"/>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Thumbnail Description Start -->
                <div class="col-sm-7">
                    <div class="thubnail-desc fix">
                        <h2 class="product-header">{{ $product->product_name }}</h2>
                        <!-- Product Rating Start -->
                        <div class="rating-summary fix mtb-20">
                            <div class="rating f-left mr-10">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="rating-feedback f-left">
                                <a href="#">0 reviews</a> /
                                <a href="#">Write a review</a>
                            </div>
                        </div>
                        <!-- Product Rating End -->
                        <!-- Product Price Start -->
                        <div class="pro-price mb-20">
                            <ul class="pro-price-list">
                                <li class="price">
                                    @if($product->discounted_price)
                                        <span>${{ $product->discounted_price }} <del class="text-danger">{{ $product->selling_price }}</del></span>
                                    @else
                                        <span>${{ $product->selling_price }}</span>
                                    @endif</li>
                                <li class="tax">Tax: {{ config('cart.tax') }}%</li>
                            </ul>
                        </div>
                        <!-- Product Price End -->
                        <!-- Product Price Description Start -->
                        <div class="product-price-desc">
                            <ul class="pro-desc-list">
                                <li>Product Code: <span>{{ $product->product_code }}</span></li>
                                <li>Availability:
                                    @if($product->product_quantity > 0)
                                        <span>In Stock</span>
                                    @else
                                        <span>Out Of Stock</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <!-- Product Price Description End -->
                        <form action="{{ route('add.cart.post') }}" method="POST">
                            @csrf
                            <!-- Product Box Quantity Start -->
                            <div class="box-quantity mtb-20">
                                <div class="quantity-item">
                                    <label>Qty: </label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="quantity" value="1">
                                    </div>
                                </div>
                            </div>
                            <!-- Product Box Quantity End -->
                                <input type="hidden" value="{{ $product->id }}" name="id">
                            <!-- Product Button Actions Start -->
                            <div class="product-button-actions">
                                <button class="add-to-cart" type="submit">add to cart</button>
                                <a href="javascript:" data-toggle="tooltip" title="Add to Wishlist"
                                   class="same-btn mr-15 addwishlist" data-id="{{ $product->id }}"><i
                                        class="pe-7s-like"></i></a>
                            </div>
                            <!-- Product Button Actions End -->
                        </form>
                        <!-- Product Social Link Share Start -->
                        <div class="social-shared">
                            <ul>
                                <li class="f-book">
                                    <a href="#">
                                        <span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span>
                                        <span>like</span>
                                        <span>1</span>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="#">
                                        <span><i class="fa fa-twitter" aria-hidden="true"></i></span>
                                        <span>tweet</span>
                                    </a>
                                </li>
                                <li class="pinterest">
                                    <a href="#">
                                        <span><i class="fa fa-google" aria-hidden="true"></i></span>
                                        <span>plus</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Product Social Link Share End -->
                    </div>
                </div>
                <!-- Thumbnail Description End -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail End -->
    <!-- Product Thumbnail Description Start -->
    <div class="thumnail-desc pb-50">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="main-thumb-desc text-center list-inline">
                        <li class="active"><a data-toggle="tab" href="#detail">Details</a></li>
                        <li><a data-toggle="tab" href="#review">Reviews (0)</a></li>
                    </ul>
                    <!-- Product Thumbnail Tab Content Start -->
                    <div class="tab-content thumb-content">
                        <div id="detail" class="tab-pane fade in active pb-40">
                            <p>{!! $product->product_details !!}</p>
                        </div>
                        <div id="review" class="tab-pane fade">
                            <!-- Reviews Start -->
                            <div class="review">
                                <p class="mb-10">There are no reviews for this product.</p>
                                <h2>WRITE A REVIEW</h2>
                            </div>
                            <!-- Reviews End -->
                            <!-- Reviews Field Start -->
                            <div class="riview-field mt-30">
                                <form autocomplete="off" action="#">
                                    <div class="form-group">
                                        <label class="req" for="sure-name">name</label>
                                        <input type="text" class="form-control" id="sure-name" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="req" for="comments">your Review</label>
                                        <textarea class="form-control" rows="5" id="comments"
                                                  required="required"></textarea>
                                        <div class="help-block">
                                            <span class="text-danger">Note:</span> HTML is not translated!
                                        </div>
                                    </div>
                                    <div class="form-group required radio-label">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="control-label req">Rating</label> &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                <input type="radio" name="rating" value="1"> &nbsp;
                                                <input type="radio" name="rating" value="2"> &nbsp;
                                                <input type="radio" name="rating" value="3"> &nbsp;
                                                <input type="radio" name="rating" value="4"> &nbsp;
                                                <input type="radio" name="rating" value="5"> &nbsp;Good
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" id="button-review">Continue</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Reviews Field Start -->
                        </div>
                    </div>
                    <!-- Product Thumbnail Tab Content End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Product Thumbnail Description End -->

    <!-- Related Products Start -->
    @if($related_products)
        <div class="best-seller-products pb-100">
            <div class="container">
                <div class="row">
                    <!-- Section Title Start -->
                    <div class="col-xs-12">
                        <div class="section-title text-center mb-40">
                            <h3 class="section-info">RELATED PRODUCTS</h3>
                        </div>
                    </div>
                    <!-- Section Title End -->
                </div>
                <!-- Row End -->
                <div class="row">
                    <!-- Best Seller Product Activation Start -->
                    <div class="best-seller new-products owl-carousel">
                        <!-- Single Product Start -->
                        @foreach($related_products as $product)
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
                                        <a href="#" data-toggle="modal" data-target="#myModal"><i
                                                class="pe-7s-look"></i>quick
                                            view</a>
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
                                        <a href="product-page.html">{{ Str::words($product->product_name, 2, '...') }}</a>
                                    </h4>
                                    <p class="price">
                                        @if($product->discounted_price)
                                            <span>{{ $product->discounted_price }} <del
                                                    class="text-danger">{{ $product->selling_price }}</del></span>
                                        @else
                                            <span>{{ $product->selling_price }}</span>
                                        @endif
                                    </p>
                                    <div class="action-links2">
                                        <a class="addcart" data-id="{{ $product->id }}" data-toggle="tooltip"
                                           title="Add to Cart" href="javarscript:">add to cart</a>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                    @endforeach
                    <!-- Single Product End -->
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
    @endif
    <!-- Related Products End -->
@endsection
