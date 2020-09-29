@extends('admin.layouts.app')

@section('page-content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <!-- Page Title -->
                        <h6 class="h2 text-white d-inline-block mb-0">Edit Sub Category</h6>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i
                                            class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('subcategory.index') }}">Sub Categories</a></li>
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
                        <form class="needs-validation" action="{{ route('subcategory.update', $subcategory->id) }}" method="POST" novalidate>
                            @csrf
                            <div class="form-group text-left">
                                <label for="sub_category_name" class="font-weight-bold">Name<span class="text-danger">*</span></label>
                                <input id="sub_category_name" type="text" name="sub_category_name" class="form-control" placeholder="Enter category name" value="{{ $subcategory->sub_category_name }}" required>
                                <div class="invalid-feedback">
                                    Please enter sub category name!
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                            <div class="form-group text-left">
                                <label for="category_name" class="font-weight-bold">Category<span class="text-danger">*</span></label>
                                <select class="form-control" id="category_name" name="category_name" required>
                                    @foreach($categories as $category)
                                        <option {{ $subcategory->category->id === $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
