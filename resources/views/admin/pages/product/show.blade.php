@extends('admin.layouts.app')

@section('page-content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <!-- Page Title -->
                        <h6 class="h2 text-white d-inline-block mb-0">Product Details</h6>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
                                <li class="breadcrumb-item active">Details of {{ $product->product_name }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 d-flex justify-content-end">
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-white"><i class="fa fas fa-edit"></i> Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Table -->
    <div class="container-fluid mt--6 mb-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <p class="font-weight-bold">Product Name</p>
                                    <p>{{ $product->product_name }}</p>
                                </div>

                                <div class="col-md-4">
                                    <p class="font-weight-bold">Product Code</p>
                                    <p>{{ $product->product_code }}</p>
                                </div>

                                <div class="col-md-4">
                                    <p class="font-weight-bold">Product Quantity</p>
                                    <p>{{ $product->product_quantity }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <p class="font-weight-bold">Product Category</p>
                                    <p>{{ $product->category->category_name }}</p>
                                </div>

                                <div class="col-md-4">
                                    <p class="font-weight-bold">Product Sub Category</p>
                                    <p>
                                        @if($product->subCategory)
                                            {{ $product->subCategory->sub_category_name }}
                                        @else
                                            None
                                        @endif
                                    </p>
                                </div>

                                <div class="col-md-4">
                                    <p class="font-weight-bold">Product Brand</p>
                                    <p>
                                        @if($product->brand)
                                            {{ $product->brand->brand_name }}
                                        @else
                                            None
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <p class="font-weight-bold">Product Size</p>
                                    <p>
                                        @if($product->product_size)
                                            {{ $product->product_size}}
                                        @else
                                            None
                                        @endif
                                    </p>
                                </div>

                                <div class="col-md-4">
                                    <p class="font-weight-bold">Product Color</p>
                                    <p>
                                        @if($product->product_color)
                                            {{ $product->product_color }}
                                        @else
                                            None
                                        @endif
                                    </p>
                                </div>

                                <div class="col-md-4">
                                    <p class="font-weight-bold">Selling Price</p>
                                    <p>{{ $product->selling_price }}</p>
                                </div>
                            </div>

                             <div class="row">
                                 <div class="col-md-12">
                                     <p class="font-weight-bold">Product Details</p>
                                     <p>{!! $product->product_details !!}</p>
                                 </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <p class="font-weight-bold">Video Link</p>
                                    <p>
                                        @if($product->video_link)
                                            {{ $product->video_link }}
                                        @else
                                            None
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <p class="font-weight-bold">Discounted Price</p>
                                    <p>
                                        @if($product->discounted_price)
                                            {{ $product->discounted_price }}
                                        @else
                                            None
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <p class="font-weight-bold">Image One ( Thumbnail )</p>
                                    <img class="mt-3 img-thumbnail" src="{{ asset('uploads/product_images') . '/' . $product->image_one }}" alt="" id="one" width="100">
                                </div>

                                <div class="col-md-4">
                                    <p class="font-weight-bold">Image Two</p>
                                    <img class="mt-3 img-thumbnail" src="{{ asset('uploads/product_images') . '/' . $product->image_two }}" alt="" id="two" width="100">
                                </div>

                                <div class="col-md-4">
                                    <p class="font-weight-bold">Image Three</p>
                                    <img class="mt-3 img-thumbnail" src="{{ asset('uploads/product_images') . '/' . $product->image_three }}" alt="" id="three" width="100">
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-3">
                                    <p class="font-weight-bold d-inline-block">Featured Product</p>
                                    @if ($product->trend === 1)
                                        <span class="badge badge-success">On</span>
                                    @else
                                        <span class="badge badge-danger">Off</span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <p class="font-weight-bold d-inline-block">Hot Deal</p>
                                    @if ($product->hot_deal === 1)
                                        <span class="badge badge-success">On</span>
                                    @else
                                        <span class="badge badge-danger">Off</span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <p class="font-weight-bold d-inline-block">Hot New</p>
                                    @if ($product->hot_new === 1)
                                        <span class="badge badge-success">On</span>
                                    @else
                                        <span class="badge badge-danger">Off</span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <p class="font-weight-bold d-inline-block">Best Rated</p>
                                    @if ($product->best_rated === 1)
                                        <span class="badge badge-success">On</span>
                                    @else
                                        <span class="badge badge-danger">Off</span>
                                    @endif
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
