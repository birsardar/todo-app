
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Dashboard</h1>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> New Task
            </a>
        </div>

        <!-- Task Status Cards -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card bg-warning bg-opacity-10 h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Pending</h5>
                            <div class="fs-2 text-warning">
                                <i class="fas fa-hourglass-start"></i>
                            </div>
                        </div>
                        <h2 class="mt-3">{{ $pendingTasks }}</h2>
                        <p class="card-text">Tasks awaiting action</p>
                        <a href="{{ route('tasks.index', ['status' => 'pending']) }}"
                            class="btn btn-sm btn-outline-warning">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card bg-primary bg-opacity-10 h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">In Progress</h5>
                            <div class="fs-2 text-primary">
                                <i class="fas fa-spinner"></i>
                            </div>
                        </div>
                        <h2 class="mt-3">{{ $inProgressTasks }}</h2>
                        <p class="card-text">Tasks currently in work</p>
                        <a href="{{ route('tasks.index', ['status' => 'in_progress']) }}"
                            class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card bg-success bg-opacity-10 h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Completed</h5>
                            <div class="fs-2 text-success">
                                <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                        <h2 class="mt-3">{{ $completedTasks }}</h2>
                        <p class="card-text">Tasks successfully completed</p>
                        <a href="{{ route('tasks.index', ['status' => 'completed']) }}"
                            class="btn btn-sm btn-outline-success">View All</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Recent Tasks -->
            <div class="col-lg-8 mb-4">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Recent Tasks</h5>
                    </div>
                    <div class="card-body">
                        @if ($recentTasks->count() > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Due Date</th>
                                            <th>Category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentTasks as $task)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
                                                </td>
                                                <td>
                                                    @if ($task->status == 'pending')
                                                        <span class="badge bg-warning">Pending</span>
                                                    @elseif($task->status == 'in_progress')
                                                        <span class="badge bg-primary">In Progress</span>
                                                    @else
                                                        <span class="badge bg-success">Completed</span>
                                                    @endif
                                                </td>
                                                <td>{{ $task->due_date ? date('M d, Y', strtotime($task->due_date)) : 'No date' }}
                                                </td>
                                                <td>
                                                    @if ($task->category)
                                                        <span class="badge"
                                                            style="background-color: {{ $task->category->color }}">
                                                            {{ $task->category->name }}
                                                        </span>
                                                    @else
                                                        <span class="badge bg-secondary">No Category</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-outline-primary">View All
                                    Tasks</a>
                            </div>
                        @else
                            <p class="text-center py-3">No tasks available. <a href="{{ route('tasks.create') }}">Create
                                    your first task</a>.</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Categories -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Categories</h5>
                    </div>
                    <div class="card-body">
                        @if ($categories->count() > 0)
                            <ul class="list-group">
                                @foreach ($categories as $category)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="badge me-2" style="background-color: {{ $category->color }}">
                                                &nbsp;
                                            </span>
                                            {{ $category->name }}
                                        </div>
                                        <span class="badge bg-primary rounded-pill">{{ $category->tasks_count }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="text-center mt-3">
                                <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-primary">Manage
                                    Categories</a>
                            </div>
                        @else
                            <p class="text-center py-3">No categories available. <a
                                    href="{{ route('categories.create') }}">Create your first category</a>.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
