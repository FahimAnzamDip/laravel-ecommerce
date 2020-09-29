@extends('admin.layouts.app')

@section('page-content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <!-- Page Title -->
                        <h6 class="h2 text-white d-inline-block mb-0">Edit Coupon</h6>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('coupon.index') }}">Coupons</a></li>
                                <li class="breadcrumb-item active">Edit</li>
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
            <div class="col-md-6">
                @include('admin.includes.alerts')
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" action="{{ route('coupon.update', $coupon->id) }}" method="POST" novalidate>
                            @csrf
                            <div class="form-group text-left">
                                <label for="coupon_name" class="font-weight-bold">Name<span class="text-danger">*</span></label>
                                <input id="coupon_name" type="text" name="coupon_name" class="form-control" placeholder="Enter coupon name" required value="{{ $coupon->coupon_name }}">
                                <div class="invalid-feedback">
                                    Please enter coupon name!
                                </div>
                                <div class="valid-feedback"></div>
                            </div>

                            <div class="form-group text-left">
                                <label for="discount" class="font-weight-bold">Discount Amount<span class="text-danger">* (%)</span></label>
                                <input id="discount" type="number" name="discount" class="form-control" placeholder="Enter discount amount" required value="{{ $coupon->discount }}">
                                <div class="invalid-feedback">
                                    Please enter discount amount!
                                </div>
                                <div class="valid-feedback"></div>
                            </div>

                            <div class="form-group text-left">
                                <label for="valid_till" class="font-weight-bold">Valid Till <span class="text-danger">*</span></label>
                                <input type="date" name="valid_till" id="valid_till" class="form-control" required
                                       min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $coupon->valid_till }}">
                                <div class="invalid-feedback">
                                    Please enter coupon validity!
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
