@extends('layouts.app')
@section('title', 'Category Details')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Category Details</h1>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Categories
            </a>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $category->name }}</h5>
                <p class="card-text">Color: <span style="color: {{ $category->color }}">{{ $category->color }}</span></p>
                <p class="card-text">Tasks Count: {{ $category->tasks_count }}</p>
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">Edit Category</a>
            </div>
        </div>

        @if ($tasks->count() > 0)
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Tasks in this Category</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Due Date</th>
                                <th width="120">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $index => $task)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ ucfirst($task->status) }}</td>
                                    <td>{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d M Y') : 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-outline-primary btn-sm"><i
                                                class="fas fa-eye"></i></a>
                                        @can('update', $task)
                                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-outline-secondary btn-sm"><i
                                                    class="fas fa-edit
                                                </i></a>
                                        @endcan
                                        @can('delete', $task)
                                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this task?')"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="alert alert-info text-center">
                No tasks found in this category.
            </div>
        @endif
    </div>
@endsection
