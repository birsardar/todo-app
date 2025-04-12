@extends('layouts.app')

@section('title', 'Edit Category')

@section('styles')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/css/bootstrap-colorpicker.min.css">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mb-4">
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Back to Categories
                    </a>
                </div>

                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Edit Category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.update', $category) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $category->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <div class="mb-4">
                                <label for="color" class="form-label">Color <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                    <input type="text" class="form-control @error('color') is-invalid @enderror"
                                        id="color" name="color" value="{{ old('color', $category->color) }}">
                                </div>
                                @error('color')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Click on the color box to pick a color.</div>
                            </div> --}}
                            <div class="form-group mb-4">
                                <label for="color">Color <span class="text-danger">*</span></label>
                                <input type="color" id="color" name="color"
                                    class="form-control form-control-color @error('color') is-invalid @enderror"
                                    value="{{ old('color', '#3498db') }}" title="Choose your color">
                                @error('color')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Pick a color using the browser's color selector.</div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
