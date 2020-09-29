@extends('admin.layouts.app')

@section('page-content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <!-- Page Title -->
                        <h6 class="h2 text-white d-inline-block mb-0">Product</h6>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">Products</li>
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
                                <h3 class="mb-0">All Products</h3>
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-sm btn-primary btn-round btn-icon"
                                   href="{{ route('product.create') }}">
                                    <span class="btn-inner--icon"><i class="fas fa-plus-circle"></i></span>
                                    <span class="btn-inner--text">Add Product</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush text-center" id="datatable-basic">
                            <thead class="thead-light">
                            <tr>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td>{{ $product->product_code }}</td>
                                    <td>{{ Str::words($product->product_name, 2, '...') }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/product_images').'/'.$product->image_one }}"
                                             alt="Product Image" width="80">
                                    </td>
                                    <td>
                                        @if ($product->category)
                                            {{ $product->category->category_name }}
                                        @else
                                            {{ '-' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product->brand)
                                            {{ $product->brand->brand_name }}
                                        @else
                                            {{ '-' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product->status === 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Deactivated</span>
                                        @endif
                                    </td>
                                    <td class="table-actions">
                                        <a href="{{ route('product.show', $product->id) }}" class="table-action mr-3"
                                           data-toggle="tooltip" data-original-title="See Details">
                                            <i class="fas fa-link text-primary"></i>
                                        </a>
                                        <a href="{{ route('product.edit', $product->id) }}" class="table-action mr-3"
                                           data-toggle="tooltip" data-original-title="Edit Product">
                                            <i class="fas fa-user-edit text-info"></i>
                                        </a>
                                        <a href="{{ route('product.delete', $product->id) }}" id="delete"
                                           class="table-action table-action-delete mr-3" data-toggle="tooltip"
                                           data-original-title="Delete Product">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                        @if ($product->status === 1)
                                            <a href="{{ route('product.deactivate', $product->id) }}" class="table-action" data-toggle="tooltip"
                                               data-original-title="Deactivate">
                                                <i class="fas fa-thumbs-down text-warning"></i>
                                            </a>
                                            @else
                                                <a href="{{ route('product.activate', $product->id) }}" class="table-action" data-toggle="tooltip" data-original-title="Activate">
                                                    <i class="fas fa-thumbs-up text-success"></i>
                                                </a>
                                        @endif
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
