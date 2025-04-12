@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Categories</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> New Category
            </a>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        @if ($categories->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="50">#</th>
                                            <th>Name</th>
                                            <th>Color</th>
                                            <th>Tasks</th>
                                            <th width="120">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $index => $category)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="color-dot me-2"
                                                            style="background-color: {{ $category->color }}; width: 15px; height: 15px; border-radius: 50%; display: inline-block;"></span>
                                                        {{ $category->name }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge" style="background-color: {{ $category->color }}">
                                                        {{ $category->color }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('tasks.index', ['category' => $category->id]) }}">
                                                        {{ $category->tasks_count }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="{{ route('categories.edit', $category) }}"
                                                            class="btn btn-outline-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('categories.destroy', $category) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger"
                                                                onclick="return confirm('Are you sure you want to delete this category? Tasks will remain but lose their category.')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info text-center">
                                No categories found. <a href="{{ route('categories.create') }}">Create your first
                                    category</a>.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Category Distribution</h5>
                    </div>
                    <div class="card-body">
                        @if ($categories->count() > 0)
                            <div class="mb-4">
                                @foreach ($categories as $category)
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span>{{ $category->name }}</span>
                                            <span>{{ $category->tasks_count }}</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: {{ $category->tasks_count > 0 ? ($category->tasks_count / $categories->sum('tasks_count')) * 100 : 0 }}%; background-color: {{ $category->color }}"
                                                aria-valuenow="{{ $category->tasks_count }}" aria-valuemin="0"
                                                aria-valuemax="{{ $categories->sum('tasks_count') }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-center">
                                <p class="text-muted">Total Tasks: {{ $categories->sum('tasks_count') }}</p>
                            </div>
                        @else
                            <p class="text-center py-4">No data available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
