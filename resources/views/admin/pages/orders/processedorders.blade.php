@extends('admin.layouts.app')

@section('page-content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <!-- Page Title -->
                        <h6 class="h2 text-white d-inline-block mb-0">Processed Orders</h6>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">Processed Orders</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Table -->
    <div class="container-fluid mt--6 mb-4">
        <div class="row justify-content-center">
            <div class="col-12">
                @include('admin.includes.alerts')
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-6">
                                <h3 class="mb-0">Processed Orders</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush text-center">
                            <thead class="thead-light">
                            <tr>
                                <th>Order ID</th>
                                <th>Customer ID</th>
                                <th>Customer Name</th>
                                <th>Payment Method</th>
                                <th>Sub Total</th>
                                <th>Total</th>
                                <th>Final Amount</th>
                                <th>Ordered At</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($processed_orders as $key => $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user_id }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>
                                        @if ($order->payment_method == 1)
                                            {{ "Cash On Delivery" }}
                                        @elseif ($order->payment_method == 2)
                                            {{ "Stripe Payment" }}
                                        @endif
                                    </td>
                                    <td>${{ $order->sub_total }}</td>
                                    <td>${{ $order->total }}</td>
                                    <td><strong>${{ $order->final_amount }}</strong></td>
                                    <td>{{ $order->created_at->format('d-M-Y h:i a') }}</td>
                                    <td>
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
                                    </td>
                                    <td class="table-actions">
                                        <a href="{{ route('order.details', $order->id) }}" class="table-action mr-3"
                                           data-toggle="tooltip" data-original-title="See Details">
                                            <i class="fas fa-link text-primary"></i>
                                        </a>
                                        <a href="{{ route('category.delete', $order->id) }}" id="delete" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete Order" >
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <span class="text-danger">
                                            No Data Available!
                                        </span>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
