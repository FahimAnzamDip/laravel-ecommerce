@extends('layouts.app')

@section('page-content')
    <!-- Page Breadcrumb Start -->
    <div class="main-breadcrumb mb-100" style="background: rgba(0, 0, 0, 0) url('{{ asset('frontend_assets') }}/img/blog/5.png') no-repeat scroll center center / cover;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="breadcrumb-content text-center ptb-70">
                        <ul class="breadcrumb-list breadcrumb">
                            <li><a href="{{ route('user.home') }}">home</a></li>
                            <li>Track Order</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Page Breadcrumb End -->
    <!-- My Account Page Start Here -->
    <div class="my-account white-bg pb-100">
        <div class="container">
            <div class="account-dashboard">
                <div class="dashboard-upper-info">
                    <div class="row no-gutters align-items-center">
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="d-single-info">
                                <p class="user-name">Hello <span>{{ Auth::user()->name }}</span></p>
                                <p>(not {{ Auth::user()->name }}? <a href="{{ route('user.logout') }}">Log Out</a>)</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-6">
                            <div class="d-single-info">
                                <p>Need Assistance? Customer service at.</p>
                                <p>admin@example.com.</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-6">
                            <div class="d-single-info">
                                <p>E-mail them at </p>
                                <p>support@example.com</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-2 col-sm-6">
                            <div class="d-single-info text-center">
                                <a class="view-cart" href="{{ route('user.home') }}"><i class="fa fa-backward" aria-hidden="true"></i>Go Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if($order ?? false)
                        <div class="table-responsive">
                            <h5 class="mb-5">Ordered Products</h5>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Product No</th>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->orderedProducts as $key => $product)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $product->product->product_name }}</td>
                                        <td><img width="80" height="80" src="{{ asset('uploads/product_images') . '/' . $product->product->image_one }}" alt=""></td>
                                        <td>
                                            @if($product->product->discounted_price)
                                                ${{ $product->product->discounted_price }}
                                            @else
                                                ${{ $product->product->selling_price }}
                                            @endif
                                        </td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>
                                            {{ $product->quantity }} x ${{ $product->product->discounted_price ?? $product->product->selling_price }}
                                            =
                                            ${{ $product->quantity * ($product->product->discounted_price ?? $product->product->selling_price) }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 30px;margin-top: 30px">
                            <h5 class="mb-5">Order Summary</h5>
                            <p class="mb-0" style="margin-bottom: 15px;"><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y') }}</p>
                            <p class="mb-0"><strong>Sub Total:</strong> ${{ $order->sub_total }}</p>
                            <p class="mb-0"><strong>Shipping:</strong> +$20</p>
                            <p class="mb-0"><strong>Grand Total:</strong> ${{ $order->final_amount }}</p>
                        </div>
                        <div class="container mb-sm-4">
                            <!-- Details-->
                            <div class="row mb-3" style="margin-bottom: 20px;">
                                <div class="col-sm-4 mb-2">
                                    <div class="bg-secondary p-4 text-dark text-center"><span class="font-weight-semibold mr-2">Shipped via:</span> Courier Service</div>
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <div class="bg-secondary p-4 text-dark text-center"><span class="font-weight-semibold mr-2">Status:</span>
                                        @if($order->status == 0)
                                            <span class="badge">Pending</span>
                                        @elseif($order->status == 1)
                                            <span class="badge">Processing</span>
                                        @elseif($order->status == 2)
                                            <span class="badge">Shipped</span>
                                        @elseif($order->status == 3)
                                            <span class="badge">Delivered</span>
                                        @else
                                            <span class="badge">Canceled</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <div class="bg-secondary p-4 text-dark text-center"><span class="font-weight-semibold mr-2">Expected Delivery:</span>
                                        {{ \Carbon\Carbon::parse($order->created_at)->addDays(7)->format('M d, Y') }} </div>
                                </div>
                            </div>
                            <!-- Progress-->
                            <div class="steps">
                                <div class="steps-header">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="
                                            @if($order->status == 0)
                                                {{ 'width:0%' }}
                                            @elseif($order->status == 1)
                                                {{ 'width:25%' }}
                                            @elseif($order->status == 2)
                                                {{ 'width:75%' }}
                                            @elseif($order->status == 3)
                                                {{ 'width:100%' }}
                                            @else
                                                {{ 'width:0%' }}
                                            @endif
                                        " aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="steps-body">
                                    <div class="step
                                        @if($order->status == 1 || $order->status == 2 || $order->status == 3)
                                            {{ 'step-completed' }}
                                        @else
                                            {{ 'step-active' }}
                                        @endif
                                        ">
                                        @if($order->status == 1 || $order->status == 2 || $order->status == 3)
                                        <span class="step-indicator"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                        @endif
                                        <span class="step-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></span>Order confirmed</div>

                                    <div class="step
                                        @if($order->status == 2 || $order->status == 3)
                                            {{ 'step-completed' }}
                                        @else
                                            {{ 'step-active' }}
                                        @endif
                                        ">
                                        @if($order->status == 2 || $order->status == 3)
                                        <span class="step-indicator"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                        @endif
                                        <span class="step-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></span>Processing order</div>

                                    <div class="step
                                        @if($order->status == 2 || $order->status == 3)
                                            {{ 'step-completed' }}
                                        @else
                                            {{ 'step-active' }}
                                        @endif
                                        ">
                                        @if($order->status == 2 || $order->status == 3)
                                            <span class="step-indicator"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                        @endif
                                        <span class="step-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg></span>Product Shipped</div>

                                    <div class="step
                                        @if($order->status == 3)
                                            {{ 'step-completed' }}
                                        @elseif($order->status == 1)
                                            {{ '' }}
                                        @elseif($order->status == 2)
                                            {{ 'step-active' }}
                                        @endif
                                        ">
                                        @if($order->status == 3)
                                            <span class="step-indicator"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                                        @endif
                                        <span class="step-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></span>Product Delivered</div>

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-6 col-md-offset-3">
                            <form action="{{ route('order.track.process') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="tracker">Tracking ID</label>
                                    <input type="text" class="form-control" id="tracker" name="tracker" required placeholder="Enter your order tracker number here">
                                </div>
                                <button class="btn btn-primary" type="submit">Track Order</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- My Account Page End Here -->
@endsection
