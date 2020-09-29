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
                            <li>{{ Auth::user()->name }}</li>
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
                                <a class="view-cart" href="{{ route('show.cart') }}"><i class="fa fa-cart-plus" aria-hidden="true"></i>view cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <!-- Nav tabs -->
                        <ul class="nav flex-column dashboard-list" role="tablist">
                            <li class="active"><a data-toggle="tab" href="#orders">Orders</a></li>
                            <li><a data-toggle="tab" href="#address">Addresses</a></li>
                            <li><a data-toggle="tab" href="#account-details">Change Password</a></li>
                            <li><a href="{{ route('user.logout') }}">logout</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-10 col-md-10">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard-content mt-all-40">
                            <div id="orders" class="tab-pane fade in active">
                                <h3>Orders</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Order No</th>
                                            <th>Order Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Tracker</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(Auth::user()->orders as $key => $order)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ date('d-M-Y', strtotime($order->created_at)) }}</td>
                                                <td>
                                                    @if($order->status == 0)
                                                        <span class="badge bg-warning">Pending</span>
                                                    @elseif($order->status == 1)
                                                        <span class="badge bg-info">Processed</span>
                                                    @elseif($order->status == 2)
                                                        <span class="badge bg-primary">Shipped</span>
                                                    @elseif($order->status == 3)
                                                        <span class="badge bg-success">Delivered</span>
                                                    @else
                                                        <span class="badge bg-danger">Canceled</span>
                                                    @endif
                                                </td>
                                                <td>${{ $order->final_amount }}</td>
                                                <td>{{ $order->tracker}}</td>
                                                <td><a class="view" href="{{ route('order.track') }}">Track Order</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="address" class="tab-pane">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <h4 class="billing-address" style="margin-bottom: 20px;">Billing address</h4>
                                <form action="{{ route('user.update.details') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="address">Address<span class="require">*</span></label>
                                            <input type="text" name="address" id="address" class="form-control" required placeholder="street address" value="{{ Auth::user()->address->address ?? '' }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="city">City<span class="require">*</span></label>
                                            <input type="text" name="city" id="city" class="form-control" required placeholder="city name" value="{{ Auth::user()->address->city ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="state">State<span class="require">*</span></label>
                                            <input type="text" name="state" id="state" class="form-control" required placeholder="state name" value="{{ Auth::user()->address->state ?? '' }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="zip">Zip Code<span class="require">*</span></label>
                                            <input type="text" name="zip_code" id="zip" class="form-control" required placeholder="zip code" value="{{ Auth::user()->address->zip_code ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="phone">Phone<span class="require">*</span></label>
                                            <input type="text" name="phone" id="phone" class="form-control" required placeholder="phone number" value="{{ Auth::user()->address->phone ?? '' }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="country">Country<span class="require">*</span></label>
                                            <input type="text" name="country" id="country" class="form-control" required placeholder="country name" value="{{ Auth::user()->address->country ?? '' }}">
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" style="border-radius: 5px;" type="submit">Save Details</button>
                                </form>
                            </div>
                            <div id="account-details" class="tab-pane fade">
                                <h3>Change Password</h3>
                                <div class="register-form login-form clearfix">
                                    <form action="{{ route('user.update.pass') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="old_password">Old Password<span class="require">*</span></label>
                                            <input class="form-control" type="password" id="old_password" name="old_password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">New Password<span class="require">*</span></label>
                                            <input class="form-control" type="password" id="password" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password<span class="require">*</span></label>
                                            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                                        </div>
                                        <div class="register-box mt-40">
                                            <button type="submit" class="return-customer-btn f-right">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Account Page End Here -->
@endsection
