@extends('admin.layouts.app')

@section('page-content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <!-- Page Title -->
                        <h6 class="h2 text-white d-inline-block mb-0">Slider</h6>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">Slides</li>
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
                                <h3 class="mb-0">All Slides</h3>
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="modal" data-target="#brand_add_modal">
                                    <span class="btn-inner--icon"><i class="fas fa-plus-circle"></i></span>
                                    <span class="btn-inner--text">Add Slide</span>
                                </button>
                                <!-- Category Modal -->
                                <div class="modal fade" id="brand_add_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="brand_add_modal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Add Slide</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" action="{{ route('slider.store') }}" method="POST" novalidate enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group text-left">
                                                        <label for="link" class="font-weight-bold">Link<span class="text-danger">*</span></label>
                                                        <input id="link" type="text" name="link" class="form-control" placeholder="Enter link" required>
                                                        <div class="invalid-feedback">
                                                            Please enter slide link!
                                                        </div>
                                                        <div class="valid-feedback"></div>
                                                    </div>
                                                    <div class="form-group mb-0 text-left">
                                                        <label for="slider_image" class="font-weight-bold">Slide Image<span class="text-danger">*</span></label>
                                                        <input type="file" class="form-control" id="slider_image" name="slider_image" required>
                                                        <div class="invalid-feedback"></div>
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
                                <th>Slide ID</th>
                                <th>Slide Image</th>
                                <th>Link</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($sliders as $key => $slider)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img width="200" src="{{ asset('uploads/slider_images').'/'.$slider->slider_image }}" alt="Slider Iamge">
                                    </td>
                                    <td>{{ $slider->link }}</td>
                                    <td>{{ $slider->created_at->format('d-M-Y h:i a') }}</td>
                                    <td class="table-actions">
                                        <a href="{{ route('slider.edit', $slider->id) }}" class="table-action mr-3" data-toggle="tooltip" data-original-title="Edit Brand">
                                            <i class="fas fa-user-edit text-info"></i>
                                        </a>
                                        <a href="{{ route('slider.delete', $slider->id) }}" id="delete" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete Brand" >
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
