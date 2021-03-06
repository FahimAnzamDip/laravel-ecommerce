@extends('admin.layouts.app')

@section('page-content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <!-- Page Title -->
                        <h6 class="h2 text-white d-inline-block mb-0">Edit Product</h6>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
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
        <div class="row">
            <div class="col-12">
                @include('admin.includes.alerts')
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="product_name" class="font-weight-bold">Product Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" required value="{{ $product->product_name }}">
                                    <div class="invalid-feedback"></div>
                                    <div class="valid-feedback"></div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="product_code" class="font-weight-bold">Product Code<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="product_code" name="product_code" required value="{{ $product->product_code }}">
                                    <div class="invalid-feedback"></div>
                                    <div class="valid-feedback"></div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="product_quantity" class="font-weight-bold">Quantity<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="product_quantity" name="product_quantity" required value="{{ $product->product_quantity }}">
                                    <div class="invalid-feedback"></div>
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="category_id" class="font-weight-bold">Category<span class="text-danger">*</span></label>
                                    <select id="category_id" class="form-control" name="category_id" required>
                                        @foreach($categories as $category)
                                            <option {{ $product->category->id === $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"></div>
                                    <div class="valid-feedback"></div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="sub_category_id" class="font-weight-bold">Sub Category</label>
                                    <select id="sub_category_id" class="form-control" name="sub_category_id" {{ $product->subCategory ? 'required' : '' }}>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                    <div class="valid-feedback"></div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="brand_id" class="font-weight-bold">Brand</label>
                                    <select id="brand_id" class="form-control" name="brand_id">
                                        <option disabled selected>Choose...</option>
                                        @foreach($brands as $brand)
                                            <option @if($product->brand) {{ $product->brand->id === $brand->id ? 'selected' : '' }} @endif value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback"></div>
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="product_size" class="font-weight-bold">Product Size <span class="font-weight-normal">(Separate with comma ,)</span></label>
                                    <input type="text" class="form-control" id="product_size" name="product_size" placeholder="ex: m,xl,l" value="{{ $product->product_size }}">
                                    <div class="invalid-feedback"></div>
                                    <div class="valid-feedback"></div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="product_color" class="font-weight-bold">Product Color <span class="font-weight-normal">(Separate with comma ,)</span></label>
                                    <input type="text" class="form-control" id="product_color" name="product_color" placeholder="ex: black,white" value="{{ $product->product_color }}">
                                    <div class="invalid-feedback"></div>
                                    <div class="valid-feedback"></div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="selling_price" class="font-weight-bold">Selling Price<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="selling_price" name="selling_price" required value="{{ $product->selling_price }}">
                                    <div class="invalid-feedback"></div>
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product_details" class="font-weight-bold">Product Details<span class="text-danger">*</span></label>
                                <textarea name="product_details" id="product_details" class="form-control" required>{{ $product->product_details }}</textarea>
                                <div class="invalid-feedback"></div>
                                <div class="valid-feedback"></div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="video_link" class="font-weight-bold">Video Link</label>
                                    <input type="text" name="video_link" class="form-control" id="video_link" value="{{ $product->video_link }}">
                                    <div class="invalid-feedback"></div>
                                    <div class="valid-feedback"></div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="discounted_price" class="font-weight-bold">Discounted Price</label>
                                    <input type="text" name="discounted_price" class="form-control" id="discounted_price" value="{{ $product->discounted_price }}">
                                    <div class="invalid-feedback"></div>
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4 mb-0">
                                    <label for="image_one" class="font-weight-bold">Image One<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="image_one" name="image_one" onchange="readURL(this)">
                                    <img class="mt-3" src="{{ asset('uploads/product_images') . '/' . $product->image_one }}" alt="" id="one" width="80" height="80">
                                    <div class="invalid-feedback"></div>
                                    <div class="valid-feedback"></div>
                                </div>

                                <div class="form-group col-md-4 mb-0">
                                    <label for="image_two" class="font-weight-bold">Image Two<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="image_two" name="image_two" onchange="readURL2(this)">
                                    <img class="mt-3" src="{{ asset('uploads/product_images') . '/' . $product->image_two }}" alt="" id="two" width="80" height="80">
                                    <div class="invalid-feedback"></div>
                                    <div class="valid-feedback"></div>
                                </div>

                                <div class="form-group col-md-4 mb-0">
                                    <label for="image_three" class="font-weight-bold">Image Three<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="image_three" name="image_three" onchange="readURL3(this)">
                                    <img class="mt-3" src="{{ asset('uploads/product_images') . '/' . $product->image_three }}" alt="" id="three" width="80" height="80">
                                    <div class="invalid-feedback"></div>
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">
                                <div class="form-group col-md-3 mb-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="trend" name="trend" value="1" {{ $product->trend === 1 ? 'checked' : '' }}>
                                        <label class="form-check-label font-weight-bold" for="trend">
                                            Trend Product
                                        </label>
                                        <div class="invalid-feedback"></div>
                                        <div class="valid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hot_deal"  name="hot_deal" value="1" {{ $product->hot_deal === 1 ? 'checked' : '' }}>
                                        <label class="form-check-label font-weight-bold" for="hot_deal">
                                            Hot Deal
                                        </label>
                                        <div class="invalid-feedback"></div>
                                        <div class="valid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hot_new"  name="hot_new" value="1" {{ $product->hot_new === 1 ? 'checked' : '' }}>
                                        <label class="form-check-label font-weight-bold" for="hot_new">
                                            Hot New
                                        </label>
                                        <div class="invalid-feedback"></div>
                                        <div class="valid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="best_rated"  name="best_rated" value="1" {{ $product->best_rated === 1 ? 'checked' : '' }}>
                                        <label class="form-check-label font-weight-bold" for="best_rated">
                                            Best Rated
                                        </label>
                                        <div class="invalid-feedback"></div>
                                        <div class="valid-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <button type="submit" class="btn btn-warning float-right">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
