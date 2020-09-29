@extends('layouts.app')

@section('page-content')
    <!-- Page Breadcrumb Start -->
    <div class="main-breadcrumb mb-100" style="background: rgba(0, 0, 0, 0) url('{{ asset('frontend_assets') }}/img/blog/5.png') no-repeat scroll center center / cover;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcrumb-content text-center ptb-70">
                        <ul class="breadcrumb-list breadcrumb">
                            <li><a href="{{ route('home.page') }}">home</a></li>
                            <li>{{ Auth::user()->name }}'s wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Page Breadcrumb End -->
    <!-- Wish List Start -->
    <div class="cart-main-area wish-list pb-50">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title mb-50">
                <h2>wish list</h2>
            </div>
            <!-- Section Title Start End -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- Form Start -->
                    <form action="#">
                        <!-- Table Content Start -->
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-remove">Remove</th>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Unit Price</th>
                                    <th class="product-quantity">Stock Status</th>
                                    <th class="product-subtotal">add to cart</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($wishlists as $wishlist)
                                    @foreach($wishlist->products as $product)
                                        <tr>
                                            <td class="product-remove"> <a href="{{ route('remove.wishlist', $wishlist->id) }}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                            <td class="product-thumbnail">
                                                <a href="{{ route('product.details', $product->id) }}"><img src="{{ asset('uploads/product_images') . '/' . $product->image_one }}" alt="cart-image" /></a>
                                            </td>
                                            <td class="product-name"><a href="{{ route('product.details', $product->id) }}">{{ $product->product_name }}</a></td>
                                            <td class="product-price"><span class="amount">${{ $product->selling_price }}</span></td>
                                            <td class="product-stock-status">
                                                @if($product->product_quantity > 0)
                                                    <span>in stock</span>
                                                @else
                                                    <span>out of stock</span>
                                                @endif
                                            </td>
                                            <td class="product-add-to-cart"><a href="{{ route('wishlist.add.cart', $product->id) }}">add to cart</a></td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Table Content Start -->
                    </form>
                    <!-- Form End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
    </div>
    <!-- Wish List End -->
@endsection
