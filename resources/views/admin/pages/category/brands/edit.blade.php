@extends('admin.layouts.app')

@section('page-content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <!-- Page Title -->
                        <h6 class="h2 text-white d-inline-block mb-0">Edit Brand</h6>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('brand.index') }}">Brands</a></li>
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
                        <form class="needs-validation" action="{{ route('brand.update', $brand->id) }}" method="POST" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="form-group text-left">
                                <label for="brand_name" class="font-weight-bold">Name<span class="text-danger">*</span></label>
                                <input id="brand_name" type="text" name="brand_name" class="form-control" placeholder="Enter category name" value="{{ $brand->brand_name }}" required>
                                <div class="invalid-feedback">
                                    Please enter brand name!
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group text-left">
                                <label for="brand_logo" class="font-weight-bold">Logo<span class="text-danger">*</span></label>
                                <img data-toggle="tooltip" data-placement="right" data-title="Old Brand Logo" class="d-block mb-3 mt-2 img-thumbnail" src="{{ asset('uploads/brand_logos') . '/' . $brand->brand_logo }}" alt="brand logo">
                                <input type="file" class="form-control" id="brand_logo" name="brand_logo">
                                <div class="invalid-feedback"></div>
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
