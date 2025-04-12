
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App - @yield('title', 'Home')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        :root {
            --sidebar-width: 250px;
        }

        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
            color: white;
        }

        .sidebar-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            transition: all 0.3s;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .content {
            margin-left: var(--sidebar-width);
            padding: 20px;
        }

        .task-card {
            border-left: 4px solid #3498db;
            transition: transform 0.2s;
        }

        .task-card:hover {
            transform: translateY(-5px);
        }

        .task-pending {
            border-left-color: #f39c12;
        }

        .task-in-progress {
            border-left-color: #3498db;
        }

        .task-completed {
            border-left-color: #2ecc71;
        }

        .badge-category {
            padding: 5px 10px;
            border-radius: 20px;
            color: white;
            font-weight: normal;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                padding-top: 0;
            }

            .content {
                margin-left: 0;
            }

            .navbar-toggler {
                display: block;
            }
        }
    </style>
    @yield('styles')
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <aside class="sidebar d-none d-md-block">
            <div class="text-center mb-4">
                <h3>Todo App</h3>
            </div>
            <nav>
                <a href="{{ route('dashboard') }}"
                    class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                <a href="{{ route('tasks.index') }}"
                    class="sidebar-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}">
                    <i class="fas fa-tasks"></i> Tasks
                </a>
                <a href="{{ route('categories.index') }}"
                    class="sidebar-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    <i class="fas fa-tags"></i> Categories
                </a>
            </nav>
        </aside>

        <!-- Mobile Navigation -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark w-100 d-md-none">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Todo App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                                href="{{ route('dashboard') }}">
                                <i class="fas fa-home"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}"
                                href="{{ route('tasks.index') }}">
                                <i class="fas fa-tasks"></i> Tasks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}"
                                href="{{ route('categories.index') }}">
                                <i class="fas fa-tags"></i> Categories
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="content flex-grow-1">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
