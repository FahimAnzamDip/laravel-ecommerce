@extends('admin.layouts.app')

@section('page-content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <!-- Page Title -->
                        <h6 class="h2 text-white d-inline-block mb-0">Order Details</h6>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('orders', ['status' => 0]) }}">Orders</a></li>
                                <li class="breadcrumb-item active">Details of {{ $order->name }}'s Order</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Table -->
    <div class="container-fluid mt--6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Customer Information</h4>
                        <p class="mb-0"><i class="fa fas fa-user"></i> {{ $order->user->name }}</p>
                        <p class="mb-0"><i class="fa fas fa-mail-bulk"></i> {{ $order->user->email }}</p>
                        <p>
                            <i class="fa fas fa-location-arrow"></i> {{ $order->user->address->address ?? 'No Address In Profile' }}
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h4>Shipping Address</h4>
                        <p class="mb-0">{{ $order->name }}</p>
                        <p class="mb-0">{{ $order->phone }}</p>
                        <p class="mb-0">{{ $order->address }}</p>
                        <p class="mb-0">{{ $order->country }}</p>
                    </div>
                    <div class="col-md-4">
                        <h4>Billing Address</h4>
                        <p class="mb-0">{{ $order->name }}</p>
                        <p class="mb-0">{{ $order->phone }}</p>
                        <p class="mb-0">{{ $order->address }}</p>
                        <p class="mb-0">{{ $order->country }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Order Summary</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Payment Method:</strong>
                                    @if($order->payment_method == 1)
                                        Cash On Delivery
                                    @else
                                        Stripe Payment
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Grand Total:</strong> ${{ $order->final_amount }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Order Date:</strong> {{ $order->created_at->format('d-M-Y h:i a') }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Status:</strong>
                                    @if($order->status == 0)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($order->status == 1)
                                        <span class="badge badge-info">Processed</span>
                                    @elseif($order->status == 2)
                                        <span class="badge badge-primary">Shipped</span>
                                    @elseif($order->status == 3)
                                        <span class="badge badge-success">Delivered</span>
                                    @else
                                        <span class="badge badge-danger">Canceled</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h4>Ordered Products</h4>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush text-center">
                                <thead class="thead-light">
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->orderedProducts as $item)
                                    <tr>
                                        <td>{{ $item->product->id }}</td>
                                        <td>{{ $item->product->product_name }}</td>
                                        <td><img width="80" height="80" src="{{ asset('uploads/product_images') . '/' . $item->product->image_one }}" alt=""></td>
                                        <td>${{ $item->product->discounted_price ?? $item->product->selling_price }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>${{ $item->quantity * ($item->product->discounted_price ?? $item->product->selling_price) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="d-flex justify-content-between">
                    <p><strong>Sub Total:</strong> ${{ $order->sub_total }}</p>
                    <p><strong>Total:</strong> ${{ $order->total }}</p>
                    <p><strong>Shipping Charge:</strong> $20</p>
                    <p><strong>Grand Total:</strong> ${{ $order->final_amount }}</p>
                </div>

                <div class="mt-4 d-flex justify-content-end">
                    @if($order->status == 0)
                        <a href="{{ route('order.process', ['status' => 1, 'id' => $order->id]) }}" class="btn btn-success">Accept Order</a>
                        <a href="{{ route('order.process', ['status' => 4, 'id' => $order->id]) }}" class="btn btn-danger">Cancel Order</a>
                    @elseif($order->status == 1)
                        <a href="{{ route('order.process', ['status' => 2, 'id' => $order->id]) }}" class="btn btn-success">Shipping Done</a>
                        <a href="{{ route('order.process', ['status' => 4, 'id' => $order->id]) }}" class="btn btn-danger">Cancel Order</a>
                    @elseif($order->status == 2)
                        <a href="{{ route('order.process', ['status' => 3, 'id' => $order->id]) }}" class="btn btn-success">Delivery Done</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
