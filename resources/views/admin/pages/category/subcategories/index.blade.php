@extends('admin.layouts.app')

@section('page-content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <!-- Page Title -->
                        <h6 class="h2 text-white d-inline-block mb-0">Sub Category</h6>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">Sub Categories</li>
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
                                <h3 class="mb-0">All Sub Categories</h3>
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="modal" data-target="#brand_add_modal">
                                    <span class="btn-inner--icon"><i class="fas fa-plus-circle"></i></span>
                                    <span class="btn-inner--text">Add Sub Category</span>
                                </button>
                                <!-- Category Modal -->
                                <div class="modal fade" id="brand_add_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="brand_add_modal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add Sub Category</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" action="{{ route('subcategory.store') }}" method="POST" novalidate>
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group text-left">
                                                        <label for="sub_category_name" class="font-weight-bold">Name<span class="text-danger">*</span></label>
                                                        <input id="sub_category_name" type="text" name="sub_category_name" class="form-control" placeholder="Enter sub category name" required>
                                                        <div class="invalid-feedback">
                                                            Please enter sub category name!
                                                        </div>
                                                        <div class="valid-feedback"></div>
                                                    </div>
                                                    <div class="form-group mb-0 text-left">
                                                        <label for="category_name" class="font-weight-bold">Category<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="category_name" name="category_name" required>
                                                            <option disabled selected class="text-muted">Select category</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                            @endforeach
                                                        </select>
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
                                <th>Sub Category ID</th>
                                <th>Sub Category Name</th>
                                <th>Category Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($subcategories as $key => $subcategory)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $subcategory->sub_category_name }}</td>
                                    <td>{{ $subcategory->category->category_name }}</td>
                                    <td>{{ $subcategory->created_at->format('d-M-Y h:i a') }}</td>
                                    <td class="table-actions">
                                        <a href="{{ route('subcategory.edit', $subcategory->id) }}" class="table-action mr-3" data-toggle="tooltip" data-original-title="Edit Sub Category">
                                            <i class="fas fa-user-edit text-info"></i>
                                        </a>
                                        <a href="{{ route('subcategory.delete', $subcategory->id) }}" id="delete" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete Sub Category" >
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
