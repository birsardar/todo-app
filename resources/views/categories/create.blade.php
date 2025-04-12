@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
    <div class="container mt-5">
        <div class="col-md-6 mx-auto">
            <div class="mb-4">
                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to Categories
                </a>
            </div>

            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Create New Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

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
                            <button type="submit" class="btn btn-primary">Create Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
