@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-4">
                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Back to Tasks
                    </a>
                </div>

                <div class="card">
                    <div class="card-header bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Task Details</h5>
                            <div>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary me-2">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this task?')">
                                        <i class="fas fa-trash me-1"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="mb-3">{{ $task->title }}</h4>

                        <div class="mb-4">
                            @if ($task->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($task->status == 'in_progress')
                                <span class="badge bg-primary">In Progress</span>
                            @else
                                <span class="badge bg-success">Completed</span>
                            @endif

                            @if ($task->category)
                                <span class="badge" style="background-color: {{ $task->category->color }}">
                                    {{ $task->category->name }}
                                </span>
                            @endif
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <p class="text-muted mb-1">Created:</p>
                                <p>{{ $task->created_at->format('M d, Y \a\t h:i A') }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted mb-1">Due Date:</p>
                                <p>{{ $task->due_date ? date('M d, Y', strtotime($task->due_date)) : 'No due date' }}</p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="text-muted mb-1">Description:</p>
                            <div class="p-3 bg-light rounded">
                                {!! nl2br(e($task->description ?: 'No description provided.')) !!}
                            </div>
                        </div>

                        <div class="mt-4">
                            <form action="{{ route('tasks.update', $task) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="title" value="{{ $task->title }}">
                                <input type="hidden" name="description" value="{{ $task->description }}">
                                <input type="hidden" name="due_date" value="{{ $task->due_date }}">
                                <input type="hidden" name="category_id" value="{{ $task->category_id }}">

                                <div class="btn-group" role="group">
                                    <button type="submit" name="status" value="pending"
                                        class="btn {{ $task->status == 'pending' ? 'btn-warning' : 'btn-outline-warning' }}">
                                        Pending
                                    </button>
                                    <button type="submit" name="status" value="in_progress"
                                        class="btn {{ $task->status == 'in_progress' ? 'btn-primary' : 'btn-outline-primary' }}">
                                        In Progress
                                    </button>
                                    <button type="submit" name="status" value="completed"
                                        class="btn {{ $task->status == 'completed' ? 'btn-success' : 'btn-outline-success' }}">
                                        Completed
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
