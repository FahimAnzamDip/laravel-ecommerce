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
                            <li><a href="{{ route('shop.page') }}">shop</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Page Breadcrumb End -->
    <!-- cart-main-area & wish list start -->
    <div class="cart-main-area pb-100">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title mb-50">
                <h2>cart</h2>
            </div>
            <!-- Section Title Start End -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- Form Start -->
                        <!-- Table Content Start -->
                        <div class="table-content table-responsive mb-50">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="{{ route('product.details', $product->id) }}"><img
                                                    src="{{ asset('uploads/product_images') . '/' . $product->options->product_image }}"
                                                    alt="cart-image"/></a>
                                        </td>
                                        <td class="product-name">
                                            <a href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a>
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">${{ $product->price }}</span>
                                        </td>
                                        <td class="product-quantity">
                                            <form action="{{ route('cart.update') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="rowId" value="{{ $product->rowId }}">
                                                <input type="number" value="{{ $product->qty }}" name="qty">
                                                <button data-toggle="tooltip" data-title="update" style="border-radius: 5px;" class="btn btn-info" type="submit"><i class="fa fas fa-edit"></i></button>
                                            </form>
                                        </td>
                                        <td class="product-subtotal">{{ $product->price*$product->qty }}</td>
                                        <td class="product-remove">
                                            <a href="{{ route('cart.remove', $product->rowId) }}"><i
                                                    class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Table Content Start -->
                        <div class="row">
                            <!-- Cart Button Start -->
                            <div class="col-md-8 col-sm-7 col-xs-12">
                                <div class="buttons-cart">
                                    <a href="{{ route('shop.page') }}">Continue Shopping</a>
                                </div>
                            </div>
                            <!-- Cart Button Start -->
                            <!-- Cart Totals Start -->
                            <div class="col-md-4 col-sm-5 col-xs-12">
                                <div class="cart_totals">
                                    <h2>Cart Totals</h2>
                                    <br/>
                                    <table>
                                        <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">${{ Cart::subtotal() }}</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong><span class="amount">${{ Cart::total() }}</span></strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="wc-proceed-to-checkout">
                                        @if(!$products->isEmpty())
                                            <a href="{{ route('checkout') }}">Proceed to Checkout</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Cart Totals End -->
                        </div>
                        <!-- Row End -->
                    <!-- Form End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
    </div>
    <!-- cart-main-area & wish list end -->
@endsection
