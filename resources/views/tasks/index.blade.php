@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Tasks</h1>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> New Task
            </a>
        </div>

        <!-- Filters -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('tasks.index') }}" method="GET" class="row g-3">
                    <div class="col-md-4">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In
                                Progress</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed
                            </option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select">
                            <option value="all" {{ request('category') == 'all' ? 'selected' : '' }}>All</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="sort" class="form-label">Sort By</label>
                        <div class="input-group">
                            <select name="sort" id="sort" class="form-select">
                                <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Date
                                    Created</option>
                                <option value="due_date" {{ request('sort') == 'due_date' ? 'selected' : '' }}>Due Date
                                </option>
                                <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Title</option>
                            </select>
                            <select name="direction" class="form-select">
                                <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descending
                                </option>
                                <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Ascending
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-primary">Apply Filters</button>
                        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Reset</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tasks List -->
        <div class="row">
            @if ($tasks->count() > 0)
                @foreach ($tasks as $task)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card task-card task-{{ $task->status }} h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title mb-1">{{ $task->title }}</h5>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="{{ route('tasks.show', $task) }}"><i
                                                        class="fas fa-eye me-2"></i> View</a></li>
                                            <li><a class="dropdown-item" href="{{ route('tasks.edit', $task) }}"><i
                                                        class="fas fa-edit me-2"></i> Edit</a></li>
                                            <li>
                                                <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger"
                                                        onclick="return confirm('Are you sure you want to delete this task?')">
                                                        <i class="fas fa-trash me-2"></i> Delete
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mb-3">
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

                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::limit($task->description, 100) }}
                                </p>

                                @if ($task->due_date)
                                    <div class="small text-muted mt-2">
                                        <i class="far fa-calendar-alt me-1"></i> Due:
                                        {{ date('M d, Y', strtotime($task->due_date)) }}
                                    </div>
                                @endif
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-outline-primary">View
                                    Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No tasks found. <a href="{{ route('tasks.create') }}">Create your first task</a>.
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
