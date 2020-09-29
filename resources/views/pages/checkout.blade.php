@extends('layouts.app')

@section('page-content')
    <!-- Page Breadcrumb Start -->
    <div class="main-breadcrumb mb-100"
         style="background: rgba(0, 0, 0, 0) url('{{ asset('frontend_assets') }}/img/blog/5.png') no-repeat scroll center center / cover;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcrumb-content text-center ptb-70">
                        <ul class="breadcrumb-list breadcrumb">
                            <li><a href="{{ route('home.page') }}">home</a></li>
                            <li><a href="{{ route('show.cart') }}">cart</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Breadcrumb End -->
    <!-- coupon-area start -->
    <div class="coupon-area">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title mb-50">
                <h2>checkout</h2>
            </div>
            <!-- Section Title Start End -->
            @if(!Session::has('coupon'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="coupon-accordion">
                            <!-- ACCORDION START -->
                            <h3>Have Coupon Code? <span id="showlogin">Click here to Enter Coupon.</span></h3>
                            <div id="checkout-login" class="coupon-content">
                                <div class="coupon-info">
                                    <form action="{{ route('apply.coupon') }}" method="post">
                                        @csrf
                                        <p class="form-row-first">
                                            <label for="coupon">Coupon Code <span class="required">*</span></label>
                                            <input type="text" name="coupon" required id="coupon">
                                        </p>
                                        <p class="form-row">
                                            <input type="submit" value="Apply">
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <!-- ACCORDION END -->
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- coupon-area end -->
    <!-- checkout-area start -->
    <div class="checkout-area pt-30">
        <div class="container">
            <div class="row">
                <form action="{{ route('user.payment') }}" method="post">
                    @csrf
                    <div class="col-lg-6 col-md-6">
                        <div class="checkbox-form pb-50">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="checkout-form-list mb-30">
                                        <label>Name <span class="required">*</span></label>
                                        <input type="text" name="name" required value="{{ Auth::user()->name }}"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="checkout-form-list mb-30">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input type="email" name="email" required value="{{ Auth::user()->email }}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list mb-30">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" name="phone" required value="{{ Auth::user()->address->phone ?? '' }}"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list mb-30">
                                        <label>Company Name</label>
                                        <input type="text" name="company_name" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list mb-30">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" name="address" required value="{{ Auth::user()->address->address ?? '' }}"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list mb-30">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text" name="city" required value="{{ Auth::user()->address->city ?? '' }}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list mb-30">
                                        <label>State / County <span class="required">*</span></label>
                                        <input type="text" name="state" required value="{{ Auth::user()->address->state ?? '' }}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list mb-30">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input type="text" name="zip_code" required value="{{ Auth::user()->address->zip_code ?? '' }}"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list mb-30">
                                        <label for="">Country <span class="require">*</span></label>
                                        <input type="text" name="country" required value="{{ Auth::user()->address->country ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="your-order">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="product-name">Product</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($carts as $cart_item)
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{ Str::words($cart_item->name, 2, '...') }} <strong class="product-quantity"> ×
                                                {{ $cart_item->qty }}</strong>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">${{ $cart_item->price*$cart_item->qty }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="cart_item">
                                            No Items In Cart
                                        </tr>
                                    @endforelse
                                    </tbody>
                                    <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                        <td><span class="amount">${{ Cart::subtotal() }}</span></td>
                                    </tr>
                                    <tr class="cart-subtotal">
                                        <th>Tax ({{ config('cart.tax') }}%)</th>
                                        <td><span class="amount">+${{ Cart::tax() }}</span></td>
                                    </tr>
                                    @if(Session::has('coupon'))
                                        <tr class="cart-subtotal">
                                            <th>
                                                Discount (-{{ Session::get('coupon')['discount'] }}%)
                                                <a href="{{ route('remove.coupon') }}" data-toggle="tooltip" data-title="Remove Coupon" class="text-danger">
                                                    <i class="fa fas fa-times"></i>
                                                </a>
                                            </th>
                                            <td><span class="amount">-${{ Session::get('coupon')['amount'] }}</span></td>
                                        </tr>
                                    @endif
                                    <tr class="cart-subtotal">
                                        <th>Shipping Charge</th>
                                        <td><span class="amount">$20</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order Total</th>

                                        @php
                                            $payable = Cart::total(2, '.', '') - Session::get('coupon')['amount'] + 20;
                                        @endphp
                                        <input type="hidden" value="{{ $payable }}" name="final_amount">

                                        <td><strong><span class="amount">${{ Cart::total(2, '.', '') - Session::get('coupon')['amount'] + 20 }}</span></strong>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="payment-method">
                                <div class="form-check" style="margin-bottom: 10px;">
                                    <input class="form-check-input" type="radio" name="payment_method" id="cash_on_delivery" value="1" checked>
                                    <label class="form-check-label" for="cash_on_delivery">
                                        Cash On Delivery
                                    </label>
                                </div>
                                <div class="form-check" style="margin-bottom: 10px;">
                                    <input class="form-check-input" type="radio" name="payment_method" id="stripe_payment" value="2">
                                    <label class="form-check-label" for="stripe_payment">
                                        Stripe Payment
                                    </label>
                                </div>
                                <div class="order-button-payment">
                                    @if(!$carts->isEmpty())
                                        <input type="submit" value="Place order"/>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->
@endsection
