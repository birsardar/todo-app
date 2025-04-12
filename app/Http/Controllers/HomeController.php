<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;


class HomeController extends Controller
{
    public function index()
    {
        $pendingTasks = Task::where('status', 'pending')->count();
        $inProgressTasks = Task::where('status', 'in_progress')->count();
        $completedTasks = Task::where('status', 'completed')->count();
        $categories = Category::withCount('tasks')->get();
        $recentTasks = Task::latest()->take(5)->get();

        return view('dashboard', compact(
            'pendingTasks',
            'inProgressTasks',
            'completedTasks',
            'categories',
            'recentTasks'
        ));
    }
}
