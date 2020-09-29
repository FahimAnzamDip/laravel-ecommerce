@extends('admin.layouts.app')

@section('page-content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <!-- Page Title -->
                        <h6 class="h2 text-white d-inline-block mb-0">Coupon</h6>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">Coupons</li>
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
                                <h3 class="mb-0">All Coupons</h3>
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="modal" data-target="#brand_add_modal">
                                    <span class="btn-inner--icon"><i class="fas fa-plus-circle"></i></span>
                                    <span class="btn-inner--text">Add Coupon</span>
                                </button>
                                <!-- Category Modal -->
                                <div class="modal fade" id="brand_add_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="brand_add_modal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add Coupon</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" action="{{ route('coupon.store') }}" method="POST" novalidate>
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group text-left">
                                                        <label for="coupon_name" class="font-weight-bold">Name<span class="text-danger">*</span></label>
                                                        <input id="coupon_name" type="text" name="coupon_name" class="form-control" placeholder="Enter coupon name" required>
                                                        <div class="invalid-feedback">
                                                            Please enter coupon name!
                                                        </div>
                                                        <div class="valid-feedback"></div>
                                                    </div>

                                                    <div class="form-group text-left">
                                                        <label for="discount" class="font-weight-bold">Discount Amount<span class="text-danger">* (%)</span></label>
                                                        <input id="discount" type="number" name="discount" class="form-control" placeholder="Enter discount amount" required>
                                                        <div class="invalid-feedback">
                                                            Please enter discount amount!
                                                        </div>
                                                        <div class="valid-feedback"></div>
                                                    </div>

                                                    <div class="form-group text-left mb-0">
                                                        <label for="valid_till" class="font-weight-bold">Valid Till <span class="text-danger">*</span></label>
                                                        <input type="date" name="valid_till" id="valid_till" class="form-control" required
                                                               min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                                        <div class="invalid-feedback">
                                                            Please enter coupon validity!
                                                        </div>
                                                        <div class="valid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Create</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush text-center">
                            <thead class="thead-light">
                            <tr>
                                <th>Coupon ID</th>
                                <th>Coupon Name</th>
                                <th>Created At</th>
                                <th>Valid Till</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($coupons as $key => $coupon)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $coupon->coupon_name }}</td>
                                    <td>{{ $coupon->created_at->format('d-M-Y h:i a') }}</td>
                                    <td>{{ date('d-M-Y', strtotime($coupon->valid_till))   }}</td>
                                    <td>
                                        @if ($coupon->valid_till >= Carbon\Carbon::now()->format('Y-m-d'))
                                            <span class="badge badge-success">Valid</span>
                                        @else
                                            <span class="badge badge-danger">Expired</span>
                                        @endif
                                    </td>
                                    <td class="table-actions">
                                        <a href="{{ route('coupon.edit', $coupon->id) }}" class="table-action mr-3" data-toggle="tooltip" data-original-title="Edit Coupon">
                                            <i class="fas fa-user-edit text-info"></i>
                                        </a>
                                        <a href="{{ route('coupon.delete', $coupon->id) }}" id="delete" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete Coupon" >
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <span class="text-danger">No Data Available!</span>
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
